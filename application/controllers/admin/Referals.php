<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Referals extends MY_Controller {
		 
	function __construct(){
        parent::__construct();
		$this->load->helper(array('cookie','date','form','email'));
		$this->load->library(array('encrypt','form_validation','session'));		
		$this->load->model('common_model_backend');
		$this->load->model('mail_model');
		
    }
	public function add_referal($id='')
	{
		if($this->checkLogin('A')!='')
		{   
			if($id=='')
			{
			$this->data['heading']="Add referal";			
			$this->load->view('admin/referals/add_referals',$this->data);
			}
			else
			{
			$this->data['heading']="Edit referal ";
			$this->data['service']=$this->common_model_backend->get_all_details(REFERRALS,array('id'=>$id))->row();
			$this->load->view('admin/referals/add_referals',$this->data);
			}
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
   public function send_mail($id='')
	{
		if($this->checkLogin('A')!='')
		{   
			
			$this->data['heading']="Edit service ";
			$referal=$this->common_model_backend->get_all_details(REFERRALS,array('id'=>$id))->row();
			$ref_array=array("member_company"=>get_company_name($referal->company_id),"prospect_name"=>$referal->prospect_contact_name,"member_name"=>$referal->member_name,"company_prospect"=>$referal->prospect_company);
			$this->mail_model->send_referal_mail($referal->prospect_email,$ref_array);
			$this->common_model_backend->update_details(REFERRALS,array("sent_date"=>date("Y-m-d H:i:s")),array("id"=>$id));
			$this->session->set_flashdata('alert_message', 'Mail sent successfully.');
		    $this->session->set_flashdata('error_type', 'error'); 
			redirect(base_url("admin/referals/display_referal_list"));
			
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
   
	public function add_edit_insert($id='')
	{
		if($this->checkLogin('A')!='')
		{  
            unset($_POST['s2id_autogen2']);
			
			 if(!isset($_POST["is_registered"])){
				 $_POST["is_registered"]=0;
			 }
			 $this->common_model_backend->update_details(REFERRALS,$_POST,array('id'=>$id));
			 $this->session->set_flashdata('alert_message', 'Successfully updated');
		     $this->session->set_flashdata('error_type', 'success');
			 redirect(base_url().'admin/referals/display_referal_list');
			
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
    public function delete_referal($id)
	{
		if($this->checkLogin('A')!='')
		{			
			$this->data['user']=$this->common_model_backend->commonDelete(REFERRALS,array('id'=>$id));
			$this->session->set_flashdata('alert_message', 'Successfully Deleted');
		    $this->session->set_flashdata('error_type', 'success');
			redirect(base_url().'admin/referals/display_referal_list');
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	
	public function display_referals()
	{
		$limit = '';
		$start = '';
		$search = '';
		$order = '';
		$dir = '';
		$columns = array() ;		
		$columns = $this->input->post('array_merge_name');		
		$limit = $this->input->post('length');
        $start = $this->input->post('start');
		$order = $columns[$this->input->post('order')[0]['column']];
		if($order=="update")
		{
			$order="id";
		}
        $dir = $this->input->post('order')[0]['dir'];		
        $totalData = $totalFiltered = $this->common_model_backend->get_ajax_referal_list($limit,$start,$search,$order,$dir,"total_record_count");
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->common_model_backend->get_ajax_referal_list($limit,$start,$search,$order,$dir,"total_records");
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->common_model_backend->get_ajax_referal_list($limit,$start,$search,$order,$dir,"record_search");
            $totalFiltered = $this->common_model_backend->get_ajax_referal_list($limit,$start,$search,$order,$dir,"search_record_count");
        }

        $data = array();
        if($result_set->num_rows()>0)
        {
			$i = $start+1;
            foreach ($result_set->result() as $return_rows)
            {
				$edit = "";
				$delete = "";
				$condition1 = "";
				$condition2 = "";
				$condition3 = "";
				$prev = $this->data['prev'];
				$edit = "<a class='btn btn-success' href='".base_url()."admin/referals/add_referal/".$return_rows->id."'>Edit</a>";
				$delete = '<a class="btn btn-danger" onclick="return confirm(\'Once deleted cant be recover again...\')" href="'.base_url().'/admin/referals/delete_referal/'.$return_rows->id.'">Delete</a>';
				
				$text="Sent";
				if($return_rows->sent_date=='0000-00-00 00:00:00'){
					$text="Send";
				}
				$status = "<a class='btn btn-primary' href='".base_url()."admin/referals/send_mail/".$return_rows->id."'>".$text."</a>"; 
							 
                $nestedData['id'] = $i;
                $nestedData['company_name'] = $return_rows->company_name;
                $nestedData['member_name'] = $return_rows->member_name;
                $nestedData['prospect_company'] = $return_rows->prospect_company;
                $nestedData['prospect_contact_name'] = $return_rows->prospect_contact_name;
                $nestedData['company_name'] = $return_rows->company_name;
                $nestedData['sent_date'] = $status; 
                $nestedData['update'] = "<div class='hidden-sm hidden-xs action-buttons'>".$edit.$delete."</div>";
                $data[] = $nestedData;
				$i++;
            }
        }
          
        $json_data = array(
                    "draw"            => intval($this->input->post('draw')),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered), 
                    "data"            => $data   
                    );
		
		echo json_encode($json_data);
	}
  
	public function display_referal_list()
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Display referals List";
			$this->load->view('admin/referals/display_referal_list',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
		

  

}
