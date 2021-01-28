<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH . "libraries/razorpay/razorpay-php/Razorpay.php");

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class Landing extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'cookie', 'date', 'form', 'email'));
		$this->load->library(array('form_validation'));
		$this->load->model('landing_model');
		$this->load->model('mail_model');
		$this->load->helper('user');
		$this->load->library('pagination');
	}
	public function index()
	{
		$id = $this->checkLogin("U") == "" ? 0 : $this->checkLogin("U");
		
		$this->data['post'] = $this->landing_model->get_all_details(POST, array(), array("field" => "id", "type" => "desc"))->result();
		$this->data['qualification_name'] = array('SSLC','+2','ITI','Diploma','UG Degree','PG Degree','Typewriting','Shorthand');
		$this->data['newsleter_session_id'] = $newsleter_session_id = time() . rand(10, 20);
		$this->session->set_userdata(array("newsleter_session_id" => $newsleter_session_id));
		$this->load->view('site/landing/landing', $this->data);
	}
	public function check_phone_exist()
	{
		$get = $this->input->get();
		$ret['status'] = 1;
		$check_exist = $this->landing_model->get_all_details('fc_application', array("mobile" => $get["phone"], "post_id" => $get['post_id']));
		if ($check_exist->num_rows() > 0) {
			$ret['status'] = 0;
		} else {
			$ret['status'] = 1;
		}
		echo json_encode($ret);
	}
	public function member_application()
	{
		if ($this->checkLogin("U") == "") {
			$post = $this->input->post();
			$ret['status'] = 1;
			$this->load->view('site/landing/member_application', $this->data);
		} else {
			$this->session->set_flashdata('alert_message', "Already you are logged In.");
			$this->session->set_flashdata('error_type', 'error');
			redirect(base_url());
		}
	}
	public function view_application(){
		
		$this->load->view('site/landing/view_application', $this->data);
		
	}
	public function membership_register($id = 1)
	{
		$_SESSION['user_reg'] = '';
		$_SESSION['razorpay_order_id'] = '';
		if ($this->checkLogin("U") == "") {
			$post = $this->input->post();
			$ret['status'] = 1;
			$captcha = $this->captcha_refresh();
			$this->data['post_id'] = $id;
			$this->data['csession_id'] = $csession_id = $captcha['word'];
			$this->data['captcha'] = $captcha['image'];
			$this->session->set_userdata(array("application_sessionid" => $csession_id));
			$this->data['post_details'] = $this->landing_model->get_all_details('fc_post', array('id' => $id));
			$this->data["post_list"] = $this->landing_model->get_all_details('fc_post', array('date(end_date)>=' => date("Y-m-d")));
			$this->data["state_list"] = $this->landing_model->get_all_details('fc_state', array("status" => "1"));
			$this->data["priority_list"] = $this->landing_model->get_all_details('fc_priority', array());
			$this->load->view('site/landing/membership_register', $this->data);
		} else {
			$this->session->set_flashdata('alert_message', "Already you are logged In.");
			$this->session->set_flashdata('error_type', 'error');
			redirect(base_url());
		}
	}
	public function pay()
	{

		if ($this->session->userdata("user_reg") != "") {
			$api = new Api(RAZOR_KEY, RAZOR_SECRET_KEY);
			$_SESSION['payable_amount'] = 250;

			$razorpayOrder = $api->order->create(array(
				'receipt'         => rand(),
				'amount'          => $_SESSION['payable_amount'] * 100, // 2000 rupees in paise
				'currency'        => 'INR',
				'payment_capture' => 1 // auto capture
			));


			$amount = $razorpayOrder['amount'];

			$razorpayOrderId = $razorpayOrder['id'];

			$_SESSION['razorpay_order_id'] = $razorpayOrderId;

			$this->data['data'] = $this->prepareData($amount, $razorpayOrderId);

			$this->load->view('site/landing/rezorpay', $this->data);
		} else {
			redirect(base_url());
		}
	}
	public function prepareData($amount, $razorpayOrderId)
	{
		$userinfo=$this->session->userdata("user_reg");
		$name = $userinfo["name"];
		$email = $userinfo["email"];
		$contact = '+91'.$userinfo["mobile"];

		$data = array(
			"key" => RAZOR_KEY,
			"amount" => $amount,
			"name" => "Coding Birds Online",
			"description" => "Learn To Code",
			"image" => "https://razorpay.com/favicon.png",
			"prefill" => array(
				"name"  => $name,
				"email"  => $email,
				"contact" => $contact,
			),
			"notes"  => array(
				"address"  => "Aavin Job Registration Payment - 250",
				"merchant_order_id" => rand(),
			),
			"theme"  => array(
				"color"  => "#F37254"
			),
			"order_id" => $razorpayOrderId,
		);
		return $data;
	}

	public function verify()
	{
		$success = true;
		$error = "payment_failed";
		if ($this->session->userdata('user_reg') != "") {
			if (empty($_POST['razorpay_payment_id']) === false) {
				$api = new Api(RAZOR_KEY, RAZOR_SECRET_KEY);
				try {
					$attributes = array(
						'razorpay_order_id' => $_SESSION['razorpay_order_id'],
						'razorpay_payment_id' => $_POST['razorpay_payment_id'],
						'razorpay_signature' => $_POST['razorpay_signature']
					);
					$api->utility->verifyPaymentSignature($attributes);
				} catch (SignatureVerificationError $e) {
					$success = false;
					$error = 'Razorpay_Error : ' . $e->getMessage();
				}
			}
			if ($success === true) {
				/**
				 * Call this function from where ever you want
				 * to save save data before of after the payment
				 */
				$company_info = $this->session->userdata('user_reg');
				$company_info['payment_ref'] = $_SESSION['razorpay_order_id'];
				$this->landing_model->simple_insert('fc_application', $company_info);

				$_SESSION['user_reg'] = '';
				$comp_id = $_SESSION['razorpay_order_id'];
				$_SESSION['razorpay_order_id'] = '';
				redirect(base_url() . 'register/success/' . $comp_id);
			} else {
				redirect(base_url() . 'register/paymentFailed');
			}
		} else {
			redirect(base_url());
		}
	}



	public function success()
	{
		$this->load->view('success');
	}

	public function paymentFailed()
	{
		$this->load->view('error');
	}


	public function get_age_limit($id)
	{
		$html = '';
		$post = $this->landing_model->get_all_details('fc_post', array("id" => $id));
		if ($post->num_rows() > 0) {
			$html = "This post age limit for regular " . $post->row()->age_limit;
		}
		echo json_encode(array("html" => $html));
	}


	public function check_age()
	{
		$get = $this->input->get();
		$ret = array();
		$dob = $get['dob'];
		$ret['status'] = 1;
		$post = $this->landing_model->get_all_details('fc_priority', array("id" => $get['priority']));
		if ($post->num_rows() > 0) {
			$birthdate = new DateTime($dob);
			$today   = new DateTime('today');
			$age = $birthdate->diff($today)->y;
			if ($post->row()->age_limit < $age) {
				$ret['status'] = 0;
				$ret['message'] = "This position age limit for " . $post->row()->priority_name . " priority is " . $post->row()->age_limit;
			}
		}
		echo json_encode($ret);
	}


	public function save_registration()
	{
		$post = $this->input->post();
		/*if($this->session->userdata("application_sessionid")==$post["cid"]){*/

		if ($post['post_id'] != "" && $post['community'] != "") {



			$company_info = array();
			$company_info["post_id"] = $post["post_id"];
			$company_info["name"] = $post["name"];
			$company_info["fname"] = $post["fname"];
			$basic_details = array('initial' => $post['initial'], 'nationality' => $post['nationality'], 'mother_tongue' => $post['mother_tongue'], 'native_state' => $post['native_state'], 'alternative_number' => $post['alternative_number'], 'name' => $post['name'], 'fname' => $post['fname'], 'mname' => $post['mname'], "marital_status" => $post['marital_status'], "wife_name" => $post['wife_name']);
			$company_info["basic_details"] = json_encode($basic_details);
			$company_info["dob"] = $post["dob"];
			$company_info["marital_status"] = $post["marital_status"];
			$company_info["age"] = $post["age"];
			$company_info["pob"] = $post["pob"];
			$company_info["gender"] = $post["gender"];
			$company_info["mobile"] = $post["mobile"];
			$company_info["email"] = $post["email"];
			$company_info["aadhar_number"] = $post["aadhar_number"];
			$company_info["district"] = $post["district_main"];
			$company_info["community"] = $post["community"];
			$company_info["sub_caste"] = $post["sub_caste"];
			$company_info["religion"] = $post["religion"];
			$community_certificate = array('community_certificate_number' => $post['community_certificate_number'], 'date_of_issue' => $post['date_of_issue'], 'issuing_authority' => $post['issuing_authority']);
			$company_info["community_certificate"] = json_encode($community_certificate);
			$company_info["employment_office_status"] = $post["employment_office_status"];
			$company_info["reg_date"] = $post["reg_date"];
			$company_info["reg_number"] = $post["reg_number"];
			$company_info["priorty_status"] = $post["priorty_status"];
			$company_info["priority_category"] = $post['priority_category'];
			$company_info["ipaddress"] = $this->input->ip_address();
			$company_info["cer_no"] = $post['cer_no'];
			$language = array(
				'tamil' => array('name' => $post['lang'][0], 'read' => isset($post['read'][0]) ? "Yes" : "No", 'write' => isset($post['write'][0]) ? "Yes" : "No", 'speak' => isset($post['speak'][0]) ? "Yes" : "No"),
				'english' => array('name' => $post['lang'][1], 'read' => isset($post['read'][1]) ? "Yes" : "No", 'write' => isset($post['write'][1]) ? "Yes" : "No", 'speak' => isset($post['speak'][1]) ? "Yes" : "No"),
				'other' => array('name' => $post['lang'][2], 'read' => isset($post['read'][1]) ? "Yes" : "No", 'write' => isset($post['write'][1]) ? "Yes" : "No", 'speak' => isset($post['speak'][1]) ? "Yes" : "No")
			);
			$company_info["language"] = json_encode($language);
			$permanent_address = array('door_no' => $post['door_no'][0], 'street' => $post['street'][0], 'state' => $post['state'][0], 'district' => $post['district'][0], 'taluk' => $post['taluk']);
			$communication_address = array('door_no' => $post['door_no'][0], 'street' => $post['street'][0], 'state' => $post['state'][0], 'district' => $post['district'][0], 'taluk' => $post['taluk']);
			$company_info["permanent_address"] = json_encode($permanent_address);
			$company_info["communication_address"] = json_encode($communication_address);
			$sslc_details = array('qualification' => $post['qualification_sslc'], "yop" => $post['yop_sslc'], "grade" => $post['grade_sslc'], 'total_marks' => $post['total_marks_sslc'], "mark_secured" => $post['mark_secured_sslc'], "percentage" => $post['percentage_sslc'], "medium" => $post['medium_sslc'], 'ins' => $post['ins_sslc'], "marksheet" => $post['marksheet_sslc']);
			$company_info["sslc_details"] = json_encode($sslc_details);
			$plustwo_details = array('qualification' => $post['qualification_p12'], "yop" => $post['yop_p12'], "grade" => $post['grade_p12'], 'total_marks' => $post['total_marks_p12'], "mark_secured" => $post['mark_secured_p12'], "percentage" => $post['percentage_p12'], "medium" => $post['medium_p12'], 'ins' => $post['ins_p12'], "marksheet" => $post['marksheet_p12']);
			$company_info["plustwo_details"] = json_encode($plustwo_details);
			$ug_details = array('qualification' => $post['qualification_ug'], "yop" => $post['yop_ug'], "grade" => $post['grade_ug'], 'total_marks' => $post['total_marks_ug'], "mark_secured" => $post['mark_secured_ug'], "percentage" => $post['percentage_ug'], "medium" => $post['medium_ug'], 'ins' => $post['ins_ug'], "marksheet" => $post['marksheet_ug']);
			$company_info["ug_details"] = json_encode($ug_details);
			$pg_details = array('qualification' => $post['qualification_pg'], "yop" => $post['yop_pg'], "grade" => $post['grade_pg'], 'total_marks' => $post['total_marks_pg'], "mark_secured" => $post['mark_secured_pg'], "percentage" => $post['percentage_pg'], "medium" => $post['medium_pg'], 'ins' => $post['ins_pg'], "marksheet" => $post['marksheet_pg']);
			$company_info["pg_details"] = json_encode($pg_details);
			$iti_details = array('qualification' => $post['qualification_iti'], "yop" => $post['yop_iti'], "grade" => $post['grade_iti'], 'total_marks' => $post['total_marks_iti'], "mark_secured" => $post['mark_secured_iti'], "percentage" => $post['percentage_iti'], "medium" => $post['medium_iti'], 'ins' => $post['ins_iti'], "marksheet" => $post['marksheet_iti']);
			$company_info["iti_details"] = json_encode($iti_details);
			$diploma_details = array('qualification' => $post['qualification_diploma'], "yop" => $post['yop_diploma'], "grade" => $post['grade_diploma'], 'total_marks' => $post['total_marks_diploma'], "mark_secured" => $post['mark_secured_diploma'], "percentage" => $post['percentage_diploma'], "medium" => $post['medium_diploma'], 'ins' => $post['ins_diploma'], "marksheet" => $post['marksheet_diploma']);
			$company_info["diploma_details"] = json_encode($diploma_details);
			$typewriting = array('typewriting' => $post['qualification_typewriting'], "yop" => $post['yop_typewriting'], "grade" => $post['grade_typewriting'], 'total_marks' => $post['total_marks_typewriting'], "mark_secured" => $post['mark_secured_typewriting'], "percentage" => $post['percentage_typewriting'], "medium" => $post['medium_typewriting'], 'ins' => $post['ins_typewriting'], "marksheet" => $post['marksheet_typewriting']);
			$shorthand = array('shorthand' => $post['qualification_shorthand'], "yop" => $post['yop_shorthand'], "grade" => $post['grade_shorthand'], 'total_marks' => $post['total_marks_shorthand'], "mark_secured" => $post['mark_secured_shorthand'], "percentage" => $post['percentage_shorthand'], "medium" => $post['medium_shorthand'], 'ins' => $post['ins_shorthand'], "marksheet" => $post['marksheet_shorthand']);
			$others_details1 = array('qualification' => $post['qualification_other1'], "yop" => $post['yop_other1'], "grade" => $post['grade_other1'], 'total_marks' => $post['total_marks_other1'], "mark_secured" => $post['mark_secured_other1'], "percentage" => $post['percentage_other1'], "medium" => $post['medium_other1'], 'ins' => $post['ins_other1'], "marksheet" => $post['marksheet_other1']);
			$others_details2 = array('qualification' => $post['qualification_other2'], "yop" => $post['yop_other2'], "grade" => $post['grade_other2'], 'total_marks' => $post['total_marks_other2'], "mark_secured" => $post['mark_secured_other2'], "percentage" => $post['percentage_other2'], "medium" => $post['medium_other2'], 'ins' => $post['ins_other2'], "marksheet" => $post['marksheet_other2']);
			$others_details3 = array('qualification' => $post['qualification_other3'], "yop" => $post['yop_other3'], "grade" => $post['grade_other3'], 'total_marks' => $post['total_marks_other3'], "mark_secured" => $post['mark_secured_other3'], "percentage" => $post['percentage_other3'], "medium" => $post['medium_other3'], 'ins' => $post['ins_other3'], "marksheet" => $post['marksheet_other3']);
			$others_details = array('other1' => $others_details1, "other2" => $others_details2, "other3" => $others_details3);
			$company_info["others_details"] = json_encode($others_details);
			$company_info["created_date"] = date("Y-m-d H:i:s");

			$config['overwrite'] = FALSE;
			$config['remove_spaces'] = TRUE;
			$config['allowed_types'] = 'jpg|jpeg|gif|png';
			$config['upload_path'] = './images/site/files';
			$config['remove_spaces'] = TRUE;
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('photo_file')) {
				$imgDetailsd = $this->upload->data();
				$company_info['photo_file'] = $imgDetailsd['file_name'];
				//$this->createThumbnail($company_info['photo_file'], 200, 200, "./images/site/files", "./images/site/files/thumb/");
			} else {
				echo json_encode(array("status" => "0", "message" => strip_tags($this->upload->display_errors())));
				die;
			}

			if ($this->upload->do_upload('signature_file')) {
				$imgDetailsd = $this->upload->data();
				$company_info['signature_file'] = $imgDetailsd['file_name'];
				//$this->createThumbnail($company_info['signature_file'], 200, 200, "./images/site/files", "./images/site/files/thumb/");
			} else {
				echo json_encode(array("status" => "0", "message" => strip_tags($this->upload->display_errors())));
				die;
			}

			/*$check_exist_username = $this->landing_model->get_all_details('fc_application', array("email" => $post["email"], "post_id" => $post["post_id"]));
			if ($check_exist_username->num_rows() > 0) {
				echo json_encode(array("status" => "0", "message" => "Already email exist."));
				die;
			}*/

			$check_exist_comp = $this->landing_model->get_all_details('fc_application', array("mobile" => $post["mobile"], "post_id" => $post["post_id"]));
			if ($check_exist_comp->num_rows() > 0) {
				echo json_encode(array("status" => "0", "message" => "Already used this mobile ."));
				die;
			}

			$data = array(
				'company_info'  => $company_info,
				'date'     => date('Y-m-d h:i:s'),
			);

			$this->data['company_info'] = $company_info;
			$this->session->set_userdata(array('user_reg' => $company_info));
			$confirm_html = $this->load->view('site/landing/ajax_confirm', $this->data, true);
			//print_r($this->session->userdata);
			//$this->landing_model->simple_insert('fc_application', $company_info);
			$post_id = $this->landing_model->get_last_insert_id();
			echo json_encode(array("ajax_confirm" => $confirm_html, "status" => "1", "message" => "completed, Please pay", "url" => base_url("pay/" . $post_id)));
			die;
		} else {

			echo json_encode(array("status" => "0", "message" => "Please fill all the fields."));
			die;
		}



		/*}
		else{
			
            echo json_encode(array("status"=>"0","message"=>"Please enter correct captcha"));
							die;			
		}*/
	}
	public function get_application(){
		if($this->input->post()){
			
			$post = $this->input->post();
			if($post['mobile'] != "" && $post['email'] != "" && $post['aadhar_number'] != "")
			{
				$result = $this->landing_model->get_all_details('fc_application', array("mobile" => $post["mobile"], "aadhar_number" => $post["aadhar_number"], "email" => $post["email"]));
				if($result->num_rows() > 0)
				{
					$this->data['rec'] = $result->result();
					$message = $this->load->view('site/landing/ajax_application_preview',$this->data,true);
					echo json_encode(array('status'=>'1','message'=>$message));
				}
				else
				{
					echo json_encode(array('status'=>'2','message'=>'No Record Founded'));
				}
			}
				
		}
		
	}
	public function get_application_form(){
		if($this->input->post()){
			
			$post = $this->input->post();
			if($post['new_mobile'] != "" && $post['new_email'] != "" && $post['new_aadhar_number'] != "")
			{
				$result = $this->landing_model->get_all_details('fc_application', array("mobile" => $post["new_mobile"], "aadhar_number" => $post["new_aadhar_number"], "email" => $post["new_email"],'id'=>$post['new_id']));
				if($result->num_rows() > 0)
				{
					$this->data['rec'] = $result->row_array();
					 $this->load->view('site/landing/ajax_application_preview_print',$this->data);
					
				}
				else
				{
					echo json_encode(array('status'=>'2','message'=>'No Record Founded'));
				}
			}
		}
	}
	public function edit_membership_register($id)
	{
		if ($this->checkLogin("U") != "") {
			$post = $this->input->post();
			$id = $this->checkLogin("U");
			$ret['status'] = 1;
			$this->data['id'] = $id;
			$this->data["fees"] = $this->landing_model->get_all_details(FEES, array())->row();
			$this->data["company_info"] = $this->landing_model->get_all_details(COMPANY, array("id" => $id))->row();
			$this->data["locations"] = $this->landing_model->get_all_details(IATA, array("country_id" => $this->data["company_info"]->country_id));
			$this->data["hears_list"] = $this->landing_model->get_all_details(HEARS, array("status" => "1"));
			$this->load->view('site/landing/edit_membership_register', $this->data);
		} else {
			$this->session->set_flashdata('alert_message', "Session out please try again later.");
			$this->session->set_flashdata('error_type', 'error');
			redirect(base_url());
		}
	}



	public function member_branchs($id)
	{
		if ($this->checkLogin("U") != "") {
			$post = $this->input->post();
			$id = $this->checkLogin("U");
			$reg_step = $this->landing_model->get_all_details(COMPANY, array("id" => $id))->row()->reg_step;
			if ($reg_step == 4) {
				$this->session->set_flashdata('alert_message', "Something went to wrong...");
				$this->session->set_flashdata('error_type', 'error');
				redirect(base_url());
			}


			$ret['status'] = 1;
			$this->data['id'] = $id;
			$this->data["branch_list"] = $this->landing_model->get_all_details(OFFICE, array("company_id" => $id));
			$country_id = $this->landing_model->get_all_details(COMPANY, array("id" => $id))->row()->country_id;
			$this->data["locations"] = $this->landing_model->get_all_details(IATA, array("country_id" => $country_id));
			$this->load->view('site/landing/member_branchs', $this->data);
		} else {
			$this->session->set_flashdata('alert_message', "Session out please try again later.");
			$this->session->set_flashdata('error_type', 'error');
			redirect(base_url());
		}
	}



	public function delete_office($cid)
	{
		if ($this->checkLogin("U") != "") {
			$post = $this->input->post();
			$id = $this->checkLogin("U");
			$ret['status'] = 1;
			$this->data['id'] = $id;
			$this->landing_model->commonDelete(OFFICE, array("id" => $cid, "company_id" => $id));
			redirect(base_url("member_branchs/" . $id));
		} else {
			$this->session->set_flashdata('alert_message', "Session out please try again later.");
			$this->session->set_flashdata('error_type', 'error');
			redirect(base_url());
		}
	}



	public function add_branch()
	{
		if ($this->checkLogin("U") != "") {
			$post = $this->input->post();
			$id = $this->checkLogin("U");
			if (!empty($post["locations"])) {
				foreach ($post['locations'] as $locations) {
					$check = $this->landing_model->get_all_details(OFFICE, array("iata_id" => $locations));
					/* if($check->num_rows()==0){ */
					$country_id = $this->landing_model->get_all_details(COMPANY, array("id" => $id))->row()->country_id;
					$this->landing_model->simple_insert(OFFICE, array("created_at" => date("Y-m-d H:i:s"), "company_id" => $id, "iata_id" => $locations, "country_id" => $country_id));
					/* } */
				}
				redirect(base_url("member_branchs/" . $id));
			} else {
				$this->session->set_flashdata('alert_message', "Please select branch");
				$this->session->set_flashdata('error_type', 'error');
				redirect(base_url("member_branchs/" . $id));
			}
		} else {
			$this->session->set_flashdata('alert_message', "Session out please try again later.");
			$this->session->set_flashdata('error_type', 'error');
			redirect(base_url());
		}
	}



	public function membership_option($id)
	{
		if ($this->checkLogin("U") != "") {
			$reg_step = $this->landing_model->get_all_details(COMPANY, array("id" => $id))->row()->reg_step;
			$this->data["questions_list"] = $this->landing_model->get_all_details(QUESTIONS, array("status" => "1"), array("type" => "asc", "field" => "id"));
			if ($reg_step == 4) {
				$this->session->set_flashdata('alert_message', "Something went to wrong...");
				$this->session->set_flashdata('error_type', 'error');
				redirect(base_url());
			}

			$post = $this->input->post();
			$ret['status'] = 1;
			$this->data['id'] = $id;
			$this->data["fees"] = $this->landing_model->get_all_details(FEES, array())->row();
			$this->data["get_next_summits"] = $this->landing_model->get_next_summits();
			$this->data["branch_list"] = $this->landing_model->get_all_details(OFFICE, array("company_id" => $id));
			$this->load->view('site/landing/membership_option', $this->data);
		} else {
			$this->session->set_flashdata('alert_message', "Session out please try again later.");
			$this->session->set_flashdata('error_type', 'error');
			redirect(base_url());
		}
	}

	public function load_branches()
	{
		if ($this->checkLogin("U") != "") {
			$post = $this->input->post();
			$id = $this->checkLogin("U");
			$ret['status'] = 1;
			$this->data['id'] = $id;
			$this->data["branch_list"] = $this->landing_model->get_all_details(OFFICE, array("company_id" => $id));
			$ret['html'] = $this->load->view('site/landing/load_branches', $this->data, true);
		} else {
			$ret['status'] = 0;
			$ret['message'] = "Session out login again.";
		}
		echo json_encode($ret);
	}




	public function check_headoffice()
	{
		if ($this->checkLogin("U") != "") {
			$post = $this->input->post();
			$id = $this->checkLogin("U");
			$branch_id = $post["branch_id"];
			$ret['status'] = 1;
			$this->data['id'] = $id;
			$check = $this->landing_model->get_all_details(OFFICE, array("company_id" => $id, "id!=" => $branch_id, "is_ho" => "1"));
			$head_office = array();
			$company_info = $this->landing_model->get_all_details(COMPANY, array("id" => $id))->row();
			$head_office["address1"] = $company_info->address1;
			$head_office["address2"] = $company_info->address2;
			$head_office["city"] = $company_info->city;
			$head_office["state"] = $company_info->state;
			$head_office["zip"] = $company_info->zip;
			$head_office["phone"] = $company_info->mobile;
			$head_office["fax"] = $company_info->fax;
			$head_office["contact_name"] = $company_info->contact_name;
			$head_office["email"] = $company_info->email;
			$ret['head_office'] = $head_office;


			if ($check->num_rows() == 0) {
				$ret['status'] = 1;
			} else {
				$ret['status'] = 2;
				$ret['message'] = "Already head branch selected.";
			}
		} else {
			$ret['status'] = 0;
			$ret['message'] = "Session out login again.";
		}
		echo json_encode($ret);
	}


	public function save_all_branches()
	{
		if ($this->checkLogin("U") != "") {
			$post = $this->input->post();
			$id = $this->checkLogin("U");
			$ret['status'] = 1;
			$this->data['id'] = $id;
			$check = $this->landing_model->get_all_details(OFFICE, array("company_id" => $id, "branch_email" => ""));

			if ($check->num_rows() == 0) {
				$ret['status'] = 1;
				$this->landing_model->update_details(COMPANY, array("reg_step" => "3"), array("id" => $id));
				$ret['url'] = base_url() . "membership_option/" . $id;
			} else {
				$ret['status'] = 2;
				$ret['message'] = "Please fill all branch details.";
			}
		} else {
			$ret['status'] = 0;
			$ret['message'] = "Session out login again.";
		}
		echo json_encode($ret);
	}


	public function update_branch()
	{
		if ($this->checkLogin("U") != "") {
			$post = $this->input->post();
			$ret['status'] = 1;
			$id = $post["office_id"];
			$office_name = $post["office_name"];
			$this->data['id'] = $id;
			$this->data['office_name'] = $office_name;
			$this->data["branch_info"] = $this->landing_model->get_all_details(OFFICE, array("id" => $id))->row();
			$country_code = $this->landing_model->get_all_details(COUNTRY, array("id" => $this->data["branch_info"]->country_id));
			$calling_code = "";
			if ($country_code->num_rows() > 0) {
				$calling_code = $country_code->row()->calling_code;
			}
			$this->data["calling_code"] = "+" . $calling_code;
			$ret["html"] = $this->load->view('site/landing/update_branch', $this->data, true);
		} else {
			$ret['status'] = 0;
			$ret['status'] = "Session out please try again later.";
		}
		echo json_encode($ret);
	}

	public function save_branches()
	{
		$post = $this->input->post();
		if ($this->checkLogin("U") != "") {
			$post_array = array("updated_at" => date("Y-m-d H:i:s"));
			$contact_name_count = count($post['name']);
			$contact_array = array();
			for ($i = 0; $i < $contact_name_count; $i++) {
				$contact_array[] = array("name" => $post['name'][$i], "job_title" => $post['job_title'][$i], "email" => $post['email'][$i], "skype" => $post['skype'][$i], "mobile" => $post['mobile'][$i]);
			}
			$post_array['contact_info'] = json_encode($contact_array);
			$post_array['info'] = $post['info'];
			$post_array['is_ho'] = $post['is_ho'];
			$post_array['address1'] = $post['address1'];
			$post_array['address2'] = $post['address2'];
			$post_array['city'] = $post['city'];
			$post_array['state'] = $post['state'];
			$post_array['zip'] = $post['zip'];
			$post_array['phone'] = $post['phone'];
			$post_array['fax'] = $post['fax'];
			$post_array['branch_email'] = $post['branch_email'];

			$id = $this->checkLogin('U');
			if ($id == "") {
				$t1['status'] = 0;
				$t1['msg'] = "Session out try login agian...";
			} else {

				$t = $this->landing_model->update_details(OFFICE, $post_array, array("id" => $post["branch_id"]));
				$t = $this->landing_model->update_details(COMPANY, array("reg_step" => "3"), array("id" => $id));
				$t1['status'] = 1;
			}
		} else {
			$t1['status'] = 0;
			$t1['msg'] = "Session out try login agian...";
		}


		echo json_encode($t1);
	}


	public function save_references()
	{
		if ($this->checkLogin("U") != "") {
			$post = $this->input->post();
			$reference_array = array();
			$reference_array["ref1"] = $post["ref1"];
			$reference_array["ref2"] = $post["ref2"];
			$reference_array["ref3"] = $post["ref3"];
			$reference_array["ref4"] = $post["ref4"];
			$reference_array["ref5"] = $post["ref5"];



			$id = $this->checkLogin("U");
			$ret['status'] = 1;
			$this->data['id'] = $id;
			$this->landing_model->update_details(COMPANY, array("reg_step" => "2", "reference_info" => json_encode($reference_array)), array("id" => $id));
			$ret['url'] = base_url() . "member_branchs/" . $id;
			$ret['message'] = "Reference saved successfully.";
		} else {
			$ret['status'] = 0;
			$ret['message'] = "Session out please try again later.";
		}
		echo json_encode($ret);
	}

	public function get_locations()
	{
		$post = $this->input->post();
		$ret['status'] = 1;
		$this->data["locations"] = $this->landing_model->get_all_details(IATA, array("country_id" => $post["country_id"]));
		$locations_list = $this->load->view('site/landing/get_locations', $this->data, true);
		$ret['locations_list'] = $locations_list;
		$country_code = $this->landing_model->get_all_details(COUNTRY, array("id" => $post["country_id"]));
		$calling_code = "";
		if ($country_code->num_rows() > 0) {
			$calling_code = $country_code->row()->calling_code;
		}
		$check_exist = $this->landing_model->get_all_details(COMPANY, array("name" => $post["name"], "country_id" => $post["country_id"]));
		if ($check_exist->num_rows() > 0) {
			$ret['company_exist'] = 1;
		} else {
			$ret['company_exist'] = 0;
		}
		$ret['calling_code'] = $calling_code;
		echo json_encode($ret);
	}

	public function check_email_exist()
	{
		$post = $this->input->post();
		$ret['status'] = 1;
		$check_exist = $this->landing_model->get_all_details(COMPANY, array("email" => $post["email"]));
		if ($check_exist->num_rows() > 0) {
			echo "false";
		} else {
			echo "true";
		}
	}



	public function check_email_exist_user()
	{
		$post = $this->input->post();
		$ret['status'] = 1;
		$check_exist = $this->landing_model->get_all_details(USERS, array("email" => $post["email"]));
		if ($check_exist->num_rows() > 0) {
			echo "false";
		} else {
			echo "true";
		}
	}
	public function check_email_exist_edit()
	{
		$id = $this->checkLogin("U");
		$post = $this->input->post();
		$ret['status'] = 1;
		$check_exist = $this->landing_model->get_all_details(COMPANY, array("email" => $post["email"], "id!=" => $id));
		if ($check_exist->num_rows() > 0) {
			echo "false";
		} else {
			echo "true";
		}
	}
	public function create_new_account()
	{
		$id = $this->checkLogin("U");
		if ($id != "") {
			$post = $this->input->post();
			$ret['status'] = 1;
			$check_exist = $this->landing_model->get_all_details(USERS, array("email" => $post["email"]));
			if ($check_exist->num_rows() > 0) {
				echo json_encode(array("status" => "0", "message" => "Already email exist try new..."));
			} else {
				$this->landing_model->simple_insert(USERS, array("login_type" => "0", "company_id" => $id, "email" => $post["email"], "password" => md5($post["password"]), 'last_login_date' => date("Y-m-d H:i:s"), 'created' => date("Y-m-d H:i:s"), 'last_login_ip' => $this->input->ip_address()));
				$this->data["users_list"] = $this->landing_model->get_all_details(USERS, array("company_id" => $id, "login_type" => "0"), array("type" => "desc", "field" => "id"));
				$html = $this->load->view("site/landing/ajax_users_list", $this->data, true);
				echo json_encode(array("status" => "1", "message" => "User created successfully.", "html" => $html));
			}
		} else {
			echo json_encode(array("status" => "0", "message" => "Something went to wrong..."));
		}
	}

	public function update_user_account()
	{
		$id = $this->checkLogin("U");
		if ($id != "") {
			$post = $this->input->post();
			$ret['status'] = 1;
			$check_exist = $this->landing_model->get_all_details(USERS, array("email" => $post["email"], "id!=" => $post["user_edit_id"]));
			if ($check_exist->num_rows() > 0) {
				echo json_encode(array("status" => "0", "message" => "Already email exist try new..."));
			} else {
				if ($post["password"] != "") {
					$this->landing_model->update_details(USERS, array("email" => $post["email"], "password" => md5($post["password"])), array("id" => $post["user_edit_id"], "company_id" => $id));
				} else {
					$this->landing_model->update_details(USERS, array("email" => $post["email"]), array("id" => $post["user_edit_id"], "company_id" => $id));
				}
				$this->data["users_list"] = $this->landing_model->get_all_details(USERS, array("company_id" => $id, "login_type" => "0"), array("type" => "desc", "field" => "id"));
				$html = $this->load->view("site/landing/ajax_users_list", $this->data, true);
				echo json_encode(array("status" => "1", "message" => "User updated successfully.", "html" => $html));
			}
		} else {
			echo json_encode(array("status" => "0", "message" => "Something went to wrong..."));
		}
	}
	public function check_email_exist_edit_user()
	{
		$id = $this->checkLogin("U");
		$post = $this->input->post();
		$ret['status'] = 1;
		$check_exist = $this->landing_model->get_all_details(USERS, array("email" => $post["email"], "company_id!=" => $id));
		if ($check_exist->num_rows() > 0) {
			echo "false";
		} else {
			echo "true";
		}
	}
	public function ajax_captcha_application()
	{

		$this->load->helper('captcha');
		$values = array(
			'word' => '',
			'word_length' => 4,
			'img_path' => './images/captcha/',
			'img_url' => base_url() . 'images/captcha/',
			'font_path' => base_url() . 'css/fonts/PoppinsRegular.ttf',
			'img_width' => '150',
			'img_height' => 50,
			'expiration' => 7200,
			'pool' => '012345678901234567890123456789',
		);
		$data = create_captcha($values);
		$this->data['csession_id'] = $csession_id = $data['word'];
		$this->session->set_userdata(array("application_sessionid" => $csession_id));
		echo $data['image'];
	}
	public function check_company_exist()
	{
		$post = $this->input->post();
		$ret['status'] = 1;
		$check_exist = $this->landing_model->get_all_details(COMPANY, array("name" => $post["name"], "country_id" => $post["country_id"]));
		if ($check_exist->num_rows() > 0) {
			$ret['company_exist'] = 1;
		} else {
			$ret['company_exist'] = 0;
		}
		echo json_encode($ret);
	}
	public function check_company_exist_edit()
	{
		$post = $this->input->post();
		$ret['status'] = 1;
		$check_exist = $this->landing_model->get_all_details(COMPANY, array("name" => $post["name"], "country_id" => $post["country_id"], "id!=" => $post["comp_id"]));
		if ($check_exist->num_rows() > 0) {
			$ret['company_exist'] = 1;
		} else {
			$ret['company_exist'] = 0;
		}
		echo json_encode($ret);
	}
	public function login_process()
	{

		$returnStr['redirecturl'] = '';
		$this->load->library('user_agent');
		$this->session->set_userdata('referrer_url', $this->agent->referrer());
		$email = $this->input->post('login_email');
		$pwd = md5($this->input->post('login_password'));
		$condition = array(
			'email' => $email,
			'password' => $pwd,
			/* 'status' => '1' */
		);

		$checkUser = $this->landing_model->get_all_details(USERS, $condition);
		if ($checkUser->num_rows() == '1') {
			$userdata = array(
				'glsn_comp_id' => $checkUser->row()->company_id,
				'glsn_user_id' => $checkUser->row()->id,
				'glsn_comp_username' => $checkUser->row()->name
			);
			$this->session->set_userdata($userdata);
			$datestring = "%Y-%m-%d %h:%i:%s";
			$time = time();
			$newdata = array(
				'last_login_date' => mdate($datestring, $time),
				'last_login_ip' => $this->input->ip_address()
			);
			$condition = array(
				'id' => $checkUser->row()->id
			);

			$this->landing_model->update_details(USERS, $newdata, $condition);

			$returnStr['status'] = 1;
			if ($checkUser->row()->reg_step == 1) {
				$returnStr['redirecturl'] = base_url() . "member_reference/" . $checkUser->row()->id;
			} else if ($checkUser->row()->reg_step == 2) {
				$returnStr['redirecturl'] = base_url() . "member_branchs/" . $checkUser->row()->id;
			} else if ($checkUser->row()->reg_step == 3) {
				$returnStr['redirecturl'] = base_url() . "membership_option/" . $checkUser->row()->id;
			} else {
				$returnStr['redirecturl'] = base_url();
			}
		} else {
			$returnStr['message'] = $this->lang->line('invalid_login');
			$returnStr['status'] = 3;
		}






		echo json_encode($returnStr);
	}

	public function logout()
	{
		$datestring = "%Y-%m-%d %h:%i:%s";
		$time = time();

		$userdata = array(
			'glsn_comp_id' => '',
			'glsn_user_id' => '',
			'glsn_comp_username' => ''
		);
		$this->session->unset_userdata($userdata);
		$this->session->set_userdata('glsn_comp_id', '');
		redirect(base_url());
	}






	public function update_registration()
	{

		if ($this->checkLogin("U") != "") {
			$post = $this->input->post();
			$id = $this->checkLogin("U");
			if ($post['name'] != "" && $post['country_id'] != "") {



				$company_info = array();
				$company_info["country_id"] = $post["country_id"];
				if ($post["password"] != "") {
					$company_info["password"] = md5($post["password"]);
				}
				$company_info["slug"] = url_title(convert_accented_characters($_POST["name"]), 'dash', true);
				$company_info["name"] = $post["name"];
				$company_info["trading_name"] = $post["trading_name"];
				$company_info["contact_name"] = $post["contact_name"];
				$company_info["email"] = $post["email"];
				$company_info["linkedin_link"] = $post["linkedin_link"];
				$company_info["facebook_link"] = $post["facebook_link"];
				$company_info["description"] = $post["description"];
				$company_info["address1"] = $post["address1"];
				$company_info["address2"] = $post["address2"];
				$company_info["city"] = $post["city"];
				$company_info["state"] = $post["state"];
				$company_info["zip"] = $post["zip"];
				$company_info["mobile"] = $post["mobile"];
				$company_info["fax"] = $post["fax"];
				$company_info["corp_email"] = $post["corp_email"];
				$company_info["corp_website"] = $post["corp_website"];
				$company_info["no_of_employees"] = $post["no_of_employees"];
				$company_info["annual_revenue"] = $post["annual_revenue"];
				$company_info["licenses"] = $post["licenses"];
				$company_info["software"] = $post["software"];
				$company_info["year_started"] = $post["year_started"];
				$company_info["tax_id"] = $post["tax_id"];
				$company_info["hear_about"] = $post["hear_about"];
				$company_info["others"] = $post["others"];
				$company_info["specify"] = $post["specify"];
				$company_info["reg_step"] = "1";
				$company_info["created_at"] = date("Y-m-d");
				$company_info["updated_at"] = date("Y-m-d");
				$port_list = "";
				if (!empty($post["locations"])) {
					$company_info["locations"] = implode(",", $post["locations"]);
				}


				if (empty($post["locations"]) && count($post["locations"]) == 0) {
					echo json_encode(array("status" => "0", "message" => "Please choose branch locations"));
					die;
				}


				if ($_FILES["logo"]["name"] != "") {
					$config['overwrite'] = FALSE;
					$config['remove_spaces'] = TRUE;
					$config['allowed_types'] = 'jpg|jpeg|gif|png';
					$config['upload_path'] = './images/site/files';
					$config['remove_spaces'] = TRUE;
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload', $config);
					if ($this->upload->do_upload('logo')) {
						$imgDetailsd = $this->upload->data();
						$company_info['logo'] = $imgDetailsd['file_name'];
						$this->createThumbnail($company_info['logo'], 200, 200, "./images/site/files", "./images/site/files/thumb/");
					} else {
						echo json_encode(array("status" => "0", "message" => strip_tags($this->upload->display_errors())));
						die;
					}
				}


				$check_exist_username = $this->landing_model->get_all_details(COMPANY, array("email" => $post["email"], "id!=" => $id));
				if ($check_exist_username->num_rows() > 0) {
					echo json_encode(array("status" => "0", "message" => "Already email exist."));
					die;
				}

				$check_exist_comp = $this->landing_model->get_all_details(COMPANY, array("name" => $post["name"], "country_id" => $post["country_id"], "id!=" => $id));
				if ($check_exist_comp->num_rows() > 0) {
					echo json_encode(array("status" => "0", "message" => "Already company exist with this country."));
					die;
				}

				$this->landing_model->update_details(COMPANY, $company_info, array("id" => $id));
				$comp_id = $id;

				$check_user = $this->landing_model->get_all_details(USERS, array("email" => $post["email"], "company_id!=" => $comp_id));
				if ($check_user->num_rows() > 0) {
					echo json_encode(array("status" => "0", "message" => "Login contact email already exist."));
					die;
				} else {
					if ($post["password"] != "") {
						$this->landing_model->update_details(USERS, array("login_type" => "1", "company_id" => $comp_id, "email" => $post["email"], "password" => md5($post["password"]), 'last_login_date' => date("Y-m-d H:i:s"), 'created' => date("Y-m-d H:i:s"), 'last_login_ip' => $this->input->ip_address()));
					} else {
						$this->landing_model->update_details(USERS, array("login_type" => "1", "company_id" => $comp_id, "email" => $post["email"], 'last_login_date' => date("Y-m-d H:i:s"), 'created' => date("Y-m-d H:i:s"), 'last_login_ip' => $this->input->ip_address()), array("email" => $post["email"]));
					}
				}


				if (!empty($post["locations"])) {
					foreach ($post["locations"] as $locations) {
						$office_info = array();
						$office_info["company_id"] = $comp_id;
						$office_info["iata_id"] = $locations;
						$office_info["reg_date"] = date("Y-m-d");
						$office_info["country_id"] = $post["country_id"];
						$office_info["created_at"] = date("Y-m-d");
						$office_info["updated_at"] = date("Y-m-d");
						$check_off = $this->landing_model->get_all_details(OFFICE, array("iata_id" => $locations, "country_id" => $post["country_id"], "company_id" => $comp_id));
						if ($check_off->num_rows() == 0) {
							$this->landing_model->simple_insert(OFFICE, $office_info);
						} else {
							$this->landing_model->update_details(OFFICE, $office_info, array($check_off->row()->id));
						}
					}
				}


				echo json_encode(array("status" => "1", "message" => "Step1 completed, Please fill next steps to complete application.", "url" => base_url("member_reference/" . $comp_id)));
				die;
			} else {
				/* echo "<script>alert('Please fill all the fields.');</script>";
				    echo "<script>window.history.back();</script>"; */
				echo json_encode(array("status" => "0", "message" => "Please fill all the fields."));
				die;
			}
		} else {
			echo json_encode(array("status" => "0", "message" => "Session out login again."));
			die;
		}
	}




	public function save_newsletter()
	{
		$post = $this->input->post();
		#echo $this->session->userdata("newslettersession_id");die;
		if ($this->session->userdata("newslettersession_id") == $post["newslettersession_id"]) {
			$post_array = array("email" => $post["email"]);
			$this->saveEmailBasedOnType("2", $post["email"]);
			echo json_encode(array('status' => 1));
		} else {
			echo json_encode(array('status' => 2));
		}
	}


	public function send_forgot_password()
	{
		$email = $_POST['email'];
		$check_user = $this->landing_model->get_all_details(USERS, array('email' => $email));
		if ($check_user->num_rows() > 0) {
			$key = time() . rand(100, 999);
			$password_link = base_url() . 'password_change/' . $key;
			$to = $email;
			$this->mail_model->send_user_password_link($check_user->row()->name, $check_user->row()->email, $password_link);
			$this->landing_model->update_details(USERS, array('password_link' => $key), array('id' => $check_user->row()->id));
			$ret['status'] = 1;
			$ret['message'] = "Password reset link sent to your email successfully.";
		} else {
			$ret['status'] = 2;
			$ret['message'] = "email not found.";
		}
		echo json_encode($ret);
	}
	public function password_change($verify_id)
	{
		$ret['status'] = 1;
		if ($verify_id != "") {
			$check_user = $this->landing_model->get_all_details(USERS, array("password_link" => $verify_id)); #echo $check_user->num_rows();die;
			if ($check_user->num_rows() == 1) {
				$this->data['password_link'] = $verify_id;
				$this->load->view('site/landing/change_password', $this->data);
			} else {
				$this->session->set_flashdata('alert_message', "Link expired.");
				$this->session->set_flashdata('error_type', 'error');
				redirect(base_url());
			}
		} else {
			$this->session->set_flashdata('alert_message', "Something went to wrong.");
			$this->session->set_flashdata('error_type', 'error');
			redirect(base_url());
		}
	}
	public function save_password()
	{
		$password = md5($this->input->post('password'));
		$id = $this->checkLogin('U');
		$password_link = $this->input->post('password_link');
		$key = time() . rand(100, 999);
		$this->landing_model->update_details(USERS, array('password' => $password, 'password_link' => $key), array('password_link' => $password_link)); #echo $this->db->last_query();
		$ret['status'] = 1;
		$ret['message'] = "Password changed successfully.";
		echo json_encode($ret);
	}


	public function submit_form()
	{
		if ($this->checkLogin("U") != "") {
			$post = $this->input->post();
			$comp_id = $post["comp_id"];
			if ($this->checkLogin("U") == $post["comp_id"]) {
				if (empty($post["summits"])) {
					$ret['status'] = 0;
					$ret['message'] = "Please select summits";
					echo json_encode($ret);
					die;
				}

				$id = $this->checkLogin("U");
				$company_inf = $this->landing_model->get_all_details(COMPANY, array("id" => $id))->row();
				$get_contacts = $this->landing_model->get_all_details(OFFICE, array("company_id" => $id));
				$country_name = $this->landing_model->get_all_details(COUNTRY, array("id" => $company_inf->country_id))->row()->name;

				$contact_emails_array = array();
				$contact_emails = '';
				$contact_name = "";
				$branch_array = array();
				if ($get_contacts->num_rows() > 0) {
					foreach ($get_contacts->result() as $res) {
						$contact_emails_array[] = $res->branch_email;
						$branch_array[] = get_iata_name($res->iata_id);
					}
				}
				$contact_emails_array[] = $company_inf->email;
				$contact_emails_array[] = $company_inf->corp_email;
				$contact_emails_array = array_values(array_unique($contact_emails_array));

				if (!empty($contact_emails_array)) {
					$contact_emails = implode(",", $contact_emails_array);
				}
				$hear_about = "";
				if ($company_inf->hear_about != 0 && $company_inf->hear_about != -1) {
					$hear_about = get_hear_name($company_inf->hear_about);
				} else if ($company_inf->hear_about == "-1") {
					$hear_about = "Referred by GLSN Member : " . $company_inf->specify;
				} else {
					$hear_about = "Others : " . $company_inf->others;
				}
				$branches = implode(",", $branch_array);




				$company_array = array("company_name" => $company_inf->name, "trading_name" => $company_inf->trading_name, "contact_name" => $company_inf->contact_name, "contact_email" => $company_inf->email, "branches" => $branches, "hear_about" => $hear_about, "city_country" => $company_inf->city . ", " . $country_name, "url" => base_url() . "admin/members/view_member/" . $id);

				$company_update_array = array();

				$question_array = array();
				if ($post["question_count"] > 0) {
					for ($i = 0; $i < $post["question_count"]; $i++) {
						$question_array[$post["quest_id_" . $i]] = $post["quest_" . $i];
					}
					$company_update_array["questions"] = json_encode($question_array);
				}

				$company_update_array['summits'] = implode(",", $post["summits"]);

				$company_update_array['march'] = $post["march"];
				$company_update_array['march'] = $post["march"];
				$company_update_array['october'] = $post["october"];
				$company_update_array['featured_member'] = $post["featured_member"];
				$company_update_array['top_listed_member'] = $post["top_listed_member"];
				$company_update_array['debts'] = $post["debts"];
				$company_update_array['olp'] = $post["olp"];
				$company_update_array['riege_software'] = $post["riege_software"];
				$company_update_array['cargowise_software'] = $post["cargowise_software"];
				$company_update_array['networkpay'] = $post["networkpay"];
				$company_update_array['buytasker'] = $post["buytasker"];
				$company_update_array['multi_currency'] = $post["multi_currency"];
				$company_update_array['gsan'] = $post["gsan"];
				$fees = $this->landing_model->get_all_details(FEES, array())->row();

				$application_fee = $fees->application_fee;
				$branch = $fees->branch;
				$featured_member = $fees->featured_member;
				$featured_member_discount = $fees->featured_member_discount;
				$top_listed_member = $fees->top_listed_member;
				$top_listed_member_discount = $fees->top_listed_member_discount;
				$featured_discount = $fees->featured_discount;
				$top_listed_discount = $fees->top_listed_discount;
				$additional_person_fee = $fees->additional_person;
				$pay1 = $fees->pay1;
				$pay2 = $fees->pay2;
				$both_summit = $fees->both_summit == "0" ? "750" : $fees->both_summit;
				if (count($post["summits"]) == 2) {
					$company_update_array['both_summit_fee'] = $both_summit;
				}
				if ($post["featured_member"] == 1) {
					if ($featured_discount == 1) {
						$company_update_array['featured_member_fee'] = $featured_member_discount;
					} else {
						$company_update_array['featured_member_fee'] = $featured_member;
					}
				}
				if ($post["top_listed_member"] == 1) {
					if ($top_listed_discount == 1) {
						$company_update_array['top_listed_member_fee'] = $top_listed_member_discount;
					} else {
						$company_update_array['top_listed_member_fee'] = $top_listed_member;
					}
				}
				if ($post["additional_person"] == 1) {
					$company_update_array['additional_person'] = $post["additional_person"];
					$company_update_array['additional_person_fee'] = $additional_person_fee;
				}

				if ($post["debts"] == 1) {
					$company_update_array['debts_fee'] = $pay1;
				} else if ($post["debts"] == 2) {
					$company_update_array['debts_fee'] = $pay2;
				}

				$company_update_array['application_fee'] = $application_fee;
				$company_update_array['branch_fee'] = $branch;
				$company_update_array['status'] = "new";
				$company_update_array['reg_step'] = "4";

				$this->landing_model->update_details(COMPANY, $company_update_array, array("id" => $id));
				#echo $this->db->last_query();die;

				$this->landing_model->update_details(OFFICE, array("status" => "new"), array("company_id" => $id));
				$this->mail_model->send_registration_user($company_array);
				$this->mail_model->send_registration_admin($company_array);


				$company_inf = $this->landing_model->get_all_details(COMPANY, array("id" => $id))->row();

				$reference1_company = "";
				$reference1_contact_name = "";
				$reference1_job_title = "";
				$reference1_email = "";
				$reference2_company = "";
				$reference2_contact_name = "";
				$reference2_job_title = "";
				$reference2_email = "";
				$reference3_company = "";
				$reference3_contact_name = "";
				$reference3_job_title = "";
				$reference3_email = "";

				if (!empty($company_inf->reference_info)) {
					$data_info = json_decode($company_inf->reference_info, true);
					$ref1_company = $data_info["ref1"]["company_name"];
					$ref1_company_title = $data_info["ref1"]["company_title"];
					$ref1_email = $data_info["ref1"]["email"];
					$ref2_company = $data_info["ref2"]["company_name"];
					$ref2_company_title = $data_info["ref2"]["company_title"];
					$ref2_email = $data_info["ref2"]["email"];
					$ref3_company = $data_info["ref3"]["company_name"];
					$ref3_company_title = $data_info["ref3"]["company_title"];
					$ref3_email = $data_info["ref3"]["email"];
					$ref4_company = $data_info["ref4"]["company_name"];
					$ref4_company_title = $data_info["ref4"]["company_title"];
					$ref4_email = $data_info["ref4"]["email"];
					$ref5_company = $data_info["ref5"]["company_name"];
					$ref5_company_title = $data_info["ref5"]["company_title"];
					$ref5_email = $data_info["ref5"]["email"];
				}

				$this->landing_model->simple_insert("fc_cron_tab", array("company_id" => $id, "status" => "0", "created" => date("Y-m-d H:i:s")));

				/*
			if($ref1_email!=""){
				$ref_array=array('ReferenceJobTitle' =>$ref1_company_title,
				'applicant_trade_name' =>$company_inf->trading_name,
				'applicant_country' =>get_country_name($company_inf->country_id),
				'ReferenceName' =>$ref1_company_title,
				'id' =>$company_inf->id,
				'ReferenceCompany' =>$ref1_company,
				'applicant_primaryContactName' =>$company_inf->contact_name,"email"=>$ref1_email);
		        $check=$this->mail_model->send_reference_request($ref_array);
			}
			
			if($ref2_email!=""){
				$ref_array=array('ReferenceJobTitle' =>$ref2_company_title,
				'applicant_trade_name' =>$company_inf->trading_name,
				'applicant_country' =>get_country_name($company_inf->country_id),
				'ReferenceName' =>$ref2_company_title,
				'id' =>$company_inf->id,
				'ReferenceCompany' =>$ref2_company,
				'applicant_primaryContactName' =>$company_inf->contact_name,"email"=>$ref2_email);
		        $check=$this->mail_model->send_reference_request($ref_array);
			}
			
			if($ref3_email!=""){
				$ref_array=array('ReferenceJobTitle' =>$ref3_company_title,
				'applicant_trade_name' =>$company_inf->trading_name,
				'applicant_country' =>get_country_name($company_inf->country_id),
				'ReferenceName' =>$ref3_company_title,
				'id' =>$company_inf->id,
				'ReferenceCompany' =>$ref3_company,
				'applicant_primaryContactName' =>$company_inf->contact_name,"email"=>$ref3_email);
		        $check=$this->mail_model->send_reference_request($ref_array);
			}
			
			if($ref4_email!=""){
				$ref_array=array('ReferenceJobTitle' =>$ref4_company_title,
				'applicant_trade_name' =>$company_inf->trading_name,
				'applicant_country' =>get_country_name($company_inf->country_id),
				'ReferenceName' =>$ref4_company_title,
				'id' =>$company_inf->id,
				'ReferenceCompany' =>$ref4_company,
				'applicant_primaryContactName' =>$company_inf->contact_name,"email"=>$ref4_email);
		        $check=$this->mail_model->send_reference_request($ref_array);
			}
			
			if($ref5_email!=""){
				$ref_array=array('ReferenceJobTitle' =>$ref5_company_title,
				'applicant_trade_name' =>$company_inf->trading_name,
				'applicant_country' =>get_country_name($company_inf->country_id),
				'ReferenceName' =>$ref5_company_title,
				'id' =>$company_inf->id,
				'ReferenceCompany' =>$ref5_company,
				'applicant_primaryContactName' =>$company_inf->contact_name,"email"=>$ref5_email);
		        $check=$this->mail_model->send_reference_request($ref_array);
			}
			*/


				/*reference send emails*/
				if ($company_inf->featured_member == 1) {
					$check_ex = $this->landing_model->get_all_details(ADVERTISING, array("company_id" => $company_inf->id));
					if ($check_ex->num_rows() == 0) {
						$this->landing_model->simple_insert(ADVERTISING, array("company_id" => $company_inf->id, "logo" => $company_inf->logo, "status" => "hold", "link" => $company_inf->corp_website, "created_at" => time(), "updated_at" => time()));
					}
				}
				$ret['status'] = 1;
				$ret['message'] = "Receipt of your Membership Application is hereby confirmed and our Admin Team will start their review immediately. An email has been sent to " . $company_inf->email . " that contains your UserID and Password for future reference once your membership application has been accepted and membership fees paid.";
			} else {
				$ret['status'] = 0;
				$ret['message'] = "Session out please login once again.";
			}
		} else {
			$ret['status'] = 0;
			$ret['message'] = "Session out please login once again.";
		}

		echo json_encode($ret);
	}

	public function dashboard()
	{
		if ($this->checkLogin("U") != "") {
			$id = $this->checkLogin("U");
			$post = $this->input->post();
			$check = $this->landing_model->get_all_details(COMPANY, array("id" => $id));
			if ($check->row()->status == "active" || $check->row()->status == "pending") {
				$this->data["company"] = $this->landing_model->get_all_details(COMPANY, array("id" => $id))->row();
				$this->data['adv_logo'] = $this->landing_model->get_all_details(ADVERTISING, array("company_id" => $id));
				$this->load->view('site/user/dashboard', $this->data);
			} else {
				$this->session->set_flashdata('alert_message', "Your account is not activated. Once your account is activated, you can access your dashboard.");
				$this->session->set_flashdata('error_type', 'error');
				redirect(base_url());
			}
		} else {
			redirect(base_url());
		}
	}

	public function edit_members()
	{
		if ($this->checkLogin("U") != "") {
			$post = $this->input->post();
			$id = $this->checkLogin("U");
			$ret['status'] = 1;
			$this->data['id'] = $id;
			$this->data["branch_list"] = $this->landing_model->get_all_details(OFFICE, array("company_id" => $id));
			$country_id = $this->landing_model->get_all_details(COMPANY, array("id" => $id))->row()->country_id;
			$this->data["locations"] = $this->landing_model->get_all_details(IATA, array("country_id" => $country_id));
			$this->load->view('site/user/member_branchs', $this->data);
		} else {
			$this->session->set_flashdata('alert_message', "Session out please try again later.");
			$this->session->set_flashdata('error_type', 'error');
			redirect(base_url());
		}
	}

	public function load_edit_branches()
	{
		if ($this->checkLogin("U") != "") {
			$post = $this->input->post();
			$id = $this->checkLogin("U");
			$ret['status'] = 1;
			$this->data['id'] = $id;
			$this->data["branch_list"] = $this->landing_model->get_all_details(OFFICE, array("company_id" => $id));
			$ret['html'] = $this->load->view('site/user/load_branches', $this->data, true);
		} else {
			$ret['status'] = 0;
			$ret['message'] = "Session out login again.";
		}
		echo json_encode($ret);
	}


	public function edit_add_branch()
	{
		if ($this->checkLogin("U") != "") {
			$post = $this->input->post();
			$id = $this->checkLogin("U");
			if (!empty($post["locations"])) {
				foreach ($post['locations'] as $locations) {
					/* $check=$this->landing_model->get_all_details(OFFICE,array("iata_id"=>$locations));
				if($check->num_rows()==0){ */
					$country_id = $this->landing_model->get_all_details(COMPANY, array("id" => $id))->row()->country_id;
					$this->landing_model->simple_insert(OFFICE, array("created_at" => date("Y-m-d H:i:s"), "company_id" => $id, "iata_id" => $locations, "country_id" => $country_id));
					/* } */
				}
				redirect(base_url("edit_members/"));
			} else {
				$this->session->set_flashdata('alert_message', "Please select branch");
				$this->session->set_flashdata('error_type', 'error');
				redirect(base_url("edit_members/"));
			}
		} else {
			$this->session->set_flashdata('alert_message', "Session out please try again later.");
			$this->session->set_flashdata('error_type', 'error');
			redirect(base_url());
		}
	}



	public function edit_update_branch()
	{
		if ($this->checkLogin("U") != "") {
			$post = $this->input->post();
			$ret['status'] = 1;
			$id = $post["office_id"];
			$office_name = $post["office_name"];
			$this->data['id'] = $id;
			$this->data['office_name'] = $office_name;
			$this->data["branch_info"] = $this->landing_model->get_all_details(OFFICE, array("id" => $id))->row();
			$country_code = $this->landing_model->get_all_details(COUNTRY, array("id" => $this->data["branch_info"]->country_id));
			$calling_code = "";
			if ($country_code->num_rows() > 0) {
				$calling_code = $country_code->row()->calling_code;
			}
			$this->data["calling_code"] = "+" . $calling_code;
			$ret["html"] = $this->load->view('site/user/update_branch', $this->data, true);
		} else {
			$ret['status'] = 0;
			$ret['status'] = "Session out please try again later.";
		}
		echo json_encode($ret);
	}

	public function edit_save_branches()
	{
		$post = $this->input->post();
		if ($this->checkLogin("U") != "") {
			$post_array = array("updated_at" => date("Y-m-d H:i:s"));
			$contact_name_count = count($post['name']);
			$contact_array = array();
			for ($i = 0; $i < $contact_name_count; $i++) {
				$contact_array[] = array("name" => $post['name'][$i], "job_title" => $post['job_title'][$i], "email" => $post['email'][$i], "skype" => $post['skype'][$i], "mobile" => $post['mobile'][$i]);
			}
			$post_array['contact_info'] = json_encode($contact_array);
			$post_array['info'] = $post['info'];
			$post_array['is_ho'] = $post['is_ho'];
			$post_array['address1'] = $post['address1'];
			$post_array['address2'] = $post['address2'];
			$post_array['city'] = $post['city'];
			$post_array['state'] = $post['state'];
			$post_array['zip'] = $post['zip'];
			$post_array['phone'] = $post['phone'];
			$post_array['fax'] = $post['fax'];
			$post_array['branch_email'] = $post['branch_email'];

			$id = $this->checkLogin('U');
			if ($id == "") {
				$t1['status'] = 0;
				$t1['msg'] = "Session out try login agian...";
			} else {

				$t = $this->landing_model->update_details(OFFICE, $post_array, array("id" => $post["branch_id"]));
				$t1['status'] = 1;
			}
		} else {
			$t1['status'] = 0;
			$t1['msg'] = "Session out try login agian...";
		}


		echo json_encode($t1);
	}

	public function edit_delete_office($cid)
	{
		if ($this->checkLogin("U") != "") {
			$post = $this->input->post();
			$id = $this->checkLogin("U");
			$ret['status'] = 1;
			$this->data['id'] = $id;
			$this->landing_model->commonDelete(OFFICE, array("id" => $cid, "company_id" => $id));
			redirect(base_url("edit_members/"));
		} else {
			$this->session->set_flashdata('alert_message', "Session out please try again later.");
			$this->session->set_flashdata('error_type', 'error');
			redirect(base_url());
		}
	}


	public function edit_profile()
	{
		if ($this->checkLogin("U") != "") {
			$post = $this->input->post();
			$id = $this->checkLogin("U");
			$ret['status'] = 1;
			$this->data['id'] = $id;
			$this->data["company_info"] = $this->landing_model->get_all_details(COMPANY, array("id" => $id))->row();
			$this->data["locations"] = $this->landing_model->get_all_details(IATA, array("country_id" => $this->data["company_info"]->country_id));
			$this->data["hears_list"] = $this->landing_model->get_all_details(HEARS, array("status" => "1"));
			$this->load->view('site/user/edit_membership_register', $this->data);
		} else {
			$this->session->set_flashdata('alert_message', "Session out please try again later.");
			$this->session->set_flashdata('error_type', 'error');
			redirect(base_url());
		}
	}




	public function edit_update_registration()
	{

		if ($this->checkLogin("U") != "") {
			$post = $this->input->post();
			$id = $this->checkLogin("U");
			if ($post['address1'] != "" && $post['city'] != "") {



				$company_info = array();
				$company_info["linkedin_link"] = $post["linkedin_link"];
				$company_info["facebook_link"] = $post["facebook_link"];
				$company_info["description"] = $post["description"];
				$company_info["address1"] = $post["address1"];
				$company_info["address2"] = $post["address2"];
				$company_info["city"] = $post["city"];
				$company_info["state"] = $post["state"];
				$company_info["zip"] = $post["zip"];
				$company_info["mobile"] = $post["mobile"];
				$company_info["fax"] = $post["fax"];
				$company_info["corp_email"] = $post["corp_email"];
				$company_info["corp_website"] = $post["corp_website"];
				$company_info["no_of_employees"] = $post["no_of_employees"];
				$company_info["annual_revenue"] = $post["annual_revenue"];
				$company_info["licenses"] = $post["licenses"];
				$company_info["software"] = $post["software"];
				$company_info["year_started"] = $post["year_started"];
				$company_info["tax_id"] = $post["tax_id"];
				/* $company_info["hear_about"]=$post["hear_about"];
				$company_info["others"]=$post["others"];				
				 */
				$company_info["updated_at"] = date("Y-m-d");
				$port_list = "";


				if ($_FILES["logo"]["name"] != "") {
					$config['overwrite'] = FALSE;
					$config['remove_spaces'] = TRUE;
					$config['allowed_types'] = 'jpg|jpeg|gif|png';
					$config['upload_path'] = './images/site/files';
					$config['remove_spaces'] = TRUE;
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload', $config);
					if ($this->upload->do_upload('logo')) {
						$imgDetailsd = $this->upload->data();
						$company_info['logo'] = $imgDetailsd['file_name'];
						$this->createThumbnail($company_info['logo'], 200, 200, "./images/site/files", "./images/site/files/thumb/");
					} else {
						echo json_encode(array("status" => "0", "message" => strip_tags($this->upload->display_errors())));
						die;
					}
				}

				$this->landing_model->update_details(COMPANY, $company_info, array("id" => $id));
				$comp_id = $id;

				echo json_encode(array("status" => "1", "message" => "Member Profile Saved Successfully.", "url" => base_url("dashboard/")));
				die;
			} else {
				/* echo "<script>alert('Please fill all the fields.');</script>";
				    echo "<script>window.history.back();</script>"; */
				echo json_encode(array("status" => "0", "message" => "Please fill all the fields."));
				die;
			}
		} else {
			echo json_encode(array("status" => "0", "message" => "Session out login again."));
			die;
		}
	}

	public function send_branch_request_toAdmin()
	{
		$post = $this->input->post();
		if ($this->checkLogin("U") != "") {
			unset($post["cid"]);
			$get_office = $this->landing_model->get_all_details(OFFICE, array("id" => $post["office_id"]));
			if ($get_office->num_rows() > 0) {

				if ($get_office->row()->branch_email == "") {
					echo json_encode(array('status' => 0, "message" => "Please fill all the details and save then send request to admin"));
					die;
				}
				if ($get_office->row()->status == "draft") {
					$new_array = array("company_name" => get_company_name($get_office->row()->company_id), "branch_name" => get_iata_name($get_office->row()->iata_id), "ip_address" => $this->input->ip_address());
					$this->landing_model->update_details(OFFICE, array("status" => "new"), array("id" => $post["office_id"]));
					$check = $this->mail_model->send_office_request_to_admin_mail($new_array);
					echo json_encode(array('status' => 1));
				}
			} else {
				echo json_encode(array('status' => 2, "message" => "something went to wrong"));
			}
		} else {
			echo json_encode(array('status' => 2));
		}
	}

	public function change_password()
	{
		if ($this->checkLogin("U") != "") {
			$post = $this->input->post();
			$id = $this->checkLogin("U");
			$ret['status'] = 1;
			$this->data['id'] = $id;
			$this->data["company_info"] = $this->landing_model->get_all_details(COMPANY, array("id" => $id))->row();
			$this->data["locations"] = $this->landing_model->get_all_details(IATA, array("country_id" => $this->data["company_info"]->country_id));
			$this->data["hears_list"] = $this->landing_model->get_all_details(HEARS, array("status" => "1"));
			$this->data["users_list"] = $this->landing_model->get_all_details(USERS, array("company_id" => $id, "login_type" => "0"), array("type" => "desc", "field" => "id"));
			$this->load->view('site/user/change_password', $this->data);
		} else {
			$this->session->set_flashdata('alert_message', "Session out please try again later.");
			$this->session->set_flashdata('error_type', 'error');
			redirect(base_url());
		}
	}





	public function change_password_form()
	{

		if ($this->checkLogin("U") != "") {
			$post = $this->input->post();
			$id = $this->checkLogin("U");
			$company_email = $this->landing_model->get_all_details(COMPANY, array("id" => $id))->row()->email;
			$get_user = $this->landing_model->get_all_details(USERS, array("email" => $company_email))->row();
			if (($get_user->password) == md5($post["old_password"])) {
				$this->landing_model->update_details(USERS, array("password" => md5($post["new_password"])), array("id" => $get_user->id));
				$this->landing_model->update_details(COMPANY, array("password" => md5($post["new_password"])), array("id" => $id));
				$ret["status"] = 1;
				$ret["message"] = "Successfully password updated.";
			} else {
				$ret["status"] = 0;
				$ret["message"] = "Old password is wrong.";
			}
		} else {
			$ret["status"] = 0;
			$ret["message"] = "Session out loggin again.";
		}
		echo json_encode($ret);
	}

	public function change_username_form()
	{

		if ($this->checkLogin("U") != "") {
			$post = $this->input->post();
			$id = $this->checkLogin("U");
			$company_email = $this->landing_model->get_all_details(COMPANY, array("id" => $id))->row()->email;
			$get_user = $this->landing_model->get_all_details(USERS, array("email" => $company_email))->row();
			$check = $this->landing_model->get_all_details(USERS, array("email" => $post["email"], "id!=" => $get_user->id));
			if ($check->num_rows() == 0) {
				$this->landing_model->update_details(COMPANY, array("email" => $post["email"]), array("id" => $id));
				$this->landing_model->update_details(USERS, array("email" => $post["email"]), array("company_id" => $id, "login_type" => "1"));
				$ret["status"] = 1;
				$ret["message"] = "Successfully email updated.";
			} else {
				$ret["status"] = 0;
				$ret["message"] = "Email Already exist.";
			}
		} else {
			$ret["status"] = 0;
			$ret["message"] = "Session out loggin again.";
		}
		echo json_encode($ret);
	}

	public function export_company()
	{
		if ($this->checkLogin("U") != "") {
			$post = $this->input->post();
			$id = $this->checkLogin("U");
			ini_set('max_execution_time', 0);
			ini_set("memory_limit", "800M");

			$selcolumns = array("S.No.", "Contact Name", "Branch", "Branch Location", "Company", "Trade Name", "Website", "Address", "Email", "Country", "Phone", "Fax");
			#$selcolumns=array("sno","contact_name","branch_info","branch_name","company_name","company_legal_name","company_website","address","branch_email","country_name","phone","fax");


			$data_array = array();
			$get_export_column = $this->landing_model->get_export_column();
			if ($get_export_column->num_rows() > 0) {
				$i = 0;
				$sno = 1;
				foreach ($get_export_column->result() as $office) {

					$data_array[$i]['sno'] = $sno;
					$sno++;
					$data_array[$i]['contact_name'] = $office->contact_name;
					$data_array[$i]['branch_info'] = $office->info;
					$data_array[$i]['branch_name'] = get_iata_name($office->iata_id);
					$data_array[$i]['company_name'] = $office->name;
					$data_array[$i]['company_legal_name'] = $office->trading_name;
					$data_array[$i]['company_website'] = $office->corp_website;
					$data_array[$i]['address'] = $office->address1;
					$data_array[$i]['branch_email'] = $office->branch_email;
					$data_array[$i]['country_name'] = get_country_name($office->country_id);
					$data_array[$i]['phone'] = $office->phone;
					$data_array[$i]['fax'] = $office->fax;




					$i++;
				}
			}
			#echo '<pre>'; print_r($data_array);die;

			$fileName = 'GLSN-Members-' . date("d-m-Y") . '.xlsx';
			// load excel library
			$this->load->library('excel');
			$objPHPExcel = new PHPExcel();
			$objPHPExcel->setActiveSheetIndex(0);
			// set Header
			$cap_name = "A";
			foreach ($selcolumns as $col) {

				$objPHPExcel->getActiveSheet()->SetCellValue($cap_name . '1', $col);
				$cap_name++;
			}
			$rowCount = 2;

			foreach ($data_array as $col) {
				$cap_name = "A";
				foreach ($col as $c) {

					$objPHPExcel->getActiveSheet()->SetCellValue($cap_name . $rowCount, $c);
					$cap_name++;
				}

				$rowCount++;
			}
			#echo '<pre>'; print_r($data_array);die;
			$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
			header("Content-Type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename=$fileName");
			//ob_start();
			$objWriter->save("php://output");
			#print_r(ob_get_contents());die;
			$xlsData = ob_get_contents();
			//ob_end_clean();


			$ret["status"] = 1;
			$ret["file_name"] = $fileName;
			$ret["file"] = "data:application/vnd.ms-excel;base64," . base64_encode($xlsData);
		} else {
			$this->session->set_flashdata('alert_message', "Session out please try again later.");
			$this->session->set_flashdata('error_type', 'error');
			redirect(base_url());
		}
	}

	public function members_news_list()
	{
		if ($this->checkLogin("U") != "") {
			$post = $this->input->post();
			$id = $this->checkLogin("U");
			$ret['status'] = 1;
			$this->data['id'] = $id;
			$this->data["company_info"] = $this->landing_model->get_all_details(COMPANY, array("id" => $id))->row();
			$this->data["news_list"] = $this->landing_model->get_all_details(MEMBER_NEWS, array("company_id" => $id), array("field" => "id", "type" => "desc"));
			$this->load->view('site/user/news_list', $this->data);
		} else {
			$this->session->set_flashdata('alert_message', "Session out please try again later.");
			$this->session->set_flashdata('error_type', 'error');
			redirect(base_url());
		}
	}
	public function add_member_news()
	{
		if ($this->checkLogin("U") != "") {
			$post = $this->input->post();
			if ($post["id"] != "" && $post["id"] != 0) {
				$this->data["newsInfo"] = $this->landing_model->get_all_details(MEMBER_NEWS, array("id" => $post["id"]))->row();
			}
			$ret["html"] = $this->load->view('site/user/add_news', $this->data, true);
			$ret["status"] = 1;
		} else {
			$ret["status"] = 0;
			$ret["message"] = "Session out login again.";
		}
		echo json_encode($ret);
	}


	public function save_members_news()
	{
		if ($this->checkLogin("U") != "") {
			$post = $this->input->post();
			$id = $this->checkLogin("U");
			$news_array = array("company_id" => $id, "author" => $post["author"], "author_email" => $post["author_email"], "post_type" => $post["post_type"], "title" => $post["title"], "content" => $post["content"], "archive" => $post["archive"], "created" => date("Y-m-d"), "post_date" => $post["post_date"]);

			if ($post["id"] == "0") {
				$check_news = $this->landing_model->get_all_details(MEMBER_NEWS, array("title" => $post["title"], "post_type" => $post["post_type"], "company_id" => $id));
			} else {
				$check_news = $this->landing_model->get_all_details(MEMBER_NEWS, array("title" => $post["title"], "post_type" => $post["post_type"], "company_id" => $id, "id!=" => $post["id"]));
			}

			if ($check_news->num_rows() > 0) {
				echo json_encode(array("status" => "0", "message" => "News already exist."));
				die;
			}


			if ($_FILES["document_img"]["name"] != "") {
				$config['overwrite'] = FALSE;
				$config['remove_spaces'] = TRUE;
				$config['allowed_types'] = 'jpg|jpeg|gif|png';
				$config['upload_path'] = './images/site/news';
				$config['remove_spaces'] = TRUE;
				$config['encrypt_name'] = TRUE;
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('document_img')) {
					$imgDetailsd = $this->upload->data();
					$news_array['document'] = $imgDetailsd['file_name'];
					$path = 'images/site/news/';
					$path1 = 'images/site/news/thumb/';
					list($width, $height) = getimagesize($path . $news_array['document']);

					if ($width >= 250) {


						$this->createThumbnail($news_array['document'], 250, 130, "./images/site/news", "./images/site/news/thumb/");
					} else {

						echo json_encode(array("status" => "0", "message" => "Upload image morethan 250px width"));
						die;
					}
				} else {

					echo json_encode(array("status" => "0", "message" => strip_tags($this->upload->display_errors())));
					die;
				}
			}

			if ($post["archive"] == "1week") {
				$news_array['archeived_date'] = date("Y-m-d", strtotime("+1 week"));
			} else if ($post["archive"] == "1month") {
				$news_array['archeived_date'] = date("Y-m-d", strtotime("+1 month"));
			} else if ($post["archive"] == "3months") {
				$news_array['archeived_date'] = date("Y-m-d", strtotime("+3 month"));
			} else if ($post["archive"] == "6months") {
				$news_array['archeived_date'] = date("Y-m-d", strtotime("+6 month"));
			}
			if ($post["id"] == 0) {
				$this->landing_model->simple_insert(MEMBER_NEWS, $news_array);
				$news_array["company_name"] = get_company_name($news_array["company_id"]);
				$this->mail_model->send_admin_news_create($news_array);

				echo json_encode(array("status" => "1", "message" => "News added successfully."));
				die;
			} else {
				$this->landing_model->update_details(MEMBER_NEWS, $news_array, array("id" => $post["id"], "company_id" => $id));
				echo json_encode(array("status" => "1", "message" => "News updated successfully."));
				die;
			}
		} else {
			echo json_encode(array("status" => "0", "message" => "Session out login in again."));
			die;
		}
	}

	public function delete_members_news()
	{
		if ($this->checkLogin("U") != "") {
			$post = $this->input->post();
			$id = $post["id"];
			$comp_id = $this->checkLogin("U");
			$this->landing_model->commonDelete(MEMBER_NEWS, array("id" => $id, "company_id" => $comp_id));
			echo json_encode(array("status" => "1", "message" => "Successfully news deleted"));
			die;
		} else {
			echo json_encode(array("status" => "0", "message" => "Session out login in again."));
			die;
		}
	}

	public function referrals()
	{
		if ($this->checkLogin("U") != "") {
			$post = $this->input->post();
			$this->load->view('site/user/referrals', $this->data);
		} else {
			$this->session->set_flashdata('alert_message', "Session out please try again later.");
			$this->session->set_flashdata('error_type', 'error');
			redirect(base_url());
		}
	}


	public function save_referal()
	{

		/* error_reporting(E_ALL);
		ini_set('display_errors', E_ALL); */
		$id = $this->checkLogin("U");
		if ($id != "") {
			$post = $this->input->post();
			$ret['status'] = 1;

			$companyInfo = $this->landing_model->get_all_details(COMPANY, array("id" => $id));
			if ($companyInfo->num_rows() > 0) {
				$member_name = $companyInfo->row()->contact_name;
				$member_email = $companyInfo->row()->email;
			}

			$check_referal = $this->landing_model->get_all_details(REFERRALS, array("company_id" => $id, "prospect_email" => $post["prospect_email"], "prospect_company" => $post["prospect_company"]));
			if ($check_referal->num_rows() == 0) {
				$referal_array = array("member_name" => $member_name, "member_email" => $member_email, "prospect_company" => $post["prospect_company"], "prospect_contact_name" => $post["prospect_contact_name"], "prospect_email" => $post["prospect_email"], "company_id" => $id, "created_at" => time(), "updated_at" => time());
				$this->landing_model->simple_insert(REFERRALS, $referal_array);
				$referal_array["member_company"] = get_company_name($id);
				$this->mail_model->send_referal_mail_toAdmin($referal_array);
				$ret['status'] = 1;
			} else {

				$ret['status'] = 0;
				$ret['message'] = "Already referral submitted for this company.";
			}
		} else {
			$ret['status'] = 0;
			$ret['message'] = "Session out login again and try.";
		}
		echo json_encode($ret);
	}


	public function news()
	{

		$post = $this->input->post();
		$this->data['page_glsn'] = 10;
		$this->data['page_member'] = 10;
		$this->data['all_news'] = $this->landing_model->get_gsan_news(0, 10);
		$this->data['total_all_news'] = $this->landing_model->get_gsan_news(0, 0);
		$this->data['members_news'] = $this->landing_model->get_gsanmembers_news(0, 10);
		$this->data['total_members_news'] = $this->landing_model->get_gsanmembers_news(0, 0);
		$this->load->view('site/landing/news', $this->data);
	}

	public function load_glsn_news()
	{
		if ($this->checkLogin("U") != "") {
			$post = $this->input->post();
			$page = $post["page"];
			$id = $this->checkLogin("U");
			$this->data["all_news"] = $this->landing_model->get_gsan_news($page, 10);
			$ret["pagination"] = 1;
			if ($this->data["all_news"]->num_rows() == 0) {
				$ret["pagination"] = 0;
			}
			$ret["html"] = $this->load->view('site/landing/ajax_load_news', $this->data, true);

			$ret["status"] = 1;
		} else {
			$ret["status"] = 0;
			$ret["message"] = "Session out login again.";
		}
		echo json_encode($ret);
	}

	public function load_glsn_members_news()
	{
		if ($this->checkLogin("U") != "") {
			$post = $this->input->post();
			$page = $post["page"];
			$id = $this->checkLogin("U");
			$this->data["all_news"] = $this->landing_model->get_gsanmembers_news($page, 10);
			$ret["pagination"] = 1;
			if ($this->data["all_news"]->num_rows() == 0) {
				$ret["pagination"] = 0;
			}
			$ret["html"] = $this->load->view('site/landing/ajax_load_news', $this->data, true);

			$ret["status"] = 1;
		} else {
			$ret["status"] = 0;
			$ret["message"] = "Session out login again.";
		}
		echo json_encode($ret);
	}

	public function member_directory()
	{
		$post = $this->input->post();
		$captcha = $this->captcha_refresh();
		$this->data['csession_id'] = $csession_id = $captcha['word'];
		$this->data['captcha'] = $captcha['image'];
		$this->data['iata_list'] = $this->landing_model->get_all_details(IATA, array("status" => "1"), array("field" => "code", "type" => "asc"));
		$this->session->set_userdata(array("contact_sessionid" => $csession_id));
		$this->load->view('site/search/search', $this->data);
	}

	public function get_iata_list()
	{
		$post = $this->input->post();
		$ret['status'] = 1;
		if ($post["country_id"] != "") {
			$iata_list = $this->landing_model->get_all_details(IATA, array("country_id" => $post["country_id"]));
		} else {
			$iata_list = $this->landing_model->get_all_details(IATA, array(), array("field" => "code", "type" => "asc"));
		}
		$iata_string = "<option value=''>Select IATA</option>";
		if ($iata_list->num_rows() > 0) {
			foreach ($iata_list->result() as $iata) {
				$iata_string .= "<option value='" . $iata->id . "'>" . $iata->short_code . "(" . $iata->code . ")</option>";
			}
		}
		$ret["iata_list"] = $iata_string;

		echo json_encode($ret);
	}

	public function ajax_search()
	{
		$post = $this->input->post();
		$ret['status'] = 1;
		$page = $post["page"];
		$iata_select = $post["iata_select"];
		$country = $post["country_id"];
		$members = 0;
		$company_name = $post["company_name"];
		$id = $this->checkLogin("U") == "" ? 0 : $this->checkLogin("U");
		$this->data['search_result'] = $this->landing_model->get_search_limit($page, $country, $iata_select, $company_name, 10, $members);   #echo $this->db->last_query();
		$total_listing = $this->landing_model->get_total_search_limit($page, $country, $iata_select, $company_name, 10, $members)->num_rows(); ##echo $this->db->last_query();
		$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = $total_listing;
		$config['per_page'] = 10;
		$config['full_tag_open'] = '<div class="pagination">';
		$config['full_tag_close'] = '</div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close']  = '</span></li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close']  = '</span></li>';
		$config['page_query_string'] = FALSE;
		$config['cur_page'] = $page;
		if ($post["country_id"] == "") {
			$country_name = "Members in All Countries";
		} else {
			$country_name = "Members in " . get_country_name($post["country_id"]);
		}
		$ret["country_name"] = $country_name;
		// Initialize
		$this->pagination->initialize($config);

		// Initialize $data Array
		$ret['pagination'] = $this->pagination->create_links();
		$ret['total_listing'] = ($total_listing == 0 || $total_listing == 1) ? "$total_listing Listing" : "$total_listing Listings";
		if ($this->data['search_result']->num_rows() > 0) {
			$ret['html'] = $this->load->view('site/search/ajax_search', $this->data, true);
		} else {
			$ret['status'] = 0;
			$ret['html'] = '<tr><td colspan="5">No listing found...</td></tr>';
		}
		echo json_encode($ret);
	}

	public function company_detail_page()
	{
		$post = $this->input->post();
		$ret['status'] = 1;
		$company_id = $post["company_id"];
		$id = $this->checkLogin("U") == "" ? 0 : $this->checkLogin("U");
		$this->data['office_info'] = $officeInfo = $this->landing_model->get_all_details(OFFICE, array("company_id" =>
		$company_id, "is_ho" => "1"));
		if ($post["office_id"] == "") {
			if ($officeInfo->num_rows() > 0) {
				$this->data["company_info"] = $this->landing_model->get_all_details(COMPANY, array("id" => $officeInfo->row()->company_id))->row();
				$this->data["all_other_branches"] = $this->landing_model->all_other_branches($officeInfo->row()->company_id);
				$this->data['office_info'] = $officeInfo->row();
				$this->data["member_news_list"] = $this->landing_model->get_all_details(MEMBER_NEWS, array("status" => "1", "company_id" => $this->data["company_info"]->id, "date(archeived_date)>" => date("Y-m-d")), array("field" => "id", "type" => "desc"));
				$ret["html"] = $this->load->view('site/search/company_detail_page', $this->data, true);
			} else {
				$this->data['office_info'] = $officeInfo = $this->landing_model->get_all_details(OFFICE, array("company_id" => $company_id));
				$this->data["company_info"] = $this->landing_model->get_all_details(COMPANY, array("id" => $officeInfo->row()->company_id))->row();
				$this->data["all_other_branches"] = $this->landing_model->all_other_branches($officeInfo->row()->company_id);
				$this->data["member_news_list"] = $this->landing_model->get_all_details(MEMBER_NEWS, array("status" => "1", "company_id" => $this->data["company_info"]->id, "date(archeived_date)>" => date("Y-m-d")), array("field" => "id", "type" => "desc"));
				$this->data['office_info'] = $officeInfo->row();
				$ret["html"] = $this->load->view('site/search/company_detail_page', $this->data, true);
			}
		} else {
			$this->data['office_info'] = $officeInfo = $this->landing_model->get_all_details(OFFICE, array("company_id" => $company_id, "id" => $post["office_id"]));
			$this->data["company_info"] = $this->landing_model->get_all_details(COMPANY, array("id" => $officeInfo->row()->company_id))->row();
			$this->data["all_other_branches"] = $this->landing_model->all_other_branches($officeInfo->row()->company_id);
			$this->data["member_news_list"] = $this->landing_model->get_all_details(MEMBER_NEWS, array("status" => "1", "company_id" => $this->data["company_info"]->id, "date(archeived_date)>" => date("Y-m-d")), array("field" => "id", "type" => "desc"));
			$this->data['office_info'] = $officeInfo->row();
			$ret["html"] = $this->load->view('site/search/company_detail_page', $this->data, true);
		}
		echo json_encode($ret);
	}


	public function company($title, $company_id)
	{

		$post = $this->input->post();
		$ret['status'] = 1;
		$id = $this->checkLogin("U") == "" ? 0 : $this->checkLogin("U");
		$this->data['office_info'] = $officeInfo = $this->landing_model->get_all_details(OFFICE, array("company_id" =>
		$company_id));

		if ($officeInfo->num_rows() > 0) {
			$this->data["company_info"] = $this->landing_model->get_all_details(COMPANY, array("id" => $officeInfo->row()->company_id))->row();
			$this->data["all_other_branches"] = $this->landing_model->all_other_branches($officeInfo->row()->company_id);
			$this->data['office_info'] = $officeInfo->row();
			$this->data["member_news_list"] = $this->landing_model->get_all_details(MEMBER_NEWS, array("status" => "1", "company_id" => $this->data["company_info"]->id, "date(archeived_date)>" => date("Y-m-d")), array("field" => "id", "type" => "desc"));
			$this->load->view('site/search/company_detail_page_direct', $this->data);
		} else {
			$this->data['office_info'] = $officeInfo = $this->landing_model->get_all_details(OFFICE, array("company_id" => $company_id));
			$this->data["company_info"] = $this->landing_model->get_all_details(COMPANY, array("id" => $officeInfo->row()->company_id))->row();
			$this->data["all_other_branches"] = $this->landing_model->all_other_branches($officeInfo->row()->company_id);
			$this->data["member_news_list"] = $this->landing_model->get_all_details(MEMBER_NEWS, array("status" => "1", "company_id" => $this->data["company_info"]->id, "date(archeived_date)>" => date("Y-m-d")), array("field" => "id", "type" => "desc"));
			$this->data['office_info'] = $officeInfo->row();
			$this->load->view('site/search/company_detail_page_direct', $this->data);
		}
	}

	public function ajax_branch()
	{
		$post = $this->input->post();
		$ret['status'] = 1;
		$branch_id = $post["branch_id"];
		$id = $this->checkLogin("U") == "" ? 0 : $this->checkLogin("U");
		$this->data['office_info'] = $officeInfo = $this->landing_model->get_all_details(OFFICE, array("id" => $branch_id));
		if ($officeInfo->num_rows() > 0) {
			$this->data["company_info"] = $this->landing_model->get_all_details(COMPANY, array("id" => $officeInfo->row()->company_id))->row();
			$this->data["member_news_list"] = $this->landing_model->get_all_details(MEMBER_NEWS, array("status" => "1", "company_id" => $this->data["company_info"]->id, "date(archeived_date)>" => date("Y-m-d")), array("field" => "id", "type" => "desc"));
			$this->data['office_info'] = $officeInfo->row();
			$ret["html"] = $this->load->view('site/search/ajax_branch', $this->data, true);
		} else {
			$ret["status"] = 0;
		}


		echo json_encode($ret);
	}
	public function send_contact_enquiry()
	{
		$post = $this->input->post();
		if ($this->session->userdata("contact_sessionid") == $post["captcha_text"]) {
			if ($post['name'] != "") {
				$member_email = $post["to_email"];
				$member_name = $post["to_name"];
				$office_info = $this->landing_model->get_all_details(OFFICE, array("id" => $post["office_id"]));
				if ($office_info->num_rows() > 0) {

					if ($member_email == "") {
						$member_email = $office_info->row()->branch_email;
					}

					if ($member_email != "") {
						$contact_array = array("name" => $post["name"], "messages" => strip_tags($post['messages']), "email" => $post['email'], "phone" => $post['phone'], "subject" => $post["subject"], "member_email" => $member_email, "member_name" => $member_name);
						$check = $this->mail_model->send_contact_enquiry_email($contact_array);
					}
					$this->landing_model->simple_insert(CONTACT_ENQUIRY, $contact_array);
				}

				echo json_encode(array('status' => 1));
			} else {
				echo json_encode(array('status' => 2));
			}
		} else {
			echo json_encode(array('status' => 0));
		}
	}

	public function ajax_captcha_contact_members()
	{

		$this->load->helper('captcha');
		$values = array(
			'word' => '',
			'word_length' => 4,
			'img_path' => './images/captcha/',
			'img_url' => base_url() . 'images/captcha/',
			'font_path' => base_url() . 'css/fonts/PoppinsRegular.ttf',
			'img_width' => '150',
			'img_height' => 50,
			'expiration' => 7200,
			'pool' => '012345678901234567890123456789',
		);
		$data = create_captcha($values);
		$this->data['csession_id'] = $csession_id = $data['word'];
		$this->session->set_userdata(array("contact_sessionid" => $csession_id));
		echo $data['image'];
	}

	public function upcomming_summits()
	{

		$post = $this->input->post();
		$this->data["upcomming_summits"] = $this->landing_model->get_all_details(SUMMITS, array("status" => "1", "date(end_date)>=" => date("Y-m-d")));
		$this->load->view('site/landing/upcomming_summits', $this->data);
	}
	public function contact()
	{
		$this->data['heading'] = "Contact us";

		$captcha = $this->captcha_refresh();
		$this->data['csession_id'] = $csession_id = $captcha['word'];
		$this->data['captcha'] = $captcha['image'];
		$this->session->set_userdata(array("glsn_contact_sessionid" => $csession_id));
		$this->load->view('site/landing/contact', $this->data);
	}

	public function save_contactus()
	{
		$post = $this->input->post();
		if ($this->session->userdata("glsn_contact_sessionid") == $post["cid"]) {
			unset($post["cid"]);
			$contact_array = array("name" => $post["name"], "email" => $post["email"], "phone" => $post["phone"], "subject" => $post["subject"], "body" => strip_tags($post['body']));
			$this->landing_model->simple_insert(CONTACTUS, $contact_array);
			$new_array = $contact_array;
			$check = $this->mail_model->send_contact_mail($new_array);
			echo json_encode(array('result' => 1));
		} else {
			echo json_encode(array('result' => 2));
		}
	}

	public function ajax_captcha_contact()
	{

		$this->load->helper('captcha');
		$values = array(
			'word' => '',
			'word_length' => 4,
			'img_path' => './images/captcha/',
			'img_url' => base_url() . 'images/captcha/',
			'font_path' => base_url() . 'css/fonts/PoppinsRegular.ttf',
			'img_width' => '150',
			'img_height' => 50,
			'expiration' => 7200,
			'pool' => '012345678901234567890123456789',
		);
		$data = create_captcha($values);
		$this->data['csession_id'] = $csession_id = $data['word'];
		$this->session->set_userdata(array("glsn_contact_sessionid" => $csession_id));
		echo $data['image'];
	}

	public function member_news($detail, $news_id)
	{
		$post = $this->input->post();
		$ret['status'] = 1;
		$this->data["heading"] = "Members";
		$this->data["news_id"] = $news_id;
		$id = $this->checkLogin("U") == "" ? 0 : $this->checkLogin("U");
		$this->data["news_details"] = $this->landing_model->get_all_details(MEMBER_NEWS, array("status" => "1", "id" => $news_id));
		$this->load->view('site/landing/member_industry_news', $this->data);
	}
	public function industry_news($detail, $news_id)
	{
		$post = $this->input->post();
		$ret['status'] = 1;
		$this->data["heading"] = "Industry";
		$this->data["news_id"] = $news_id;
		$id = $this->checkLogin("U") == "" ? 0 : $this->checkLogin("U");
		$this->data["news_details"] = $this->landing_model->get_all_details(MEMBER_NEWS, array("status" => "1", "id" => $news_id));
		$this->load->view('site/landing/member_industry_news', $this->data);
	}
	public function save_reference_request($id)
	{
		$post = $this->input->post();
		$reference_email = $post["reference_email"];
		$check = $this->landing_model->get_all_details(REFERENCES, array("company_id" => $id, "reference_email" => $reference_email));
		if ($post["reference_email"] != "") {

			if ($check->num_rows() == 0) {
				$company_info = $this->landing_model->get_all_details(COMPANY, array("id" => $id))->row();
				$this->landing_model->simple_insert(REFERENCES, array("company_id" => $id, "reference_email" => $reference_email, "q1" => $post["q1"], "q2" => $post["q2"], "q3" => $post["q3"], "q4" => $post["q4"], "q5" => $post["q5"], "notes" => strip_tags($post["notes"])));
				$ret['status'] = 1;
				$ref_array = array("company_id" => $id, "reference_email" => $reference_email, "q1" => $post["q1"], "q2" => $post["q2"], "q3" => $post["q3"], "q4" => $post["q4"], "q5" => $post["q5"], "notes" => strip_tags($post["notes"]), "company_name" => $company_info->name, "to_email" => $company_info->email);
				$this->mail_model->send_reference_request_response($ref_array);
				$this->session->set_flashdata('alert_message', "Your reference submitted successfully");
				$this->session->set_flashdata('error_type', 'success');
			} else {
				$this->session->set_flashdata('alert_message', "Reference already submitted.");
				$this->session->set_flashdata('error_type', 'error');
			}
		} else {
			$this->session->set_flashdata('alert_message', "Something went to wrong...");
			$this->session->set_flashdata('error_type', 'error');
		}
		redirect(base_url());
	}

	public function save_whatsappgroup()
	{
		$post = $this->input->post();
		#echo $this->session->userdata("newslettersession_id");die;
		if ($this->session->userdata("newslettersession_id") == $post["newslettersession_id"]) {
			$post_array = array("name" => $post["name"], "company" => $post["company"], "createat" => date("Y-m-d H:i:s"));
			$email = $this->config->item('whatsapp_email') == "" ? "emma@go2lnm.com" : $this->config->item('whatsapp_email');
			$this->landing_model->simple_insert("fc_whatsappgroup", $post_array);
			$msg = $post["name"] . " of " . $post["company"] . " wants to join the GSAN whatsapp";
			$sub = "Whatsapp join request";
			$this->mail_model->common_mail_withoutTemplate($email, $msg, $sub);
			echo json_encode(array('status' => 1, "message" => $this->config->item('whatsapp_text')));
		} else {
			echo json_encode(array('status' => 2, "message" => "Try again later."));
		}
	}


	public function search_filter_company()
	{
		$post = $this->input->post();
		$ret = array();
		$search_key = $post["search_key"];
		#$id=$this->checkLogin("U")==""?0:$this->checkLogin("U");
		$get_company = $this->landing_model->search_filter_company($search_key);

		$search_filter = array();
		if ($get_company->num_rows() > 0) {
			$i = 0;
			foreach ($get_company->result() as $gcourse) {

				$search_filter[] = substr($gcourse->name, 0, 50);
			}
		}

		if ($search_key == "") {
			$search_filter[] = array();
		}


		echo json_encode($search_filter);
	}


	public function reference_link($company_id, $reference_email)
	{
		$check = $this->landing_model->get_all_details(REFERENCES, array("company_id" => $company_id, "reference_email" => urldecode($reference_email)));
		if ($check->num_rows() == 0) {
			$this->data["company_details"] = $this->landing_model->get_all_details(COMPANY, array("id" => $company_id))->row();
			$this->data['company_id'] = $company_id;
			$ref_session = rand(999, 9999) . time();
			$sessar = array("ref_session" => $ref_session);
			$this->session->set_userdata($sessar);
			$this->data['reference_email'] = urldecode($reference_email);
			$this->data['ref_session'] = $ref_session;
			$this->load->view("site/landing/references", $this->data);
		} else {
			$this->session->set_flashdata('alert_message', "Already reference submitted...");
			$this->session->set_flashdata('error_type', 'error');
			redirect(base_url());
		}
	}

	public function save_reference_request_html($id)
	{
		$post = $this->input->post();
		$reference_email = $post["reference_email"];
		$check = $this->landing_model->get_all_details(REFERENCES, array("company_id" => $id, "reference_email" => $reference_email));
		if ($post["reference_email"] != "") {

			if ($check->num_rows() == 0) {
				$company_info = $this->landing_model->get_all_details(COMPANY, array("id" => $id))->row();
				$this->landing_model->simple_insert(REFERENCES, array("company_id" => $id, "reference_email" => $reference_email, "q1" => $post["q1"], "q2" => $post["q2"], "q3" => $post["q3"], "q4" => $post["q4"], "q5" => $post["q5"], "notes" => strip_tags($post["notes"])));
				$ret['status'] = 1;
				$ref_array = array("company_id" => $id, "reference_email" => $reference_email, "q1" => $post["q1"], "q2" => $post["q2"], "q3" => $post["q3"], "q4" => $post["q4"], "q5" => $post["q5"], "notes" => strip_tags($post["notes"]), "company_name" => $company_info->name, "to_email" => $company_info->email);
				$this->mail_model->send_reference_request_response($ref_array);
				echo json_encode(array('status' => 1, "message" => "Your reference submitted successfully"));
				die;
			} else {
				echo json_encode(array('status' => 0, "message" => "Reference already submitted."));
				die;
			}
		} else {
			echo json_encode(array('status' => 0, "message" => "Something went to wrong..."));
			die;
		}
	}

	public function delete_user_account()
	{
		if ($this->checkLogin("U") != "") {
			$post = $this->input->post();
			$id = $post["id"];
			$comp_id = $this->checkLogin("U");
			$this->landing_model->commonDelete(USERS, array("id" => $post["user_id"], "company_id" => $comp_id, "login_type" => "0"));
			echo json_encode(array("status" => "1", "message" => "Successfully user deleted"));
			die;
		} else {
			echo json_encode(array("status" => "0", "message" => "Session out login in again."));
			die;
		}
	}
}
