<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mailing_list extends MY_Controller {
		 
	function __construct(){
        parent::__construct();
		$this->load->helper(array('cookie','date','form','email'));
		$this->load->library(array('encrypt','form_validation','session'));		
		$this->load->model('common_model_backend');
		
    }
	public function add_mailing_list($id='')
	{
		if($this->checkLogin('A')!='')
		{   
			if($id=='')
			{
			$this->data['heading']="Add Mailing List";			
			$this->load->view('admin/mail/add_mailing_list',$this->data);
			}
			else
			{
			$this->data['heading']="Edit Mailing List ";
			$this->data['service']=$this->common_model_backend->get_all_details(MAILING_LIST,array('id'=>$id))->row();
			$this->load->view('admin/mail/add_mailing_list',$this->data);
			}
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
            $url=$_POST['ret']==""?"public":$_POST['ret'];
			unset($_POST['s2id_autogen2']);
			unset($_POST['ret']);
			if($id=='')
			{ 
		     $check_ex=$this->common_model_backend->get_all_details(MAILING_LIST,array('email'=>$_POST['email']));
			 if($check_ex->num_rows()==0){
			  $_POST["member"]="0";
			  $_POST["public"]="0";
			  $_POST["reference"]="0";
			  $_POST["port_estimates"]="0";
			 if(isset($_POST["type"])){
				 foreach($_POST["type"] as $type){
					 if($type=="member"){
						 $_POST["member"]="1";
					 }
					 if($type=="public"){
						 $_POST["public"]="1";
					 }
					 if($type=="reference"){
						 $_POST["reference"]="1";
					 }
					 if($type=="port_estimates"){
						 $_POST["port_estimates"]="1";
					 }
				 }
				 
			 }
			 unset($_POST["type"]);	
			 $this->common_model_backend->simple_insert(MAILING_LIST,$_POST);
			 $this->session->set_flashdata('alert_message', 'Successfully created');
		     $this->session->set_flashdata('error_type', 'success');
			redirect(base_url().'admin/mailing_list/display_mail_list/'.$url);
			 }
			 else
			 {
				 $this->session->set_flashdata('alert_message', 'Already exist.');
		         $this->session->set_flashdata('error_type', 'error'); 
				 redirect(base_url().'admin/mailing_list/display_mail_list/'.$url);
			 }
			
			}
			else
			{
			 $check_ex=$this->common_model_backend->get_all_details(MAILING_LIST,array('email'=>$_POST['email'],'id!='=>$id)); 
			 if($check_ex->num_rows()==0){	
			  $_POST["member"]="0";
			  $_POST["public"]="0";
			  $_POST["reference"]="0";
			  $_POST["port_estimates"]="0";
			 if(isset($_POST["type"])){
				 foreach($_POST["type"] as $type){
					 if($type=="member"){
						 $_POST["member"]="1";
					 }
					 if($type=="public"){
						 $_POST["public"]="1";
					 }
					 if($type=="reference"){
						 $_POST["reference"]="1";
					 }
					 if($type=="port_estimates"){
						 $_POST["port_estimates"]="1";
					 }
				 }
				 
			 }
			 unset($_POST["type"]);	
			 
			 $this->common_model_backend->update_details(MAILING_LIST,$_POST,array('id'=>$id));
			 $this->session->set_flashdata('alert_message', 'Successfully updated');
		     $this->session->set_flashdata('error_type', 'success');
			 redirect(base_url().'admin/mailing_list/display_mail_list/'.$url);
			 }
			 else
			 {
				 $this->session->set_flashdata('alert_message', 'Already exist.');
		         $this->session->set_flashdata('error_type', 'error'); 
				redirect(base_url().'admin/mailing_list/display_mail_list/'.$url);
			 }
			}
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
    public function delete_mailing_list($id,$type)
	{
		if($this->checkLogin('A')!='')
		{   
			
			$ret=$_GET['type']==""?"public":$_GET['type'];
			
			if($ret=="public"){
				$array=array("public"=>"0");
			}
			else if($ret=="reference"){
				$array=array("reference"=>"0");
			}
			else if($ret=="member"){
				$array=array("member"=>"0");
			}
			else if($ret=="port_estimates"){
				$array=array("port_estimates"=>"0");
			}
			else{
				$array=array("public"=>"0");
			}
			$this->data['user']=$this->common_model_backend->update_details(MAILING_LIST,$array,array('id'=>$id));
			$this->session->set_flashdata('alert_message', 'Successfully Deleted');
		    $this->session->set_flashdata('error_type', 'success');
			redirect(base_url().'admin/mailing_list/display_mail_list/'.$ret);
			
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	
	public function export_list($type)
	{
		if($this->checkLogin('A')!='')
		{   
	
			$fields_wanted=array('email');
			$table=MAILING_LIST;
			$users=$this->common_model_backend->export_mail($table,$fields_wanted,$type);
			$this->data['mail']=$users['mail']->result();
			$this->load->view('admin/mail/export_mail',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}	

	
  

	/*Ajax Based Users List Controller Function*/
	public function display_public($type)
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
        $totalData = $totalFiltered = $this->common_model_backend->get_ajax_mailing_list($limit,$start,$search,$order,$dir,"total_record_count",$type);
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->common_model_backend->get_ajax_mailing_list($limit,$start,$search,$order,$dir,"total_records",$type);
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->common_model_backend->get_ajax_mailing_list($limit,$start,$search,$order,$dir,"record_search",$type);
            $totalFiltered = $this->common_model_backend->get_ajax_mailing_list($limit,$start,$search,$order,$dir,"search_record_count",$type);
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
				if($prev==1 || (!empty($Service) && in_array('2',$Service))){
					$edit = "<a class='btn btn-success' href='".base_url()."admin/mailing_list/add_mailing_list/".$return_rows->id."?type=$type'>Edit</a>";
				}
				if($prev==1 || (!empty($Service) && in_array('3',$Service))){
					$delete = '<a class="btn btn-danger" onclick="return confirm(\'Once deleted cant be recover again...\')" href="'.base_url().'/admin/mailing_list/delete_mailing_list/'.$return_rows->id.'?type='.$type.'">Delete</a>';
				}
				
				/* $condition1 = $return_rows->active=='1'?'success':'danger';
				$condition2 = $return_rows->active=='1'?0:1;
				$condition3 = $return_rows->active=="1"?"Active":"Inactive";
				$status = "<a class='btn btn-".$condition1."' href='".base_url()."admin/service/change_status/".$return_rows->id."/".$condition2."'>".$condition3."</a>";  */
							 
                $nestedData['id'] = $i;
                $nestedData['email'] = $return_rows->email;
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
  
	public function display_mail_list($type)
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['type']=$type;
			$this->data['heading']="Display ".$type." List";
			$this->load->view('admin/mail/display_mail_list',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
		

  

}
