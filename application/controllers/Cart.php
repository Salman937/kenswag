<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here

		$this->load->library(array('cart'));
		$this->load->helper('html');
		$this->load->model('common_model');

		// pr($this->cart->contents());die;
	}

	public function index()
	{
		$data['title'] = "KK & M merchants | Cart";

		$data['page'] = 'cart';
		view('template',$data);
	}
	public function add_to_cart()
	{	
		$check = $this->common_model->getAllData('products','id,quantity',array('id' => post('id')));

		if ($check[0]->quantity == 0) 
		{
			echo "sold_out";
		}
		else
		{
			$data =  array('id'      => post('id'),
					   'price'   => post('price'),
					   'name'    => post('title'),
					   'qty'     => post('qty'),
					   'options' => array('img' => post('img'))
					  );

			$result = $this->cart->insert($data);

			if ($result) 
			{
				echo $this->view_cart();
				$this->update_itme_value();
				$this->update_total_price();
			}
		}
	}
	/*
		load cart view
	*/
	public function view_cart()
	{
		view('ajax_view/menu_cart');
	}
	/*
		clear all items from cart
	*/
	public function clear_cart()
	{
		$this->cart->destroy();
	}

	/*
		remove only one item from cart	
	*/
	public function remove_cart_item()
	{
		$result = $this->cart->remove(post('id'));

		if ($result) 
		{
			echo $this->view_cart();
			$this->update_itme_value();
			$this->update_total_price();
		}
	}
	public function update_itme_value()
	{
		echo $this->cart->total_items(); 
	}
	public function update_total_price()
	{
		echo '$'.$this->cart->total(); 
	}
	public function update_cart()
	{
		if (in_array("0", $_POST['qty']))
		{
		  	$msg = "Product Quantity Can Not be ZERO in Cart";
			$this->session->set_flashdata('error_msg',$msg);
			redirect('cart');
		}
		else
		{
			// $chk = $this->common_model->getAllData('products','quantity',array('id' => post('id')));

			// if (post('qty') > $chk[0]->quantity ) 
			// {
			$i = 0;

		    foreach ($this->cart->contents() as $item) 
		    {
		        $qty1 = count($this->input->post('qty'));
		           // print_r($qty1);
		        //$i=1;
		        for ($i = 0; $i < $qty1; $i++) 
		        {
		            $_POST['qty'][$i];
		            $_POST['id'][$i];

		            $data = array('rowid' => $_POST['id'][$i], 'qty' => $_POST['qty'][$i]);
		            
		            $result =$this->cart->update($data);

		            if ($result) 
		            {
		            	$msg = "Cart Updated Successfully";
		            	$this->session->set_flashdata('success_msg',$msg);
		            	redirect('cart','refresh');
		            }
		            else
		            {
		            	$msg = "Error! Cart Can't be Updated";
		            	$this->session->set_flashdata('error',$msg);
		            	redirect('cart','refresh');
		            }
		        }
		    }
		}

	}
	public function cart($value='')
	{
		view("ajax_view/cart");
	}
	/*
		Product Coupon Code
	*/
	public function apply_coupon()
	{
		$coupon = post('coupon');

		$chk = $this->common_model->getAllData('coupons','*',array('coupon_code' => $coupon));

		if (!empty($chk)) 
		{
			$join_col = "coupons.product_id = products.id";

			foreach (post('pro_id') as $value) 
			{
				$product = $this->common_model->DJoin('*','coupons','products',$join_col,'',array('coupons.product_id' => $value));
			}

			if (!empty($product )) 
			{

				if (date("Y-m-d") <=  $product[0]->expire_date) 
				{

					$cart_total = $this->cart->total() - ($product[0]->discount_value / 100 ) * $this->cart->total();

					$data = array('dis_value' => $product[0]->discount_value . $product[0]->discount_type,
								  'per_value' => '$'.$cart_total, 
								  );
					echo json_encode($data);
				}
				else
				{
					$result = array('failed' => 'failed', 
							        'msg'    => 'This Coupon is Expired',
							       );

					echo json_encode($result);
				}
			}
			else
			{
				$result = array('failed' => 'failed', 
							    'msg'    => 'This Products have no Coupon Code',
							   );

				echo json_encode($result);
			}
		}
		else
		{
			$result = array('failed' => 'failed', 
						    'msg'    => 'This Coupon does not Exist Please Try Again',
						    );

			echo json_encode($result);
		}
	}
	public function checkout()
	{
		$data['title'] = "Checkout";

		if (empty($this->cart->contents())) 
		{
			$msg = "Please Add Some Items to Cart";
			$this->session->set_flashdata('error_msg',$msg);
			redirect('/','refresh');
		}

		$data['page'] = 'checkout';
		view('template',$data);
	}

	public function order_item($value='')
	{

	}

	public function single_product_add_to_cart()
	{
		$data =  array('id'      => post('id'),
					   'price'   => post('price'),
					   'name'    => post('title'),
					   'qty'     => post('qty'),
					   'options' => array('img' => post('img'))
					  );

		$chk = $this->common_model->getAllData('products','quantity',array('id' => post('id')));

		if (post('qty') < $chk[0]->quantity ) 
		{
			foreach ($this->cart->contents() as $value) 
			{
				$pro_id = $value['id'];
			}

			if ($pro_id == post('id')) 
			{
				echo "already_exist";
			}
			else
			{	
				$result = $this->cart->insert($data);

				if ($result) 
				{
					echo $this->view_cart();
					$this->update_itme_value();
					$this->update_total_price();
				}
			}
			
		}
		else
		{
			echo "max_qty";
		}
	}
	
	public function paypal_transaction()
	{
		if (!$this->ion_auth->logged_in()) 
		{	
			echo json_encode('not_login');
		}
		else
		{
			//include PayPalPro PHP library
			include_once APPPATH."libraries/PaypalPro.php";

			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				$order_no = mt_rand(100000, 999999);

				//product details
				$itemName      = "Project Purchase";
				$itemNumber    = $order_no;
				$payableAmount = $this->input->post('total_amount');
				$currency      = "USD";

				//buyer information
				// $name        = $_POST['name_on_card'];
				// $nameArr     = explode(' ', $name);
				$firstName    = $this->input->post('first_name');
				$lastName     = $this->input->post('last_name');
				$address      = $this->input->post('address');
				$country      = $this->input->post('country');
				$state        = $this->input->post('state');
				$city         = $this->input->post('city');
				$zipcode      = $this->input->post('zip_code');
				$countryCode  = $this->input->post('country_code');

				//card details
				$creditCardNumber = trim(str_replace(" ","",$_POST['card_number']));
				$creditCardType   = $_POST['card_type'];
				$expMonth         = $_POST['expiry_month'];
				$expYear          = $_POST['expiry_year'];
				$cvv              = $_POST['cvv'];

				//Create an instance of PaypalPro class
				//$config = array('live'=>1);
				$config = array(
					'apiUsername'  => 'jordan_api1.arichetechnologies.com',
					'apiPassword'  => 'EBCAU9BPW35YQAWW',
					'apiSignature' => 'A9l.LI4g.XybA.wyt8BlkNuIcjNnAy7bxS1hMEnIcm2AZ2ONlOKS-302'
				);
				$paypal = new PaypalPro($config);

				//Payment details
				$paypalParams = array(
									    'paymentAction'    => 'Sale',
										'itemName'         => $itemName,
										'itemNumber'       => $itemNumber,
									    'amount'           => $payableAmount,
									    'currencyCode'     => $currency,
									    'creditCardType'   => $creditCardType,
									    'creditCardNumber' => $creditCardNumber,
									    'expMonth'         => $expMonth,
									    'expYear'          => $expYear,
									    'cvv'              => $cvv,
									    'firstName'        => $firstName,
									    'lastName'         => $lastName,
									    'city'             => $city,
									    'zip'	           => $zipcode,
									    'countryCode'      => $countryCode,
									);
				$response = $paypal->paypalCall($paypalParams);
				$paymentStatus = strtoupper($response["ACK"]);

				if($paymentStatus == "SUCCESS")
				{
					//transaction info
					$transactionID = $response['TRANSACTIONID'];
					$amount = $response['AMT'];
				    $date = @date("Y-m-d H:i:s");


				    // Decalre empty array and store result
				    $seller = array();
				    
					foreach($this->cart->contents() as $items) 
				    {
				     	$seller_id = $this->common_model->getAllData('products','users_id,price',array('id' => $items['id']));

				     	array_push($seller, $seller_id);
				    }

				    // Decalre empty array and sum all same values
					$result = array();

					foreach($seller as $k => $v) 
					{
					    $id = $v[0]->users_id;
					    $result[$id][] = $v[0]->price;
					}

					$new = array();

					foreach($result as $key => $value) 
					{
					    $new[] = array('seller_id' => $key, 'price' => array_sum($value));
					}

					foreach ($new as $obj) 
					{
						if ($obj['price'] <= 100) 
						{
							$percentage = 10;
						}
						elseif ($obj['price'] >= 100 && $obj['price'] <= 1000) 
						{
							$percentage = 5;
						}
						elseif ($obj['price'] >= 1000) 
						{
							$percentage = 1;
						}
						else
						{
							echo "nothing";
						}

						$order_data = array(
				     							'seller_id'        => $obj['seller_id'],
				     							'users_id'         => $this->session->userdata('user_id'),
				     							'order_status'     => 0,
				     							'withdraw_status'  => 0,
				     							'order_date'       => date('Y-m-d'),
				     							'payment_date'     => date('Y-m-d'),
				     							'total_price'      => $obj['price'],
				     							'percentage'       => $percentage,
				     							'address'          => $address,
				     							'city'             => $city,
				     							'state'            => $state,
				     							'country'          => $country,
				     							// 'postal_code'      => $zipcode,
				     							'card_cvc'         => $cvv,
				     							'card_num'         => $creditCardNumber,
				     							'card_exp_month'   => $expMonth,
				     							'card_exp_year'    => $expYear,
				     							'paid_amount_currency' => $currency,
				     							'txn_id'           => $transactionID,
				     							'created_at'       => $date,
				     							'updated_at'       => $date,
			     						    );

						$this->common_model->InsertData('orders',$order_data);
					}

					
					$get_order_ids = $this->common_model->getAllData('orders','id,seller_id,created_at',array('created_at' => $date));

					foreach($this->cart->contents() as $items) 
				    {
				    	foreach ($get_order_ids as $order) 
				    	{
					     	$seller_id = $this->common_model->getAllData('products','users_id,price',array('id' => $items['id']));

					     	if ($seller_id[0]->users_id == $order->seller_id) 
					     	{
					     		$order_items = array(
							     						'products_id' => $items['id'], 
							     						'orders_id'   => $order->id, 
							     						'quantity'    => $items['qty'], 
							     						'price'       => $items['price'], 
							     						'created_at'  => date("Y-m-d H:m:i"), 
							     						'updated_at'  => date("Y-m-d H:m:i"), 
							     					  );
					     		
					     		$this->common_model->InsertData('orders_items',$order_items);
					     	}
				    	}
				    }
					
				    $this->cart->destroy();
					
					$data['status'] = 1;
				    // $data['orderID'] = $last_insert_id;
				}
				else
				{
			     	$data['status'] = 0;
				}
					//transaction status
					echo json_encode($data);
			}
		}
	}
}

/* End of file Cart.php */
/* Location: ./application/controllers/Cart.php */