<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AboutUs extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('common_model');
	}
	public function index()
	{
		$data['title'] = 'KK & M merchants';

		$data['page'] = 'information/about_us';
		view('template',$data);
	}

	public function contactus($value='')
	{
		$data['title'] = 'KK & M merchants';

		$data['page'] = 'information/contact_us';
		view('template',$data);	
	}
}

/* End of file AboutUs.php */
/* Location: ./application/controllers/AboutUs.php */