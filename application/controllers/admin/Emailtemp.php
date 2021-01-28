<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emailtemp extends MY_Controller {
		 
	function __construct(){
        parent::__construct();
		$this->load->helper(array('cookie','date','form','email'));
		$this->load->library(array('encrypt','form_validation','session'));		
		$this->load->model('cms_model');
		$this->load->model('emailtemp_model');
		if($this->check_prev('Email',0)==FALSE)
		{
			redirect(base_url('admin'));
		}
    }
	
	
   public function display_email_list()
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Display Email Template List";
			$this->load->view('admin/email/display_email_list',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}	
	
	/* Email Function */
  	public function display_email()
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
        $totalData = $totalFiltered = $this->emailtemp_model->databale($limit,$start,$search,$order,$dir,"total_record_count");
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->emailtemp_model->databale($limit,$start,$search,$order,$dir,"total_records");
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->emailtemp_model->databale($limit,$start,$search,$order,$dir,"record_search");
            $totalFiltered = $this->emailtemp_model->databale($limit,$start,$search,$order,$dir,"search_record_count");
        }

        $data = array();
        if($result_set->num_rows()>0)
        {
			$i = $start+1;
            foreach ($result_set->result() as $retun_rows)
            {
				$edit = "";
				$delete = "";
				$prev = $this->data['prev'];
				if($prev==1 || (!empty($Email) && in_array('2',$Email))){
					$edit = "<a class='btn btn-success' href='".base_url()."admin/emailtemp/add_email/".$retun_rows->id."'>
								Edit
							</a>";
				}
				if($retun_rows->id!="22" && $retun_rows->id!="23" && $retun_rows->id!="24" ){
					$delete = '<a class="btn btn-danger" onclick="return confirm(\'Once deleted cant be recover again...\')"  href="'.base_url().'admin/emailtemp/delete_email/'.$retun_rows->id.'">
								Delete
							</a>';
				}
                $nestedData['id'] = $i;
                $nestedData['title'] = $retun_rows->title;
                $nestedData['subject'] = $retun_rows->subject;
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
	
	public function delete_email($id)
	{
		if($this->checkLogin('A')!='')
		{   
			
			$this->data['user']=$this->cms_model->commonDelete(EMAIL,array('id'=>$id));
			$this->session->set_flashdata('alert_message', 'Successfully Deleted');
		    $this->session->set_flashdata('error_type', 'success');
			redirect(base_url().'admin/emailtemp/display_email_list');
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	
	 

	public function add_email($id='')
	{
		if($this->checkLogin('A')!='')
		{   
			if($id=='')
			{
			$this->data['heading']="Add Email Template";			
			$this->load->view('admin/email/add_email',$this->data);
			}
			else
			{
			$this->data['heading']="Edit cms page";
			$this->data['service']=$this->cms_model->get_all_details(EMAIL,array('id'=>$id))->row();
			$this->load->view('admin/email/add_email',$this->data);
			}
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
    
	public function add_edit_email_insert($id='')
	{
		if($this->checkLogin('A')!='')
		{  
            if(!is_dir('./email'))
			{
				mkdir('./email',0777);
			}
			
			if($id=='')
			{
			$this->cms_model->simple_insert_html(EMAIL,$_POST);
			$news_content_new = str_replace("{","'.",addslashes($_POST['email_desc']));
			$news_id=$this->db->insert_id();
			$news_descripe = str_replace("}",".'",$news_content_new);
			$config = "<?php \$message .= '";
			$config .= "$news_descripe";
			$config .= "';  ?>";
			$file = 'email/email'.$news_id.'.php';
			file_put_contents($file, $config);
			 $this->session->set_flashdata('alert_message', 'Successfully Email Template created');
		     $this->session->set_flashdata('error_type', 'success');
			 redirect(base_url().'admin/emailtemp/display_email_list');
			
			}
			else
			{
			$this->cms_model->update_details_html(EMAIL,$_POST,array('id'=>$id));
			$news_content_new = str_replace("{","'.",addslashes($_POST['email_desc']));
			$news_id=$id;
			$news_descripe = str_replace("}",".'",$news_content_new);
			$config = "<?php \$message .= '";
			$config .= "$news_descripe";
			$config .= "';  ?>";
			$file = 'email/email'.$news_id.'.php';
			file_put_contents($file, $config);
			 $this->session->set_flashdata('alert_message', 'Successfully Email Template updated');
		     $this->session->set_flashdata('error_type', 'success');
			  redirect(base_url().'admin/emailtemp/display_email_list');
			}
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
    
	public function change_status($id,$status)
	{   
		
		if($status==0)
		{
			$statu="Inactive";
		}
		else
		{
			$statu="Active";
		}
		$this->cms_model->update_details(CMS,array('status'=>$statu),array('id'=>$id));			 
		$this->session->set_flashdata('alert_message', 'Successfully status changed.');
		$this->session->set_flashdata('error_type', 'success');
		redirect(base_url().'admin/cms/display_cms_list');

	}
   
	

}
