<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upgrade extends MY_Controller {
		 
	function __construct(){
        parent::__construct();
		$this->load->helper(array('cookie','date','form','email','url'));
		$this->load->library(array('encrypt','form_validation','session'));		
		$this->load->model('common_model_backend');
		
    }
	public function update_office_service()
	{
		if($this->checkLogin('A')!='')
		{   
			$get_all_offices=$this->common_model_backend->get_all_details('office',array());
			foreach($get_all_offices->result() as $office){
				$get_services=$this->common_model_backend->get_all_details('office_service',array("office_id"=>$office->id));
				if($get_services->num_rows()>0){
					$services=array();
					foreach($get_services->result() as $ser){
						$services[]=$ser->service_id;
					}
					
					if(!empty($services)){
						$services=implode(",",$services);
						 $this->common_model_backend->update_details("office",array("services_selected"=>$services),array("id"=>$office->id));
						 echo $this->db->last_query();
					}
				}
			}
			
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}

    public function update_office_json()
	{
		if($this->checkLogin('A')!='')
		{   
			$get_all_offices=$this->common_model_backend->get_all_details('office',array());
			foreach($get_all_offices->result() as $office){
				$get_property=$this->common_model_backend->get_all_details('property',array("object_id"=>$office->id,"class_name"=>"common\models\Office"));
				if($get_property->num_rows()>0){
					
					foreach($get_property->result() as $pro){
						if($pro->name=="profile"){
							$this->common_model_backend->update_details("office",array("profile"=>$pro->value),array("id"=>$office->id));
						}
						else if($pro->name=="address"){
							$this->common_model_backend->update_details("office",array("address"=>$pro->value),array("id"=>$office->id));
						}
						echo $this->db->last_query().'<br/>';
					}
					
					
				}
			}
			
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}

    public function update_company_json()
	{
		if($this->checkLogin('A')!='')
		{   
			$get_all_comps=$this->common_model_backend->get_all_details('company',array());
			foreach($get_all_comps->result() as $comp){
				$get_property=$this->common_model_backend->get_all_details('property',array("object_id"=>$comp->id,"class_name"=>"common\models\Company"));
				if($get_property->num_rows()>0){
					
					foreach($get_property->result() as $pro){
						if($pro->name=="profile"){
							$this->common_model_backend->update_details("company",array("profile"=>$pro->value),array("id"=>$comp->id));
						}
						else if($pro->name=="address"){
							$this->common_model_backend->update_details("company",array("address"=>$pro->value),array("id"=>$comp->id));
						}
						else if($pro->name=="data"){
							$this->common_model_backend->update_details("company",array("data"=>$pro->value),array("id"=>$comp->id));
						}
						echo $this->db->last_query().'<br/>';
					}
					
					
				}
			}
			
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}

    public function update_office_contact()
	{
		if($this->checkLogin('A')!='')
		{   
			$get_all_comps=$this->common_model_backend->get_all_details('office_contact',array());
			foreach($get_all_comps->result() as $comp){
				$get_contact=$this->common_model_backend->get_all_details('contact',array("id"=>$comp->contact_id));
				if($get_contact->num_rows()==1){
					
					$get_office=$this->common_model_backend->get_all_details("fc_office",array("id"=>$comp->office_id));
					$comp_id=0;
					if($get_office->num_rows()>0){
						$comp_id=$get_office->row()->company_id;
					}
					if($get_contact->row()->comp_id==0 && $get_contact->row()->office_id==0){
					$this->common_model_backend->update_details("contact",array("position"=>$comp->position,"office_id"=>$comp->office_id,"comp_id"=>$comp_id),array("id"=>$comp->contact_id));	
					}
					else{
						$contact_array=array("contact_name"=>$get_contact->row()->contact_name,"job_title"=>$get_contact->row()->job_title,"email"=>$get_contact->row()->email,"mobile"=>$get_contact->row()->mobile,"skype"=>$get_contact->row()->skype,"position"=>$get_contact->row()->position,"year_exp"=>$get_contact->row()->year_exp,"office_id"=>$comp->office_id,"comp_id"=>$comp_id);
						$this->common_model_backend->simple_insert('contact',$contact_array);
					}	
					echo $this->db->last_query().'<br>';
				}
			}
			
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}

    public function update_company_contact()
	{
		if($this->checkLogin('A')!='')
		{   
			$get_all_comps=$this->common_model_backend->get_all_details('company_contact',array());
			foreach($get_all_comps->result() as $comp){
				$get_contact=$this->common_model_backend->get_all_details('contact',array("id"=>$comp->contact_id));
				if($get_contact->num_rows()==1){
					
					if($get_contact->row()->comp_id==0 && $get_contact->row()->office_id==0){
					    $this->common_model_backend->update_details("contact",array("position"=>$comp->position,"year_exp"=>$comp->year_exp,"comp_id"=>$comp->company_id,"office_id"=>"0"),array("id"=>$comp->contact_id));
					}
					else{
						$contact_array=array("contact_name"=>$get_contact->row()->contact_name,"job_title"=>$get_contact->row()->job_title,"email"=>$get_contact->row()->email,"mobile"=>$get_contact->row()->mobile,"skype"=>$get_contact->row()->skype,"position"=>$get_contact->row()->position,"year_exp"=>$get_contact->row()->year_exp,"comp_id"=>$comp->company_id,"office_id"=>"0");
						$this->common_model_backend->simple_insert('contact',$contact_array);
					}	
					echo $this->db->last_query().'<br>';
				}
			}
			
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}

    public function update_company_port_subport()
	{
		if($this->checkLogin('A')!='')
		{   
			$get_all_comps=$this->common_model_backend->get_all_details('company',array());
			foreach($get_all_comps->result() as $comp){
				$get_contact=$this->common_model_backend->get_all_details('contact',array("id"=>$comp->contact_id));
				if($get_contact->num_rows()==1){
					
					
					$this->common_model_backend->update_details("contact",array("position"=>$comp->position,"year_exp"=>$comp->year_exp,"comp_id"=>$comp->company_id),array("id"=>$comp->contact_id));			
					echo $this->db->last_query().'<br>';
				}
			}
			
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}

   public function update_username()
	{
		if($this->checkLogin('A')!='')
		{   
			$get_all_comps=$this->common_model_backend->get_all_details('fc_company',array());
			foreach($get_all_comps->result() as $comp){
				
				if($comp->username==""){
					
					
					$this->common_model_backend->update_details("fc_company",array("username"=>$comp->access_code,"password"=>md5($comp->access_code)),array("id"=>$comp->id));			
					echo $this->db->last_query().'<br>';
				}
			}
			
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}

    public function update_email_list()
	{
		if($this->checkLogin('A')!='')
		{   
			$get_all_email=$this->common_model_backend->get_all_details('fc_mailing_group',array());
			foreach($get_all_email->result() as $comp){
				
					
					$mailarray=array();
					if($comp->group_id==1){
						$mailarray["member"]="1";
					}
					else if($comp->group_id==2){
						$mailarray["public"]="1";
					}
					else if($comp->group_id==3){
						$mailarray["reference"]="1";
					}
					else if($comp->group_id==4){
						$mailarray["port_estimates"]="1";
					}
					$this->common_model_backend->update_details("fc_mailing_list",$mailarray,array("id"=>$comp->mailing_id));			
					echo $this->db->last_query().'<br>';
				
			}
			
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}

    
	
	
	
  

}
