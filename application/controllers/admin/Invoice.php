<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends MY_Controller {
		 
	function __construct(){
        parent::__construct();
		$this->load->helper(array('cookie','date','form','email'));
		$this->load->library(array('encrypt','form_validation','session'));		
		$this->load->model('common_model_backend');
		$this->load->model('mail_model');
		$this->load->model('payment_model_backend');
		
    }
	
	 
	
	public function display_invoice($status='')
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
        $totalData = $totalFiltered = $this->payment_model_backend->get_ajax_invoice_list($limit,$start,$search,$order,$dir,"total_record_count",$condition);
               
        if(empty($this->input->post('search')['value']))
        {            
            $result_set = $this->payment_model_backend->get_ajax_invoice_list($limit,$start,$search,$order,$dir,"total_records",$condition);
        }
        else 
		{
            $search = $this->input->post('search')['value']; 
            $result_set =  $this->payment_model_backend->get_ajax_invoice_list($limit,$start,$search,$order,$dir,"record_search",$condition);
            $totalFiltered = $this->payment_model_backend->get_ajax_invoice_list($limit,$start,$search,$order,$dir,"search_record_count",$condition);
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
                if($return_rows->status=="Paid"){
				$nestedData['paid_date'] = date("d-m-Y",strtotime($return_rows->paid_date));
				}
				else{
				$nestedData['paid_date'] = "-";
				}
                $nestedData['amount'] = $return_rows->amount;
                $nestedData['status'] = ucfirst($return_rows->status);
                $nestedData['update'] = '<div class="hidden-sm hidden-xs action-buttons">'.$view.' '.$Payfully.' '.$paypartial.'</div>';
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
	public function save_payment()
	{
		
		if($this->checkLogin("A")!=""){
		$post=$this->input->post();
		$payment_array=array();
		$payment_array['inv_id']=$post['inv_id'];
		
		$payment_array['pay_amount']=$post['Pay_amount'];
		$payment_array['paid_on']=date("Y-m-d",strtotime($post['pay_date']));
		
		
		
		$this->landing_model->simple_insert('fc_invoice_payment',$payment_array);
		$last_id=$this->db->insert_id();
		$invoice_array=array();
		$invoice_array['status']='paid';
		
		$this->landing_model->update_details('fc_invoice',$invoice_array,array("id"=>$post['inv_id']));
		
		$this->session->set_flashdata('alert_message', 'paid successfully ');
		$this->session->set_flashdata('error_type', 'success');	
		redirect(base_url().'admin/invoice/generate_invoice/'.$id);			
		}
		
		else{
			redirect(base_url());
		}
	}
	public function update_payment()
	{
		
		if($this->checkLogin("A")!=""){
		$post=$this->input->post();
		$payment_array=array();
		$payment_array['inv_id']=$post['inv_id'];
		
		$payment_array['pay_amount']=$post['Pay_amount'];
		$payment_array['paid_on']=date("Y-m-d",strtotime($post['pay_date']));
		
		
		
		$this->landing_model->simple_insert('fc_invoice_payment',$payment_array);
		$last_id=$this->db->insert_id();
		$invoice_array=array();
		$pay_data=$this->common_model_backend->get_all_details("fc_invoice_payment",array("inv_id"=>$post['inv_id']));
		$balance=0.00;
		$balance_amount=0.00;
		if($pay_data->num_rows()>0){
		
		foreach($pay_data->result() as $p_data)
		{
		$balance= $balance + $p_data->pay_amount;
		}
		}
		$inv_details=$this->common_model_backend->get_all_details("fc_invoice",array("id"=>$post['inv_id']))->row();
		
		if($balance==$inv_details->amount){
		$invoice_array['status']='paid';
		}
		else if($balance < $inv_details->amount){
		$invoice_array['status']='partial';
		}
		$this->landing_model->update_details('fc_invoice',$invoice_array,array("id"=>$post['inv_id']));
		
		$this->session->set_flashdata('alert_message', 'paid successfully ');
		$this->session->set_flashdata('error_type', 'success');	
		redirect(base_url().'admin/invoice/generate_invoice/'.$id);			
		}
		
		else{
			redirect(base_url());
		}
	}
	public function get_full_amount()
	{
	 if($this->checkLogin('A')!='')
		{   
		$post=$this->input->post();
		$inv_id=$post['inv_id'];
		$invoice_details=$this->common_model_backend->get_all_details("fc_invoice",array("id"=>$inv_id))->row();
		$data=array();
		$data['id']=$invoice_details->id;
		$data['company_name']=$invoice_details->company_name;
		$data['amount']=$invoice_details->amount;
		
		$data['status']=1;
		
		echo json_encode($data);
		}
		else
		{
		$data['status']=0;
		echo json_encode($data);
		}	
	}
	public function get_inv_amount()
	{
	 if($this->checkLogin('A')!='')
		{   
		$post=$this->input->post();
		$inv_id=$post['inv_id'];
		$invoice_details=$this->common_model_backend->get_all_details("fc_invoice",array("id"=>$inv_id))->row();
		$pay_data=$this->common_model_backend->get_all_details("fc_invoice_payment",array("inv_id"=>$inv_id));
		
		$balance=0.00;
		$balance_amount=0.00;
		
		if($pay_data->num_rows()>0){
		foreach($pay_data->result() as $p_data)
		{
		$balance = $balance + $p_data->pay_amount;
		}
			
		}
		
		$balance_amount=$invoice_details->amount-$balance;
		$data=array();
		$data['id']=$invoice_details->id;
		$data['company_name']=$invoice_details->company_name;
		$data['amount']=$invoice_details->amount;
		$data['balance']=$balance_amount;
		
		$data['status']=1;
		
		echo json_encode($data);
		}
		else
		{
		$data['status']=0;
		echo json_encode($data);
		}	
	}
   public function display_invoice_list()
	{
		if($this->checkLogin('A')!='')
		{   
			
			
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['status']='all';
			$this->data['heading']="Display Invoice List";
			$this->load->view('admin/invoice/display_invoice_list',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	   public function paid_invoice_list()
	{
		if($this->checkLogin('A')!='')
		{   
			
			
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['status']='paid';
			$this->data['heading']="Display Invoice List";
			$this->load->view('admin/invoice/display_invoice_list',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	  public function create_invoice()
	{
		if($this->checkLogin('A')!='')
		{   
			$id=$this->checkLogin('A');
			$this->data['id']=$id;
			$this->data['heading']="Create Invoice";
			$this->load->view('admin/invoice/create_invoice',$this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
	public function save_invoice()
	{
		
		if($this->checkLogin("A")!=""){
		$post=$this->input->post();
		$invoice_array=array();
		$invoice_array['company_name']=$post['company_name'];
		$invoice_array['address1']=$post['address1'];
		$invoice_array['address2']=$post['address2'];
		$invoice_array['city']=$post['city'];
		$invoice_array['state']=$post['state'];
		$invoice_array['zip']=$post['zip'];
		$invoice_array['country']=$post['country'];
		#$invoice_array['id']=$post['invoiceid'];
		$invoice_array['company_mail']=$post['company_mail'];
		$invoice_array['status']="open";
		$invoice_array['created_at']=time();
		$invoice_array['updated_at']=time();
		$invoice_array['terms']=$post['terms'];
		$invoice_array['notes']=$post['notes'];
		$invoice_array['inv_desc']=$post['inv_desc'];
		$invoice_array['transfer_desc']=$post['transfer_desc'];
		$invoice_array['inv_date']=date("Y-m-d",strtotime($post['inv_date']));
		$invoice_array['amount']=$post['total_amount'];
		$product_info_array=array();
		$tot=0;
		
		for($i=0;$i<count($post['description']);$i++){
			$product_info_array[]=array('inv_line'=>$post['description'][$i],'amount'=>$post['amount'][$i]);
			$tot=$tot+$post['amount'][$i];		
		}
		if($tot==$post['total_amount']){
		$invoice_array['description_text']=json_encode($product_info_array);
		$this->landing_model->simple_insert(INVOICE,$invoice_array);
		$id=$this->landing_model->get_last_insert_id();
		$last_id=$this->db->insert_id();
		$this->session->set_flashdata('alert_message', 'Invoice generated successfully ');
		$this->session->set_flashdata('error_type', 'success');	
		redirect(base_url().'admin/invoice/generate_invoice/'.$id);			
		}
		else{
		$this->session->set_flashdata('alert_message', 'Something went to wrong.');
		$this->session->set_flashdata('error_type', 'error');			 
		redirect(base_url('display_invoice'));	
		}
		}
		else{
			redirect(base_url());
		}
	}
	public function generate_invoice($inv_id)
	  { 
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
			$i=0;
			$nm='';
			
			$address="";
			$company="";
			$city="";
			$state="";
			$country="";
			
	
			 
		$invoice_details=$this->common_model_backend->get_all_details("fc_invoice",array("id"=>$inv_id))->row();
			
			  $companyname=$invoice_details->company_name;
			  $address1=$invoice_details->address1;
			  $address2=$invoice_details->address2;
			  $address= "".$address1." ". $address2;
			  $city=$invoice_details->city;
			  $state=$invoice_details->state;
			  $zip=$invoice_details->zip;
			  $country=$invoice_details->country;
			 
			  $inv_number=date("Y",strtotime($invoice_details->inv_date)).'-'.$inv_id;
		
		 $info=json_decode($invoice_details->description_text,true);
			$body_items ='<table style="margin-top: 50px; border-spacing: 0; border-bottom: 3px solid #2A2F75; width: 100%;">
			<thead>
			<tr style="background: #2A2F75; padding: 20px 0;">
			<th style="font-family: Lato; font-size: 22px; color: #ffffff; margin: 0; width: 900px; padding: 20px 20px; text-align: center;"><strong><span style="font-size: 18pt;">Description:</span></strong></th>
			<th style="font-family: Lato; font-size: 22px; color: #ffffff; margin: 0; width: 300px; padding: 20px 20px; text-align: center;"><strong><span style="font-size: 18pt;">Total Due in USD:<br /></span></strong></th>
			</tr>
			</thead>
			';
		  $body_items .='<tbody>';
		  foreach($info as $item){
			$total_amount=$total_amount+$item["amount"];
			$body_items.='<tr style="background: #DFDFDF; padding: 20px 0;width:1170px">
						<td style="padding: 20px 10px;">
						<h2 style="font-family: Lato; font-size: 22px; font-weight: bold; color: #4d4d4e; margin: 0; width: 800px; padding: 0px 0;">'.$item['inv_line'].'</h2>
						</td>
						<td style="text-align: center;width:305px;padding: 20px 10px;">
						<p style="font-family: Lato; font-size: 22px; color: #6b6363; margin: 0; font-weight: bold;">'.number_format($item['amount'],2).'</p>
						</td></tr>';
		  }
		  $total_amount=number_format($total_amount,2);
		  $body_items .="</tbody></table>";
		
			$this->common_model_backend->update_details(INVOICE,array("inv_number"=>$inv_number),array("id"=>$inv_id));
			$adminnewstemplateArr = array (
				            'email_title' => $this->config->item ( 'site_name' ),
							'site_name' => $this->config->item ( 'site_name' ),
							'site_url' => $this->config->item ( 'base_url' ),
							'invoice_no' => $inv_number,
							'invoice_date' =>date("M/d/Y",strtotime($invoice_details->inv_date)),
							'amount' => $total_amount,
							'city'=>$city,
							'notes'=>$invoice_details->notes,
		                    'terms'=>$invoice_details->terms,
							'state'=>$state,
							'zip'=>$invoice_details->zip,
							'transfer_desc'=>$invoice_details->transfer_desc,
							'inv_desc'=>$invoice_details->inv_desc,
							'address1'=>$address1,
							'address1'=>$address1,
							'country'=>$country,
							'company'=>$companyname,
							'body_items' => $body_items,
							'logo' => $this->data['logo'],
							'email' =>$invoice_details->company_mail,
							'light' =>$this->data['logo'],
							'pay' =>base_url().'images/pay.png',
							'wire' =>base_url().'images/wire.png',
							'globe_icon' =>base_url().'images/globe_icon.png',
							'location_icon' =>base_url().'images/location_icon.png',
							'phone_icon' =>base_url().'images/phone_icon.png'
				);
				
			
	 
			$msg = '
<tbody>
<tr style="width: 1170px;">
<td style="width: 1170px;">
<table style="padding: 0px 20px; width: 1170px;">
<tbody>
<tr>
<td>
<table style="width: 770px;">
<tbody>
<tr style="width: 770px;">
<td style="width: 770px;"><img src="'.$this->data['logo'].'" alt="GLSN Logo" width="250" height="66" /></td>
</tr>
<tr>
<td style="width: 770px;">
<h2 style="width: 770px; font-family: Montserrat; font-size: 30px; margin: 0; color: #2a2f75; font-weight: bold;">Lighthouse Network Management, Inc.</h2>
<p style="width: 770px; font-family: Lato; font-size: 22px; margin: 0;">3300 West Rolling Hills Circle, Unit 607<br />Davie, FL 33328, United States of America<br />For questions :&nbsp;&nbsp; <a href="mailto:info@4GLSN.com">info@4GLSN.com</a></p>
</td>
</tr>
</tbody>
</table>
</td>
<td style="width: 400px; text-align: right;">
<h2 style="font-family: Montserrat; font-size: 70px; font-weight: bold; margin: 0; color: #2a2f75;">INVOICE</h2>
</td>
</tr>
</tbody>
</table>
<table style="margin-top: 50px; padding: 0 20px; width: 1170px;">
<tbody>
<tr style="width: 1170px;">
<td style="width: 585px;">
<p style="font-family: Lato; font-size: 22px; margin: 0;">Invoice To:<br /><br /></p>
<p style="font-family: Lato; font-size: 25px; margin: 0; font-weight: bold;"><span style="font-size: 24pt;">'.$company_name.'</span></p>
<p style="font-family: Lato; font-size: 25px; margin: 0; font-weight: bold;">'.$address.'</p>
<p style="font-family: Lato; font-size: 25px; margin: 0; font-weight: bold;">'.$city.', '.$state.', '.$invoice_details->zip.'</p>

</td>
<td style="width: 585px; text-align: right; vertical-align: top;" align="right">
<table>
<tbody>
<tr>
<td>
<p style="font-family: Lato; font-size: 22px; margin: 0;">Invoice #:</p>
</td>
<td>
<p style="font-family: Lato; font-size: 22px; margin: 0;">'.$inv_number.'</p>
</td>
</tr>
<tr>
<td>
<p style="font-family: Lato; font-size: 22px; margin: 0;">Date:</p>
</td>
<td>
<p style="font-family: Lato; font-size: 22px; margin: 0;">'.date("M/d/Y",strtotime($invoice_details->inv_date)).'</p>
</td>
</tr>
<tr>
<td>
<p style="font-family: Lato; font-size: 22px; margin: 0;">Terms:</p>
</td>
<td>
<p style="font-family: Lato; font-size: 22px; margin: 0;">'.$invoice_details->terms.'</p>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table style="margin-top: 50px; padding: 0 20px;">
<tbody>
<tr>
<td style="width: 585px; vertical-align: top;">
<p style="font-family: Lato; font-size: 22px; margin: 0;">Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mailto:'.$invoice_details->company_mail.'">'.$invoice_details->company_mail.'</a></p>
</td>
<td style="width: 585px; text-align: right; vertical-align: top;">
<p style="font-family: Lato; font-size: 28px; font-weight: bold; color: #2a2f75; margin: 0;">Total Due:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; USD '.$total_amount.'</p>
</td>
</tr>
</tbody>
</table>
<table style="width: 1170px; margin-top: 35px; padding: 0 20px;">
<tbody>
<tr style="width: 1170px;">
<td style="width: 1170px; text-align: center;">
<p style="width: 1170px; font-family: Lato; font-size: 24px; color: #4d4d4e; margin: 0; font-weight: bold;"><strong><span style="font-size: 24pt;">'.$invoice_details->inv_desc.'</span></strong></p>
</td>
</tr>
</tbody>
</table>'.
$body_items.'
<table style="padding: 50px 20px 50px 20px; background: #F3F6F6;">
<tbody>
<tr>
<td style="width: 685px;">
<p style="font-family: Lato; font-size: 22px; font-weight: bold; margin: 0;">Wire Transfer Instructions:</p>
<p style="font-family: Lato; font-size: 22px; margin: 0;">'.$invoice_details->transfer_desc.'</p>
<p style="font-family: Lato; font-size: 22px; margin: 0;">&nbsp;</p>
</td>
<td style="width: 485px;" align="right">
<table style="width: 410px; border-spacing: 0;">
<tbody>
<tr>
<td style="padding: 10px 10px;">
<p style="font-family: Lato; font-size: 24px; color: #8b8c8c; margin: 0;">&nbsp;</p>
</td>
<td style="padding: 10px 10px; text-align: right;">
<p style="font-family: Lato; font-size: 24px; color: #8b8c8c; margin: 0; text-align: right;">&nbsp;</p>
</td>
</tr>
</tbody>
<tbody>
<tr style="background: #2A2F75;">
<td style="padding: 15px 10px;">
<p style="font-family: Lato; font-size: 24px; color: #ffffff; margin: 0;">USD Total:</p>
</td>
<td style="padding: 15px 10px; text-align: right;">
<p style="font-family: Lato; font-size: 24px; color: #ffffff; margin: 0px; text-align: left;">'.$total_amount.'</p>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table style="width: 1170px; margin-top: 35px; padding: 0 20px;">
<tbody>
<tr style="width: 1170px;">
<td style="width: 1170px; text-align: center;">
<p style="font-family: Lato; font-size: 24px; color: #4d4d4e; margin: 0; font-weight: bold;">PLEASE EXPEDITE PAYMENT OF THIS INVOICE</p>
</td>
</tr>
</tbody>
</table>
<table style="width: 1170px; margin-top: 35px; padding: 0 20px;">
<tbody>
<tr style="width: 1170px;">
<td style="width: 585px; text-align: left;">
<table align="center">
<tbody>
<tr>
<td><img src="'.base_url().'images/globe_icon.png" /></td>
<td style="text-align: left;">
<p style="font-family: Lato; font-size: 22px; color: #4d4d4e; margin: 0 0px 0 10px;"><a href="mailto:info@4GLSN.com">info@4GLSN.com</a></p>
<p style="font-family: Lato; font-size: 22px; color: #4d4d4e; margin: 0 0px 0 10px;"><a href="http://www.4GLSN.com">www.4GLSN.com</a></p>
</td>
</tr>
</tbody>
</table>
</td>
<td style="width: 585px; text-align: center;">
<table align="center">
<tbody>
<tr>
<td><img src="'.base_url().'images/location_icon.png" /></td>
<td style="text-align: left;">
<p style="font-family: Lato; font-size: 22px; color: #4d4d4e; margin: 0 0px 0 10px;">3300 West Rolling Hills Circle, Unit 607,<br />Davie, FL 33328, United States of America</p>
</td>
</tr>
</tbody>
</table>
</td>
<!--<td style="width: 390px; text-align: center;">
<table align="center">
<tbody>
<tr>
<td><img src="'.base_url().'images/phone_icon.png" /></td>
<td style="text-align: left;">
<p style="font-family: Lato; font-size: 22px; color: #4d4d4e; margin: 0 0px 0 10px;">Please join our OLP Whatsapp group at 516-356-7791</p>
</td></tr>
</tbody>
</table>
</td>--></tr>
</tbody>
</table>
<table style="width: 1170px; margin-top: 35px; padding: 0 20px;">
<tbody>
<tr style="width: 1170px;">
<td style="width: 1170px; text-align: center;">
<p style="font-family: Lato; font-size: 20px; color: #6b6363; margin: 0;">'.$invoice_details->notes.'</p>
</td>
</tr>
</tbody>
</table>
<table style="width: 1170px; margin-top: 35px; padding: 0 20px;">
<tbody>
<tr style="width: 1170px;">
<td style="width: 1170px; text-align: center;">
<p style="font-family: Lato; font-size: 24px; color: #4d4d4e; margin: 0; font-weight: bold;">Lighthouse Network Management, Inc. is the proud owner of "Global Logistics Summit Network" (GLSN)</p>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>';
				$message="";
				//extract ( $adminnewstemplateArr );
				$message .= '<!DOCTYPE HTML>
					<html>
					<head>
					<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
					<meta name="viewport" content="width=device-width"/>
					<body>';
								
				//include ('./email/email13.php');
					$message .=	$msg;
				$message .= '</body>
					</html>';
					
			    $this->data['message']=stripslashes($message);
				$html=$this->load->view('admin/members/gen_invoice',$this->data,true);
				
			    $pdfFilePath =$inv_number.".pdf";
			#$pdf = $this->m_pdf->load();
			$pdf = new mPDF();
			$pdf->SetFont('lato');
			$pdf->SetFont('montserrat');
			
			$pdf->WriteHTML($html,0);
			$pdf->Output("./invoices/".$pdfFilePath, "F");
			
			$this->common_model_backend->update_details(INVOICE,array("inv_file"=>$inv_number,"inv_number"=>$inv_number),array("id"=>$inv_id));
			#$this->mail_model->send_invoice_mail($invoice_details->company_mail," ",$inv_number);
			
			$this->session->set_flashdata('alert_message', 'Successfully invoice sent');
			$this->session->set_flashdata('error_type', 'success');
			
			redirect(base_url('admin/invoice/display_invoice_list'));
			}
			else{
				redirect(base_url("admin"));
			}
				
	  }
	

}
