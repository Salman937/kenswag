<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller_dasboard extends CI_Controller 
{
    private $_uploaded;

	public function __construct()
	{
		parent::__construct();
		//Do your magic here

		if (!$this->ion_auth->logged_in() || $this->ion_auth->is_seller() != 1) 
		{	
			redirect('/','refresh');
		}
        
        $this->load->library('form_validation');
		
		$this->load->model('common_model');

		// pr($this->session->userdata());
        // die;
	}
	public function index()
	{

        $data['title'] = "Seller Dashboard";

		$where = array('id' => $this->session->userdata('user_id'));

        // Users Profile 
		$data['users'] = $this->common_model->getAllData('users','*',$where);

        // Users uploaded products
        $user_id = array('users_id' => $this->session->userdata('user_id'));

        $join_col = 'products.id = products_resources.products_id';

        $tbl3 = array('products_categories' => 'products_categories.id = products.products_categories_id');

        $data['products'] = $this->common_model->DJoin('*','products','products_resources',$join_col,$tbl3,$user_id,'','products_resources.products_id');

        //get messages
        $order_by = "id desc";

        $data['messages'] = $this->common_model->getAllData('messages','*',$user_id,$order_by);

        //get products reviews
        $fields = "rating,username,url,title";

        $usr_id = array('seller_id' => $this->session->userdata('user_id'));

        $join_col = 'products_ratings.users_id = users.id';

        $tbl3 = array(
                        'products' => 'products_ratings.products_id = products.id',
                        'products_resources' => 'products.id = products_resources.products_id',
                        'orders_items' => 'products_ratings.products_id = orders_items.products_id',
                        'orders' => 'orders.id = orders_items.orders_id',
                     );

        $group_by = 'products_resources.products_id';

        $data['reviews'] = $this->common_model->DJoin($fields,'products_ratings','users',$join_col,$tbl3,$usr_id,'',$group_by);

        //get all coupons code
        $where_coupon = array(
                                'seller_id'  => $this->session->userdata('user_id')
                              ); 


        $data['all_coupons'] = $this->common_model->getAllData('coupons','*',$where_coupon);


        //get all product vistis
        $view_fields = "title,price,quantity,url,views,product_views.updated_at AS updated_at,product_views.created_at AS created_at,description";

        $seller_id = array('seller_id' => $this->session->userdata('user_id'));

        $join_col = 'products.id = products_resources.products_id';

        $tbl3 = array('product_views' => 'products.id = product_views.products_id');

        $data['product_views'] = $this->common_model->DJoin($view_fields,'products','products_resources',$join_col,$tbl3,$seller_id,'','products_resources.products_id');


		$data['page'] = 'seller_dashboard/index';
		view('dashboard',$data);
	}

	public function product($value='')
	{
		view('products');
	}
	
    public function upload_product($value='')
	{
        if ($this->input->post()) 
        {
         
            //now we set a callback as rule for the upload field
            $this->form_validation->set_rules('img[]','Upload image','callback_fileupload_check');
            $this->form_validation->set_rules('post_title','Post Title','trim|required|is_unique[products.title]');
            $this->form_validation->set_rules('price','Price','trim|required|integer');
            $this->form_validation->set_rules('desc','Description','trim|required');
            $this->form_validation->set_rules('email','Email','trim|required');
            $this->form_validation->set_rules('loc','Location','trim|required');
            $this->form_validation->set_rules('phone','Phone Number','trim|required|integer');

            //run the validation
            if($this->form_validation->run() === TRUE)
            {
                if(empty(post('sub_cat'))) 
                {
                    $cateogry   = post('cateogry');
                }
                else
                {
                    $cateogry   = post('sub_cat');
                }

                $post_title = post('post_title');
                
                $price      = post('price');
                $desc       = post('desc');
                $email      = post('email');
                $loc        = post('loc');
                $phone      = post('phone');

                $data = array('products_categories_id' => $cateogry,
                              'users_id'      => $this->session->userdata('user_id'),
                              'title'         => post('post_title'),
                              'price'         => post('price'),
                              'description'   => post('desc'),
                              'quantity'      => post('qty'),
                              'featured'      => 0,
                              'email'         => post('email'),
                              'phone_number'  => post('phone'),    
                              'location'      => post('loc'),    
                              'created_at'    => date("Y-m-d H:i:s"),    
                              'updated_at'    => date("Y-m-d H:i:s"),    
                              );


                $this->common_model->InsertData('products',$data);

                $insert_id = $this->db->insert_id();

                // we retrieve the number of files that were uploaded
                $number_of_files = sizeof($_FILES['img']['tmp_name']);

                $files = $_FILES['img'];

                // we first load the upload library
                $this->load->library('upload');

                // next we pass the upload path for the images
                $config['upload_path'] = './upload/product_images';

                // also, we make sure we allow only certain type of images
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
             
                // now, taking into account that there can be more than one file, for each file we will have to do the upload
                for ($i = 0; $i < $number_of_files; $i++)
                {
                    $_FILES['img']['name']     = $files['name'][$i];
                    $_FILES['img']['type']     = $files['type'][$i];
                    $_FILES['img']['tmp_name'] = $files['tmp_name'][$i];
                    $_FILES['img']['error']    = $files['error'][$i];
                    $_FILES['img']['size']     = $files['size'][$i];
                      
                    //now we initialize the upload library
                    $this->upload->initialize($config);
                    
                    if ($this->upload->do_upload('img'))
                    {
                        $this->_uploaded[$i] = $this->upload->data();

                        $img = $this->_uploaded[$i]['file_name'];

                        $img_url = base_url().'upload/product_images/'.$img;

                        $data = array('products_id'   => $insert_id,
                                      'url'           => $img_url
                                      );

                        $this->common_model->InsertData('products_resources',$data);

                    }
                    else
                    {
                        $error = array('error',$this->upload->display_errors());
                    }
                }
                $msg = "Product Upload Successfully";
                $this->session->set_flashdata('success',$msg);
                redirect('upload-product','refresh');
            }
            else
            {
                $data['title'] = "Seller Dashboard";

                // select all product categories
                $data['categories'] = $this->common_model->getAllData('products_categories',"id,name",array('level' => 0));

                $data['page'] = 'seller_dashboard/upload_products';
                view('dashboard',$data);
            }
        }
        else
        {
            $data['title'] = "Upload Products";

            // select all product categories
            $data['categories'] = $this->common_model->getAllData('products_categories',"id,name",array('level' => 0));

            $data['page'] = 'seller_dashboard/upload_products';
            view('dashboard',$data);
        }
	}

    // now the callback validation that deals with the upload of files
    public function fileupload_check()
    { 
        
        // we retrieve the number of files that were uploaded
        $number_of_files = sizeof($_FILES['img']['tmp_name']);
     
        // considering that do_upload() accepts single files, we will have to do a small hack so that we can upload multiple files. For this we will have to keep the data of uploaded files in a variable, and redo the $_FILE.
        $files = $_FILES['img'];
     
        // first make sure that there is no error in uploading the files
        for($i=0; $i<$number_of_files; $i++)
        {
          if($_FILES['img']['error'][$i] != 0)
          {
            // save the error message and return false, the validation of uploaded files failed
            $this->form_validation->set_message('fileupload_check', 'Please add at least one Image');
            return FALSE;
          }
          return TRUE;
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
    public function sub_categories()
    {
       $id = post('id');

       $data['sub_cat'] = $this->common_model->getAllData('products_categories','id,name',array('parent_id' => $id));

       if (empty($data['sub_cat'])) 
       {
           $data['sub_cat'] = '';
       }
       else
       {
            view('ajax_view/sub_categories',$data);
       }

    }

    public function edit_product($value='')
    {
        if ($this->input->post()) 
        {
         
            //now we set a callback as rule for the upload field
            $this->form_validation->set_rules('img[]','Upload image','callback_fileupload_check');
            $this->form_validation->set_rules('post_title','Post Title','trim|required|is_unique[products.title]');
            $this->form_validation->set_rules('price','Price','trim|required|integer');
            $this->form_validation->set_rules('desc','Description','trim|required');
            $this->form_validation->set_rules('email','Email','trim|required');
            $this->form_validation->set_rules('loc','Location','trim|required');
            $this->form_validation->set_rules('phone','Phone Number','trim|required|integer');

            //run the validation
            if($this->form_validation->run() === TRUE)
            {
                if(empty(post('sub_cat'))) 
                {
                    $cateogry   = post('cateogry');
                }
                else
                {
                    $cateogry   = post('sub_cat');
                }

                $post_title = post('post_title');
                
                $price      = post('price');
                $desc       = post('desc');
                $email      = post('email');
                $loc        = post('loc');
                $phone      = post('phone');

                $data = array('products_categories_id' => $cateogry,
                              'users_id'      => $this->session->userdata('user_id'),
                              'title'         => post('post_title'),
                              'price'         => post('price'),
                              'description'   => post('desc'),
                              'quantity'      => post('qty'),
                              'featured'      => 0,
                              'email'         => post('email'),
                              'phone_number'  => post('phone'),    
                              'location'      => post('loc'),    
                              'created_at'    => date("Y-m-d H:i:s"),    
                              'updated_at'    => date("Y-m-d H:i:s"),    
                              );


                $this->common_model->InsertData('products',$data);

                $insert_id = $this->db->insert_id();

                // we retrieve the number of files that were uploaded
                $number_of_files = sizeof($_FILES['img']['tmp_name']);

                $files = $_FILES['img'];

                // we first load the upload library
                $this->load->library('upload');

                // next we pass the upload path for the images
                $config['upload_path'] = './upload/product_images';

                // also, we make sure we allow only certain type of images
                $config['allowed_types'] = 'gif|jpg|png';
             
                // now, taking into account that there can be more than one file, for each file we will have to do the upload
                for ($i = 0; $i < $number_of_files; $i++)
                {
                    $_FILES['img']['name']     = $files['name'][$i];
                    $_FILES['img']['type']     = $files['type'][$i];
                    $_FILES['img']['tmp_name'] = $files['tmp_name'][$i];
                    $_FILES['img']['error']    = $files['error'][$i];
                    $_FILES['img']['size']     = $files['size'][$i];
                      
                    //now we initialize the upload library
                    $this->upload->initialize($config);
                    
                    if ($this->upload->do_upload('img'))
                    {
                        $this->_uploaded[$i] = $this->upload->data();

                        $img = $this->_uploaded[$i]['file_name'];

                        $img_url = base_url().'upload/product_images/'.$img;

                        $data = array('products_id'   => $insert_id,
                                      'url'           => $img_url
                                      );

                        $this->common_model->InsertData('products_resources',$data);

                    }
                    else
                    {
                        $error = array('error',$this->upload->display_errors());
                    }
                }
                $msg = "Product Upload Successfully";
                $this->session->set_flashdata('success',$msg);
                redirect('upload-product','refresh');
            }
            else
            {
                // select all product categories
                $data['categories'] = $this->common_model->getAllData('products_categories',"id,name",array('level' => 0));

                $data['page'] = 'seller_dashboard/upload_products';
                view('dashboard',$data);
            }
        }
        else
        {
            $data['title'] = "Seller Dashboard";
            
            // Edit product
            $where = array('products_resources.products_id' => $this->uri->segment(2));

            $join_col = 'products.id = products_resources.products_id';

            $tbl3 = array('products_categories' => 'products_categories.id = products.products_categories_id');

            $data['edit_product'] = $this->common_model->DJoin('*','products','products_resources',$join_col,$tbl3,$where);

            // pr($data);die;

            $data['page'] = 'seller_dashboard/edit_product';
            view('dashboard',$data);
        }
    }

    // now the callback validation that deals with the upload of files
    public function edit_fileupload_check()
    { 
        
        // we retrieve the number of files that were uploaded
        $number_of_files = sizeof($_FILES['img']['tmp_name']);
     
        // considering that do_upload() accepts single files, we will have to do a small hack so that we can upload multiple files. For this we will have to keep the data of uploaded files in a variable, and redo the $_FILE.
        $files = $_FILES['img'];
     
        // first make sure that there is no error in uploading the files
        for($i=0; $i<$number_of_files; $i++)
        {
          if($_FILES['img']['error'][$i] != 0)
          {
            // save the error message and return false, the validation of uploaded files failed
            $this->form_validation->set_message('fileupload_check', 'Please add at least one Image');
            return FALSE;
          }
          return TRUE;
        }
    }

    function UpdateStatus()
    {
        $id = $this->input->post('id');
        $val = $this->input->post('val');

        $updateStatus = $this->common_model->UpdateDB('orders',array('id' => $id),array('order_status' => $val));
        if ($updateStatus) {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    function viewOrderDetails()
    {
        $id = $this->uri->segment(3);
        $data['title'] = "View Details";
        $data['page']  = 'seller_dashboard/viewdetails';
        $data['order'] = $this->common_model->getAllData('orders','',array('id' => $id));
        view('dashboard',$data);
    }
    public function read_messages()
    {
        $where = array('users_id' => $this->session->userdata('user_id'));

        $data = array('seen' => 1);

        $result = $this->common_model->UpdateDB('messages',$where,$data);

        echo json_encode($result);
    }
    public function contact()
    {
        $data = array(
                        'name'     => post('name'), 
                        'email'    => post('email'), 
                        'message'  => post('message'), 
                        'users_id' => $this->session->userdata('user_id'),
                        'created_at'  => date('Y-m-d H:i:s'), 
                        'updated_at'  => date('Y-m-d H:i:s')
                     );

        $result = $this->common_model->InsertData('contact_us',$data);

        if ($result) 
        {
            $msg = "Your Message Send Successfully to Admin";
            $this->session->set_flashdata('success',$msg);
            redirect('seller-dashboard','refresh');
        }
        else 
        {
            $msg = "Error! Cant Not Send message";
            $this->session->set_flashdata('error',$msg);
            redirect('seller-dashboard','refresh');
        } 
    }
    public function apply_coupon($value='')
    {
         $product_id = implode(',', post('product_id'));

         $data = array(
                        'coupon_code'    => post('coupon_code'), 
                        'products_id'    => $product_id, 
                        'quantity'       => post('qty'), 
                        'expire_date'    => post('date'), 
                        'discount_value' => post('discount_val'), 
                        'discount_type'  => post('discount_type'), 
                       );

         $result = $this->common_model->InsertData('coupons',$data);

         if ($result) 
            {
                $msg = "Coupon Successfully Applied on Products";
                $this->session->set_flashdata('success',$msg);
                redirect('seller-dashboard','refresh');
            }
            else 
            {
                $msg = "Error! Cant Not Apply Coupon Code";
                $this->session->set_flashdata('error',$msg);
                redirect('seller-dashboard','refresh');
            }  
    }
}   

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */