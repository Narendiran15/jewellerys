<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ini_set('max_execution_time', 0);
class Reference_cron extends MY_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper(array('cookie','date','form','email'));
		$this->load->library(array('encrypt','form_validation'));		
		$this->load->model('landing_model');
		$this->load->model('mail_model');
		$this->load->helper('user'); 
    }
	
	
	function index(){
		$cron = $this->landing_model->get_all_details('fc_cron_tab',array("status"=>"0"));
		if($cron->num_rows()>0)
		foreach($cron->result() as $cronls){
			$company_id = $cronls->company_id;
			$company_inf=$this->landing_model->get_all_details(COMPANY,array("id"=>$company_id))->row();
			/*reference send emails*/
			  $ref1_company="";
			  $ref1_company_title="";
			  $ref1_email="";
			  $ref2_company="";
			  $ref2_company_title="";
			  $ref2_email="";
			  $ref3_company="";
			  $ref3_company_title="";
			  $ref3_email="";
			  $ref4_company="";
			  $ref4_company_title="";
			  $ref4_email="";
			  $ref5_company="";
			  $ref5_company_title="";
			  $ref5_email="";			  
			 
			  
			if(!empty($company_inf->reference_info)){
			  $data_info=json_decode($company_inf->reference_info,true);
			      $ref1_company=$data_info["ref1"]["company_name"];
			      $ref1_company_title=$data_info["ref1"]["company_title"];
			      $ref1_email=$data_info["ref1"]["email"];
				  $ref2_company=$data_info["ref2"]["company_name"];
			      $ref2_company_title=$data_info["ref2"]["company_title"];
			      $ref2_email=$data_info["ref2"]["email"];
				  $ref3_company=$data_info["ref3"]["company_name"];
			      $ref3_company_title=$data_info["ref3"]["company_title"];
			      $ref3_email=$data_info["ref3"]["email"];
				  $ref4_company=$data_info["ref4"]["company_name"];
			      $ref4_company_title=$data_info["ref4"]["company_title"];
			      $ref4_email=$data_info["ref4"]["email"];
				  $ref5_company=$data_info["ref5"]["company_name"];
			      $ref5_company_title=$data_info["ref5"]["company_title"];
			      $ref5_email=$data_info["ref5"]["email"];
				  
		    }
			
			/*Ref1*/
			if($ref1_email!=""){
				$ref_array=array('ReferenceJobTitle' =>$ref1_company_title,
				'applicant_trade_name' =>$company_inf->trading_name,
				'applicant_country' =>get_country_name($company_inf->country_id),
				'ReferenceName' =>$ref1_company_title,
				'id' =>$company_inf->id,
				'ReferenceCompany' =>$ref1_company,
				'applicant_primaryContactName' =>$company_inf->contact_name,"email"=>$ref1_email);
		        $check=$this->mail_model->send_reference_request($ref_array);
			}
			/*Ref1*/
			/*Ref2*/
			if($ref2_email!=""){
				$ref_array=array('ReferenceJobTitle' =>$ref2_company_title,
				'applicant_trade_name' =>$company_inf->trading_name,
				'applicant_country' =>get_country_name($company_inf->country_id),
				'ReferenceName' =>$ref2_company_title,
				'id' =>$company_inf->id,
				'ReferenceCompany' =>$ref2_company,
				'applicant_primaryContactName' =>$company_inf->contact_name,"email"=>$ref2_email);
		        $check=$this->mail_model->send_reference_request($ref_array);
			}
			/*Ref1*/
			/*Ref1*/
			if($ref3_email!=""){
				$ref_array=array('ReferenceJobTitle' =>$ref3_company_title,
				'applicant_trade_name' =>$company_inf->trading_name,
				'applicant_country' =>get_country_name($company_inf->country_id),
				'ReferenceName' =>$ref3_company_title,
				'id' =>$company_inf->id,
				'ReferenceCompany' =>$ref3_company,
				'applicant_primaryContactName' =>$company_inf->contact_name,"email"=>$ref3_email);
		        $check=$this->mail_model->send_reference_request($ref_array);
			}
			/*Ref1*/
			/*Ref1*/
			if($ref4_email!=""){
				$ref_array=array('ReferenceJobTitle' =>$ref4_company_title,
				'applicant_trade_name' =>$company_inf->trading_name,
				'applicant_country' =>get_country_name($company_inf->country_id),
				'ReferenceName' =>$ref4_company_title,
				'id' =>$company_inf->id,
				'ReferenceCompany' =>$ref4_company,
				'applicant_primaryContactName' =>$company_inf->contact_name,"email"=>$ref4_email);
		        $check=$this->mail_model->send_reference_request($ref_array);
			}
			/*Ref1*/
			/*Ref1*/
			if($ref5_email!=""){
				$ref_array=array('ReferenceJobTitle' =>$ref5_company_title,
				'applicant_trade_name' =>$company_inf->trading_name,
				'applicant_country' =>get_country_name($company_inf->country_id),
				'ReferenceName' =>$ref5_company_title,
				'id' =>$company_inf->id,
				'ReferenceCompany' =>$ref5_company,
				'applicant_primaryContactName' =>$company_inf->contact_name,"email"=>$ref5_email);
		        $check=$this->mail_model->send_reference_request($ref_array);
			}
			/*Ref1*/
			$this->landing_model->commonDelete("fc_cron_tab",array("id"=>$cronls->id));
			echo "cron_completed";
			
		}
		
		
	}
}
	?>