<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller_dasboard extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here

		if (!$this->ion_auth->logged_in() || $this->ion_auth->is_seller() != 1) 
		{	
			redirect('/','refresh');
		}
		
		$this->load->model('common_model');

		// pr($this->session->userdata());
	}
	public function index()
	{
		$where = array('id' => $this->session->userdata('user_id'));

		$data['users'] = $this->common_model->getAllData('users','*',$where);

		$data['page'] = 'seller_dashboard/index';
		view('dashboard',$data);
	}
	public function product($value='')
	{
		view('products');
	}
	public function upload_product($value='')
	{
		view('seller_dashboard/upload_products');
	}
	public function edit_profile()
	{
		if ($this->input->post()) 
		{

			$where_id = array('id' => $this->session->userdata('user_id'));

			$profile_data = array('city' 		=> post('city'),
            					  'state'       => post('state'),
            					  'country'     => post('contry'),
            					  'postal_code' => post('postal_code'),
            					  'address'     => post('addr'),
            					  'email' 	    => post('email'),
						   		  'phone' 		=> post('phone'),
        						  );

        	$result = $this->common_model->UpdateDB('users',$where_id,$profile_data);

        	if ($result) 
        	{
        		$msg = "Profile Updated Successfully";
        		$this->session->set_flashdata('success',$msg);
        		redirect('seller-dashboard','refresh');
        	}
        	else {
        		$msg = "Error! Profile not Update Successfully";
        		$this->session->set_flashdata('error',$msg);
        		redirect('seller-dashboard','refresh');
        	}
		} 
		else 
		{
			$msg = "We are not getting Values";
			$this->session->set_flashdata('error', $msg);
			redirect('seller-dashboard','refresh');
		}

	}
	public function upload()
	{
		$config['upload_path']          = './upload/profile_images';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file'))
        {
            $error = array('error' => $this->upload->display_errors());

            $msg = $error['error'];
            $this->session->set_flashdata('error',$msg);
            redirect('seller-dashboard','refresh');
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $img  = $data['upload_data']['file_name']; 
        }

        $profile_data = array('user_img' => $img);

        $id = array('id' => $this->session->userdata('user_id'));

    	$result = $this->common_model->UpdateDB('users',$id,$profile_data);

    	if ($result) 
    	{
    		$msg = "Profile Picture Updated Successfully";
    		$this->session->set_flashdata('success',$msg);
    		redirect('seller-dashboard','refresh');
    	}
    	else 
    	{
    		$msg = "Error! Profile not Update Successfully";
    		$this->session->set_flashdata('error',$msg);
        }    	
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */