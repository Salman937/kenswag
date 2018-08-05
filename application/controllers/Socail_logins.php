<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Socail_logins extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here

		//load google login library
        $this->load->library('google');

        // Load facebook library
		$this->load->library('facebook');

        $this->load->model('common_model');

	}

	public function google_login()
    {
		if(isset($_GET['code']))
		{
			//authenticate user
			$this->google->getAuthenticate();
			
			//get user info from google
			$gpInfo = $this->google->getUserInfo();
			
            //preparing data for database insertion
			
			// $userData['gender'] 		= !empty($gpInfo['gender'])?$gpInfo['gender']:'';
			// $userData['locale'] 		= !empty($gpInfo['locale'])?$gpInfo['locale']:'';
            // $userData['profile_url'] 	= !empty($gpInfo['link'])?$gpInfo['link']:'';

            // Preparing data for database insertion
            $userData = array('oauth_provider' => 'google', 
            				  'oauth_uid'      => $gpInfo['id'], 
            				  'first_name'     => $gpInfo['given_name'], 
            				  'last_name'      => $gpInfo['family_name'], 
            				  'email'          => $gpInfo['email'],
            				  // 'locale'         => $userProfile['locale'], 
            				  'picture_url'    => !empty($gpInfo['picture'])?$gpInfo['picture']:''
            				 );

            $username = $userData['first_name']." ".$userData['last_name'];

            $email = $userData['email'];
			
			//insert or update user data to the database
            $userID = $this->common_model->socail_login($userData,$username,$email,'users');

			if($userID)
			{
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('/', 'refresh');
			}
			else
			{
				// if the login was un-successful
				// redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
			}	
		} 
		
		//google login url
		$data['loginURL'] = $this->google->loginURL();
		
		//load google login view
		$this->load->view('user_authentication/index',$data);
    }
    public function facebook_login()
    {
		$userData = array();
		
		// Check if user is logged in
		if($this->facebook->is_authenticated())
		{
			// Get user facebook profile details
			$userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');

	        // Preparing data for database insertion
	        $userData['oauth_provider'] = 'facebook';
	        $userData['oauth_uid'] = $userProfile['id'];
	        $userData['first_name'] = $userProfile['first_name'];
	        $userData['last_name'] = $userProfile['last_name'];
	        $userData['email'] = $userProfile['email'];
	        $userData['gender'] = $userProfile['gender'];
	        $userData['locale'] = $userProfile['locale'];
	        $userData['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
	        $userData['picture_url'] = $userProfile['picture']['data']['url'];


	        pr($userData);die;
			
	        // Insert or update user data
	        $userID = $this->user->checkUser($userData);
			
			// Check user data insert or update status
	        if(!empty($userID))
	        {
	            $data['userData'] = $userData;
	            $this->session->set_userdata('userData',$userData);
	        }
	        else 
	        {
	           $data['userData'] = array();
	        }
	    }    
    }
}

/* End of file Socail_logins.php */
/* Location: ./application/controllers/Socail_logins.php */