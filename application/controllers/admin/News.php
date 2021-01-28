<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Controller {
		 
	function __construct(){
        parent::__construct();
		$this->load->helper(array('cookie','date','form','email','url'));
		$this->load->library(array('encrypt','form_validation','session'));		
		$this->load->model('common_model_backend');
		if($this->check_prev('News',0)==FALSE)
		{
			redirect(base_url('admin'));
		}
    }
	public function display_news_list()
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="News List";
			$this->load->view('admin/news/display_news_list',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}

    public function display_members_news_list()
 	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Members News List";
			$this->load->view('admin/news/display_members_news_list',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}

    public function display_industry_news_list()
 	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Industry News List";
			$this->load->view('admin/news/display_industry_news_list',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}

    public function add_new($id='')
	{
		if($this->checkLogin('A')!='')
		{   
			if($id=='')
			{
			$this->data['heading']="Add News";	
			$this->load->view('admin/news/add_news',$this->data);			
			}
			else
			{
			$this->data['heading']="Edit News";
			$this->data['news']=$this->common_model_backend->get_all_details(NEWS,array('id'=>$id))->row();
			$this->load->view('admin/news/add_news',$this->data);			
			}
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
    
	public function add_members_news($id='')
	{
		if($this->checkLogin('A')!='')
		{   
			if($id=='')
			{
			$this->data['heading']="Add Members News";	
			$this->load->view('admin/news/add_members_news',$this->data);			
			}
			else
			{
			$this->data['heading']="Edit Members News";
			$this->data['news']=$this->common_model_backend->get_all_details(MEMBER_NEWS,array('id'=>$id))->row();
			$this->load->view('admin/news/add_members_news',$this->data);			
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
		    $config['upload_path'] = './images/site/news';
		    $this->load->library('upload', $config);
			if ( $this->upload->do_upload('img')){
		    	$imgDetails = $this->upload->data();
		    	$_POST['img'] = $imgDetails['file_name'];
			}
			$_POST["owner_id"]=$this->checkLogin('A'); 	
			$_POST["content"]=htmlentities($_POST["content"]);
			$_POST["slug"]=url_title(convert_accented_characters($_POST["title"]), 'dash', true);
			$_POST["post_date"]=date("Y-m-d H:i:s",strtotime($_POST["post_date"]));	
			if($id=='')
			{
			 $_POST["status"]="publish"; 	
			 
			 $check=$this->common_model_backend->get_all_details(NEWS,array("title"=>$_POST["title"]));
			 if($check->num_rows()==0){
			 $this->common_model_backend->simple_insert(NEWS,$_POST);
			 $this->session->set_flashdata('alert_message', 'Successfully created');
		     $this->session->set_flashdata('error_type', 'success');
			redirect(base_url().'admin/news/display_news_list');
			 }
			 else{
			 $this->session->set_flashdata('alert_message', 'News already exist.');
		     $this->session->set_flashdata('error_type', 'error');
			 redirect(base_url().'admin/news/display_news_list');	 
			 }
			 			 
			
			}
			else
			{
			 $check=$this->common_model_backend->get_all_details(NEWS,array("title"=>$_POST["title"],"id!="=>$id));
			 if($check->num_rows()==0){ 
			 $this->common_model_backend->update_details(NEWS,$_POST,array('id'=>$id));
			 $this->session->set_flashdata('alert_message', 'Successfully updated');
		     $this->session->set_flashdata('error_type', 'success');
			 redirect(base_url().'admin/news/display_news_list');
			 }
			 else{
		 	 $this->session->set_flashdata('alert_message', 'News already exist.');
		     $this->session->set_flashdata('error_type', 'error');
			 redirect(base_url().'admin/news/display_news_list');		 
			 }
			
			}
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}


	public function add_edit_insert_members($id='')
	{
		if($this->checkLogin('A')!='')
		{  

			
			$config['overwrite'] = FALSE;
	    	$config['allowed_types'] = 'jpg|jpeg|gif|png';
		    $config['max_size'] = 2000;
		    $config['upload_path'] = './images/site/news';
		    $this->load->library('upload', $config);
			if ( $this->upload->do_upload('document')){
		    	$imgDetails = $this->upload->data();
		    	$_POST['document'] = $imgDetails['file_name'];
			}
			 	
			#$_POST["content"]=htmlentities($_POST["content"]);
			$_POST["post_date"]=date("Y-m-d H:i:s",strtotime($_POST["post_date"]));	
			if($id=='')
			{
			 $_POST["company_id"]="0";	
			 $_POST["status"]="1"; 	
			 if($_POST["archive"]=="1week"){
				$_POST['archeived_date'] =date("Y-m-d", strtotime("+1 week"));
			}
			else if($_POST["archive"]=="1month"){
				$_POST['archeived_date'] =date("Y-m-d", strtotime("+1 month"));
			}
			else if($_POST["archive"]=="3months"){
				$_POST['archeived_date'] =date("Y-m-d", strtotime("+3 month"));
			}
			else if($_POST["archive"]=="6months"){
				$_POST['archeived_date'] =date("Y-m-d", strtotime("+6 month"));
			}
			 $check=$this->common_model_backend->get_all_details(MEMBER_NEWS,array("title"=>$_POST["title"],"post_type"=>$_POST["post_type"]));
			 if($check->num_rows()==0){
			 $this->common_model_backend->simple_insert(MEMBER_NEWS,$_POST);
			 $this->session->set_flashdata('alert_message', 'Successfully created');
		     $this->session->set_flashdata('error_type', 'success');
			 if($_POST["post_type"]=="0"){
			 redirect(base_url().'admin/news/display_members_news_list');
			 }
			 else{
			 redirect(base_url().'admin/news/display_industry_news_list');	 
			 }
			 }
			 else{
			 $this->session->set_flashdata('alert_message', 'News already exist.');
		     $this->session->set_flashdata('error_type', 'error');
			  if($_POST["post_type"]=="0"){
			 redirect(base_url().'admin/news/display_members_news_list');
			 }
			 else{
			 redirect(base_url().'admin/news/display_industry_news_list');	 
			 }	 
			 }
			 			 
			
			}
			else
			{
			 $check=$this->common_model_backend->get_all_details(MEMBER_NEWS,array("title"=>$_POST["title"],"post_type"=>$_POST["post_type"],"id!="=>$id));
			 if($check->num_rows()==0){ 
			 $get=$this->common_model_backend->get_all_details(MEMBER_NEWS,array("id"=>$id))->row();
			 if($get->archive!=$_POST["archive"]){
					if($_POST["archive"]=="1week"){
						$_POST['archeived_date'] =date("Y-m-d", strtotime("+1 week"));
					}
					else if($_POST["archive"]=="1month"){
						$_POST['archeived_date'] =date("Y-m-d", strtotime("+1 month"));
					}
					else if($_POST["archive"]=="3months"){
						$_POST['archeived_date'] =date("Y-m-d", strtotime("+3 month"));
					}
					else if($_POST["archive"]=="6months"){
						$_POST['archeived_date'] =date("Y-m-d", strtotime("+6 month"));
					}
			 }
			 $this->common_model_backend->update_details(MEMBER_NEWS,$_POST,array('id'=>$id));
			 $this->session->set_flashdata('alert_message', 'Successfully updated');
		     $this->session->set_flashdata('error_type', 'success');
			  if($_POST["post_type"]=="0"){
			 redirect(base_url().'admin/news/display_members_news_list');
			 }
			 else{
			 redirect(base_url().'admin/news/display_industry_news_list');	 
			 }
			 }
			 else{
		 	 $this->session->set_flashdata('alert_message', 'News already exist.');
		     $this->session->set_flashdata('error_type', 'error');
			  if($_POST["post_type"]=="0"){
			 redirect(base_url().'admin/news/display_members_news_list');
			 }
			 else{
			 redirect(base_url().'admin/news/display_industry_news_list');	 
			 }		 
			 }
			
			}
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}

    public function display_news()
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
			$order="id";
			$dir="desc";
		}		
        $totalData = $totalFiltered = $this->common_model_backend->get_ajax_news_list($limit,$start,$search,$order,$dir,"total_record_count");
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->common_model_backend->get_ajax_news_list($limit,$start,$search,$order,$dir,"total_records");
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->common_model_backend->get_ajax_news_list($limit,$start,$search,$order,$dir,"record_search");
            $totalFiltered = $this->common_model_backend->get_ajax_news_list($limit,$start,$search,$order,$dir,"search_record_count");
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
					$edit = "<a class='btn btn-success' href='".base_url()."admin/news/add_new/".$return_rows->id."'>Edit</a>";
				}
				if($prev==1 || (!empty($Users) && in_array('3',$Users))){
					$delete = '<a class="btn btn-danger" onclick="return confirm(\'Once deleted cant be recover again...\')" href="'.base_url().'admin/news/delete_news/'.$return_rows->id.'">Delete</a>';
				}
				else
				{
					$edit = '-';
					$delete = '-';
				}
				$nestedData['id'] = $i;
                $nestedData['title'] = mb_substr(html_entity_decode($return_rows->title),0,50).'...';
                $nestedData['post_date'] = date("d/m/Y",strtotime($return_rows->post_date));
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
	public function display_members_news()
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
			$order="id";
			$dir="desc";
		}
        	
        $totalData = $totalFiltered = $this->common_model_backend->display_members_news($limit,$start,$search,$order,$dir,"total_record_count");
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->common_model_backend->display_members_news($limit,$start,$search,$order,$dir,"total_records");
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->common_model_backend->display_members_news($limit,$start,$search,$order,$dir,"record_search");
            $totalFiltered = $this->common_model_backend->display_members_news($limit,$start,$search,$order,$dir,"search_record_count");
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
					$edit = "<a class='btn btn-success' href='".base_url()."admin/news/add_members_news/".$return_rows->id."'>Edit</a>";
				}
				if($prev==1 || (!empty($Users) && in_array('3',$Users))){
					$delete = '<a class="btn btn-danger" onclick="return confirm(\'Once deleted cant be recover again...\')" href="'.base_url().'admin/news/delete_members_news/'.$return_rows->id.'">Delete</a>';
				}
				else
				{
					$edit = '-';
					$delete = '-';
				}
				$condition1 = $return_rows->status=='1'?'success':'danger';
				$condition2 = $return_rows->status=='1'?0:1;
				$condition3 = $return_rows->status=="1"?"Active":"Inactive";
				$status = "<a class='btn btn-".$condition1."' href='".base_url()."admin/news/change_status/".$return_rows->id."/".$condition2."'> 
							 ".$condition3."</a>"; 
							 
				if(date("Y-m-d")>date("Y-m-d",strtotime($return_rows->archeived_date))){
					$status="Archieved";
				}			 
				$arch="";
				if($return_rows->archive=="1week"){
					$arch="1 Week";
				}
				else if($return_rows->archive=="1month"){
					$arch="1 Month";
				}
				else if($return_rows->archive=="3months"){
					$arch="3 Months";
				}
				else if($return_rows->archive=="6months"){
					$arch="6 Months";
				}
				
				$nestedData['id'] = $i;
                $nestedData['title'] = $return_rows->title;
                $nestedData['name'] = $return_rows->name==""?"Admin":$return_rows->name;
                $nestedData['archive'] = $arch;
                $nestedData['status'] = $status;
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
	public function display_industry_news()
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
			$order="id";
			$dir="desc";
		}	
        $totalData = $totalFiltered = $this->common_model_backend->display_industry_news($limit,$start,$search,$order,$dir,"total_record_count");
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->common_model_backend->display_industry_news($limit,$start,$search,$order,$dir,"total_records");
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->common_model_backend->display_industry_news($limit,$start,$search,$order,$dir,"record_search");
            $totalFiltered = $this->common_model_backend->display_industry_news($limit,$start,$search,$order,$dir,"search_record_count");
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
					$edit = "<a class='btn btn-success' href='".base_url()."admin/news/add_members_news/".$return_rows->id."'>Edit</a>";
				}
				if($prev==1 || (!empty($Users) && in_array('3',$Users))){
					$delete = '<a class="btn btn-danger" onclick="return confirm(\'Once deleted cant be recover again...\')" href="'.base_url().'admin/news/delete_members_news/'.$return_rows->id.'">Delete</a>';
				}
				else
				{
					$edit = '-';
					$delete = '-';
				}
				$condition1 = $return_rows->status=='1'?'success':'danger';
				$condition2 = $return_rows->status=='1'?0:1;
				$condition3 = $return_rows->status=="1"?"Active":"Inactive";
				$status = "<a class='btn btn-".$condition1."' href='".base_url()."admin/news/change_status/".$return_rows->id."/".$condition2."'> 
							 ".$condition3."</a>"; 
				if(date("Y-m-d")>date("Y-m-d",strtotime($return_rows->archeived_date))){
					$status="Archieved";
				}
				$arch="";
				if($return_rows->archive=="1week"){
					$arch="1 Week";
				}
				else if($return_rows->archive=="1month"){
					$arch="1 Month";
				}
				else if($return_rows->archive=="3months"){
					$arch="3 Months";
				}
				else if($return_rows->archive=="6months"){
					$arch="6 Months";
				}
				
				$nestedData['id'] = $i;
                $nestedData['title'] = $return_rows->title;
                $nestedData['name'] = $return_rows->name==""?"Admin":$return_rows->name;
                $nestedData['archive'] = $arch;
                $nestedData['status'] = $status;
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
	
	public function delete_news($id)
	{
		
		if($this->checkLogin('A')!="")
		{
			$post=$this->input->post();
			$this->common_model_backend->commonDelete(NEWS,array('id'=>$id));
				$ret['status']=1;
				$ret['message']='Deleted successfully...';
			
		}
		else
		{
			$ret['status']=0;
				$ret['message']="You dont't have permission";
		}
		redirect(base_url().'admin/news/display_news_list');
	}
	
	public function delete_members_news($id)
	{   
		
		$post_type=$this->common_model_backend->get_all_details(MEMBER_NEWS,array('id'=>$id))->row()->post_type;
		$this->common_model_backend->commonDelete(MEMBER_NEWS,array("id"=>$id));
		$this->session->set_flashdata('alert_message', 'Successfully news deleted.');
		$this->session->set_flashdata('error_type', 'success');
		
		if($post_type==0){
			redirect(base_url().'admin/news/display_members_news_list');
		}
		else{
			redirect(base_url().'admin/news/display_industry_news_list');
		}
		
		

	}
	public function change_status($id,$status)
	{   
		
		$post_type=$this->common_model_backend->get_all_details(MEMBER_NEWS,array('id'=>$id))->row()->post_type;
		$this->common_model_backend->update_details(MEMBER_NEWS,array("status"=>$status),array("id"=>$id));
		$this->session->set_flashdata('alert_message', 'Successfully status changed.');
		$this->session->set_flashdata('error_type', 'success');
		
		if($post_type==0){
			redirect(base_url().'admin/news/display_members_news_list');
		}
		else{
			redirect(base_url().'admin/news/display_industry_news_list');
		}
		
		

	}
	
	
	
  

}
