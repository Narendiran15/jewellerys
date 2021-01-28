<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fees extends MY_Controller {
		 
	function __construct(){
        parent::__construct();
		$this->load->helper(array('cookie','date','form','email'));
		$this->load->library(array('encrypt','form_validation','session'));		
		$this->load->model('common_model_backend');
		if($this->check_prev('Fees',0)==FALSE)
		{
			redirect(base_url('admin'));
		}
    }
	
	
	
	 public function edit_fees()
	{
		if($this->checkLogin('A')!='')
		{   
			$this->data['heading']="Edit Fees";
			$this->data['service']=$this->common_model_backend->get_all_details(FEES,array("id"=>"1"))->row();
			$this->load->view('admin/fees/edit_fees',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}	
   
	 public function edit_insert_fees()
	{
		if($this->checkLogin('A')!='')
		{   
			
			if($_POST["featured_member_discount"]==0){
				$_POST["featured_discount"]=0;
			}
			else{
				$_POST["featured_discount"]=1;
			}
			
			if($_POST["top_listed_member_discount"]==0){
				$_POST["top_listed_discount"]=0;
			}
			else{
				$_POST["top_listed_discount"]=1;
			}
			$this->common_model_backend->update_details(FEES,$_POST,array("id"=>"1"));
			redirect(base_url().'admin/fees/edit_fees');
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}	
   
	
	 public function edit_fees_text($id="1")
	{
		if($this->checkLogin('A')!='')
		{   
			$this->data['heading']="Edit Fees";
			$this->data['service']=$this->common_model_backend->get_all_details(FEES,array("id"=>"1"))->row();
			$this->load->view('admin/fees/edit_text',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}	
   
	 public function edit_insert_fees_text()
	{
		if($this->checkLogin('A')!='')
		{ 
			$this->common_model_backend->update_details(FEES,$_POST,array("id"=>"1"));
			redirect(base_url().'admin/fees/edit_fees_text/1');
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}	
   
	
	 
    
   

}
