<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questions extends MY_Controller {
		 
	function __construct(){
        parent::__construct();
		$this->load->helper(array('cookie','date','form','email'));
		$this->load->library(array('encrypt','form_validation','session'));		
		$this->load->model('common_model_backend');
		
    }
	
	
   public function display_questions_list()
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Display Questions List";
			$this->load->view('admin/questions/display_questions_list',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}	
	
	/* Email Function */
  	public function display_questions()
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
        $totalData = $totalFiltered = $this->common_model_backend->ajax_question_template($limit,$start,$search,$order,$dir,"total_record_count");
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->common_model_backend->ajax_question_template($limit,$start,$search,$order,$dir,"total_records");
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->common_model_backend->ajax_question_template($limit,$start,$search,$order,$dir,"record_search");
            $totalFiltered = $this->common_model_backend->ajax_question_template($limit,$start,$search,$order,$dir,"search_record_count");
        }

        $data = array();
        if($result_set->num_rows()>0)
        {
			$i = $start+1;
            foreach ($result_set->result() as $retun_rows)
            {
				$edit = "";
				$delete = "";
				$prev = $this->data['prev'];
				if($prev==1 || (!empty($Email) && in_array('2',$Email))){
					$edit = "<a class='btn btn-success' href='".base_url()."admin/questions/add_questions/".$retun_rows->id."'>
								Edit
							</a>";
				}
				if($retun_rows->id!="22" && $retun_rows->id!="23" && $retun_rows->id!="24" ){
					$delete = '<a class="btn btn-danger" onclick="return confirm(\'Once deleted cant be recover again...\')"  href="'.base_url().'admin/questions/delete_questions/'.$retun_rows->id.'">
								Delete
							</a>';
				}
                $condition1 = $retun_rows->status=='1'?'success':'danger';
				$condition2 = $retun_rows->status=='1'?0:1;
				$condition3 = $retun_rows->status=="1"?"Active":"Inactive";
				$status = "<a class='btn btn-".$condition1."' href='".base_url()."admin/questions/change_status/".$retun_rows->id."/".$condition2."'> 
							 ".$condition3."</a>"; 
					
				
				$nestedData['id'] = $i;
                $nestedData['title'] = $retun_rows->title;
                $nestedData['template'] = $retun_rows->template;
                $nestedData['status'] = $status;
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
	
	public function delete_questions($id)
	{
		if($this->checkLogin('A')!='')
		{   
			
			$this->data['user']=$this->common_model_backend->commonDelete(EMAIL,array('id'=>$id));
			$this->session->set_flashdata('alert_message', 'Successfully Deleted');
		    $this->session->set_flashdata('error_type', 'success');
			redirect(base_url().'admin/questions/display_questions_list');
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	
	 

	public function add_questions($id='')
	{
		if($this->checkLogin('A')!='')
		{   
			$this->data['email_list']=$this->common_model_backend->get_all_details(EMAIL,array(),array("type"=>"asc","field"=>"title"));
			if($id=='')
			{
			$this->data['heading']="Add Questions ";			
			$this->load->view('admin/questions/add_questions',$this->data);
			}
			else
			{
			$this->data['heading']="Edit Questions ";
			$this->data['service']=$this->common_model_backend->get_all_details(QUESTIONS,array('id'=>$id))->row();
			
			$this->load->view('admin/questions/add_questions',$this->data);
			}
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
    
	public function add_edit_email_insert($id='')
	{
		if($this->checkLogin('A')!='')
		{  
            
			
			$_POST["description"]=htmlentities($_POST["description"]);
			if($id=='')
			{
			$_POST["status"]=1;	
			$this->common_model_backend->simple_insert(QUESTIONS,$_POST);
			$this->session->set_flashdata('alert_message', 'Successfully Question created');
		    $this->session->set_flashdata('error_type', 'success');
			redirect(base_url().'admin/questions/display_questions_list');			
			}
			else
			{
			$this->common_model_backend->update_details_html(QUESTIONS,$_POST,array('id'=>$id));
	
			 $this->session->set_flashdata('alert_message', 'Successfully Question updated');
		     $this->session->set_flashdata('error_type', 'success');
			  redirect(base_url().'admin/questions/display_questions_list');
			}
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
    
	public function change_status($id,$status)
	{   
		
		
		$this->common_model_backend->update_details(QUESTIONS,array('status'=>$status),array('id'=>$id));			 
		$this->session->set_flashdata('alert_message', 'Successfully status changed.');
		$this->session->set_flashdata('error_type', 'success');
		redirect(base_url().'admin/questions/display_questions_list');

	}
   
	

}
