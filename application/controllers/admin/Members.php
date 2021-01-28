<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends MY_Controller {
		 
	function __construct(){
        parent::__construct();
		$this->load->helper(array('cookie','date','form','email'));
		$this->load->library(array('encrypt','form_validation','session'));		
		$this->load->model('common_model_backend');
		$this->load->model('mail_model');
	    
		
    }
	public function display_all_members()
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Display All Members ";
			$this->load->view('admin/members/display_all_members',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	public function display_new_members()
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Display New Members ";
			$this->load->view('admin/members/display_new_members',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	public function display_pending_members()
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Display Pending Members ";
			$this->load->view('admin/members/display_pending_members',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	public function display_active_members()
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Display Active Members ";
			$this->load->view('admin/members/display_active_members',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	public function display_hold_members()
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Display Hold Members ";
			$this->load->view('admin/members/display_hold_members',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	public function display_terminated_members()
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Display Terminated Members ";
			$this->load->view('admin/members/display_terminated_members',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	public function display_regular_members()
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Display Regular Members ";
			$this->load->view('admin/members/display_regular_members',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	public function display_founder_members()
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Display Founder Members ";
			$this->load->view('admin/members/display_founder_members',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	public function display_associate_members()
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Display Regular Members ";
			$this->load->view('admin/members/display_associate_members',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	public function display_allMembers()
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
			$order="c.id";
			$dir="desc";
		}
        if($order=="country_name")
		{
			$order="cy.name";
			
		}
        if($order=="updated")
		{
			$order="date(c.updated_at)";
			$dir="desc";
		}
        		
        $totalData = $totalFiltered = $this->common_model_backend->get_ajax_all_members_list($limit,$start,$search,$order,$dir,"total_record_count","all");
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->common_model_backend->get_ajax_all_members_list($limit,$start,$search,$order,$dir,"total_records","all");
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->common_model_backend->get_ajax_all_members_list($limit,$start,$search,$order,$dir,"record_search","all");
            $totalFiltered = $this->common_model_backend->get_ajax_all_members_list($limit,$start,$search,$order,$dir,"search_record_count","all");
        }

        $data = array();
        if($result_set->num_rows()>0)
        {
			$i = $start+1;
            foreach ($result_set->result() as $return_rows)
            {
				$edit = "";
				$delete = "";
				$update = "";
				$condition1 = "";
				$condition2 = "";
				$condition3 = "";
				$prev = $this->data['prev'];
				if($prev==1 || (!empty($Members) && in_array('2',$Members))){
					$edit = "<a class='btn btn-success' href='".base_url()."admin/members/update_members/".$return_rows->id."'>Edit</a>";
				}
				if($prev==1 || (!empty($Members) && in_array('3',$Members))){
					$delete = '<a class="btn btn-danger" onclick="return confirm(\'Once deleted cant be recover again...\')" href="'.base_url().'admin/members/delete_members/'.$return_rows->id.'?ret='.base_url("admin/members/display_all_members").'">Delete</a>';
				}				
				
				else
				{
					$edit = '-';
					$delete = '-';
				}
				$update = '<a class="btn btn-warning" href="'.base_url().'admin/members/view_member/'.$return_rows->id.'?ret='.base_url("admin/members/display_active_members").'">View</a>';
				
				$status = ucfirst($return_rows->status); 
							 
                $nestedData['id'] = $i;
                $nestedData['name'] = $return_rows->trading_name;
                $nestedData['country_name'] = $return_rows->country_name;
                $nestedData['email'] = '<a href="mailto:'.$return_rows->email.'">'.$return_rows->email.'</a>';
                $nestedData['status'] = $status; 
                $nestedData['update'] = "<div class='hidden-sm hidden-xs action-buttons'>".$edit.$update.$delete."</div>";
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
	public function display_pendingMembers()
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
			$order="c.id";
			$dir="desc";
		}
        if($order=="country_name")
		{
			$order="cy.name";
			
		}
        if($order=="updated")
		{
			$order="date(c.updated_at)";
			$dir="desc";
		}
        		
        $totalData = $totalFiltered = $this->common_model_backend->get_ajax_all_members_list($limit,$start,$search,$order,$dir,"total_record_count","pending");
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->common_model_backend->get_ajax_all_members_list($limit,$start,$search,$order,$dir,"total_records","pending");
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->common_model_backend->get_ajax_all_members_list($limit,$start,$search,$order,$dir,"record_search","pending");
            $totalFiltered = $this->common_model_backend->get_ajax_all_members_list($limit,$start,$search,$order,$dir,"search_record_count","pending");
        }

        $data = array();
        if($result_set->num_rows()>0)
        {
			$i = $start+1;
            foreach ($result_set->result() as $return_rows)
            {
				$edit = "";
				$delete = "";
				$update = "";
				$condition1 = "";
				$condition2 = "";
				$condition3 = "";
				$prev = $this->data['prev'];
				if($prev==1 || (!empty($Members) && in_array('2',$Members))){
					$edit = "<a class='btn btn-success' href='".base_url()."admin/members/update_members/".$return_rows->id."'>Edit</a>";
				}
				if($prev==1 || (!empty($Members) && in_array('3',$Members))){
					$delete = '<a class="btn btn-danger" onclick="return confirm(\'Once deleted cant be recover again...\')" href="'.base_url().'admin/members/delete_members/'.$return_rows->id.'?ret='.base_url("admin/members/display_pending_members").'">Delete</a>';
				}				
				
				else
				{
					$edit = '-';
					$delete = '-';
				}
				$update = '<a class="btn btn-warning" href="'.base_url().'admin/members/view_member/'.$return_rows->id.'?ret='.base_url("admin/members/display_pending_members").'">View</a>';
				$paid = '<a class="btn btn-warning" href="'.base_url().'admin/members/paid_member/'.$return_rows->id.'?ret='.base_url("admin/members/display_pending_members").'">Paid</a>';
				
				
				$status = ucfirst($return_rows->status); 
							 
                $nestedData['id'] = $i;
                $nestedData['name'] = $return_rows->trading_name;
                $nestedData['country_name'] = $return_rows->country_name;
                $nestedData['email'] = '<a href="mailto:'.$return_rows->email.'">'.$return_rows->email.'</a>';
                $nestedData['status'] = $status; 
                $nestedData['update'] = "<div class='hidden-sm hidden-xs action-buttons'>".$edit.$update.$delete.$paid."</div>";
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
	public function display_holdMembers()
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
			$order="c.id";
			$dir="desc";
		}
        if($order=="country_name")
		{
			$order="cy.name";
			
		}
        if($order=="updated")
		{
			$order="date(c.updated_at)";
			$dir="desc";
		}
        		
        $totalData = $totalFiltered = $this->common_model_backend->get_ajax_all_members_list($limit,$start,$search,$order,$dir,"total_record_count","hold");
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->common_model_backend->get_ajax_all_members_list($limit,$start,$search,$order,$dir,"total_records","hold");
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->common_model_backend->get_ajax_all_members_list($limit,$start,$search,$order,$dir,"record_search","hold");
            $totalFiltered = $this->common_model_backend->get_ajax_all_members_list($limit,$start,$search,$order,$dir,"search_record_count","hold");
        }

        $data = array();
        if($result_set->num_rows()>0)
        {
			$i = $start+1;
            foreach ($result_set->result() as $return_rows)
            {
				$edit = "";
				$delete = "";
				$update = "";
				$condition1 = "";
				$condition2 = "";
				$condition3 = "";
				$prev = $this->data['prev'];
				if($prev==1 || (!empty($Members) && in_array('2',$Members))){
					$edit = "<a class='btn btn-success' href='".base_url()."admin/members/update_members/".$return_rows->id."'>Edit</a>";
				}
				if($prev==1 || (!empty($Members) && in_array('3',$Members))){
					$delete = '<a class="btn btn-danger" onclick="return confirm(\'Once deleted cant be recover again...\')" href="'.base_url().'admin/members/delete_members/'.$return_rows->id.'?ret='.base_url("admin/members/display_hold_members").'">Delete</a>';
				}				
				
				else
				{
					$edit = '-';
					$delete = '-';
				}
				$update = '<a class="btn btn-warning" href="'.base_url().'admin/members/view_member/'.$return_rows->id.'?ret='.base_url("admin/members/display_hold_members").'">View</a>';
				
				$status = ucfirst($return_rows->status); 
							 
                $nestedData['id'] = $i;
                $nestedData['name'] = $return_rows->trading_name;
                $nestedData['country_name'] = $return_rows->country_name;
                $nestedData['email'] = '<a href="mailto:'.$return_rows->email.'">'.$return_rows->email.'</a>';
                $nestedData['status'] = $status; 
                $nestedData['update'] = "<div class='hidden-sm hidden-xs action-buttons'>".$edit.$update.$delete."</div>";
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
	public function display_terminatedMembers()
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
			$order="c.id";
			$dir="desc";
		}
        if($order=="country_name")
		{
			$order="cy.name";
			
		}
        if($order=="updated")
		{
			$order="date(c.updated_at)";
			$dir="desc";
		}
        		
        $totalData = $totalFiltered = $this->common_model_backend->get_ajax_all_members_list($limit,$start,$search,$order,$dir,"total_record_count","terminated");
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->common_model_backend->get_ajax_all_members_list($limit,$start,$search,$order,$dir,"total_records","terminated");
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->common_model_backend->get_ajax_all_members_list($limit,$start,$search,$order,$dir,"record_search","terminated");
            $totalFiltered = $this->common_model_backend->get_ajax_all_members_list($limit,$start,$search,$order,$dir,"search_record_count","terminated");
        }

        $data = array();
        if($result_set->num_rows()>0)
        {
			$i = $start+1;
            foreach ($result_set->result() as $return_rows)
            {
				$edit = "";
				$delete = "";
				$update = "";
				$condition1 = "";
				$condition2 = "";
				$condition3 = "";
				$prev = $this->data['prev'];
				if($prev==1 || (!empty($Members) && in_array('2',$Members))){
					$edit = "<a class='btn btn-success' href='".base_url()."admin/members/update_members/".$return_rows->id."'>Edit</a>";
				}
				if($prev==1 || (!empty($Members) && in_array('3',$Members))){
					//$delete = '<a class="btn btn-danger" onclick="return confirm(\'Once deleted cant be recover again...\')" href="'.base_url().'admin/members/delete_members/'.$return_rows->id.'">Delete</a>';
				}				
				
				else
				{
					$edit = '-';
					$delete = '-';
				}
				$update = '<a class="btn btn-warning" href="'.base_url().'admin/members/view_member/'.$return_rows->id.'?ret='.base_url("admin/members/display_terminated_members").'">View</a>';
				
				$status = ucfirst($return_rows->status); 
							 
                $nestedData['id'] = $i;
                $nestedData['name'] = $return_rows->trading_name;
                $nestedData['country_name'] = $return_rows->country_name;
                $nestedData['email'] = '<a href="mailto:'.$return_rows->email.'">'.$return_rows->email.'</a>';
                $nestedData['status'] = $status; 
                $nestedData['update'] = "<div class='hidden-sm hidden-xs action-buttons'>".$edit.$update.$delete."</div>";
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
	public function display_activeMembers()
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
			$order="c.id";
			$dir="desc";
		}
        if($order=="country_name")
		{
			$order="cy.name";
			
		}
        if($order=="updated")
		{
			$order="date(c.updated_at)";
			$dir="desc";
		}
        		
        $totalData = $totalFiltered = $this->common_model_backend->get_ajax_all_members_list($limit,$start,$search,$order,$dir,"total_record_count","active");
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->common_model_backend->get_ajax_all_members_list($limit,$start,$search,$order,$dir,"total_records","active");
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->common_model_backend->get_ajax_all_members_list($limit,$start,$search,$order,$dir,"record_search","active");
            $totalFiltered = $this->common_model_backend->get_ajax_all_members_list($limit,$start,$search,$order,$dir,"search_record_count","active");
        }

        $data = array();
        if($result_set->num_rows()>0)
        {
			$i = $start+1;
            foreach ($result_set->result() as $return_rows)
            {
				$edit = "";
				$delete = "";
				$update = "";
				$condition1 = "";
				$condition2 = "";
				$condition3 = "";
				$prev = $this->data['prev'];
				if($prev==1 || (!empty($Members) && in_array('2',$Members))){
					$edit = "<a class='btn btn-success' href='".base_url()."admin/members/update_members/".$return_rows->id."'>Edit</a>";
				}
				if($prev==1 || (!empty($Members) && in_array('3',$Members))){
					$delete = '<a class="btn btn-danger" onclick="return confirm(\'Once deleted cant be recover again...\')" href="'.base_url().'admin/members/delete_members/'.$return_rows->id.'?ret='.base_url("admin/members/display_active_members").'">Delete</a>';
				}				
				
				else
				{
					$edit = '-';
					$delete = '-';
				}
				$update = '<a class="btn btn-warning" href="'.base_url().'admin/members/view_member/'.$return_rows->id.'?ret='.base_url("admin/members/display_active_members").'">View</a>';
				
				$status = ucfirst($return_rows->status); 
							 
                $nestedData['id'] = $i;
                $nestedData['name'] = $return_rows->trading_name;
                $nestedData['country_name'] = $return_rows->country_name;
                $nestedData['email'] = '<a href="mailto:'.$return_rows->email.'">'.$return_rows->email.'</a>';
                $nestedData['status'] = $status; 
                $nestedData['update'] = "<div class='hidden-sm hidden-xs action-buttons'>".$edit.$update.$delete."</div>";
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
	public function display_regularMembers()
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
			$order="c.id";
			$dir="desc";
		}
        if($order=="country_name")
		{
			$order="cy.name";
			
		}
        if($order=="updated")
		{
			$order="date(c.updated_at)";
			$dir="desc";
		}
        		
        $totalData = $totalFiltered = $this->common_model_backend->get_ajax_all_members_list_title($limit,$start,$search,$order,$dir,"total_record_count","regular");
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->common_model_backend->get_ajax_all_members_list_title($limit,$start,$search,$order,$dir,"total_records","regular");
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->common_model_backend->get_ajax_all_members_list_title($limit,$start,$search,$order,$dir,"record_search","regular");
            $totalFiltered = $this->common_model_backend->get_ajax_all_members_list_title($limit,$start,$search,$order,$dir,"search_record_count","regular");
        }

        $data = array();
        if($result_set->num_rows()>0)
        {
			$i = $start+1;
            foreach ($result_set->result() as $return_rows)
            {
				$edit = "";
				$delete = "";
				$update = "";
				$condition1 = "";
				$condition2 = "";
				$condition3 = "";
				$prev = $this->data['prev'];
				if($prev==1 || (!empty($Members) && in_array('2',$Members))){
					$edit = "<a class='btn btn-success' href='".base_url()."admin/members/update_members/".$return_rows->id."'>Edit</a>";
				}
				if($prev==1 || (!empty($Members) && in_array('3',$Members))){
					$delete = '<a class="btn btn-danger" onclick="return confirm(\'Once deleted cant be recover again...\')" href="'.base_url().'admin/members/delete_members/'.$return_rows->id.'?ret='.base_url("admin/members/display_regular_members").'">Delete</a>';
				}				
				
				else
				{
					$edit = '-';
					$delete = '-';
				}
				$update = '<a class="btn btn-warning" href="'.base_url().'admin/members/view_member/'.$return_rows->id.'?ret='.base_url("admin/members/display_regular_members").'">View</a>';
				
				$status = ucfirst($return_rows->status); 
							 
                $nestedData['id'] = $i;
                $nestedData['name'] = $return_rows->trading_name;
                $nestedData['country_name'] = $return_rows->country_name;
                $nestedData['email'] = '<a href="mailto:'.$return_rows->email.'">'.$return_rows->email.'</a>';
                $nestedData['status'] = $status; 
                $nestedData['update'] = "<div class='hidden-sm hidden-xs action-buttons'>".$edit.$update.$delete."</div>";
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
	
	public function display_founderMembers()
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
			$order="c.id";
			$dir="desc";
		}
        if($order=="country_name")
		{
			$order="cy.name";
			
		}
        if($order=="updated")
		{
			$order="date(c.updated_at)";
			$dir="desc";
		}
        		
        $totalData = $totalFiltered = $this->common_model_backend->get_ajax_all_members_list_title($limit,$start,$search,$order,$dir,"total_record_count","founder");
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->common_model_backend->get_ajax_all_members_list_title($limit,$start,$search,$order,$dir,"total_records","founder");
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->common_model_backend->get_ajax_all_members_list_title($limit,$start,$search,$order,$dir,"record_search","founder");
            $totalFiltered = $this->common_model_backend->get_ajax_all_members_list_title($limit,$start,$search,$order,$dir,"search_record_count","founder");
        }

        $data = array();
        if($result_set->num_rows()>0)
        {
			$i = $start+1;
            foreach ($result_set->result() as $return_rows)
            {
				$edit = "";
				$delete = "";
				$update = "";
				$condition1 = "";
				$condition2 = "";
				$condition3 = "";
				$prev = $this->data['prev'];
				if($prev==1 || (!empty($Members) && in_array('2',$Members))){
					$edit = "<a class='btn btn-success' href='".base_url()."admin/members/update_members/".$return_rows->id."'>Edit</a>";
				}
				if($prev==1 || (!empty($Members) && in_array('3',$Members))){
					$delete = '<a class="btn btn-danger" onclick="return confirm(\'Once deleted cant be recover again...\')" href="'.base_url().'admin/members/delete_members/'.$return_rows->id.'?ret='.base_url("admin/members/display_founder_members").'">Delete</a>';
				}				
				
				else
				{
					$edit = '-';
					$delete = '-';
				}
				$update = '<a class="btn btn-warning" href="'.base_url().'admin/members/view_member/'.$return_rows->id.'?ret='.base_url("admin/members/display_founder_members").'">View</a>';
				
				$status = ucfirst($return_rows->status); 
							 
                $nestedData['id'] = $i;
                $nestedData['name'] = $return_rows->trading_name;
                $nestedData['country_name'] = $return_rows->country_name;
                $nestedData['email'] = '<a href="mailto:'.$return_rows->email.'">'.$return_rows->email.'</a>';
                $nestedData['status'] = $status; 
                $nestedData['update'] = "<div class='hidden-sm hidden-xs action-buttons'>".$edit.$update.$delete."</div>";
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
	
	public function display_associateMembers()
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
			$order="c.id";
			$dir="desc";
		}
        if($order=="country_name")
		{
			$order="cy.name";
			
		}
        if($order=="updated")
		{
			$order="date(c.updated_at)";
			$dir="desc";
		}
        		
        $totalData = $totalFiltered = $this->common_model_backend->get_ajax_all_members_list_title($limit,$start,$search,$order,$dir,"total_record_count","associate");
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->common_model_backend->get_ajax_all_members_list_title($limit,$start,$search,$order,$dir,"total_records","associate");
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->common_model_backend->get_ajax_all_members_list_title($limit,$start,$search,$order,$dir,"record_search","associate");
            $totalFiltered = $this->common_model_backend->get_ajax_all_members_list_title($limit,$start,$search,$order,$dir,"search_record_count","associate");
        }

        $data = array();
        if($result_set->num_rows()>0)
        {
			$i = $start+1;
            foreach ($result_set->result() as $return_rows)
            {
				$edit = "";
				$delete = "";
				$update = "";
				$condition1 = "";
				$condition2 = "";
				$condition3 = "";
				$prev = $this->data['prev'];
				if($prev==1 || (!empty($Members) && in_array('2',$Members))){
					$edit = "<a class='btn btn-success' href='".base_url()."admin/members/update_members/".$return_rows->id."'>Edit</a>";
				}
				if($prev==1 || (!empty($Members) && in_array('3',$Members))){
					$delete = '<a class="btn btn-danger" onclick="return confirm(\'Once deleted cant be recover again...\')" href="'.base_url().'admin/members/delete_members/'.$return_rows->id.'?ret='.base_url("admin/members/display_associate_members").'">Delete</a>';
				}				
				
				else
				{
					$edit = '-';
					$delete = '-';
				}
				$update = '<a class="btn btn-warning" href="'.base_url().'admin/members/view_member/'.$return_rows->id.'?ret='.base_url("admin/members/display_associate_members").'">View</a>';
				
				$status = ucfirst($return_rows->status); 
							 
                $nestedData['id'] = $i;
                $nestedData['name'] = $return_rows->trading_name;
                $nestedData['country_name'] = $return_rows->country_name;
                $nestedData['email'] = '<a href="mailto:'.$return_rows->email.'">'.$return_rows->email.'</a>';
                $nestedData['status'] = $status; 
                $nestedData['update'] = "<div class='hidden-sm hidden-xs action-buttons'>".$edit.$update.$delete."</div>";
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
	
	public function display_newMembers()
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
			$order="c.id";
			$dir="desc";
		}
        if($order=="country_name")
		{
			$order="cy.name";
			
		}
        if($order=="updated")
		{
			$order="date(c.updated_at)";
			$dir="desc";
		}
        		
        $totalData = $totalFiltered = $this->common_model_backend->get_ajax_all_members_list($limit,$start,$search,$order,$dir,"total_record_count","new");
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->common_model_backend->get_ajax_all_members_list($limit,$start,$search,$order,$dir,"total_records","new");
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->common_model_backend->get_ajax_all_members_list($limit,$start,$search,$order,$dir,"record_search","new");
            $totalFiltered = $this->common_model_backend->get_ajax_all_members_list($limit,$start,$search,$order,$dir,"search_record_count","new");
        }

        $data = array();
        if($result_set->num_rows()>0)
        {
			$i = $start+1;
            foreach ($result_set->result() as $return_rows)
            {
				$edit = "";
				$delete = "";
				$update = "";
				$condition1 = "";
				$condition2 = "";
				$condition3 = "";
				$prev = $this->data['prev'];
				if($prev==1 || (!empty($Members) && in_array('2',$Members))){
					$edit = "<a class='btn btn-success' href='".base_url()."admin/members/update_members/".$return_rows->id."'>Edit</a>";
				}
				if($prev==1 || (!empty($Members) && in_array('3',$Members))){
					$delete = '<a class="btn btn-danger" onclick="return confirm(\'Once deleted cant be recover again...\')" href="'.base_url().'admin/members/delete_members/'.$return_rows->id.'?ret='.base_url("admin/members/display_new_members").'">Delete</a>';
				}				
				
				else
				{
					$edit = '-';
					$delete = '-';
				}
				$update = '<a class="btn btn-warning" href="'.base_url().'admin/members/view_member/'.$return_rows->id.'?ret='.base_url("admin/members/display_new_members").'">View</a>';
				
				$generate_invoice='';
				$generate_invoice = '<a class="btn btn-success" href="'.base_url().'admin/members/create_invoice/'.$return_rows->id.'">Create Invoice</a>';
				
				$status = ucfirst($return_rows->status); 
							 
                $nestedData['id'] = $i;
                $nestedData['name'] = $return_rows->trading_name;
                $nestedData['country_name'] = $return_rows->country_name;
                $nestedData['email'] = '<a href="mailto:'.$return_rows->email.'">'.$return_rows->email.'</a>';
                $nestedData['status'] = $status; 
                $nestedData['update'] = "<div class='hidden-sm hidden-xs action-buttons'>".$edit.$update.$delete.$generate_invoice."</div>";
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
	
	public function view_member($company_id)
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$id=$this->checkLogin("U")==""?0:$this->checkLogin("U");
			$this->data['company_info']=$this->common_model_backend->get_all_details(COMPANY,array("id"=>$company_id))->row();
			$this->data["questions_list"]=$this->common_model_backend->get_all_details(QUESTIONS,array("status"=>"1"),array("type"=>"asc","field"=>"id"));
			$this->data['references']=$this->common_model_backend->get_all_details(REFERENCES,array("company_id"=>$company_id));
			$this->data['all_ports']=$this->common_model_backend->get_all_details(OFFICE,array("company_id"=>$company_id),array("type"=>"asc","field"=>"id"));			
			$this->data['heading']=$this->data['company_info']->name.' '.'Information';
			$this->load->view('admin/members/view_members',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	public function update_members($company_id)
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$id=$this->checkLogin("U")==""?0:$this->checkLogin("U");
			$this->data['company_info']=$this->common_model_backend->get_all_details(COMPANY,array("id"=>$company_id))->row();
			$this->data['country_code']=$this->common_model_backend->get_all_details(COUNTRY,array("id"=>$this->data['company_info']->country_id)); #echo $this->db->last_query();
			$this->data["hears_list"]=$this->landing_model->get_all_details(HEARS,array("status"=>"1"));
			$this->data['heading']=$this->data['company_name']=$this->data['company_info']->name.' '.'Information';
			$this->data['company_id']=$this->data['company_info']->id;
			$this->load->view('admin/members/update_members',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	
	
	public function delete_contacts()
	{
		if($this->checkLogin('A')!='')
		{   
			    $post=$this->input->post();
			    $this->data['user']=$this->common_model_backend->commonDelete(CONTACT_LIST,array('id'=>$post["id"]));
				$ret['status']=1;
		}
		else
		{
			$ret["status"]=0;
		}
		echo json_encode($ret);	
	}
	public function delete_office($id)
	{
		if($this->checkLogin('A')!='')
		{   
			    $post=$this->input->post();
			    $this->data['user']=$this->common_model_backend->update_details(OFFICE,array("status"=>"terminated"),array('id'=>$id));
				 $this->session->set_flashdata('alert_message', 'Successfully office terminated.');
		         $this->session->set_flashdata('error_type', 'success');
		}
		else
		{
			$this->session->set_flashdata('alert_message', 'Try again');
		         $this->session->set_flashdata('error_type', 'success');
		}
		redirect(base_url("admin/offices/display_all_offices"));
	}
	public function delete_members($id)
	{
		if($this->checkLogin('A')!='')
		{   
			    $post=$this->input->post();
			    $this->data['user']=$this->common_model_backend->update_details(COMPANY,array("status"=>"terminated","terminated_date"=>date("Y-m-d")),array('id'=>$id));
				 $this->session->set_flashdata('alert_message', 'Successfully member terminated.');
		         $this->session->set_flashdata('error_type', 'success');
		}
		else
		{
			$this->session->set_flashdata('alert_message', 'try again');
		         $this->session->set_flashdata('error_type', 'error');
		}
		
		if($_GET['ret']!=""){
			redirect($_GET['ret']);
		}
		else{
		redirect(base_url("admin/members/display_all_members"));
		}
	}
	
	    public function edit_update_company()
	{
		$post=$this->input->post();
		if($this->checkLogin("A")!=""){
		if($post['address1']!="" && $post['city']!="" ){
		        
				$id=$post["company_id"];			
				
				$company_info=array();
				$company_info["linkedin_link"]=$post["linkedin_link"];
				$company_info["facebook_link"]=$post["facebook_link"];
				$company_info["description"]=$post["description"];
				$company_info["trading_name"]=$post["trading_name"];
				$company_info["name"]=$post["name"];
				$company_info["address1"]=$post["address1"];
				$company_info["address2"]=$post["address2"];
				$company_info["city"]=$post["city"];
				$company_info["state"]=$post["state"];
				$company_info["zip"]=$post["zip"];
				$company_info["mobile"]=$post["mobile"];
				$company_info["fax"]=$post["fax"];
				$company_info["corp_email"]=$post["corp_email"];
				$company_info["corp_website"]=$post["corp_website"];				
				$company_info["no_of_employees"]=$post["no_of_employees"];
				$company_info["annual_revenue"]=$post["annual_revenue"];
				$company_info["licenses"]=$post["licenses"];
				$company_info["software"]=$post["software"];
				$company_info["year_started"]=$post["year_started"];
				$company_info["tax_id"]=$post["tax_id"];
				$company_info["hear_about"]=$post["hear_about"];
				$company_info["others"]=$post["others"];				
				$company_info["specify"]=$post["specify"];				
				$company_info["updated_at"]=date("Y-m-d");
				$company_info["status"]=$post["status"];				
				$company_info["membership_status"]=$post["membership_status"];				
				if($post["actived_date"]!=""){
				  $company_info["actived_date"]=date("Y-m-d",strtotime($post["actived_date"]));
				}
				$port_list="";
					
				
						if($_FILES["logo"]["name"]!=""){
						$config['overwrite'] = FALSE;
						$config['remove_spaces'] = TRUE;
						$config['allowed_types'] = 'jpg|jpeg|gif|png';
						$config['upload_path'] = './images/site/files';
						$config['remove_spaces'] = TRUE;
                        $config['encrypt_name'] = TRUE;
						$this->load->library('upload', $config);
						if ( $this->upload->do_upload('logo')){
							$imgDetailsd = $this->upload->data();
							$company_info['logo'] = $imgDetailsd['file_name'];
							$this->createThumbnail($company_info['logo'],200,200,"./images/site/files","./images/site/files/thumb/");
							
						}
						else
						{
							echo json_encode(array("status"=>"0","message"=>strip_tags($this->upload->display_errors())));
							die;
						}
											
						}
								
				$this->landing_model->update_details(COMPANY,$company_info,array("id"=>$id));
				$comp_id=$id;
				
				 echo json_encode(array("status"=>"1","message"=>"Member Profile Saved Successfully.","url"=>base_url("dashboard/")));
							die;	

		}
		else{
			        /* echo "<script>alert('Please fill all the fields.');</script>";
				    echo "<script>window.history.back();</script>"; */
					echo json_encode(array("status"=>"0","message"=>"Please fill all the fields."));
							die;
		}		
				
				
							
		}
		else{
			echo json_encode(array("status"=>"0","message"=>"Please login and continue."));
							die;   
		}
	}
	
	public function display_prime_members()
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Display Prime Members ";
			$this->load->view('admin/members/display_prime_members',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	public function display_primeMembers()
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
			$order="c.id";
			$dir="desc";
		}
        if($order=="country_name")
		{
			$order="cy.name";
			
		}
        if($order=="updated")
		{
			$order="date(c.updated_at)";
			$dir="desc";
		}
        		
        $totalData = $totalFiltered = $this->common_model_backend->get_ajax_all_members_list_title($limit,$start,$search,$order,$dir,"total_record_count","prime");
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->common_model_backend->get_ajax_all_members_list_title($limit,$start,$search,$order,$dir,"total_records","prime");
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->common_model_backend->get_ajax_all_members_list_title($limit,$start,$search,$order,$dir,"record_search","prime");
            $totalFiltered = $this->common_model_backend->get_ajax_all_members_list_title($limit,$start,$search,$order,$dir,"search_record_count","prime");
        }

        $data = array();
        if($result_set->num_rows()>0)
        {
			$i = $start+1;
            foreach ($result_set->result() as $return_rows)
            {
				$edit = "";
				$delete = "";
				$update = "";
				$condition1 = "";
				$condition2 = "";
				$condition3 = "";
				$prev = $this->data['prev'];
				if($prev==1 || (!empty($Members) && in_array('2',$Members))){
					$edit = "<a class='btn btn-success' href='".base_url()."admin/members/update_members/".$return_rows->id."'>Edit</a>";
				}
				if($prev==1 || (!empty($Members) && in_array('3',$Members))){
					$delete = '<a class="btn btn-danger" onclick="return confirm(\'Once deleted cant be recover again...\')" href="'.base_url().'admin/members/delete_members/'.$return_rows->id.'?ret='.base_url("admin/members/display_prime_members").'">Delete</a>';
				}				
				
				else
				{
					$edit = '-';
					$delete = '-';
				}
				$update = '<a class="btn btn-warning" href="'.base_url().'admin/members/view_member/'.$return_rows->id.'?ret='.base_url("admin/members/display_prime_members").'">View</a>';
				
				$status = ucfirst($return_rows->status); 
							 
                $nestedData['id'] = $i;
                $nestedData['name'] = $return_rows->trading_name;
                $nestedData['country_name'] = $return_rows->country_name;
                $nestedData['email'] = '<a href="mailto:'.$return_rows->email.'">'.$return_rows->email.'</a>';
                $nestedData['status'] = $status; 
                $nestedData['update'] = "<div class='hidden-sm hidden-xs action-buttons'>".$edit.$update.$delete."</div>";
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
	
	
	
	public function create_invoice($cid)
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Creating Invoice";
			$get_company=$this->common_model_backend->get_all_details(COMPANY,array("id"=>$cid))->row();
			$get_fee=$this->common_model_backend->get_all_details(FEES,array("id"=>"1"))->row();	
			$items = [];
			$data1 = [];
			$data2 = [];
			$amount = 0;
			$total_amount=0;
			$item_id = 0;
			$body_items='';
		    $office_info=$this->common_model_backend->get_all_details(OFFICE,array("company_id"=>$cid,),array("field"=>"is_ho","type"=>"desc"));
			$i=0;
			$nm='';
			foreach ($office_info->result() as $office) { #echo $office->is_ho;
				$id = $i;
				$amount=0;
				/*if ($office->is_ho == "1") {*/
				if($i==0){
					$item_id = 1;
					$amount = $get_company->application_fee==0?1250:$get_company->application_fee;
					$head_text=$get_fee->head_text==""?'Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your ':($get_fee->head_text);
					$title = $head_text.get_iata_name($office->iata_id);
					$order = 1;
					
					
				}
				else {
					
					if($i==0){
						$nm=get_iata_name($office->iata_id);
					}
					
					$amount += $get_company->branch_fee==0?250:$get_company->branch_fee;
					//$data2[] =get_iata_name($office->iata_id) . '(' . get_country_name($office->country_id) . ')';
					$office_text=$get_fee->branch_text==""?'Annual Membership Fee in respect of additional office ':($get_fee->branch_text);
					$title = $office_text.' '.get_iata_name($office->iata_id);
					$order = 2;
					
				}
					
				$items[$id] = array(
						'description' => $title,
						'amount' => $amount,
						'category_id' => 1,
						'order' => $order,
				);
				 $i++;
			}
			/* if($item_id==0){
				$head_text=$get_fee->head_text==""?'Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your ':($get_fee->head_text);
					$title = $head_text.' '.$nm;
				$items[0] = array(
						'description' => $title,
						'amount' => $get_company->application_fee==0?1250:$get_company->application_fee,
						'category_id' => 2,
						'order' => 3,
				);
			} */
		    if ($get_company->debts=="1") {
				
				$paytext=str_replace("[amount]",$get_fee->pay1_desc,$get_fee->payment_text);
				$payment_text=$get_fee->payment_text==""?'Payment Protection - up to USD '.$get_fee->pay1_desc.' per incident ':($paytext);
				$items[] = array(
						'description' => $payment_text,
						'amount' => $get_company->debts_fee==0?150:$get_company->debts_fee,
						'category_id' => 2,
						'order' => 3,
				);
				
				
			}
			if ($get_company->debts=="2") {
				$paytext=str_replace("[amount]",$get_fee->pay2_desc,$get_fee->payment_text);
				$payment_text=$get_fee->payment_text==""?'Payment Protection - up to USD '.$get_fee->pay2_desc.' per incident ':($paytext);
				$items[] = array(
						'description' => $payment_text,
						'amount' => $get_company->debts_fee==0?300:$get_company->debts_fee,
						'category_id' => 2,
						'order' => 3,
				);
				
				
			}
			if ($get_company->featured_member=="1") {
				$featured_text=$get_fee->featured_text==""?'Advertizing: Displayed as Featured Member on GLSN Homepage':$get_fee->featured_text;
				$items[] = array(
						'description' => $featured_text,
						'amount' => $get_company->featured_member_fee==0?500:$get_company->featured_member_fee,
						'category_id' => 2,
						'order' => 3,
				);
				
				
			}
			
			if ($get_company->top_listed_member=="1") {
				$toplist_text=str_replace("[country]",get_country_name($get_company->country_id),$get_fee->toplist_text);
				$ttext='Advertizing: Displayed as Top Listing on '.get_country_name($get_company->country_id).' Member Directory';
				$top_text=$get_fee->toplist_text==""?$ttext:($toplist_text);
				$items[] = array(
						'description' =>$top_text ,
						'amount' => $get_company->top_listed_member_fee==0?500:$get_company->top_listed_member_fee,
						'category_id' => 2,
						'order' => 4,
				);
				
				
			}
			if ($get_company->both_summit_fee!=0) { 
				/* $summits=explode(",",$get_company->summits);
						$summit_text=array();
						foreach($summits as $summit){
							$summit_text[]=get_summit_name($summit);
						}
						$su=' ';
						if(!empty($summit_text)){
							$su=implode(",",$summit_text)." ";
						} */
				$summit_text=$get_fee->summit_text==""?'Summit Fee for attending 2nd Bi-Annual Conference':$get_fee->summit_text;
				$items[] = array(
						
						
						'description' =>$summit_text,
						'amount' => $get_company->both_summit_fee==0?750:$get_company->both_summit_fee,
						'category_id' => 2,
						'order' => 4,
				);
				
				
			}
			if ($get_company->additional_person=="1") {
				$addtional_text=$get_fee->addtional_text==""?'Additional person for the summits.':$get_fee->addtional_text;
				$items[] = array(
						'description' => $addtional_text,
						'amount' => $get_company->additional_person_fee==0?700:$get_company->additional_person_fee,
						'category_id' => 2,
						'order' => 3,
				);
				
				
			}
			if ($get_company->country_id!="284") {
				$items[] = array(
						'description' => 'Inbound Wire Transfer Fee',
						'amount' => $get_fee->wire==0?25:$get_fee->wire,
						'category_id' => 2,
						'order' => 4,
				);
				
				
			}
			$address="";
			$company="";
			$city="";
			$state="";
			$country="";
			
			
			  $company=$get_company->name;
			  $address=$get_company->address1;
			  $city=$get_company->city;
			  $state=$get_company->state;
			  $zip=$get_company->zip;
			  $country=get_country_name($get_company->country_id);
			  $phone=$get_company->phone;
			  $fax=$get_company->fax;
			  $this->data['company']=$get_company->name;
			  $this->data['address1']=$get_company->address1;
			  $this->data['address2']=$get_company->address2;
			  $this->data['city']=$get_company->city;
			  $this->data['state']=$get_company->state;
			  $this->data['zip']=$get_company->zip;
			  $this->data['country']=get_country_name($get_company->country_id);
			  $this->data['phone']=$get_company->phone;
			  $this->data['fax']=$get_company->fax;
			  $this->data['items']=$items;
			  
		  
		  
		  $body_items ='<table style=" border-spacing: 0; width: 1170px; padding: 0px 20px 0 0;"><tbody>';
		  foreach($items as $item){
			  $total_amount=$total_amount+$item["amount"];
				$body_items.='<tr style="background: #DFDFDF; padding: 20px 0;width:1170px">
						<td style="padding: 20px 10px;">
						<h2 style="font-family: Lato; font-size: 22px; font-weight: bold; color: #4d4d4e; margin: 0; width: 800px; padding: 0px 0;">'.$item['description'].'</h2>
						</td>
						<td style="text-align: center;width:305px;padding: 20px 10px;">
						<p style="font-family: Lato; font-size: 22px; color: #6b6363; margin: 0; font-weight: bold;">'.number_format($item['amount'],2).'</p>
						</td></tr>';
		  }
		  $body_items .="</tbody></table>";
			//echo "<pre>"; print_r($items);
			$get_invoice_id=$this->common_model_backend->get_all_details(INVOICE,array(),array("field"=>"id","type"=>"desc"))->row()->id+1;
			$adminnewstemplateArr = array (
				            'email_title' => $this->config->item ( 'site_name' ),
							'site_name' => $this->config->item ( 'site_name' ),
							'site_url' => $this->config->item ( 'base_url' ),
							'invoice_no' => $get_invoice_id,
							'invoice_date' => date("M/d/Y"),
							'amount' => $total_amount,
							'city'=>$city,
							'state'=>$state,
							'address'=>$address,
							'country'=>$country,
							'company'=>$company,
							'body_items' => $body_items,
							'logo' => $this->data['logo'],
							'email' =>$get_company->email,
							'light' =>$this->data['logo'],
							'pay' =>base_url().'images/pay.png',
							'wire' =>base_url().'images/wire.png',
							'globe_icon' =>base_url().'images/globe_icon.png',
							'location_icon' =>base_url().'images/location_icon.png',
							'phone_icon' =>base_url().'images/phone_icon.png'
				);
				
				$message="";
				extract ( $adminnewstemplateArr );
				$message .= '<!DOCTYPE HTML>
					<html>
					<head>
					<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
					<meta name="viewport" content="width=device-width"/>
					<body>';
								
				include ('./email/email13.php');

				$message .= '</body>
					</html>';
			    $this->data['message']=stripslashes($message);
				$this->data['invoice_id']=$cid;
				$this->load->view('admin/members/invoice_viewer',$this->data);
			
			
		    }
		else
		{
			redirect(base_url().'admin');
		}	
	}
	public function generate_invoice($cid)
	  { 
			if($this->checkLogin('A')!=""){
			$this->load->library('m_pdf');
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Display Invoice";
			$post=$this->input->post();
			
			$get_fee=$this->common_model_backend->get_all_details(FEES,array("id"=>"1"))->row();
			$get_company=$this->common_model_backend->get_all_details(COMPANY,array("id"=>$cid))->row();
			
			
			$items = [];
			$data1 = [];
			$data2 = [];
			$amount = 0;
			$total_amount=0;
			$item_id = 0;
			$body_items='';
		    $i=0;
			$nm='';
			
			
			$company=$post["company_name"];
			$address1=$post["address1"];
			$address2=$post["address2"];
			$address=$address1.','.$address2;
			$city=$post["city"];
			$state=$post["state"];
			$country=$post["country"];
			$zip=$post["zip"];
			$items=array();
			if(count($post['amount'])>0){$i=0;
				foreach($post['amount'] as $amount){ 
					$items[]=array("amount"=>$amount,"description"=>$post['description'][$i]);
					$i++;
				}
			}
			
			#echo '<pre>'; print_r($items);die;
			 
		  $body_items ='<table style=" border-spacing: 0; width: 1170px; padding: 0px 20px 0 0;"><tbody>';
		  foreach($items as $item){
			  $total_amount=$total_amount+$item["amount"];
				$body_items.='<tr style="background: #DFDFDF; padding: 20px 0;width:1170px">
						<td style="padding: 20px 10px;">
						<h2 style="font-family: Lato; font-size: 22px; font-weight: bold; color: #4d4d4e; margin: 0; width: 800px; padding: 0px 0;">'.$item['description'].'</h2>
						</td>
						<td style="text-align: center;width:305px;padding: 20px 10px;">
						<p style="font-family: Lato; font-size: 22px; color: #6b6363; margin: 0; font-weight: bold;">'.number_format($item['amount'],2).'</p>
						</td></tr>';
		  }
		  $body_items .="</tbody></table>";
		  $invoice_array=array(
		  'company_name'=>$company,
		  'address1'=>$address1,
		  'address2'=>$address2,
		  'city'=>$city,
		  'state'=>$state,
		  'country'=>$country,
		  'zip'=>$zip,
		  'company_id'=>$cid,
		  'bill_to'=>$get_company->name.' \t '.$address.' \t '.$city.' \t '.$state.' \t '.$country,
		  'inv_number'=>"0",
		  'inv_date'=>date("Y-m-d"),
		  'amount'=>$total_amount,
		  'paid'=>"0",
		  'balance'=>$total_amount,
		  'notes'=>$post['notes'],
		  'terms'=>$post['terms'],
		  'inv_desc'=>$post['inv_desc'],
		  'transfer_desc'=>$post['transfer_desc'],
		  'description_text'=>json_encode($items),
		  'status'=>"open",
		  'sent_date'=>date("Y-m-d"),
		  'created_at'=>time(),
		  'updated_at'=>time()
		  );
		    $create_invoice=$this->common_model_backend->simple_insert(INVOICE,$invoice_array);	
			$invoice_id=$this->common_model_backend->get_last_insert_id();
			
			$this->common_model_backend->update_details(INVOICE,array("inv_number"=>date("Y").'-'.$invoice_id),array("id"=>$invoice_id));
			$adminnewstemplateArr = array (
				            'email_title' => $this->config->item ( 'site_name' ),
							'site_name' => $this->config->item ( 'site_name' ),
							'site_url' => $this->config->item ( 'base_url' ),
							'invoice_no' => date("Y").'-'.$invoice_id,
							'invoice_date' => date("M/d/Y"),
							'amount' => $total_amount,
							'company'=>$company,
						    'address1'=>$address1,
						    'address2'=>$address2,
						    'city'=>$city,
						    'state'=>$state,
						    'country'=>$country,
						    'zip'=>$zip,
							'notes'=>$post['notes'],
		                    'terms'=>$post['terms'],
							'inv_desc'=>$post['inv_desc'],
		                    'transfer_desc'=>$post['transfer_desc'],
							'body_items' => $body_items,
							'logo' => $this->data['logo'],
							'email' =>$get_company->email,
							'light' =>$this->data['logo'],
							'pay' =>base_url().'images/pay.png',
							'wire' =>base_url().'images/wire.png',
							'globe_icon' =>base_url().'images/globe_icon.png',
							'location_icon' =>base_url().'images/location_icon.png',
							'phone_icon' =>base_url().'images/phone_icon.png'
				);
				
				$message="";
				extract ( $adminnewstemplateArr );
				$message .= '<!DOCTYPE HTML>
					<html>
					<head>
					<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
					<meta name="viewport" content="width=device-width"/>
					<body>';
								
				include ('./email/email13.php');

				$message .= '</body>
					</html>';
			    $this->data['message']=stripslashes($message);
				$html=$this->load->view('admin/members/gen_invoice',$this->data,true);
				
			    $pdfFilePath =date("Y").'-'.$invoice_id.".pdf";
	 
			
			
			$pdf = new mPDF();
			$pdf->SetFont('lato');
			$pdf->SetFont('montserrat');
			
			$pdf->WriteHTML($html);
			$pdf->Output("./invoices/".$pdfFilePath, "F");
			$this->common_model_backend->update_details(INVOICE,array("inv_file"=>date("Y").'-'.$invoice_id),array("id"=>$invoice_id));
			$this->common_model_backend->update_details(COMPANY,array("status"=>"pending","approved_date"=>date("Y-m-d")),array("id"=>$get_company->id));
			$this->common_model_backend->update_details(OFFICE,array("status"=>"pending","approved_date"=>date("Y-m-d")),array("company_id"=>$get_company->id));
			 if ($get_company->featured_member=="1") {
			 $this->common_model_backend->update_details(ADVERTISING,array("status"=>"pending"),array("company_id"=>$get_company->id));
			 }
			
			
			
			
			$this->mail_model->send_invoice_mail($get_company->email,$get_company->trading_name,$pdfFilePath,date("Y").'-'.$invoice_id);
			
			 
			 
			 $this->session->set_flashdata('alert_message', 'Successfully invoice sent');
			 $this->session->set_flashdata('error_type', 'success');
			redirect(base_url('admin/members/display_pending_members'));
			}
			else{
				redirect(base_url("admin"));
			}
				
	  }
	  public function generate_invoice_old_method($cid)
	  { 
			if($this->checkLogin('A')!=""){
			$this->load->library('m_pdf');
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Display Invoice";
			$post=$this->input->post();
			
			$get_fee=$this->common_model_backend->get_all_details(FEES,array("id"=>"1"))->row();
			$get_company=$this->common_model_backend->get_all_details(COMPANY,array("id"=>$cid))->row();
			
			
			$items = [];
			$data1 = [];
			$data2 = [];
			$amount = 0;
			$total_amount=0;
			$item_id = 0;
			$body_items='';
		    $office_info=$this->common_model_backend->get_all_details(OFFICE,array("company_id"=>$cid),array("field"=>"is_ho","type"=>"desc"));
			$i=0;
			$nm='';
			foreach ($office_info->result() as $office) { #echo $office->is_ho;
				$id = $i;
				$amount=0;
				/* if ($office->is_ho == "1") { */
				if($i==0){
					$item_id = 1;
					$amount = $get_company->application_fee==0?1250:$get_company->application_fee;
					$head_text=$get_fee->head_text==""?'Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your ':($get_fee->head_text);
					$title = $head_text.get_iata_name($office->iata_id);
					$order = 1;
					
					
				}
				else {
					
					if($i==0){
						$nm=get_iata_name($office->iata_id);
					}
					
					$amount += $get_company->branch_fee==0?250:$get_company->branch_fee;
					//$data2[] =get_iata_name($office->iata_id) . '(' . get_country_name($office->country_id) . ')';
					$office_text=$get_fee->branch_text==""?'Annual Membership Fee in respect of additional office ':($get_fee->branch_text);
					$title = $office_text.' '.get_iata_name($office->iata_id);
					$order = 2;
					
				}
					
				$items[$id] = array(
						'description' => $title,
						'amount' => $amount,
						'category_id' => 1,
						'order' => $order,
				);
				 $i++;
			}
			/* if($item_id==0){
				$head_text=$get_fee->head_text==""?'Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your ':($get_fee->head_text);
					$title = $head_text.' '.$nm;
				$items[0] = array(
						'description' => $title,
						'amount' => $get_company->application_fee==0?1250:$get_company->application_fee,
						'category_id' => 2,
						'order' => 3,
				);
			} */
		    if ($get_company->debts=="1") {
				
				$paytext=str_replace("[amount]",$get_fee->pay1_desc,$get_fee->payment_text);
				$payment_text=$get_fee->payment_text==""?'Payment Protection - up to USD '.$get_fee->pay1_desc.' per incident ':($paytext);
				$items[] = array(
						'description' => $payment_text,
						'amount' => $get_company->debts_fee==0?150:$get_company->debts_fee,
						'category_id' => 2,
						'order' => 3,
				);
				
				
			}
			if ($get_company->debts=="2") {
				$paytext=str_replace("[amount]",$get_fee->pay2_desc,$get_fee->payment_text);
				$payment_text=$get_fee->payment_text==""?'Payment Protection - up to USD '.$get_fee->pay2_desc.' per incident ':($paytext);
				$items[] = array(
						'description' => $payment_text,
						'amount' => $get_company->debts_fee==0?300:$get_company->debts_fee,
						'category_id' => 2,
						'order' => 3,
				);
				
				
			}
			if ($get_company->featured_member=="1") {
				$featured_text=$get_fee->featured_text==""?'Advertizing: Displayed as Featured Member on GLSN Homepage':$get_fee->featured_text;
				$items[] = array(
						'description' => $featured_text,
						'amount' => $get_company->featured_member_fee==0?500:$get_company->featured_member_fee,
						'category_id' => 2,
						'order' => 3,
				);
				
				
			}
			
			if ($get_company->top_listed_member=="1") {
				$toplist_text=str_replace("[country]",get_country_name($get_company->country_id),$get_fee->toplist_text);
				$ttext='Advertizing: Displayed as Top Listing on '.get_country_name($get_company->country_id).' Member Directory';
				$top_text=$get_fee->toplist_text==""?$ttext:($toplist_text);
				$items[] = array(
						'description' =>$top_text ,
						'amount' => $get_company->top_listed_member_fee==0?500:$get_company->top_listed_member_fee,
						'category_id' => 2,
						'order' => 4,
				);
				
				
			}
			if ($get_company->both_summit_fee!=0) { 
				/* $summits=explode(",",$get_company->summits);
						$summit_text=array();
						foreach($summits as $summit){
							$summit_text[]=get_summit_name($summit);
						}
						$su=' ';
						if(!empty($summit_text)){
							$su=implode(",",$summit_text)." ";
						} */
				$summit_text=$get_fee->summit_text==""?'Summit Fee for attending 2nd Bi-Annual Conference':$get_fee->summit_text;
				$items[] = array(
						
						
						'description' =>$summit_text,
						'amount' => $get_company->both_summit_fee==0?750:$get_company->both_summit_fee,
						'category_id' => 2,
						'order' => 4,
				);
				
				
			}
			if ($get_company->additional_person=="1") {
				$addtional_text=$get_fee->addtional_text==""?'Additional person for the summits.':$get_fee->addtional_text;
				$items[] = array(
						'description' => $addtional_text,
						'amount' => $get_company->additional_person_fee==0?700:$get_company->additional_person_fee,
						'category_id' => 2,
						'order' => 3,
				);
				
				
			}
			if ($get_company->country_id!="284") {
				$items[] = array(
						'description' => 'Inbound Wire Transfer Fee',
						'amount' => $get_fee->wire==0?25:$get_fee->wire,
						'category_id' => 2,
						'order' => 4,
				);
				
				
			}
			$address="";
			$company="";
			$city="";
			$state="";
			$country="";
			
			
			  $address=$get_company->address1;
			  $city=$get_company->city;
			  $state=$get_company->state;
			  $zip=$get_company->zip;
			  $country=get_country_name($get_company->country_id);
			  $phone=$get_company->phone;
			  $fax=$get_company->fax;
			 
		  
		  $body_items ='<table style=" border-spacing: 0; width: 1170px; padding: 0px 20px 0 0;"><tbody>';
		  foreach($items as $item){
			  $total_amount=$total_amount+$item["amount"];
				$body_items.='<tr style="background: #DFDFDF; padding: 20px 0;width:1170px">
						<td style="padding: 20px 10px;">
						<h2 style="font-family: Lato; font-size: 22px; font-weight: bold; color: #4d4d4e; margin: 0; width: 800px; padding: 0px 0;">'.$item['description'].'</h2>
						</td>
						<td style="text-align: center;width:305px;padding: 20px 10px;">
						<p style="font-family: Lato; font-size: 22px; color: #6b6363; margin: 0; font-weight: bold;">'.number_format($item['amount'],2).'</p>
						</td></tr>';
		  }
		  $body_items .="</tbody></table>";
		  $invoice_array=array(
		  'company_id'=>$cid,
		  'bill_to'=>$get_company->name.' \t '.$address.' \t '.$city.' \t '.$state.' \t '.$country,
		  'inv_number'=>"0",
		  'inv_date'=>date("Y-m-d"),
		  'amount'=>$total_amount,
		  'paid'=>"0",
		  'balance'=>$total_amount,
		  'notes'=>$post['notes'],
		  'terms'=>$post['terms'],
		  'status'=>"open",
		  'sent_date'=>date("Y-m-d"),
		  'created_at'=>time(),
		  'updated_at'=>time()
		  );
		    $create_invoice=$this->common_model_backend->simple_insert(INVOICE,$invoice_array);	
			$invoice_id=$this->common_model_backend->get_last_insert_id();
			
			$this->common_model_backend->update_details(INVOICE,array("inv_number"=>date("Y").'-'.$invoice_id),array("id"=>$invoice_id));
			$adminnewstemplateArr = array (
				            'email_title' => $this->config->item ( 'site_name' ),
							'site_name' => $this->config->item ( 'site_name' ),
							'site_url' => $this->config->item ( 'base_url' ),
							'invoice_no' => date("Y").'-'.$invoice_id,
							'invoice_date' => date("M/d/Y"),
							'amount' => $total_amount,
							'city'=>$city,
							'notes'=>$post['notes'],
		                    'terms'=>$post['terms'],
							'state'=>$state,
							'address'=>$address,
							'country'=>$country,
							'company'=>$get_company->name,
							'body_items' => $body_items,
							'logo' => $this->data['logo'],
							'email' =>$get_company->email,
							'light' =>$this->data['logo'],
							'pay' =>base_url().'images/pay.png',
							'wire' =>base_url().'images/wire.png',
							'globe_icon' =>base_url().'images/globe_icon.png',
							'location_icon' =>base_url().'images/location_icon.png',
							'phone_icon' =>base_url().'images/phone_icon.png'
				);
				
				$message="";
				extract ( $adminnewstemplateArr );
				$message .= '<!DOCTYPE HTML>
					<html>
					<head>
					<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
					<meta name="viewport" content="width=device-width"/>
					<body>';
								
				include ('./email/email13.php');

				$message .= '</body>
					</html>';
			    $this->data['message']=stripslashes($message);
				$html=$this->load->view('admin/members/gen_invoice',$this->data,true);
				
			    $pdfFilePath =date("Y").'-'.$invoice_id.".pdf";
	 
			
			#$pdf = $this->m_pdf->load();
			$pdf = new mPDF();
			$pdf->SetFont('lato');
			$pdf->SetFont('montserrat');
			
			$pdf->WriteHTML($html,3);
			$pdf->Output("./invoices/".$pdfFilePath, "F");
			$this->common_model_backend->update_details(INVOICE,array("inv_file"=>date("Y").'-'.$invoice_id),array("id"=>$invoice_id));
			$this->common_model_backend->update_details(COMPANY,array("status"=>"pending","approved_date"=>date("Y-m-d")),array("id"=>$get_company->id));
			$this->common_model_backend->update_details(OFFICE,array("status"=>"pending","approved_date"=>date("Y-m-d")),array("company_id"=>$get_company->id));
			 if ($get_company->featured_member=="1") {
			 $this->common_model_backend->update_details(ADVERTISING,array("status"=>"pending"),array("company_id"=>$get_company->id));
			 }
			
			
			
			
			$this->mail_model->send_invoice_mail($get_company->email,$get_company->trading_name,$pdfFilePath,date("Y").'-'.$invoice_id);
			
			 
			 
			 $this->session->set_flashdata('alert_message', 'Successfully invoice sent');
			 $this->session->set_flashdata('error_type', 'success');
			redirect(base_url('admin/members/display_pending_members'));
			}
			else{
				redirect(base_url("admin"));
			}
				
	  }
	  public function test_mail(){
		  $this->mail_model->send_invoice_mail("siva.pictuscode@gmail.com","siva","2020-308.pdf","2020-308");
	  }
	  public function generate_invoice_test()
	  { 
			
			error_reporting(E_ALL);
			if($this->checkLogin('A')!=""){
			$this->load->library('m_pdf');
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Display Invoice";
			$post=$this->input->post();
			
			
			$items = [];
			$data1 = [];
			$data2 = [];
			$amount = 0;
			$total_amount=0;
			$item_id = 0;
			$body_items='';
		    $office_info=$this->common_model_backend->get_all_details(OFFICE,array("company_id"=>"3"));
			$i=1;
			foreach ($office_info->result() as $office) {
				$id = $i; $i++;
				if ($office->is_ho == 1) {
					$item_id = 1;
					$amount = 1250;
					$title = 'Annual Membership fees for Head Office and Office location ' . get_iata_name($office->iata_id) . ', ' . get_country_name($office->country_id);
					$order = 1;
					
				}
				else {
					
					$amount += 250;
					$data2[] =get_iata_name($office->iata_id) . '(' . get_country_name($office->country_id) . ')';
					$title = 'Annual Membership fees for Branch location ' . implode(', ', $data2);
					$order = 2;
					
				}
					
				$items[$item_id] = array(
						'description' => $title,
						'amount' => $amount,
						'category_id' => 1,
						'order' => $order,
				);
			}
		    if ($get_company->featured_member=="1") {
				$items[] = array(
						'description' => 'Annual Advertising Hyperlinked Logo Homepage',
						'amount' => 250,
						'category_id' => 2,
						'order' => 3,
				);
				
				
			}
			if ($get_company->top_listed_member=="1") {
				$items[] = array(
						'description' => 'Annual Top-Listed Member',
						'amount' => 250,
						'category_id' => 2,
						'order' => 4,
				);
				
				
			}
			$address="";
			$company="";
			$city="";
			$state="";
			$country="";
			
			
			  $address="Vellore";
			  $city="Chennai";
			  $state="Tamilnadu";
			  $zip="364552";
			  $country="India";
			  $phone="+91 989898";
			  $fax="+91 56665";
			 
		  
		  $body_items ='<table style=" border-spacing: 0; width: 1170px; padding: 0px 20px 0 0;"><tbody>';
		  foreach($items as $item){
			  $total_amount=$total_amount+$item["amount"];
				$body_items.='<tr style="background: #DFDFDF; padding: 20px 0;width:1170px">
						<td style="padding: 20px 10px;">
						<h2 style="font-family: Lato; font-size: 22px; font-weight: bold; color: #4d4d4e; margin: 0; width: 800px; padding: 0px 0;">Annual '.$item['description'].'</h2>
						</td>
						<td style="text-align: center;width:305px;padding: 20px 10px;">
						<p style="font-family: Lato; font-size: 22px; color: #6b6363; margin: 0; font-weight: bold;">'.number_format($item['amount'],2).'</p>
						</td></tr>';
		  }
		  $body_items .="</tbody></table>";
		  $invoice_array=array(
		  'company_id'=>$cid,
		  'bill_to'=>"name".' \t '.$address.' \t '.$city.' \t '.$state.' \t '.$country,
		  'inv_number'=>"0",
		  'inv_date'=>date("Y-m-d"),
		  'amount'=>$total_amount,
		  'paid'=>"0",
		  'balance'=>$total_amount,
		  'notes'=>"sdfsdf",
		  'terms'=>"sdfsdf",
		  'status'=>"open",
		  'sent_date'=>date("Y-m-d"),
		  'created_at'=>time(),
		  'updated_at'=>time()
		  );
		   
			$adminnewstemplateArr = array (
				            'email_title' => $this->config->item ( 'site_name' ),
							'site_name' => $this->config->item ( 'site_name' ),
							'site_url' => $this->config->item ( 'base_url' ),
							'invoice_no' => date("Y").'-'.$invoice_id,
							'invoice_date' => date("M/d/Y"),
							'amount' => $total_amount,
							'city'=>$city,
							'notes'=>"TESTsfsdf",
		                    'terms'=>"sdfsdterms",
							'state'=>$state,
							'address'=>$address,
							'country'=>$country,
							'company'=>"GMtechindia",
							'body_items' => $body_items,
							'logo' => $this->data['logo'],
							'email' =>"siva.gmtechindia@gmail.com",
							'light' =>$this->data['logo'],
							'pay' =>base_url().'images/pay.png',
							'wire' =>base_url().'images/wire.png',
							'globe_icon' =>base_url().'images/globe_icon.png',
							'location_icon' =>base_url().'images/location_icon.png',
							'phone_icon' =>base_url().'images/phone_icon.png'
				);
				
				$message="";
				extract ( $adminnewstemplateArr );
				$message .= '<!DOCTYPE HTML>
					<html>
					<head>
					<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
					<meta name="viewport" content="width=device-width"/>
					<body>';
								
				include ('./email/email13.php');

				$message .= '</body>
					</html>';
			    $this->data['message']=stripslashes($message);
				$html=$this->load->view('admin/members/gen_invoice',$this->data,true);
				
			    $pdfFilePath =date("Y").'-'.$invoice_id.".pdf";
	 
			
			#$pdf = $this->m_pdf->load();
			$pdf = new mPDF();
			$pdf->SetFont('lato');
			$pdf->SetFont('montserrat');
			
			$pdf->WriteHTML($html,2);
			$pdf->Output($pdfFilePath, "I");
			
			
			}
			else{
				redirect(base_url("admin"));
			}
				
	  }
	  
	  public function paid_member($cid)
	  { 
			if($this->checkLogin('A')!=""){
			$this->load->library('m_pdf');
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Display Invoice";			
			$this->data['invoice_info']=$invoice_info=$this->common_model_backend->get_all_details(INVOICE,array("company_id"=>$cid),array("type"=>"desc","field"=>"id"))->row();
			
			
			$this->common_model_backend->update_details(INVOICE,array("status"=>"paid","paid_date"=>date("Y-m-d")),array("id"=>$invoice_info->id));
			
			$payment_array=array();
			$payment_array['inv_id']=$invoice_info->id;
			$payment_array['pay_amount']=$invoice_info->amount;
			$payment_array['paid_on']=date("Y-m-d");
			$this->common_model_backend->simple_insert('fc_invoice_payment',$payment_array);
			
			$this->common_model_backend->update_details(COMPANY,array("status"=>"active","membership_status"=>"Member","actived_date"=>date('Y-m-d')),array("id"=>$cid));						
			
			$get_company=$this->common_model_backend->get_all_details(COMPANY,array("id"=>$cid))->row();
			
			if ($get_company->featured_member=="1") {
			 $this->common_model_backend->update_details(ADVERTISING,array("status"=>"active"),array("company_id"=>$get_company->id));
			 }						
			
			$this->common_model_backend->update_details(OFFICE,array("status"=>"active","actived_date"=>date('Y-m-d')),array("company_id"=>$cid,"status"=>"pending"));
						
			 /* save ref email list*/
			 $get_company1=$this->common_model_backend->get_all_details(COMPANY,array("id"=>$cid));
			 if($get_company1->num_rows()>0){
				 $summits_list=array();
				 if($get_company1->row()->summits!=""){
					 $summits_list=explode(",",$get_company1->row()->summits);
					 foreach($summits_list as $ls){
						 $check=$this->common_model_backend->get_all_details(ASSIGN_SUMMITS,array("summit_id"=>$ls,"company_id"=>$get_company1->row()->id));
						 if($check->num_rows()==0){
							 $this->common_model_backend->simple_insert(ASSIGN_SUMMITS,array("summit_id"=>$ls,"company_id"=>$get_company1->row()->id,"created"=>date("Y-m-d H:i:s")));
						 }
					 }
				 }
				 $company_ref=json_decode($get_company1->row()->data,true);
				 if(!empty($company_inf->reference_info)){
			     $data_info=json_decode($company_inf->reference_info,true);
			      $ref1_email=$data_info["ref1"]["email"];
				  $ref2_email=$data_info["ref2"]["email"];
				  $ref3_email=$data_info["ref3"]["email"];
				  $ref4_email=$data_info["ref4"]["email"];
				  $ref5_email=$data_info["ref5"]["email"];
				  
				  if($ref1_email!=""){
							$this->saveEmailBasedOnType("3",$ref1_email); 
				  }
				  if($ref2_email!=""){
							$this->saveEmailBasedOnType("3",$ref2_email); 
				  }
				  if($ref3_email!=""){
							$this->saveEmailBasedOnType("3",$ref3_email); 
				  }
				  if($ref4_email!=""){
							$this->saveEmailBasedOnType("3",$ref4_email); 
				  }
				  if($ref5_email!=""){
							$this->saveEmailBasedOnType("3",$ref5_email); 
				  }
				  
		    }
				 
				
					
				
				 
				 /* save member email list*/
				   if($get_company1->row()->email!=""){
				       $this->saveEmailBasedOnType("1",$get_company1->row()->email);
				       $this->saveEmailBasedOnType("1",$get_company1->row()->corp_email);
				   }					   
				 /* save member email list*/
			    
				/** Send solitication **/
				
               $question_array=array();
			   if(!empty($get_company1->row()->questions)){
			   $question_array=json_decode($get_company1->row()->questions,true);
			   foreach($question_array as $key => $qa){
				   if($qa==1){
					   $get_question=$this->common_model_backend->get_all_details(QUESTIONS,array("id"=>$key));
					   if($get_question->num_rows()>0){
						  $temp_id=$get_question->row()->email_template; 	
						  if($temp_id!=""){
						     $this->mail_model->send_solication($temp_id,$get_company1->row()->email,$get_company1->row()->name);
						  }
					   }
				   }
			   }
			   }
			   #die;
				/** Send solitication **/
				
			 }
			 
			 /* save ref email list*/
			 
			 
			 
			 $this->mail_model->send_member_confirmation_mail($get_company->trading_name,$get_company->email);
			
			
			redirect(base_url('admin/members/display_active_members/'));
			}
			else{
				redirect(base_url("admin"));
			}
				
	  }
	  

}
