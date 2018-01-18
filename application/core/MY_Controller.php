<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->ion_auth->user_group();
	}
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */
