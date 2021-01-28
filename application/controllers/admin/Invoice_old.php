<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends MY_Controller {
		 
	function __construct(){
        parent::__construct();
		$this->load->helper(array('cookie','date','form','email'));
		$this->load->library(array('encrypt','form_validation','session'));		
		$this->load->model('common_model_backend');
		
    }
	
	 
	
	public function display_invoice()
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
			 $dir = "desc";
		}
       		
        $totalData = $totalFiltered = $this->common_model_backend->get_ajax_invoice_list($limit,$start,$search,$order,$dir,"total_record_count");
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->common_model_backend->get_ajax_invoice_list($limit,$start,$search,$order,$dir,"total_records");
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->common_model_backend->get_ajax_invoice_list($limit,$start,$search,$order,$dir,"record_search");
            $totalFiltered = $this->common_model_backend->get_ajax_invoice_list($limit,$start,$search,$order,$dir,"search_record_count");
        }

        $data = array();
        if($result_set->num_rows()>0)
        {
			$i = $start+1;
            foreach ($result_set->result() as $return_rows)
            {
				
				$view = '<a class="btn btn-success" target="new"  href="'.base_url('invoices/'.$return_rows->inv_number.'.pdf').'">Download</a>';
				$nestedData['id'] = $i;
                $nestedData['company_name'] = $return_rows->company_name;
                $nestedData['inv_number'] = $return_rows->inv_number;
                $nestedData['inv_date'] = date("d-m-Y",strtotime($return_rows->inv_date));
                if($return_rows->status=="Paid"){
				$nestedData['paid_date'] = date("d-m-Y",strtotime($return_rows->paid_date));
				}
				else{
				$nestedData['paid_date'] = "-";
				}
                $nestedData['amount'] = $return_rows->amount;
                $nestedData['status'] = ucfirst($return_rows->status);
                $nestedData['update'] = '<div class="hidden-sm hidden-xs action-buttons">'.$view.'</div>';
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
	
	
   public function display_invoice_list()
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Display Invoice List";
			$this->load->view('admin/invoice/display_invoice_list',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	
	

}
