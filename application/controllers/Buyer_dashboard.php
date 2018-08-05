<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buyer_dashboard extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here

		if (!$this->ion_auth->logged_in() || $this->ion_auth->is_buyer() != 1) 
		{	
			redirect('/','refresh');
		}

		$this->load->library('form_validation');
		
		$this->load->model('common_model');
	}

	public function index()
	{
		$data['title'] = "Buyer Dashboard";

        $user_id = array('favourite_products.users_id' => $this->session->userdata('user_id'));

        $fields = 'title,price,url';

        $Joinone = 'products.id = favourite_products.products_id';

        $jointbl3 = array('products_resources' => 'products.id = products_resources.products_id');

        $data['favort_items'] = $this->common_model->DJoin($fields,'favourite_products','products',$Joinone,$jointbl3,$user_id,'','products_resources.products_id');


		$data['page'] = 'buyer_dashboard/index';
		view('dashboard',$data);
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
            redirect('buyer-dashboard','refresh');
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
    		redirect('buyer-dashboard','refresh');
    	}
    	else 
    	{
    		$msg = "Error! Profile not Update Successfully";
    		$this->session->set_flashdata('error',$msg);
        }    	
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
        		redirect('buyer-dashboard','refresh');
        	}
        	else {
        		$msg = "Error! Profile not Update Successfully";
        		$this->session->set_flashdata('error',$msg);
        		redirect('buyer-dashboard','refresh');
        	}
		} 
		else 
		{
			$msg = "No Values Found";
			$this->session->set_flashdata('error', $msg);
			redirect('buyer-dashboard','refresh');
		}

	}

    function viewOrderDetails()
    {
        $id = $this->uri->segment(3);
        $data['title'] = "View Details";
        $data['page']  = 'buyer_dashboard/viewdetails';
        $data['order'] = $this->common_model->getAllData('orders','',array('id' => $id));
        view('dashboard',$data);
    }
    public function ratings($value='')
    {
        $data = array(
                        'products_id' => post('product_id'), 
                        'rating'      => post('stars'), 
                        'users_id'    => $this->session->userdata('user_id'), 
                        'created_at'  => date('Y-m-d H:i:s'), 
                        'updated_at'  => date('Y-m-d H:i:s'), 
                     );

        $result = $this->common_model->InsertData('products_ratings',$data);

        echo post('stars');
    }
    public function update_ratings($value='')
    {
        $where = array('products_id' => post('product_id'));

        $data = array(
                        'rating'      => post('stars'), 
                        'created_at'  => date('Y-m-d H:i:s'), 
                        'updated_at'  => date('Y-m-d H:i:s'), 
                     );

        $result = $this->common_model->UpdateDB('products_ratings',$where,$data);

        echo post('stars');
    }
}

/* End of file Buyer_dashboard.php */
/* Location: ./application/controllers/Buyer_dashboard.php */