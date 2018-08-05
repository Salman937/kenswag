<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('common_model');
		$this->load->library(array('cart'));
	}
	public function index()
	{
		$data['title'] = "KK & M merchants | Product Categories";

		$category = $this->uri->segment(3);

		
		$data['page'] = 'products/products'; 
		view('template',$data);
	}
	public function view_product()
	{
		$data['title'] = "KK & M merchants | Product Detail";

		$id = $this->uri->segment(2);

		//View product details
		$fields = 'products.users_id AS user_id,products.id AS product_id,products.products_categories_id AS products_categories_id,products_categories.name AS cat_name,products.title AS title,products.price AS price,products.description AS description,products.quantity AS quantity,products.location AS location,products_resources.url AS url';

		$join_col = "products.id = products_resources.products_id";

		$jointbl3 = array('products_categories' => 'products.products_categories_id = products_categories.id', );

		$data['product_detail'] = $this->common_model->DJoin($fields,'products','products_resources',$join_col,$jointbl3,array('products.id' => $id));

		$seller_id = $data['product_detail'][0]->user_id;

		//view related product details
		$cols = 'products.id AS product_id,products.title AS title,products.price AS price,products_resources.url AS url';

		$data['related_products'] = $this->common_model->DJoin($cols,'products','products_resources',$join_col,'',array('products.products_categories_id' => $data['product_detail'][0]->products_categories_id),'','products.id');


		//insert product views
		$check = $this->common_model->getAllData('product_views','*',array('products_id' => $this->uri->segment(2)));

		if (!empty($check)) 
		{
			$update_view = $check[0]->views + 1;

			$page = array(
							'views'       => $update_view, 
							'updated_at'  => date('Y-m-d'), 
						 );

			$this->common_model->UpdateDB('product_views',array('products_id' => $this->uri->segment(2)),$page);
		}
		else
		{
			$page = array(
							'seller_id'   => $seller_id, 
							'products_id' => $this->uri->segment(2), 
							'views'       => 1, 
							'created_at'  => date('Y-m-d'), 
						 );

			$this->common_model->InsertData('product_views',$page);
		}

		$data['page'] = 'products/product'; 
		view('template',$data);
	}
	public function products_category($page = "")
	{
		$data['title'] = "KK & M merchants | Product Categories";

		$category = $this->uri->segment(3);

		//getting category products

		$join_col = "products.products_categories_id = products_categories.id";

		$tbl3 = array('products_resources' => 'products.id = products_resources.products_id');

		$where = array('products_categories.slug' => $category);

		$fields = 'products.id AS product_id,products.products_categories_id AS products_categories_id,products_categories.name AS cat_name,products_categories.slug AS slug,products.title AS title,products.price AS price,products.quantity AS quantity,products.location AS location,products_resources.url AS url';

		$group_by = "products.id";

		$data['cat_products'] = $this->common_model->DJoin($fields,'products','products_categories',$join_col,$tbl3,$where,'',$group_by);

		if (empty($data['cat_products'][0]->slug)) 
		{
			$slug = '';
		}
		else
		{
			$slug = $data['cat_products'][0]->slug;
		}

		$count_arr = sizeof($data['cat_products']);

        $this->load->library('pagination');

        $config['base_url']         = base_url('products/products_category/').$slug;
        $config['total_rows']       = $count_arr;
        $config['per_page']         = 4;
        $config['first_link'] 		= 'First';
        $config['last_link'] 		= 'Last';
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] 	= '<ul class="pagination">';
		$config['full_tag_close'] 	= '</ul>';
		$config['first_tag_open'] 	= '<li>';
		$config['first_tag_close'] 	= '</li>';
		$config['last_tag_open']	= '<li>';
		$config['last_tag_close'] 	= '</li>';
		$config['next_link'] 		= '&gt;';
		$config['next_tag_open'] 	= '<li>';
		$config['next_tag_close'] 	= '</li>';
		$config['prev_link'] 		= '&lt;';
		$config['prev_tag_open'] 	= '<li>';
		$config['prev_tag_close'] 	= '</li>';
		$config['cur_tag_open'] 	= '<li class="active"><a href = "#">';
		$config['cur_tag_close'] 	= '</a></li>';
		$config['num_tag_open'] 	= '<li>';
		$config['num_tag_clos'] 	= '</li>';
		$config['num_links'] 		= 5;


        $this->pagination->initialize($config);


		$data['page'] = 'products/products'; 
		view('template',$data);
	}
	public function search_products($value='')
	{
		$match = $this->input->get('s');

		if (empty($match)) 
		{
			redirect('/','refresh');
		}

		$data['title'] = "KK & M merchants | Search Products";

		//getting category products

		$join_col = "products.products_categories_id = products_categories.id";

		$tbl3 = array('products_resources' => 'products.id = products_resources.products_id');

		$fields = 'products.id AS product_id,products.products_categories_id AS products_categories_id,products_categories.name AS cat_name,products_categories.slug AS slug,products.title AS title,products.price AS price,products.quantity AS quantity,products.location AS location,products_resources.url AS url';

		$data['search_products'] = $this->common_model->DJoin($fields,'products','products_categories',$join_col,$tbl3,'','','products.id','',$match);

		if (empty($data['search_products'][0]->slug)) 
		{
			$slug = '';
		}
		else
		{
			$slug = $data['search_products'][0]->slug;
		}

		$count_arr = sizeof($data['search_products']);

        $this->load->library('pagination');

        $config['base_url']         = base_url('Products/search_products/').$slug;
        $config['total_rows']       = $count_arr;
        $config['per_page']         = 4;
        $config['first_link'] 		= 'First';
        $config['last_link'] 		= 'Last';
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] 	= '<ul class="pagination">';
		$config['full_tag_close'] 	= '</ul>';
		$config['first_tag_open'] 	= '<li>';
		$config['first_tag_close'] 	= '</li>';
		$config['last_tag_open']	= '<li>';
		$config['last_tag_close'] 	= '</li>';
		$config['next_link'] 		= '&gt;';
		$config['next_tag_open'] 	= '<li>';
		$config['next_tag_close'] 	= '</li>';
		$config['prev_link'] 		= '&lt;';
		$config['prev_tag_open'] 	= '<li>';
		$config['prev_tag_close'] 	= '</li>';
		$config['cur_tag_open'] 	= '<li class="active"><a href = "#">';
		$config['cur_tag_close'] 	= '</a></li>';
		$config['num_tag_open'] 	= '<li>';
		$config['num_tag_clos'] 	= '</li>';
		$config['num_links'] 		= 5;


        $this->pagination->initialize($config);


		$data['page'] = 'products/search_products'; 
		view('template',$data);
	}
	public function feature_products($value='')
	{
		$data['title'] = "KK & M merchants | Featured Products";

		//getting category products

		$join_col = "products.products_categories_id = products_categories.id";

		$tbl3 = array('products_resources' => 'products.id = products_resources.products_id');

		$fields = 'products.id AS product_id,products.products_categories_id AS products_categories_id,products_categories.name AS cat_name,products_categories.slug AS slug,products.title AS title,products.price AS price,products.quantity AS quantity,products.location AS location,products_resources.url AS url';

		$where = array('featured' => 1);

		$data['featured_products'] = $this->common_model->DJoin($fields,'products','products_categories',$join_col,$tbl3,$where,'','products.id');


		if (empty($data['featured_products'][0]->slug)) 
		{
			$slug = '';
		}
		else
		{
			$slug = $data['featured_products'][0]->slug;
		}

		$count_arr = sizeof($data['featured_products']);

        $this->load->library('pagination');

        $config['base_url']         = base_url('Products/search_products/').$slug;
        $config['total_rows']       = $count_arr;
        $config['per_page']         = 4;
        $config['first_link'] 		= 'First';
        $config['last_link'] 		= 'Last';
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] 	= '<ul class="pagination">';
		$config['full_tag_close'] 	= '</ul>';
		$config['first_tag_open'] 	= '<li>';
		$config['first_tag_close'] 	= '</li>';
		$config['last_tag_open']	= '<li>';
		$config['last_tag_close'] 	= '</li>';
		$config['next_link'] 		= '&gt;';
		$config['next_tag_open'] 	= '<li>';
		$config['next_tag_close'] 	= '</li>';
		$config['prev_link'] 		= '&lt;';
		$config['prev_tag_open'] 	= '<li>';
		$config['prev_tag_close'] 	= '</li>';
		$config['cur_tag_open'] 	= '<li class="active"><a href = "#">';
		$config['cur_tag_close'] 	= '</a></li>';
		$config['num_tag_open'] 	= '<li>';
		$config['num_tag_clos'] 	= '</li>';
		$config['num_links'] 		= 5;


        $this->pagination->initialize($config);


		$data['page'] = 'products/featured_products'; 
		view('template',$data);
	}
	public function quick_view($id)
	{
		$where = array('products_id' => $id);

		$result = $this->common_model->getAllData('products_resources','*',$where);

		echo json_encode($result);
	}
	public function filter_products($value='')
	{
		$data['title'] = "KK & M merchants | Featured Products";

		$from = post('from');
		$to   = post('to');

		$join_col = "products.products_categories_id = products_categories.id";

		$tbl3 = array('products_resources' => 'products.id = products_resources.products_id');

		$fields = 'products.id AS product_id,products.products_categories_id AS products_categories_id,products_categories.name AS cat_name,products_categories.slug AS slug,products.title AS title,products.price AS price,products.quantity AS quantity,products.location AS location,products_resources.url AS url';


		$where = array(
						'price >=' => $from,
						'price <=' => $to
					  );

		$data['filter_products'] = $this->common_model->DJoin($fields,'products','products_categories',$join_col,$tbl3,$where,'','products.id');


		$data['page'] = 'products/filter_products'; 
		view('template',$data);	
	}
	public function add_wishlist()
	{
		if (!$this->ion_auth->logged_in()) 
		{	
			echo "not_loign";
			die;
		}

		$product_id = $this->uri->segment(3);

		$where = array(
						'products_id' => $product_id,
						'users_id'    => $this->session->userdata('user_id')
					  );

		$check = $this->common_model->getAllData('favourite_products','products_id',array('products_id' => $product_id));

		if (empty($check[0]->products_id)) 
		{
			$data = array(
							'users_id'    => $this->session->userdata('user_id'), 
							'products_id' => $product_id, 
						 );
			$result = $this->common_model->InsertData('favourite_products',$data);

			if ($result) 
			{
				echo"successfull_added";
			}
			else
			{
				echo "system_error";
			}
		}
		else
		{
			echo "already_in_wishlist";
		}
	}
}

/* End of file Products.php */
/* Location: ./application/controllers/Products.php */