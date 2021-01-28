<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {
		 
	function __construct(){
        parent::__construct();
		$this->load->helper(array('cookie','date','form','email'));
		$this->load->library(array('encrypt','form_validation','session'));		
		$this->load->model('common_model_backend');
	    
		
    }
	


	public function delete_user($id)
	{
		if($this->checkLogin('A')!='')
		{ 			
			    $this->data['user']=$this->common_model_backend->commonDelete(USERS,array('id'=>$id));
				$this->session->set_flashdata('alert_message', 'Successfully Deleted');
				$this->session->set_flashdata('error_type', 'success');
				redirect(base_url().'admin/users/display_users_list');
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	
	 

	public function add_users($id='')
	{
		if($this->checkLogin('A')!='')
		{   
			$this->data["company_list"]=$this->common_model_backend->get_all_details(COMPANY,array("status"=>"active"),array("type"=>"asc","field"=>"name"));
			if($id=='')
			{
			$this->data['heading']="Add User";	
			$this->load->view('admin/users/add_user',$this->data);			
			}
			else
			{
			$this->data['heading']="Edit User";
			$this->data['user']=$this->common_model_backend->get_all_details(USERS,array('id'=>$id))->row();
			$this->load->view('admin/users/add_user',$this->data);
			}
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	
	public function edit_users($id='')
	{
		if($this->checkLogin('A')!='')
		{   
			$this->data["company_list"]=$this->common_model_backend->get_all_details(COMPANY,array("status"=>"active"),array("type"=>"asc","field"=>"name"));
			if($id=='')
			{
			$this->data['heading']="Add User";	
			$this->load->view('admin/users/add_user',$this->data);			
			}
			else
			{
			$this->data['heading']="Edit User";
			$this->data['user']=$this->common_model_backend->get_all_details(USERS,array('id'=>$id))->row();
			$this->load->view('admin/users/edit_user',$this->data);
			}
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
    public function check_email()
	{   $email=$this->input->post('email');
		$t=$this->common_model_backend->get_single_details(USERS,array('id'),array('email'=>$email));
        if($t->num_rows()==0)
		{
			echo "true";
		}
		else
		{
			echo "false";
		}	

	}
	
	public function check_email_profile()
	{   $email=$this->input->post('email');
	    $id=$this->input->post('id');
		$t=$this->common_model_backend->get_single_details(USERS,array('id'),array('email'=>$email,'id !='=>$id));
        if($t->num_rows()==0)
		{
			echo "true";
		}
		else
		{
			echo "false";
		}	

	}
	public function add_edit_insert($id='')
	{
		if($this->checkLogin('A')!='')
		{  

			if($_POST['password']!='')
			{
				$_POST['password']=md5($_POST['password']); 
			}
			else
			{
				unset($_POST['password']);
			}
			  
			if($id=='')
			{
			 $check=$this->common_model_backend->get_all_details(USERS,array('email'=>$_POST["email"]));
			 if($check->num_rows()==0){
			 $this->common_model_backend->simple_insert(USERS,$_POST);
			 $this->session->set_flashdata('alert_message', 'Successfully created');
		     $this->session->set_flashdata('error_type', 'success');
			 redirect(base_url().'admin/users/display_users_list');
			 }
			 else
			 {
		     $this->session->set_flashdata('alert_message', 'Already Exist.');
		     $this->session->set_flashdata('error_type', 'error');
			 redirect(base_url().'admin/users/display_users_list');
			 }				 
			
			}
			else
			{
			 $check=$this->common_model_backend->get_all_details(USERS,array('email'=>$_POST["email"],'id!='=>$id));
			 if($check->num_rows()==0){
			 $this->common_model_backend->update_details(USERS,$_POST,array('id'=>$id));
			 $this->session->set_flashdata('alert_message', 'Successfully updated');
		     $this->session->set_flashdata('error_type', 'success');
			  redirect(base_url().'admin/users/display_users_list');
			 }
			 else
			 {
		     $this->session->set_flashdata('alert_message', 'Already Exist.');
		     $this->session->set_flashdata('error_type', 'error');
			  redirect(base_url().'admin/users/display_users_list');
			 }	
			}
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}    
	
	
	public function change_status($id,$status)
	{   
		
		$this->common_model_backend->update_details(USERS,array('status'=>$status),array('id'=>$id));			 
		$this->session->set_flashdata('alert_message', 'Successfully status changed.');
		$this->session->set_flashdata('error_type', 'success');
		redirect(base_url().'admin/users/display_users_list');

	}
	
	/*Ajax Based Users List Controller Function*/
	public function display_users()
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
        $totalData = $totalFiltered = $this->common_model_backend->get_ajax_users_list($limit,$start,$search,$order,$dir,"total_record_count");
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->common_model_backend->get_ajax_users_list($limit,$start,$search,$order,$dir,"total_records");
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->common_model_backend->get_ajax_users_list($limit,$start,$search,$order,$dir,"record_search");
            $totalFiltered = $this->common_model_backend->get_ajax_users_list($limit,$start,$search,$order,$dir,"search_record_count");
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
				if($prev==1 || (!empty($Users) && in_array('2',$Users))){
					$edit = "<a class='btn btn-success' href='".base_url()."/admin/users/edit_users/".$return_rows->id."'>Edit</a>";
				}
				if($prev==1 || (!empty($Users) && in_array('3',$Users))){
					$delete = '<a class="btn btn-danger" onclick="return confirm(\'Once deleted cant be recover again...\')" href="'.base_url().'/admin/users/delete_user/'.$return_rows->id.'">Delete</a>';
				}
				else
				{
					$edit = '-';
					$delete = '-';
				}
							 
                $nestedData['id'] = $i;
                $nestedData['name'] = $return_rows->name;
                $nestedData['email'] = $return_rows->email;
                $nestedData['login_type'] = $return_rows->login_type==1?"Admin":"Sub User";
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
	
	public function display_users_list()
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Display Users List";
			$this->load->view('admin/users/display_users_list',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	
	 public function export_users_list()
	{
		if($this->checkLogin('A')!='')
		{   
	
			$fields_wanted=array('id','email','created','last_login_date','last_login_ip');
			$table=USERS;
			$users=$this->common_model_backend->export_user_details($table,$fields_wanted);
			$this->data['users_detail']=$users['users_detail']->result();
			$this->load->view('admin/users/export_users',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}	


}
