<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends MY_Controller {
		 
	function __construct(){
        parent::__construct();
		$this->load->helper(array('cookie','date','form','email'));
		$this->load->library(array('encrypt','form_validation','session'));		
		$this->load->model('Payment_model_backend');
		$this->load->model('mail_model');
		
    }
	
	 
	
	public function display_payment($status='')
	{
	 if($this->checkLogin('A')!='')
		{ 
	    $limit = '';
		$start = '';
		$search = '';
		$order = '';
		$dir = '';
		$columns = array() ;
		$condition =array();
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
		if($status=='all')
		{
		}
		else
		{
			$condition['status']=$status;
		}
        $totalData = $totalFiltered = $this->Payment_model_backend->get_ajax_payment_list($limit,$start,$search,$order,$dir,"total_record_count",$condition);
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->Payment_model_backend->get_ajax_payment_list($limit,$start,$search,$order,$dir,"total_records",$condition);
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->Payment_model_backend->get_ajax_payment_list($limit,$start,$search,$order,$dir,"record_search",$condition);
            $totalFiltered = $this->Payment_model_backend->get_ajax_payment_list($limit,$start,$search,$order,$dir,"search_record_count",$condition);
        }

        $data = array();
        if($result_set->num_rows()>0)
        {
			$i = $start+1;
            foreach ($result_set->result() as $return_rows)
            {
				$Payfully='';
				$paypartial='';
				$view = '<a class="btn btn-success" target="new"  href="'.base_url('invoices/'.$return_rows->inv_number.'.pdf').'">Download</a>';
				if($return_rows->status == "open"){
				$Payfully = '<a class="btn btn-warning pay_full" data-url="'.base_url().'admin/invoice/get_full_amount" data-toggle="modal" data-target="#payment" data="'.$return_rows->id.'">Pay fully</a>';
				}
				else{
					$Payfully='';
				}
				if($return_rows->status != "paid"){
				$paypartial = '<a class="btn btn-danger pay_partial" data-url="'.base_url().'admin/invoice/get_inv_amount"  data-toggle="modal" data-target="#payment" data="'.$return_rows->id.'">Pay partial</a>';
				}
				else{
					$paypartial='';
				}
				$nestedData['id'] = $i;
                $nestedData['company_name'] = $return_rows->company_name;
                $nestedData['inv_number'] = $return_rows->inv_number;
                $nestedData['inv_date'] = date("d-m-Y",strtotime($return_rows->inv_date));
                
				$nestedData['paid_on'] = date("d-m-Y",strtotime($return_rows->paid_on));
				$nestedData['pay_amount'] = $return_rows->pay_amount;

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
	else
		{
			redirect(base_url().'admin');
		}	
			
	}
	
   public function display_payment_list()
	{
		if($this->checkLogin('A')!='')
		{   
		    $id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['status']='all';
			$this->data['heading']="Payment List";
			$this->load->view('admin/payment/display_payment_list',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	 

}
