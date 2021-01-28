<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_settings extends MY_Controller {
		 
	function __construct(){
        parent::__construct();
		$this->load->helper(array('cookie','date','form','email','product_helper'));
		$this->load->library(array('form_validation','session'));		
		$this->load->model('common_model_backend');
		$this->load->model('mail_model');
		
    }
	public function login()
	{ 
		if($this->checkLogin('A')!='')
		{
		 redirect(base_url().'admin/dashboard');
		}
		$this->load->view('admin/admin_settings/login',$this->data);
	}	
	
	public function logout() {
		
		$userdata = array (
				'gmtech_admin_id' => '',
				'gm_admin_email' => ''
				);
		$this->session->set_userdata ( $userdata );
		$this->session->set_userdata ('gm_admin_id',''); 
		redirect (base_url().'admin');
	}
	
	public function admin_login() {

		$email = $this->input->post ( 'admin_email' );
		$pwd = $this->input->post ( 'admin_password' );
		$pwd = sha1($pwd);
		$condition = array (
					'email' => $email,
					'password' => $pwd
			);
			$checkUser = $this->common_model_backend->get_all_details ( ADMIN, $condition ); #echo $this->db->last_query(); 
			#echo $checkUser->num_rows ();
			if ($checkUser->num_rows () == '1') { 
				$userdata = array (
						'gmtech_admin_id' => $checkUser->row ()->id,
						'gmtech_admin_name' => $checkUser->row ()->firstname,
						'rentmate_session_prev' => $checkUser->row ()->permission,
						'gm_admin_email' => $checkUser->row ()->email
				);
				$this->session->set_userdata ( $userdata );	
				$this->common_model_backend->save_data();				
				$returnStr ['status'] = 1; 
			}
			else
			{
			
				$returnStr ['message'] = 'Invalid login details';
				$returnStr ['status'] = 2;	
			}
				
		
		echo json_encode ( $returnStr );
	}
	
	public function dashboard()
	{
		if($this->checkLogin('A')!='')
		{
		$id=$this->checkLogin('A');
					
		$this->data['admin']=$this->common_model_backend->get_all_details(ADMIN,array('id'=>$id))->row();
		$this->data['total_post']=$this->common_model_backend->get_total_post();	
		$this->data['total_application']=$this->common_model_backend->get_total_application();	
		$post_details = $this->common_model_backend->get_all_details(POST,array())->result();
		$post = array();
		foreach($post_details as $post_detailss)
		{
			$total = $this->common_model_backend->get_total_application($post_detailss->id);	
			$post[] = array('id'=>$post_detailss->id,'name'=>$post_detailss->post_name,'total'=>$total->total_application);
		}
		$this->data['post'] = $post;

		$this->data['heading']="Dashboard";
		$this->data['heading1']="Recent Login Students List";
		$this->data['students']=$this->common_model_backend->get_all_details(COMPANY,array('last_login_date >='=>date('Y-m-d',strtotime("-2 day")))); 
		$this->load->view('admin/admin_settings/dashboard',$this->data);
		}
		else
		{
		redirect(base_url().'admin');
		}
	}
	
	public function edit_admin_settings()
	{
		if($this->checkLogin('A')!='')
		{   $this->data['heading']="Admin Settings";
			$this->data['setting']=$this->common_model_backend->get_all_details(ADMIN_SETTINGS,array('id'=>1))->row();
			$this->load->view('admin/admin_settings/edit_admin_settings',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	
	public function save_admin_settings($id='')
	{
		if($this->checkLogin('A')!='')
		{  

			$config['overwrite'] = FALSE;
	    	$config['allowed_types'] = 'jpg|jpeg|gif|png|ico|svg';
		    $config['max_size'] = 2000;
		    $config['upload_path'] = './images/site/logo';
		    $this->load->library('upload', $config);
			$_POST['base_url']=base_url();
			if ( $this->upload->do_upload('site_logo')){
		    	$imgDetails = $this->upload->data();
		    	$_POST['site_logo'] = $imgDetails['file_name'];
			}
			else{
				$_POST['site_logo'] =$this->config->item('site_logo');
			}				
			if ( $this->upload->do_upload('site_logo1')){
		    	$imgDetails1 = $this->upload->data();
		    	$_POST['site_logo1'] = $imgDetails1['file_name'];
			} 
			else{
				$_POST['site_logo1'] =$this->config->item('site_logo1');
			}			
			if ( $this->upload->do_upload('site_favicon')){
		    	$imgDetails2 = $this->upload->data();
		    	$_POST['site_favicon'] = $imgDetails2['file_name'];
			}
			else{
				$_POST['site_favicon'] =$this->config->item('site_favicon');
			}
             foreach($_POST as $key=>$val)
			 {
				 $admin_fill .= '$config["'.$key.'"]="'.addslashes($val).'";'. PHP_EOL;
			 }
			 $admin_fill='<?php '.$admin_fill. '?>';
			 file_put_contents('./settings/admin_settings.php',$admin_fill);	
			 //die;
			 unset($_POST['base_url']);
			  $_POST['google_analytics']=htmlentities($_POST['google_analytics']);
			 
			 $this->common_model_backend->update_details(ADMIN_SETTINGS,$_POST,array('id'=>1));
			 $this->session->set_flashdata('alert_message', 'Successfully updated');
		     $this->session->set_flashdata('error_type', 'success');
			 redirect(base_url().'admin/admin_settings/edit_admin_settings');
			
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
    public function edit_admin($id='1')
	{
		if($this->checkLogin('A')!='')
		{   			
			$this->data['heading']="Edit admin details";
			$this->data['user']=$this->common_model_backend->get_all_details(ADMIN,array('id'=>$id))->row();
			$this->load->view('admin/admin_settings/edit_admin',$this->data);
			
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	 public function google_analytics($id='1')
	{
		if($this->checkLogin('A')!='')
		{   			
			$this->data['heading']="Google analytics";
			$this->load->view('admin/admin_settings/google_analytics',$this->data);
			
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	
		
	public function update_password($id='1')
	{  
		if($this->checkLogin('A')!='')
		{  
	         $dataarray=array('email'=>$_POST['email']);	
			 if($_POST['password']!='')
				{
					$dataarray['password']=sha1($_POST['password']); 
				}
			
			 $checksub=$this->common_model_backend->get_all_details(ADMIN,array('email'=>$_POST['email'],'id !='=>$id));
			 if($checksub->num_rows()==0){
			 $this->common_model_backend->update_details(ADMIN,$dataarray,array('id'=>$id));
			 $this->session->set_flashdata('alert_message', 'Successfully updated');
		     $this->session->set_flashdata('error_type', 'success');
			 redirect(base_url().'admin/admin_settings/edit_admin');
			 }
			  else
			 {
			 $this->session->set_flashdata('alert_message', ' Email already exist.');
		     $this->session->set_flashdata('error_type', 'error');
			 redirect(base_url().'admin/admin_settings/edit_admin'); 
			 }
			
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	
	public function send_forgot_password()
	 {
		 $email=$_POST['forgot_email'];
		 $check_user=$this->common_model_backend->get_all_details(ADMIN,array('email'=>$email));
		 if($check_user->num_rows()>0)
		 {
			$password=time().rand(111,9999);
			$to = $email;			
			$this->mail_model->send_user_password ( $password,$check_user->row()->first_name,$email );
			$this->common_model_backend->update_details(ADMIN,array('password'=>sha1($password)),array('email'=>$email));	
			$ret['status']=1;
			$ret['message']="Passwor reset successfully. Check your mail";
			
		 }
		 else
		 {
			 $ret['status']=2;
			 $ret['message']="Email id is not found";
		 }
		 echo json_encode($ret);
	 }
	 
	 public function check_old_password()
	{
		if($this->checkLogin('A')!='')
		{
		   $email=$_POST["email"];
		   $password=$_POST["password"];
		   $pwd = sha1($password);
		    $condition = array (
					'email' => $email,
					'password' => $pwd
			);
			$checkUser = $this->common_model_backend->get_all_details ( ADMIN, $condition );
			if ($checkUser->num_rows () == '1') {
              echo "1";
			}
			else{
			  echo "0";	
			}	
		}
		else
		{
		redirect(base_url().'admin');
		}
	}
  public function check_old_password_admin()
	{
		if($this->checkLogin('A')!='')
		{
		   $email=$_POST["email"];
		   $password=$_POST["password"];
		   $pwd = sha1($password);
		    /* $condition = array (
					'email' => $email,
					'password' => $pwd
			); */
			$condition = array (
					
					'password' => $pwd
			);
			$checkUser = $this->common_model_backend->get_all_details ( ADMIN, $condition );
			if ($checkUser->num_rows () == '1') {
              echo "1";
			}
			else{
			  echo "0";	
			}	
		}
		else
		{
		redirect(base_url().'admin');
		}
	}

	
}
