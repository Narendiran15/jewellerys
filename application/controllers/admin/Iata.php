<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iata extends MY_Controller {
		 
	function __construct(){
        parent::__construct();
		$this->load->helper(array('cookie','date','form','email'));
		$this->load->library(array('encrypt','form_validation','session'));		
		$this->load->model('common_model_backend');
		
    }
	public function add_iata($id='')
	{
		if($this->checkLogin('A')!='')
		{   
			if($id=='')
			{
			$this->data['heading']="Add iata";			
			$this->load->view('admin/iata/add_iata',$this->data);
			}
			else
			{
			$this->data['heading']="Edit iata ";
			$this->data['service']=$this->common_model_backend->get_all_details(IATA,array('id'=>$id))->row();
			$this->load->view('admin/iata/add_iata',$this->data);
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
            unset($_POST['s2id_autogen2']);
			$post=$this->input->post();
			if($id=='')
			{ 
		     $check_ex=$this->common_model_backend->get_all_details(IATA,array('code'=>$_POST['code']));
			 if($check_ex->num_rows()==0){
			 $country_name=$this->common_model_backend->get_all_details(COUNTRY,array("id"=>$post['country_id']))->row()->name; 	 
			 $postarray=array("code"=>$post['code'],"country_id"=>$post["country_id"],"short_code"=>$post["short_code"],"status"=>"1","country_name"=>$country_name);	 
			 $this->common_model_backend->simple_insert(IATA,$postarray);
			 $this->session->set_flashdata('alert_message', 'Successfully created');
		     $this->session->set_flashdata('error_type', 'success');
			 redirect(base_url().'admin/iata/display_iata_list');
			 }
			 else
			 {
				 $this->session->set_flashdata('alert_message', 'Already exist.');
		         $this->session->set_flashdata('error_type', 'error'); 
				 redirect(base_url().'admin/iata/display_iata_list');
			 }
			
			}
			else
			{
			 $check_ex=$this->common_model_backend->get_all_details(IATA,array('code'=>$_POST['code'],'id!='=>$id)); 
			 if($check_ex->num_rows()==0){	
			 $country_name=$this->common_model_backend->get_all_details(COUNTRY,array("id"=>$post['country_id']))->row()->name; 	 
			 $postarray=array("code"=>$post['code'],"country_id"=>$post["country_id"],"short_code"=>$post["short_code"],"country_name"=>$country_name);
			 $this->common_model_backend->update_details(IATA,$postarray,array('id'=>$id));
			 $this->session->set_flashdata('alert_message', 'Successfully updated');
		     $this->session->set_flashdata('error_type', 'success');
			 redirect(base_url().'admin/iata/display_iata_list');
			 }
			 else
			 {
				 $this->session->set_flashdata('alert_message', 'Already exist.');
		         $this->session->set_flashdata('error_type', 'error'); 
				 redirect(base_url().'admin/iata/display_iata_list');
			 }
			}
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
    public function delete_iata($id)
	{
		if($this->checkLogin('A')!='')
		{   
			
			$this->data['user']=$this->common_model_backend->commonDelete(IATA,array('id'=>$id));
			$this->session->set_flashdata('alert_message', 'Successfully Deleted');
		    $this->session->set_flashdata('error_type', 'success');
			redirect(base_url().'admin/iata/display_iata_list');
			
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	public function change_status($id,$status)
	{ 
		
		$this->common_model_backend->update_details(IATA,array('status'=>$status),array('id'=>$id));			 
		$this->session->set_flashdata('alert_message', 'Successfully status changed.');
		$this->session->set_flashdata('error_type', 'success');
		redirect(base_url().'admin/iata/display_iata_list');

	}
  

	/*Ajax Based Users List Controller Function*/
	public function display_iata()
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
        $totalData = $totalFiltered = $this->common_model_backend->get_ajax_iata_list($limit,$start,$search,$order,$dir,"total_record_count");
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->common_model_backend->get_ajax_iata_list($limit,$start,$search,$order,$dir,"total_records");
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->common_model_backend->get_ajax_iata_list($limit,$start,$search,$order,$dir,"record_search");
            $totalFiltered = $this->common_model_backend->get_ajax_iata_list($limit,$start,$search,$order,$dir,"search_record_count");
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
				if($prev==1 || (!empty($Category) && in_array('2',$Category))){
					$edit = "<a class='btn btn-success' href='".base_url()."admin/iata/add_iata/".$return_rows->id."'>Edit</a>";
				}
				if($prev==1 || (!empty($Category) && in_array('3',$Category))){
					$delete = '<a class="btn btn-danger" onclick="return confirm(\'Once deleted cant be recover again...\')" href="'.base_url().'/admin/iata/delete_iata/'.$return_rows->id.'">Delete</a>';
				}
				
				$condition1 = $return_rows->status=='1'?'success':'danger';
				$condition2 = $return_rows->status=='1'?0:1;
				$condition3 = $return_rows->status=="1"?"Active":"Inactive";
				$status = "<a class='btn btn-".$condition1."' href='".base_url()."admin/iata/change_status/".$return_rows->id."/".$condition2."'>".$condition3."</a>"; 
							 
                $nestedData['id'] = $i;
                $nestedData['code'] = $return_rows->code;
                $nestedData['short_code'] = $return_rows->short_code;
                $nestedData['country_name'] = $return_rows->country_name;
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
  
	public function display_iata_list()
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Display iata List";
			$this->load->view('admin/iata/display_iata_list',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	
  

}
