<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends MY_Controller {
		 
	function __construct(){
        parent::__construct();
		$this->load->helper(array('cookie','date','form','email'));
		$this->load->library(array('form_validation','session'));		
		$this->load->model('cms_model');
		
    }
	
	

   public function page($value)
	{
			$this->data['content1']=$this->cms_model->get_all_details(CMS,array('url'=>$value));
			$this->data['application_fee']=0;
			$this->data['branch']=0;
			$this->data['additional_person']=0;
			
			if($this->data['content1']->num_rows()>0)
			{
					 if($this->uri->segment(2)=="join"){
						$get_fee=$this->cms_model->get_all_details(FEES,array("id"=>"1"))->row();
						$this->data['application_fee']=$get_fee->application_fee;
						$this->data['branch']=$get_fee->branch;
						$this->data['additional_person']=$get_fee->additional_person;
						
					}
			
			$this->data['heading']=ucfirst($this->data['content1']->row()->url);			
			$this->load->view('site/cms/content',$this->data);
			}
			else
			{
				redirect();
			}
		
	}	
  
	
  
	

	

}
