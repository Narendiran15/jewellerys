<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Summits extends MY_Controller {
		 
	function __construct(){
        parent::__construct();
		$this->load->helper(array('cookie','date','form','email'));
		$this->load->library(array('encrypt','form_validation','session'));		
		$this->load->model('common_model_backend');
		if($this->check_prev('Summits',0)==FALSE)
		{
			redirect(base_url('admin'));
		}
    }
	public function display_summits_list()
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Summits List";
			$this->load->view('admin/summits/display_summits_list',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}

    public function view_assign($summit_id)
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['summit_id']=$summit_id;
			$this->data['heading']="Summits Users List";
			$this->load->view('admin/summits/view_assign',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}

    public function add_summits($id='')
	{
		if($this->checkLogin('A')!='')
		{   
			if($id=='')
			{
			$this->data['heading']="Add Summits";	
			$this->load->view('admin/summits/add_summits',$this->data);			
			}
			else
			{
			$this->data['heading']="Edit Summits";
			$this->data['service']=$this->common_model_backend->get_all_details(SUMMITS,array('id'=>$id))->row();
			$this->load->view('admin/summits/add_summits',$this->data);			
			}
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
    
    public function assign_summits($id='')
	{
		if($this->checkLogin('A')!='')
		{   
			$this->data["company_list"]=$this->common_model_backend->get_all_details(COMPANY,array("status"=>"active"),array("type"=>"desc","field"=>"id"));
			$this->data["summits_list"]=$this->common_model_backend->get_all_details(SUMMITS,array("status"=>"1"),array("type"=>"desc","field"=>"id"));
			if($id=='')
			{
			$this->data['heading']="Assign Summits";	
			$this->load->view('admin/summits/assign_summits',$this->data);			
			}
			else
			{
			$this->data['heading']="Edit Assign Summits";
			$this->data['service']=$this->common_model_backend->get_all_details(ASSIGN_SUMMITS,array('id'=>$id))->row();
			$this->load->view('admin/summits/assign_summits',$this->data);			
			}
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
    	

	public function save_summits()
	{
		$ret=array();
		if($this->checkLogin('A')!='')
		{ 
			$id=$_POST["id"];
			if($id=='')
			{
			 $check=$this->common_model_backend->get_all_details(ASSIGN_SUMMITS,array("company_id"=>$_POST["company_id"],"summit_id"=>$_POST["summit_id"]));
			 if($check->num_rows()==0){
			   $this->common_model_backend->simple_insert(ASSIGN_SUMMITS,$_POST);
			   $ret["status"]=1;
			   $ret["conf_id"]=$this->common_model_backend->get_last_insert_id();
			   $ret["message"]="Successfully summit assigned.";
			 }
			 else{
				$ret["status"]=0;
			    $ret["message"]="Already summit assigned."; 
			 }	
			
			}
			else
			{
			$check=$this->common_model_backend->get_all_details(ASSIGN_SUMMITS,array("company_id"=>$_POST["company_id"],"summit_id"=>$_POST["summit_id"],"id!="=>$id));
			 if($check->num_rows()==0){
			 $this->common_model_backend->update_details(ASSIGN_SUMMITS,$_POST,array('id'=>$id));
			   $ret["status"]=1;
			   $ret["message"]="Successfully summit assign updated.";
			   $ret["conf_id"]=$_POST["summit_id"];
			 }
			 else{
				$ret["status"]=0;
			    $ret["message"]="Already summit assigned."; 
			 }
			}
		}
		else
		{
			$ret["status"]=2;
			$ret["message"]="Session out.. login again..."; 
		}
		echo json_encode($ret); 		
	}

 
	public function add_edit_insert($id='')
	{
		if($this->checkLogin('A')!='')
		{  

			
			$config['overwrite'] = FALSE;
	    	$config['allowed_types'] = 'jpg|jpeg|gif|png';
		    $config['max_size'] = 2000;
		    $config['upload_path'] = './images/site/summits';
		    $this->load->library('upload', $config);
			if ( $this->upload->do_upload('img')){
		    	$imgDetails = $this->upload->data();
		    	$_POST['img'] = $imgDetails['file_name'];
			}
			$_POST["description"]=htmlentities($_POST["description"]);	
			if($id=='')
			{
			 $check=$this->common_model_backend->get_all_details(SUMMITS,array("name"=>$_POST["name"],"start_date"=>$_POST["start_date"],"end_date"=>$_POST["end_date"]));
			 if($check->num_rows()==0){
			 $this->common_model_backend->simple_insert(SUMMITS,$_POST);
			 $this->session->set_flashdata('alert_message', 'Successfully created');
		     $this->session->set_flashdata('error_type', 'success');
			 redirect(base_url().'admin/summits/display_summits_list');
			 }
			 else{
				$this->session->set_flashdata('alert_message', 'Already Exist');
		     $this->session->set_flashdata('error_type', 'error');
			 redirect(base_url().'admin/summits/display_summits_list'); 
			 }	
			
			}
			else
			{
			$check=$this->common_model_backend->get_all_details(SUMMITS,array("name"=>$_POST["name"],"start_date"=>$_POST["start_date"],"end_date"=>$_POST["end_date"],"id!="=>$id));
			 if($check->num_rows()==0){
			 $this->common_model_backend->update_details(SUMMITS,$_POST,array('id'=>$id));
			 $this->session->set_flashdata('alert_message', 'Successfully updated');
		     $this->session->set_flashdata('error_type', 'success');
			 redirect(base_url().'admin/summits/display_summits_list');
			 }
			 else{
				$this->session->set_flashdata('alert_message', 'Already Exist');
		     $this->session->set_flashdata('error_type', 'error');
			 redirect(base_url().'admin/summits/display_summits_list'); 
			 }
			}
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}

    public function display_summits()
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
        $totalData = $totalFiltered = $this->common_model_backend->get_ajax_summits_list($limit,$start,$search,$order,$dir,"total_record_count");
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->common_model_backend->get_ajax_summits_list($limit,$start,$search,$order,$dir,"total_records");
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->common_model_backend->get_ajax_summits_list($limit,$start,$search,$order,$dir,"record_search");
            $totalFiltered = $this->common_model_backend->get_ajax_summits_list($limit,$start,$search,$order,$dir,"search_record_count");
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
				
				$condition1 = $return_rows->status=='1'?'success':'danger';
				$condition2 = $return_rows->status=='1'?0:1;
				$condition3 = $return_rows->status=="1"?"Active":"Inactive";
				$status = "<a class='btn btn-".$condition1."' href='".base_url()."admin/summits/change_status/".$return_rows->id."/".$condition2."'>".$condition3."</a>";
				
				$prev = $this->data['prev'];
				if($prev==1 || (!empty($Summits) && in_array('2',$Summits))){
					$edit = "<a class='btn btn-success' href='".base_url()."admin/summits/add_summits/".$return_rows->id."'>Edit</a>";
				}
				
					
				
				if($prev==1 || (!empty($Summits) && in_array('3',$Summits))){
					$delete = '<a class="btn btn-danger" onclick="return confirm(\'Once deleted cant be recover again...\')" href="'.base_url().'admin/summits/delete_summits/'.$return_rows->id.'">Delete</a>';
				}
				else
				{
					$edit = '-';
					$delete = '-';
				}
				$view = "<a class='btn btn-success' href='".base_url()."admin/summits/view_assign/".$return_rows->id."'>View Assigned</a>";
				$nestedData['id'] = $i;
                $nestedData['name'] =$return_rows->name;
                $nestedData['venue'] = $return_rows->venue;
                $nestedData['start_date'] = $return_rows->start_date;
                $nestedData['end_date'] = $return_rows->end_date;
                $nestedData['status'] = $status;
                $nestedData['update'] = "<div class='hidden-sm hidden-xs action-buttons'>".$edit.$delete.$view."</div>";
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
	
    public function display_Assignsummits($summit_id='')
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
        $totalData = $totalFiltered = $this->common_model_backend->get_ajax_Assignsummits_list($limit,$start,$search,$order,$dir,"total_record_count",$summit_id);
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->common_model_backend->get_ajax_Assignsummits_list($limit,$start,$search,$order,$dir,"total_records",$summit_id);
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->common_model_backend->get_ajax_Assignsummits_list($limit,$start,$search,$order,$dir,"record_search",$summit_id);
            $totalFiltered = $this->common_model_backend->get_ajax_Assignsummits_list($limit,$start,$search,$order,$dir,"search_record_count",$summit_id);
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
				if($prev==1 || (!empty($Summits) && in_array('2',$Summits))){
					$edit = "<a class='btn btn-success' href='".base_url()."admin/summits/assign_summits/".$return_rows->id."'>Edit</a>";
				}
				
					
				
				if($prev==1 || (!empty($Summits) && in_array('3',$Summits))){
					$delete = '<a class="btn btn-danger" onclick="return confirm(\'Once deleted cant be recover again...\')" href="'.base_url().'admin/summits/delete_assign_summits/'.$return_rows->id.'">Delete</a>';
				}
				else
				{
					$edit = '-';
					$delete = '-';
				}
				$nestedData['id'] = $i;
                $nestedData['company_name'] =$return_rows->company_name;
                $nestedData['summit_name'] = $return_rows->summit_name;
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
	public function change_status($id,$status)
	{ 
		
		$this->common_model_backend->update_details(SUMMITS,array('status'=>$status),array('id'=>$id));			 
		$this->session->set_flashdata('alert_message', 'Successfully status changed.');
		$this->session->set_flashdata('error_type', 'success');
		redirect(base_url().'admin/summits/display_summits_list');

	}
	public function delete_summits($id)
	{
		
		if($this->checkLogin('A')!="")
		{
			$post=$this->input->post();
			$this->common_model_backend->commonDelete(SUMMITS,array('id'=>$id));
				$ret['status']=1;
				$ret['message']='Deleted successfully...';
			
		}
		else
		{
			$ret['status']=0;
				$ret['message']="You dont't have permission";
		}
		redirect(base_url().'admin/summits/display_summits_list');
	}
	
	public function display_summits_gallery()
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Display Summits Gallery";
			$this->data['filesuploads']=$this->common_model_backend->get_all_details(GALLERY,array());
			$this->load->view('admin/summits/fileuploads',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}	
   
  
	public function image_uploads()
	{  
		if($this->checkLogin('A')!="")
		{
		    if($_FILES)
			{  
                $dataarray_full=array();		       
				$id=$this->checkLogin("A");
				
					
				$this->load->library('upload'); 
				$number_of_files_uploaded = count($_FILES['photo']['name']);
				$imgerror=0;
				$error=array();
				for ($i = 0; $i < $number_of_files_uploaded; $i++) {
				  $_FILES['image_new']['name']     = $_FILES['photo']['name'][$i];
				  $_FILES['image_new']['type']     = $_FILES['photo']['type'][$i];
				  $_FILES['image_new']['tmp_name'] = $_FILES['photo']['tmp_name'][$i];
				  $_FILES['image_new']['error']    = $_FILES['photo']['error'][$i];
				  $_FILES['image_new']['size']     = $_FILES['photo']['size'][$i];
					$config['overwrite'] = FALSE;
					$config['remove_spaces'] = TRUE;
					$config['allowed_types'] = 'jpg|jpeg|gif|png';
					#$config['max_size'] = 2000;
					$config['upload_path'] = './images/site/summits';
					$this->upload->initialize($config);
				  if ( ! $this->upload->do_upload("image_new")) {
					$error[] = $_FILES['image_new']['name'].' '.strip_tags($this->upload->display_errors());
				  $imgerror++; 
				  $dataarray_full[] = "error";
				  
				  }
				  else {
					$imgDetailsd = $this->upload->data();
					#echo '<pre>'; print_r($imgDetailsd);
					//$ar=array("image_width"=>$imgDetailsd['image_width'],"image_height"=>$imgDetailsd['image_height'],"image_name"=>"./images/site/fileuploads/".$imgDetailsd['file_name'],"image_dest"=>"./images/site/fileuploads/".$imgDetailsd['file_name']);
					//$this->resize_imageby_siva($ar,1920,418);
					/* $config['image_library'] = 'gd2';
					$config['source_image'] = "./images/site/banners/".$imgDetailsd['file_name'];
					$config['create_thumb'] = FALSE;
					$config['maintain_ratio'] = true;
					$config['width']         = 1920;
					$config['height']       = 418;
					$this->load->library('image_lib', $config);

					$this->image_lib->crop(); */
					
					$dataarray_full[] = $imgDetailsd['file_name'];
					$this->createThumbnail($imgDetailsd['file_name'] ,250,175,"./images/site/summits","./images/site/summits/thumb/");
					$this->common_model_backend->simple_insert(GALLERY,array('file_name'=>$imgDetailsd['file_name']));
				  }					
				}
				$error=array_values(array_filter($error));
				
				if(!empty($error)){
					$ret['status']=2;
					$ret['message']=implode(",",$error);
					#$ret['img']=array_reverse($dataarray_full);
					$ret['img']=($dataarray_full);
				}
				else{
					$ret['status']=1;
					$ret['message']='file uploaded successfully...';
					#$ret['img']=array_reverse($dataarray_full);
					$ret['img']=($dataarray_full);
		        }
				
				
								
				
			}
			
		}
		else
		{
			$ret['status']=0;
			$ret['message']="You dont't have permission";
		}
		echo json_encode($ret);		
	} 
	
	public function delete_fileuploads_img()
	{
		
		if($this->checkLogin('A')!="")
		{
			$post=$this->input->post();
			$fname=$post['fname'];
			$id=$this->checkLogin("A");
			$this->common_model_backend->commonDelete(GALLERY,array('id'=>$fname));
				$ret['status']=1;
				$ret['message']='Deleted successfully...';
			
		}
		else
		{
			$ret['status']=0;
				$ret['message']="You dont't have permission";
		}
		echo json_encode($ret);
	}
	
	
	
  

}
