<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	public function index()
	{
		view('index');
	}
	public function product($value='')
	{
		view('products');
	}
	public function upload_products($value='')
	{
		view('upload_products');
	}
	public function seller_dashboard($value='')
	{
		view('seller_dashboard');
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */