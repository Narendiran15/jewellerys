<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller {
		 
	function __construct(){
        parent::__construct();
		$this->load->helper(array('cookie','date','form','email'));
		$this->load->library(array('encrypt','form_validation','session'));		
		$this->load->model('common_model_backend');
		if($this->check_prev('Contact',0)==FALSE)
		{
			redirect(base_url('admin'));
		}
    }
	
	
	
	public function view_message($id)
	{
		if($this->checkLogin('A')!='')
		{   
			$this->data['heading']="View Enquiry";
			$this->data['task']=$this->common_model_backend->get_all_details(CONTACTUS,array("id"=>$id));
			$this->load->view('admin/contact/view_contact',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}		
    public function edit_contact()
	{
		if($this->checkLogin('A')!='')
		{   
			$this->data['heading']="Edit Contact us";
			$this->data['service']=$this->common_model_backend->get_all_details(FOOTER,array("id"=>"1"))->row();
			$this->load->view('admin/contact/edit_contact',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}	
   public function edit_contact_list($id)
	{
		if($this->checkLogin('A')!='')
		{   
			$this->data['heading']="Edit Contact us";
			$this->data['service']=$this->common_model_backend->get_all_details(CONTACT_LIST,array("id"=>$id))->row();
			$this->load->view('admin/contact/edit_contact_list',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}	
   
	 public function edit_insert_contactus()
	{
		if($this->checkLogin('A')!='')
		{   
			$_POST["home_about_text1"]=htmlentities($_POST["home_about_text1"]);
			$this->common_model_backend->update_details(FOOTER,$_POST,array("id"=>"1"));
			redirect(base_url().'admin/contact/edit_contact');
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}	
   
	 public function edit_insert_contactlist($id)
	{
		if($this->checkLogin('A')!='')
		{   
			$this->common_model_backend->update_details(CONTACT_LIST,$_POST,array("id"=>$id));
			redirect(base_url().'admin/contact/edit_contact_list/'.$id);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}	
   
	
	 
    
	public function delete_contact($id)
	{
		
		$this->common_model_backend->commonDelete(CONTACTUS,array('id'=>$id));			 
		$this->session->set_flashdata('alert_message', 'Successfully contact deleted.');
		$this->session->set_flashdata('error_type', 'success');
		redirect(base_url().'admin/contact/display_contact_list');

	}
	
	
	public function display_contacts()
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
		if($order=="action")
		{
			$order="id";
		}
        $dir = $this->input->post('order')[0]['dir'];		
        $totalData = $totalFiltered = $this->common_model_backend->get_ajax_contacts_list($limit,$start,$search,$order,$dir,"total_record_count");
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->common_model_backend->get_ajax_contacts_list($limit,$start,$search,$order,$dir,"total_records");
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->common_model_backend->get_ajax_contacts_list($limit,$start,$search,$order,$dir,"record_search");
            $totalFiltered = $this->common_model_backend->get_ajax_contacts_list($limit,$start,$search,$order,$dir,"search_record_count");
        }

        $data = array();
        if($result_set->num_rows()>0)
        {
			$i = 1;
            foreach ($result_set->result() as $return_rows)
            {
								
				
				$update = "<a class='btn btn-success' href='".base_url()."admin/contact/view_message/".$return_rows->id."'>View</a>";
				$delete = '<a class="btn btn-danger"  onclick="return confirm(\'Once deleted cant be recover again...\')"  href="'.base_url().'admin/contact/delete_contact/'.$return_rows->id.'">Delete</a>';
				
				$nestedData['id'] = $i;
                $nestedData['name'] = $return_rows->name;
                $nestedData['email'] = $return_rows->email;
				$nestedData['phone'] = $return_rows->phone;
                $nestedData['subject'] = $return_rows->subject;
                $nestedData['action'] = $update.$delete;
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
	
	 public function display_contact_list()
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Display Contact Enquiries List";
			$this->load->view('admin/contact/display_contact_list',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
   

}
