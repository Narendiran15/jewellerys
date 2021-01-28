<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fileuploads extends MY_Controller {
		 
	function __construct(){
        parent::__construct();
		$this->load->helper(array('cookie','date','form','email'));
		$this->load->library(array('encrypt','form_validation','session'));		
		$this->load->model('common_model_backend');
	    
		
    }	
	public function display_fileuploads()
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Files Uploads";
			$this->data['filesuploads']=$this->common_model_backend->get_all_details(FILESUPLOADS,array());
			$this->load->view('admin/fileuploads/fileuploads',$this->data);
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
					$config['allowed_types'] = 'jpg|jpeg|gif|png|pdf|doc|docx|xls|xlsx';
					#$config['max_size'] = 2000;
					$config['upload_path'] = './images/site/fileuploads';
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
					$this->common_model_backend->simple_insert(FILESUPLOADS,array('file_name'=>$imgDetailsd['file_name']));
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
			$this->common_model_backend->commonDelete(FILESUPLOADS,array('id'=>$fname));
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