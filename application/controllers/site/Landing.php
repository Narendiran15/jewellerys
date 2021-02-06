<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . "libraries/razorpay/razorpay-php/Razorpay.php";

class Landing extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'cookie', 'date', 'form', 'email'));
        $this->load->library(array('form_validation'));
        $this->load->model('landing_model');
        $this->load->model('mail_model');
        $this->load->helper('user');
        $this->load->library('pagination');
    }
    public function index()
    {
        $this->data['cat'] = $this->landing_model->get_all_details_limit(CATEGORY, array("status" => 'Active'), array('field' => 'id', 'type' => 'asc'), 4)->result();
        $this->data['out_products'] = $this->landing_model->get_our_products_cat_list()->result();
        $this->data['featured_products'] = $this->landing_model->get_featured_products_list()->result();
        $this->load->view('site/landing/landing', $this->data);
    }
    public function product_details($id)
    {
        $this->data['featured_products'] = $this->landing_model->get_products_details($id)->row();
        $this->load->view('site/landing/product-details', $this->data);
    }
    public function product_list()
    {
		$this->data['cat'] = $this->landing_model->get_all_details(CATEGORY, array("status" => 'Active'), array('field' => 'id', 'type' => 'asc'))->result();
        $this->data['product']= $this->landing_model->get_procucts_list()->result();
		$this->load->view('site/landing/product-list', $this->data);
    }

}
