<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advertisings extends MY_Controller {
		 
	function __construct(){
        parent::__construct();
		$this->load->helper(array('cookie','date','form','email'));
		$this->load->library(array('encrypt','form_validation','session'));		
		$this->load->model('common_model_backend');
		$this->load->model('mail_model');
		
    }
	public function add_advertisings($id='')
	{
		if($this->checkLogin('A')!='')
		{   
			$this->data["company_list"]=$this->common_model_backend->get_all_details(COMPANY,array("status"=>"active"),array("field"=>"name","type"=>"asc"));
			if($id=='')
			{
			$this->data['heading']="Add Advertisings List";			
			$this->load->view('admin/advertising/add_advertisings',$this->data);
			}
			else
			{
			$this->data['heading']="Edit Advertisings List ";
			$this->data['service']=$this->common_model_backend->get_all_details(ADVERTISING,array('id'=>$id))->row();
			$this->load->view('admin/advertising/add_advertisings',$this->data);
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
            $url=$_POST['ret']==""?"active":$_POST['ret'];
			unset($_POST['s2id_autogen2']);
			unset($_POST['ret']);
			

			if($id=='')
			{ 
		     
			 $check_ex=$this->common_model_backend->get_all_details(ADVERTISING,array('company_id'=>$_POST['company_id']));
			 if($check_ex->num_rows()==0){
			  
			 $config['overwrite'] = FALSE;
						$config['allowed_types'] = 'jpg|jpeg|gif|png';
						$config['upload_path'] = './images/site/files';
						$config['remove_spaces'] = TRUE;
                        $config['encrypt_name'] = TRUE;
						$this->load->library('upload', $config);
						if ( $this->upload->do_upload('logo')){
							$imgDetailsd = $this->upload->data();
							$logo = $imgDetailsd['file_name'];
							$ret['status']=1;
							$this->landing_model->update_details(COMPANY,array("logo"=>$logo,"updated_at"=>time()),array("id"=>$_POST["company_id"]));
							$this->createThumbnail($logo,250,150,"./images/site/files","./images/site/files/thumb/");
							$_POST["logo"]=$logo;
							
						}
			 
			 unset($_POST["type"]);	
			 $_POST["created_at"]=time();
			 $_POST["updated_at"]=time();
			 $this->common_model_backend->simple_insert(ADVERTISING,$_POST);
			 $this->session->set_flashdata('alert_message', 'Successfully created');
		     $this->session->set_flashdata('error_type', 'success');
			 redirect(base_url().'admin/advertisings/display_advertisings_list/'.$url);
			 }
			 else
			 {
				 $this->session->set_flashdata('alert_message', 'Already exist.');
		         $this->session->set_flashdata('error_type', 'error'); 
				 redirect(base_url().'admin/advertisings/display_advertisings_list/'.$url);
			 }
			
			}
			else
			{
				
			 
			 
			 $check_ex=$this->common_model_backend->get_all_details(ADVERTISING,array('company_id'=>$_POST['company_id'],'id!='=>$id)); 
			 if($check_ex->num_rows()==0){
			 unset($_POST["type"]);	
			  
			  $config['overwrite'] = FALSE;
						$config['allowed_types'] = 'jpg|jpeg|gif|png';
						$config['upload_path'] = './images/site/files';
						$config['remove_spaces'] = TRUE;
                        $config['encrypt_name'] = TRUE;
						$this->load->library('upload', $config);
						if ( $this->upload->do_upload('logo')){
							$imgDetailsd = $this->upload->data();
							$logo = $imgDetailsd['file_name'];
							$ret['status']=1;
							$this->landing_model->update_details(COMPANY,array("logo"=>$logo,"updated_at"=>time()),array("id"=>$_POST["company_id"]));
							$check_img=$this->landing_model->get_all_details(ADVERTISING,array("company_id"=>$_POST["company_id"]));
							//echo $this->db->last_query();die;
							if($check_img->num_rows()>0){
								$this->landing_model->update_details(ADVERTISING,array("logo"=>$logo),array("id"=>$check_img->row()->id));
								//echo $this->db->last_query();die;
								$this->createThumbnail($logo,250,150,"./images/site/files","./images/site/files/thumb/");
							}
							
						}
			  
			  $_POST["updated_at"]=time();
			 $this->common_model_backend->update_details(ADVERTISING,$_POST,array('id'=>$id));
			 $this->session->set_flashdata('alert_message', 'Successfully updated');
		     $this->session->set_flashdata('error_type', 'success');
			 redirect(base_url().'admin/advertisings/display_advertisings_list/'.$url);
			 }
			 else
			 {
				 $this->session->set_flashdata('alert_message', 'Already exist.');
		         $this->session->set_flashdata('error_type', 'error'); 
				redirect(base_url().'admin/advertisings/display_advertisings_list/'.$url);
			 }
			}
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
    public function delete_advertisings($id)
	{
		if($this->checkLogin('A')!='')
		{   
			
			$ret=$_GET['type']==""?"active":$_GET['type'];
			if($ret=="terminate"){
				$this->data['user']=$this->common_model_backend->commonDelete(ADVERTISING,array('id'=>$id));
			    $this->session->set_flashdata('alert_message', 'Successfully Deleted');
		        $this->session->set_flashdata('error_type', 'success');
			    redirect(base_url().'admin/advertisings/display_advertisings_list/'.$ret);
			}
			else{
			$this->data['user']=$this->common_model_backend->update_details(ADVERTISING,array("status"=>"terminate"),array('id'=>$id));
			$this->session->set_flashdata('alert_message', 'Successfully Deleted');
		    $this->session->set_flashdata('error_type', 'success');
			redirect(base_url().'admin/advertisings/display_advertisings_list/'.$ret);
			}
			
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	public function change_status($id)
	{
		if($this->checkLogin('A')!='')
		{   
			
			$ret=$_GET['type']==""?"hold":$_GET['type'];
			if($ret=="hold"){
				$this->data['user']=$this->common_model_backend->update_details(ADVERTISING,array("status"=>"pending"),array('id'=>$id));
			}
			else if($ret=="pending"){
				$adv=$this->common_model_backend->get_all_details(ADVERTISING,array('id'=>$id))->row();
				$company=$this->common_model_backend->get_all_details(COMPANY,array('id'=>$adv->company_id))->row();
				$adv_array=array("company_name"=>get_company_name($adv->company_id));
				//$this->mail_model->send_advertisinguser_mail($company->email,$adv_array);
				
				$this->data['user']=$this->common_model_backend->update_details(ADVERTISING,array("status"=>"active"),array('id'=>$id));
			}
			
			
			$this->session->set_flashdata('alert_message', 'Successfully updated');
		    $this->session->set_flashdata('error_type', 'success');
			redirect(base_url().'admin/advertisings/display_advertisings_list/'.$ret);
			
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	
	
  

	/*Ajax Based Users List Controller Function*/
	public function display_public($type)
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
		 $dir = $this->input->post('order')[0]['dir'];	
		if($order=="update" || $order=="id")
		{
			$order="n.id";
			$dir="desc";
		}
       	
        $totalData = $totalFiltered = $this->common_model_backend->get_ajax_advertising_list($limit,$start,$search,$order,$dir,"total_record_count",$type);
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->common_model_backend->get_ajax_advertising_list($limit,$start,$search,$order,$dir,"total_records",$type);
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->common_model_backend->get_ajax_advertising_list($limit,$start,$search,$order,$dir,"record_search",$type);
            $totalFiltered = $this->common_model_backend->get_ajax_advertising_list($limit,$start,$search,$order,$dir,"search_record_count",$type);
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
				if($prev==1 || (!empty($Service) && in_array('2',$Service))){
					$edit = "<a class='btn btn-success' href='".base_url()."admin/advertisings/add_advertisings/".$return_rows->id."?type=$type'>Edit</a>";
				}
				if($prev==1 || (!empty($Service) && in_array('3',$Service))){
					$delete = '<a class="btn btn-danger" onclick="return confirm(\'Once deleted cant be recover again...\')" href="'.base_url().'/admin/advertisings/delete_advertisings/'.$return_rows->id.'?type='.$type.'">Delete</a>';
				}
				
				/* $condition1 = $return_rows->active=='1'?'success':'danger';
				$condition2 = $return_rows->active=='1'?0:1;
				$condition3 = $return_rows->active=="1"?"Active":"Inactive";
				$status = "<a class='btn btn-".$condition1."' href='".base_url()."admin/service/change_status/".$return_rows->id."/".$condition2."'>".$condition3."</a>";  */
				$status="";
				if($type=="hold"){
					$approved="Approved";
				}
				if($type=="pending"){
					$approved="Paid";
				}
				if($type=="hold" || $type=="pending"){
				$status = "<a class='btn btn-primary' href='".base_url()."admin/advertisings/change_status/".$return_rows->id."?type=".$type."'>".$approved."</a>";
				}
							 
                $nestedData['id'] = $i;
                $nestedData['company_name'] = $return_rows->company_name;
                $nestedData['logo'] = $return_rows->logo;
                $nestedData['link'] = $return_rows->link;
                $nestedData['update'] = "<div class='hidden-sm hidden-xs action-buttons'>".$edit.$status.$delete."</div>";
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
  
	public function display_advertisings_list($type)
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['type']=$type;
			$this->data['heading']="Display Advertisings List";
			$this->load->view('admin/advertising/display_advertisings_list',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
		

  

}
