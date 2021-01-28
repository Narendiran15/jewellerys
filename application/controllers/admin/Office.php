<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Office extends MY_Controller {
		 
	function __construct(){
        parent::__construct();
		$this->load->helper(array('cookie','date','form','email'));
		$this->load->library(array('encrypt','form_validation','session'));		
		$this->load->model('common_model_backend');
		$this->load->model('mail_model');
	    
		
    }
	public function display_all_offices()
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Display All Offices ";
			$this->load->view('admin/office/display_all_offices',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	public function display_new_offices()
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Display New Offices ";
			$this->load->view('admin/office/display_new_offices',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	public function display_pending_offices()
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Display Pending Offices ";
			$this->load->view('admin/office/display_pending_offices',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	public function display_active_offices()
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Display Active Offices ";
			$this->load->view('admin/office/display_active_offices',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	public function display_hold_offices()
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Display Hold Offices ";
			$this->load->view('admin/office/display_hold_offices',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	public function display_terminated_offices()
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Display Terminated Offices ";
			$this->load->view('admin/office/display_terminated_offices',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}

	public function display_allOffices()
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
        if($order=="port_name")
		{
			$order="p.name";
			
		}
        if($order=="updated")
		{
			$order="date(c.updated_at)";
			$dir="desc";
		}
        		
        $totalData = $totalFiltered = $this->common_model_backend->get_ajax_all_offices_list($limit,$start,$search,$order,$dir,"total_record_count","all");
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->common_model_backend->get_ajax_all_offices_list($limit,$start,$search,$order,$dir,"total_records","all");
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->common_model_backend->get_ajax_all_offices_list($limit,$start,$search,$order,$dir,"record_search","all");
            $totalFiltered = $this->common_model_backend->get_ajax_all_offices_list($limit,$start,$search,$order,$dir,"search_record_count","all");
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
				if($prev==1 || (!empty($Office) && in_array('2',$Office))){
					$edit = "<a class='btn btn-success' href='".base_url()."admin/office/update_office/".$return_rows->id."'>Edit</a>";
				}
				if($prev==1 || (!empty($Office) && in_array('3',$Office))){
					$delete = '<a class="btn btn-danger" onclick="return confirm(\'Once deleted cant be recover again...\')" href="'.base_url().'admin/office/delete_office/'.$return_rows->id.'?ret='.base_url("admin/office/display_all_offices").'">Delete</a>';
				}				
				
				else
				{
					$edit = '-';
					$delete = '-';
				}
				$update = '<a class="btn btn-warning" href="'.base_url().'admin/office/view_office/'.$return_rows->id.'?ret='.base_url("admin/office/display_all_offices").'">View</a>';
				
				$status = ucfirst($return_rows->status); 
							 
                $nestedData['id'] = $i;
                $nestedData['name'] = $return_rows->company_name;
                $nestedData['country_name'] = $return_rows->country_name;
                $nestedData['port_name'] = $return_rows->port_name;
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
	
	public function display_newOffices()
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
        if($order=="port_name")
		{
			$order="p.name";
			
		}
        if($order=="updated")
		{
			$order="date(c.updated_at)";
			$dir="desc";
		}
        		
        $totalData = $totalFiltered = $this->common_model_backend->get_ajax_all_offices_list($limit,$start,$search,$order,$dir,"total_record_count","new");
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->common_model_backend->get_ajax_all_offices_list($limit,$start,$search,$order,$dir,"total_records","new");
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->common_model_backend->get_ajax_all_offices_list($limit,$start,$search,$order,$dir,"record_search","new");
            $totalFiltered = $this->common_model_backend->get_ajax_all_offices_list($limit,$start,$search,$order,$dir,"search_record_count","new");
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
				if($prev==1 || (!empty($Office) && in_array('2',$Office))){
					$edit = "<a class='btn btn-success' href='".base_url()."admin/office/update_office/".$return_rows->id."'>Edit</a>";
				}
				if($prev==1 || (!empty($Office) && in_array('3',$Office))){
					$delete = '<a class="btn btn-danger" onclick="return confirm(\'Once deleted cant be recover again...\')" href="'.base_url().'admin/office/delete_office/'.$return_rows->id.'?ret='.base_url("admin/office/display_new_offices").'">Delete</a>';
				}				
				
				else
				{
					$edit = '-';
					$delete = '-';
				}
				$update = '<a class="btn btn-warning" href="'.base_url().'admin/office/view_office/'.$return_rows->id.'?ret='.base_url("admin/office/display_new_offices").'">View</a>';
				
				$status = ucfirst($return_rows->status); 
							 
                $nestedData['id'] = $i;
                $nestedData['name'] = $return_rows->company_name;
                $nestedData['country_name'] = $return_rows->country_name;
                $nestedData['port_name'] = $return_rows->port_name;
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
	public function display_pendingOffices()
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
        if($order=="port_name")
		{
			$order="p.name";
			
		}
        if($order=="updated")
		{
			$order="date(c.updated_at)";
			$dir="desc";
		}
        		
        $totalData = $totalFiltered = $this->common_model_backend->get_ajax_all_offices_list($limit,$start,$search,$order,$dir,"total_record_count","pending");
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->common_model_backend->get_ajax_all_offices_list($limit,$start,$search,$order,$dir,"total_records","pending");
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->common_model_backend->get_ajax_all_offices_list($limit,$start,$search,$order,$dir,"record_search","pending");
            $totalFiltered = $this->common_model_backend->get_ajax_all_offices_list($limit,$start,$search,$order,$dir,"search_record_count","pending");
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
				if($prev==1 || (!empty($Office) && in_array('2',$Office))){
					$edit = "<a class='btn btn-success' href='".base_url()."admin/office/update_office/".$return_rows->id."'>Edit</a>";
				}
				if($prev==1 || (!empty($Office) && in_array('3',$Office))){
					$delete = '<a class="btn btn-danger" onclick="return confirm(\'Once deleted cant be recover again...\')" href="'.base_url().'admin/office/delete_office/'.$return_rows->id.'?ret='.base_url("admin/office/display_pending_offices").'">Delete</a>';
				}				
				
				else
				{
					$edit = '-';
					$delete = '-';
				}
				$update = '<a class="btn btn-warning" href="'.base_url().'admin/office/view_office/'.$return_rows->id.'?ret='.base_url("admin/office/display_pending_offices").'">View</a>';
				
				$status = ucfirst($return_rows->status); 
							 
                $nestedData['id'] = $i;
                $nestedData['name'] = $return_rows->company_name;
                $nestedData['country_name'] = $return_rows->country_name;
                $nestedData['port_name'] = $return_rows->port_name;
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
	public function display_activeOffices()
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
        if($order=="port_name")
		{
			$order="p.name";
			
		}
        if($order=="updated")
		{
			$order="date(c.updated_at)";
			$dir="desc";
		}
        		
        $totalData = $totalFiltered = $this->common_model_backend->get_ajax_all_offices_list($limit,$start,$search,$order,$dir,"total_record_count","active");
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->common_model_backend->get_ajax_all_offices_list($limit,$start,$search,$order,$dir,"total_records","active");
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->common_model_backend->get_ajax_all_offices_list($limit,$start,$search,$order,$dir,"record_search","active");
            $totalFiltered = $this->common_model_backend->get_ajax_all_offices_list($limit,$start,$search,$order,$dir,"search_record_count","active");
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
				if($prev==1 || (!empty($Office) && in_array('2',$Office))){
					$edit = "<a class='btn btn-success' href='".base_url()."admin/office/update_office/".$return_rows->id."'>Edit</a>";
				}
				if($prev==1 || (!empty($Office) && in_array('3',$Office))){
					$delete = '<a class="btn btn-danger" onclick="return confirm(\'Once deleted cant be recover again...\')" href="'.base_url().'admin/office/delete_office/'.$return_rows->id.'?ret='.base_url("admin/office/display_active_offices").'">Delete</a>';
				}				
				
				else
				{
					$edit = '-';
					$delete = '-';
				}
				$update = '<a class="btn btn-warning" href="'.base_url().'admin/office/view_office/'.$return_rows->id.'?ret='.base_url("admin/office/display_active_offices").'">View</a>';
				
				$status = ucfirst($return_rows->status); 
							 
                $nestedData['id'] = $i;
                $nestedData['name'] = $return_rows->company_name;
                $nestedData['country_name'] = $return_rows->country_name;
                $nestedData['port_name'] = $return_rows->port_name;
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
	
	public function display_holdOffices()
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
        if($order=="port_name")
		{
			$order="p.name";
			
		}
        if($order=="updated")
		{
			$order="date(c.updated_at)";
			$dir="desc";
		}
        		
        $totalData = $totalFiltered = $this->common_model_backend->get_ajax_all_offices_list($limit,$start,$search,$order,$dir,"total_record_count","hold");
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->common_model_backend->get_ajax_all_offices_list($limit,$start,$search,$order,$dir,"total_records","hold");
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->common_model_backend->get_ajax_all_offices_list($limit,$start,$search,$order,$dir,"record_search","hold");
            $totalFiltered = $this->common_model_backend->get_ajax_all_offices_list($limit,$start,$search,$order,$dir,"search_record_count","hold");
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
				if($prev==1 || (!empty($Office) && in_array('2',$Office))){
					$edit = "<a class='btn btn-success' href='".base_url()."admin/office/update_office/".$return_rows->id."'>Edit</a>";
				}
				if($prev==1 || (!empty($Office) && in_array('3',$Office))){
					$delete = '<a class="btn btn-danger" onclick="return confirm(\'Once deleted cant be recover again...\')" href="'.base_url().'admin/office/delete_office/'.$return_rows->id.'?ret='.base_url("admin/office/display_hold_offices").'">Delete</a>';
				}				
				
				else
				{
					$edit = '-';
					$delete = '-';
				}
				$update = '<a class="btn btn-warning" href="'.base_url().'admin/office/view_office/'.$return_rows->id.'?ret='.base_url("admin/office/display_hold_offices").'">View</a>';
				
				$status = ucfirst($return_rows->status); 
							 
                $nestedData['id'] = $i;
                $nestedData['name'] = $return_rows->company_name;
                $nestedData['country_name'] = $return_rows->country_name;
                $nestedData['port_name'] = $return_rows->port_name;
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
	
		
	public function display_terminatedOffices()
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
        if($order=="port_name")
		{
			$order="p.name";
			
		}
        if($order=="updated")
		{
			$order="date(c.updated_at)";
			$dir="desc";
		}
        		
        $totalData = $totalFiltered = $this->common_model_backend->get_ajax_all_offices_list($limit,$start,$search,$order,$dir,"total_record_count","terminated");
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->common_model_backend->get_ajax_all_offices_list($limit,$start,$search,$order,$dir,"total_records","terminated");
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->common_model_backend->get_ajax_all_offices_list($limit,$start,$search,$order,$dir,"record_search","terminated");
            $totalFiltered = $this->common_model_backend->get_ajax_all_offices_list($limit,$start,$search,$order,$dir,"search_record_count","terminated");
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
				if($prev==1 || (!empty($Office) && in_array('2',$Office))){
					$edit = "<a class='btn btn-success' href='".base_url()."admin/office/update_office/".$return_rows->id."'>Edit</a>";
				}
				if($prev==1 || (!empty($Office) && in_array('3',$Office))){
					#$delete = '<a class="btn btn-danger" onclick="return confirm(\'Once deleted cant be recover again...\')" href="'.base_url().'admin/office/delete_office/'.$return_rows->id.'?ret='.base_url("admin/office/display_terminated_offices").'">Delete</a>';
				}				
				
				else
				{
					$edit = '-';
					$delete = '-';
				}
				$update = '<a class="btn btn-warning" href="'.base_url().'admin/office/view_office/'.$return_rows->id.'?ret='.base_url("admin/office/display_terminated_offices").'">View</a>';
				
				$status = ucfirst($return_rows->status); 
							 
                $nestedData['id'] = $i;
                $nestedData['name'] = $return_rows->company_name;
                $nestedData['country_name'] = $return_rows->country_name;
                $nestedData['port_name'] = $return_rows->port_name;
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
			    $this->data['user']=$this->common_model_backend->update_details(OFFICE,array("status"=>"terminated","terminated_date"=>date("Y-m-d")),array('id'=>$id));
				 $this->session->set_flashdata('alert_message', 'Successfully office terminated.');
		         $this->session->set_flashdata('error_type', 'success');
		}
		else
		{
			$this->session->set_flashdata('alert_message', 'Try again');
		         $this->session->set_flashdata('error_type', 'success');
		}
		if($_GET['ret']!=""){
			redirect($_GET['ret']);
		}
		else{
		redirect(base_url("admin/office/display_all_offices"));
		}
	}
	public function delete_members($id)
	{
		if($this->checkLogin('A')!='')
		{   
			    $post=$this->input->post();
			    $this->data['user']=$this->common_model_backend->update_details(COMPANY,array("status"=>"terminated"),array('id'=>$id));
				 $this->session->set_flashdata('alert_message', 'Successfully member terminated.');
		         $this->session->set_flashdata('error_type', 'success');
		}
		else
		{
			$this->session->set_flashdata('alert_message', 'try again');
		         $this->session->set_flashdata('error_type', 'error');
		}
		redirect(base_url("admin/members/display_all_members"));
	}
	
	  
	
	public function update_office($office_id)
	{
		if($this->checkLogin("A")!=""){
		$post=$this->input->post();
		$ret['status']=1;
		$this->data["office_id"]=$office_id;
		
		$id=$this->checkLogin("U")==""?0:$this->checkLogin("U");
		$this->data['office_info']=$this->landing_model->get_all_details(OFFICE,array("id"=>$office_id))->row();
		$this->data['country_code']=$this->landing_model->get_all_details(COUNTRY,array("id"=>$this->data['office_info']->country_id));
		
		$this->load->view('admin/office/update_office',$this->data);
		$ret['status']=1;
		}
		else{
		redirect(base_url("admin"));
		}
		//echo json_encode($ret);
		
	}
	
	
	
    public function edit_update_office()
	{
		$post=$this->input->post(); 
		
		$post_array=array("updated_at"=>date("Y-m-d H:i:s"));
					$contact_name_count=count($post['name']);
					$contact_array=array();
					for($i=0;$i<$contact_name_count;$i++){
						$contact_array[]=array("name"=>$post['name'][$i],"job_title"=>$post['job_title'][$i],"email"=>$post['email'][$i],"skype"=>$post['skype'][$i],"mobile"=>$post['mobile'][$i]);
					}
					$post_array["status"]=$post["status"];
					if($post['actived_date']!=""){
					  $post_array["actived_date"]=date("Y-m-d",strtotime($post["actived_date"]));
					}
					$post_array['contact_info']=json_encode($contact_array);
					$post_array['info']=$post['info'];
					//$post_array['is_ho']=$post['is_ho'];
					$post_array['address1']=$post['address1'];
					$post_array['address2']=$post['address2'];
					$post_array['city']=$post['city'];
					$post_array['state']=$post['state'];
					$post_array['zip']=$post['zip'];
					$post_array['phone']=$post['phone'];
					$post_array['fax']=$post['fax'];
					$post_array['branch_email']=$post['branch_email'];
					
						$id=$post["office_id"];
						if($id==""){
							$ret['status'] = 0;
				            $ret['message']="Session out try login agian...";
						}
						else{
							
							$t=$this->landing_model->update_details(OFFICE,$post_array,array("id"=>$post["office_id"]));
							
							$ret["status"]=1;
				$ret["message"]="Successfully fully saved.";
						}
		
		
			
				
				
				
				
				

				
				
		echo json_encode($ret);		
							
		
	}
	
	public function view_office($office_id)
	{
		
		if($this->checkLogin("A")!=""){
		$post=$this->input->post();
		$ret['status']=1;
		$this->data["office_id"]=$office_id;
		
		$id=$this->checkLogin("U")==""?0:$this->checkLogin("U");
		$this->data['office_info']=$this->landing_model->get_all_details(OFFICE,array("id"=>$office_id))->row();
		
		
		$this->load->view('admin/office/view_office',$this->data);
		$ret['status']=1;
		}
		else{
		redirect(base_url("admin"));
		}
		echo json_encode($ret);
		
	}
	
	

}
