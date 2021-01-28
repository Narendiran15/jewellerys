<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banners extends MY_Controller {
		 
	function __construct(){
        parent::__construct();
		$this->load->helper(array('cookie','date','form','email'));
		$this->load->library(array('encrypt','form_validation','session'));		
		$this->load->model('banners_model_backend');
		if($this->check_prev('Banners',0)==FALSE)
		{
			redirect(base_url('admin'));
		}
    }
	public function display_banners_list()
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Banners List";
			$this->data['banners']=$this->banners_model_backend->get_all_details(BANNER,array(""));
			$this->load->view('admin/banners/display_banners_list',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}

    public function add_banner($id='')
	{
		if($this->checkLogin('A')!='')
		{   
			if($id=='')
			{
			$this->data['heading']="Add Banner";	
			$this->load->view('admin/banners/add_banner',$this->data);			
			}
			else
			{
			$this->data['heading']="Edit Banner";
			$this->data['banners']=$this->banners_model_backend->get_all_details(BANNER,array('id'=>$id))->row();
			$this->load->view('admin/banners/add_banner',$this->data);
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

			
			$config['overwrite'] = FALSE;
	    	$config['allowed_types'] = 'jpg|jpeg|gif|png';
		    $config['max_size'] = 2000;
		    $config['upload_path'] = './images/site/banners';
		    $this->load->library('upload', $config);
			if ( $this->upload->do_upload('banner_image')){
		    	$imgDetails = $this->upload->data();
		    	$_POST['banner_image'] = $imgDetails['file_name'];
			}
			$_POST["description"]=htmlentities($_POST["description"]);	
			if($id=='')
			{
			 $check=$this->banners_model_backend->get_all_details(BANNER,array('name'=>$_POST["name"]));
			 if($check->num_rows()==0){
			 $this->banners_model_backend->simple_insert(BANNER,$_POST);
			 $this->session->set_flashdata('alert_message', 'Successfully created');
		     $this->session->set_flashdata('error_type', 'success');
			 redirect(base_url().'admin/banners/display_banners_list');
			 }
			 else
			 {
		     $this->session->set_flashdata('alert_message', 'Already Exist.');
		     $this->session->set_flashdata('error_type', 'error');
			 redirect(base_url().'admin/banners/display_banners_list');
			 }				 
			
			}
			else
			{
			 $check=$this->banners_model_backend->get_all_details(BANNER,array('name'=>$_POST["name"],'id!='=>$id));
			 if($check->num_rows()==0){
			 $this->banners_model_backend->update_details(BANNER,$_POST,array('id'=>$id));
			 $this->session->set_flashdata('alert_message', 'Successfully updated');
		     $this->session->set_flashdata('error_type', 'success');
			 redirect(base_url().'admin/banners/display_banners_list');
			 }
			 else
			 {
		     $this->session->set_flashdata('alert_message', 'Already Exist.');
		     $this->session->set_flashdata('error_type', 'error');
			 redirect(base_url().'admin/banners/display_banners_list');
			 }	
			}
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}

    public function display_banners()
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
        $totalData = $totalFiltered = $this->banners_model_backend->get_ajax_banners_list($limit,$start,$search,$order,$dir,"total_record_count");
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->banners_model_backend->get_ajax_banners_list($limit,$start,$search,$order,$dir,"total_records");
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->banners_model_backend->get_ajax_banners_list($limit,$start,$search,$order,$dir,"record_search");
            $totalFiltered = $this->banners_model_backend->get_ajax_banners_list($limit,$start,$search,$order,$dir,"search_record_count");
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
					$edit = "<a class='btn btn-success' href='".base_url()."/admin/banners/add_banner/".$return_rows->id."'>Edit</a>";
				}
				if($prev==1 || (!empty($Users) && in_array('3',$Users))){
					$delete = '<a class="btn btn-danger" onclick="return confirm(\'Once deleted cant be recover again...\')" href="'.base_url().'/admin/banners/delete_banner_img/'.$return_rows->id.'">Delete</a>';
				}
				else
				{
					$edit = '-';
					$delete = '-';
				}
				$nestedData['id'] = $i;
                $nestedData['name'] = $return_rows->name;
                $nestedData['banner_image'] = '<img src="'.base_url().'images/site/banners/'.$return_rows->banner_image.'" width="100" height="100"/>';
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
	
	public function delete_banner_img($id)
	{
		
		if($this->checkLogin('A')!="")
		{
			$post=$this->input->post();
			$this->banners_model_backend->commonDelete(BANNER,array('id'=>$id));
				$ret['status']=1;
				$ret['message']='Deleted successfully...';
			
		}
		else
		{
			$ret['status']=0;
				$ret['message']="You dont't have permission";
		}
		redirect(base_url().'admin/banners/display_banners_list');
	}
	
	
	
  

}
