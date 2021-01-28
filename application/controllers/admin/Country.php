<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Country extends MY_Controller {
		 
	function __construct(){
        parent::__construct();
		$this->load->helper(array('cookie','date','form','email'));
		$this->load->library(array('encrypt','form_validation','session'));		
		$this->load->model('country_model_backend');		
    }
	
	

	public function delete_country($id)
	{
		if($this->checkLogin('A')!='')
		{   
			
			$this->data['user']=$this->country_model_backend->commonDelete(COUNTRY,array('id'=>$id));
			$this->session->set_flashdata('alert_message', 'Successfully Deleted');
		    $this->session->set_flashdata('error_type', 'success');
			redirect(base_url().'admin/country/display_country_list');
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	
	 

	public function add_country($id='')
	{
		if($this->checkLogin('A')!='')
		{   
			if($id=='')
			{
			$this->data['heading']="Add country";			
			$this->load->view('admin/country/add_country',$this->data);
			}
			else
			{
			$this->data['heading']="Edit country ";
			$this->data['service']=$this->country_model_backend->get_all_details(COUNTRY,array('id'=>$id))->row();
			$this->load->view('admin/country/add_country',$this->data);
			}
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
    
	public function add_edit_country_insert($id='')
	{
		if($this->checkLogin('A')!='')
		{  
            unset($_POST['s2id_autogen2']);
			$config['overwrite'] = FALSE;
	    	$config['allowed_types'] = 'jpg|jpeg|gif|png';
		    $config['max_size'] = 2000;
		    $config['upload_path'] = './images/site/city';
		    $this->load->library('upload', $config);			
			if ( $this->upload->do_upload('photo')){
				$imgDetails = $this->upload->data();
		    	$_POST['photo'] = $imgDetails['file_name'];				
			}
			if($id=='')
			{ 
		     $check_ex=$this->country_model_backend->get_all_details(COUNTRY,array('name'=>$_POST['name']));
			 if($check_ex->num_rows()==0){
			 $this->country_model_backend->simple_insert(COUNTRY,$_POST);
			 $this->session->set_flashdata('alert_message', 'Successfully created');
		     $this->session->set_flashdata('error_type', 'success');
			 redirect(base_url().'admin/country/display_country_list');
			 }
			 else
			 {
				 $this->session->set_flashdata('alert_message', 'Already exist.');
		         $this->session->set_flashdata('error_type', 'error'); 
				 redirect(base_url().'admin/country/display_country_list');
			 }
			
			}
			else
			{
			 $check_ex=$this->country_model_backend->get_all_details(COUNTRY,array('name'=>$_POST['name'],'id!='=>$id)); 
			 if($check_ex->num_rows()==0){	
			 $this->country_model_backend->update_details(COUNTRY,$_POST,array('id'=>$id));
			 $this->session->set_flashdata('alert_message', 'Successfully updated');
		     $this->session->set_flashdata('error_type', 'success');
			 redirect(base_url().'admin/country/display_country_list');
			 }
			 else
			 {
				 $this->session->set_flashdata('alert_message', 'Already exist.');
		         $this->session->set_flashdata('error_type', 'error'); 
				 redirect(base_url().'admin/country/display_country_list');
			 }
			}
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
    
	  

	/*Ajax Based Users List Controller Function*/
	public function display_country()
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
        $totalData = $totalFiltered = $this->country_model_backend->get_ajax_country_list($limit,$start,$search,$order,$dir,"total_record_count");
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->country_model_backend->get_ajax_country_list($limit,$start,$search,$order,$dir,"total_records");
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->country_model_backend->get_ajax_country_list($limit,$start,$search,$order,$dir,"record_search");
            $totalFiltered = $this->country_model_backend->get_ajax_country_list($limit,$start,$search,$order,$dir,"search_record_count");
        }

        $data = array();
        if($result_set->num_rows()>0)
        {
			$i = $start+1;
            foreach ($result_set->result() as $return_rows)
            {
				$edit = "";
				$condition1 = "";
				$condition2 = "";
				$condition3 = "";
				$prev = $this->data['prev'];
				$edit = "<a class='btn btn-success' href='".base_url()."admin/country/add_country/".$return_rows->id."'>Edit</a>";
				$delete = '<a class="btn btn-danger" onclick="return confirm(\'Once deleted cant be recover again...\')" href="'.base_url().'/admin/country/delete_country/'.$return_rows->id.'">Delete</a>';
				
				
				/* $condition1 = $return_rows->status=='1'?'success':'danger';
				$condition2 = $return_rows->status=='1'?0:1;
				$condition3 = $return_rows->status=="1"?"Active":"Inactive";
				$status = "<a class='btn btn-".$condition1."' href='".base_url()."admin/country/change_status/".$return_rows->id."/".$condition2."'>".$condition3."</a>";  */
							 
                $nestedData['id'] = $i;
                $nestedData['name'] = $return_rows->name;
                #$nestedData['status'] = $status; 
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
  
	public function display_country_list()
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Display Country List";
			$this->load->view('admin/country/display_country_list',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}	

  

}
