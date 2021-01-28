<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter extends MY_Controller {
		 
	function __construct(){
        parent::__construct();
		$this->load->helper(array('cookie','date','form','email'));
		$this->load->library(array('encrypt','form_validation','session'));		
		$this->load->model('student_model_backend');
		$this->load->model('mail_model');
		
    }
	
	

   public function display_newsletter_list()
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Display Newsletter List";
			$this->data['task']=$this->student_model_backend->get_all_details(NEWSLETTER,array());
			$this->load->view('admin/newsletter/display_newsletter_list',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}	
   
   public function send_newsletter()
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Send Newsletter List";
			$this->data['users']=$this->student_model_backend->get_all_details(NEWSLETTER,array());
			$this->data['realusers']=$this->student_model_backend->get_all_details(USERS,array());
			$this->load->view('admin/newsletter/send_newsletter',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}	
    public function send_newsletter_mail()
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Send Newsletter List";
			$this->data['users']=$this->mail_model->send_newsletter_mail($_POST);
			$this->session->set_flashdata('alert_message', 'Successfully newsletter sent...');
		    $this->session->set_flashdata('error_type', 'success');
			redirect(base_url().'admin/newsletter/display_newsletter_list');
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}	
   
	public function delete_newsletter($id)
	{
		if($this->checkLogin('A')!='')
		{   
			
			$this->data['user']=$this->student_model_backend->commonDelete(NEWSLETTER,array('id'=>$id));
			$this->session->set_flashdata('alert_message', 'Successfully Deleted');
		    $this->session->set_flashdata('error_type', 'success');
			redirect(base_url().'admin/newsletter/display_newsletter_list');
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	
	public function display_newsletter()
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
        $totalData = $totalFiltered = $this->student_model_backend->get_ajax_newsletter_list($limit,$start,$search,$order,$dir,"total_record_count");
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->student_model_backend->get_ajax_newsletter_list($limit,$start,$search,$order,$dir,"total_records");
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->student_model_backend->get_ajax_newsletter_list($limit,$start,$search,$order,$dir,"record_search");
            $totalFiltered = $this->student_model_backend->get_ajax_newsletter_list($limit,$start,$search,$order,$dir,"search_record_count");
        }

        $data = array();
        if($result_set->num_rows()>0)
        {
			$i = 1;
            foreach ($result_set->result() as $return_rows)
            {
				$delete = "";				
				$condition1 = $return_rows->rstatus=='1'?'success':'danger';
				$condition2 = $return_rows->rstatus=='1'?0:1;
				$condition3 = $return_rows->rstatus==1?"Active":"Inactive";
				$prev = $this->data['prev'];
				
				/*Update Code*/												
				if($prev==1 || (!empty($Reviews) && in_array('3',$Reviews)))
				{
					$delete = '<a class="btn btn-danger" onclick="return confirm(\'Once deleted cant be recover again...\')" href="'.base_url().'admin/newsletter/delete_newsletter/'.$return_rows->id.'">
								Delete</a>';
				}
				else
				{
					$delete = '-';
				}
				$view = '<a class="btn btn-success show_review" data-id="'.$return_rows->rid.'" href="javascript:void(0)">View</a>';
				$nestedData['id'] = $i;
                $nestedData['email'] = $return_rows->email;
                
                $nestedData['update'] = '<div class="hidden-sm hidden-xs action-buttons">'.$delete.'</div>';
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
	
	
	

}
