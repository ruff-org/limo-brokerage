<?php

class Controller_Api extends Controller{
	
	public function before(){
		$this->auth = Util_Auth::get_auth();
	}
	
	public function action_logout(){
		try {
    		$this->auth->logOutEverywhere();
    		Response::redirect('/');
		}
		catch (\Delight\Auth\NotLoggedInException $e) {
		    Response::redirect('login');
		}
		Response::redirect('/');
	}
	
	public function action_post($type){
		switch($type){
			case "rule":
				if($this->auth->isLoggedIn()){
					
					if(!$this->auth->hasRole(\Delight\Auth\Role::ADMIN)){
						Response::redirect('/');
					}
						
					$rule_title = Input::post('rule-title');
					$rule_desc = Input::post('rule-desc');
					
					if(!empty($rule_title) && !empty($rule_desc)){
						$new_rule = new Model_Rule();
						$new_rule->title = $rule_title;
						$new_rule->description = $rule_desc;
						$new_rule->save();
					} else {
						Response::redirect('add_rule');
					}
					
					Response::redirect('dashboard');
				} else {
					Response::redirect('login');
				}
				break;
			case "editrule":
				if($this->auth->isLoggedIn()){
					
					if(!$this->auth->hasRole(\Delight\Auth\Role::ADMIN)){
						Response::redirect('/');
					}
						
					$rule_id = intval(Input::post('rule-id'));
					$rule_title = Input::post('rule-title');
					$rule_desc = Input::post('rule-desc');
					
					if(!empty($rule_id) && !empty($rule_title) && !empty($rule_desc)){
						$edit_rule = Model_Rule::find($rule_id);
						$edit_rule->title = $rule_title;
						$edit_rule->description = $rule_desc;
						$edit_rule->save();
					} else {
						Response::redirect('dashboard');
					}
					
					Response::redirect('dashboard');
				} else {
					Response::redirect('login');
				}
				break;
			case "driver":
				if($this->auth->isLoggedIn()){
					
					if(!$this->auth->hasRole(\Delight\Auth\Role::ADMIN)){
						Response::redirect('/');
					}
						
					$driver_name = Input::post('driver-name');
					$vehicle_info = Input::post('vehicle-info');
					//$vehicle_image = Input::post('vehicle-image');
					$vehicle_image = Input::file('vehicle-image');
					$vehicle_color = Input::post('vehicle-color');
					$pass_limit = Input::post('pass-limit');
					$service_type = Input::post('service-type');
					
					if(!empty($driver_name) && !empty($vehicle_info) && !empty($vehicle_image) && !empty($vehicle_color) && !empty($pass_limit) && !empty($service_type)){
						
						/*
						$tmp_file_name = ltrim($vehicle_image['tmp_name']);
						$new_file_name = '/assets/img/drivers/' . $new_driver->id;
						*/
						
						$config = array( 
				            'path' => DOCROOT . '/' . rtrim(Layout_Site::img_path), 
				            'randomize' => true, 
				        	'ext_whitelist' => array('jpg', 'jpeg', 'png'), 
				        );  
				        
				        Upload::process($config); 
				        
				        if (Upload::is_valid()) { 
				            Upload::save();
				            //echo "success";
				         } else { 
				            // and process any errors 
				            foreach (Upload::get_errors() as $file) { 
				               echo var_dump($file); 
				            } 
				         } 
				        
				        if(is_array(Upload::get_files()) && sizeof(Upload::get_files()) === 1){
				        	$file_name = Upload::get_files()[0]['saved_as'];
				        }
				        
				        $new_driver = new Model_Driver();
						$new_driver->vehicle_info = $vehicle_info;
						$new_driver->vehicle_image = $file_name;
						$new_driver->vehicle_color = $vehicle_color;
						$new_driver->pass_limit = $pass_limit;
						$new_driver->service_type = $service_type;
						$new_driver->driver_name = $driver_name;
						$new_driver->save();
					}
					
					Response::redirect('dashboard');
				} else {
					Response::redirect('login');
				}
				break;
			case "editdriver":
				if($this->auth->isLoggedIn()){
					
					if(!$this->auth->hasRole(\Delight\Auth\Role::ADMIN)){
						Response::redirect('/');
					}
						
					$driver_id = intval(Input::post('driver-id'));
					$driver_name = Input::post('driver-name');
					$vehicle_info = Input::post('vehicle-info');
					$vehicle_image = Input::file('vehicle-image');
					$vehicle_color = Input::post('vehicle-color');
					$pass_limit = Input::post('pass-limit');
					$service_type = Input::post('service-type');
					
					if(!empty($driver_id) && !empty($driver_name) && !empty($vehicle_info) && !empty($vehicle_color) && !empty($pass_limit) && !empty($service_type)){
						
						$edit_driver = Model_Driver::find($driver_id);
						
						if(!empty($edit_driver)){
							
							if(!empty($vehicle_image)){
								$config = array( 
						            'path' => DOCROOT . '/'. rtrim(Layout_Site::img_path), 
						            'randomize' => true, 
						        	'ext_whitelist' => array('jpg', 'jpeg', 'png'), 
						        );  
						        
						        Upload::process($config); 
						        
						        if (Upload::is_valid()) { 
						            Upload::save();
						            //echo "success";
						         } else { 
						            // and process any errors 
						            foreach (Upload::get_errors() as $file) { 
						               echo var_dump($file); 
						            } 
						         } 
						        
						        if(is_array(Upload::get_files()) && sizeof(Upload::get_files()) === 1){
						        	File::delete(DOCROOT . '/' . Layout_Site::img_path . $edit_driver->vehicle_image);
						        	$file_name = Upload::get_files()[0]['saved_as'];
						        	$edit_driver->vehicle_image = $file_name;
						        }
							}
					        
							$edit_driver->vehicle_info = $vehicle_info;
							$edit_driver->vehicle_color = $vehicle_color;
							$edit_driver->pass_limit = $pass_limit;
							$edit_driver->service_type = $service_type;
							$edit_driver->driver_name = $driver_name;
							$edit_driver->save();
						} else {
							Response::redirect('dashboard');
						}
					}
					
					Response::redirect('dashboard');
				} else {
					Response::redirect('login');
				}
				break;
			case "book":
				$name = Input::post('client-name');
				$email = Input::post('client-email');
				$pickup_date = Input::post('pickup-date');
				$pickup_time = Input::post('pickup-time');
				$pickup_address = Input::post('pickup-address');
				$dropoff_address = Input::post('dropoff-address');
				
				if(!empty($name) && !empty($email) && !empty($pickup_date) && !empty($pickup_time) && !empty($pickup_address) && !empty($dropoff_address)){
					$new_booking = new Model_Reservation();
					$new_booking->vendor_name = "";
					$new_booking->reservation_number = Util_Book::generate_reservation_number();
					$new_booking->customer_name = $name;
					$new_booking->customer_email = $email;
					$new_booking->pickup_date = $pickup_date;
					$new_booking->pickup_time = $pickup_time;
					$new_booking->pickup_info = 'From: ' . $pickup_address . '; To: ' . $dropoff_address;
					$new_booking->driver = 0;
					$new_booking->save();
				}

				Response::redirect('/');
				break;
			case "register":
				$email = Input::post('field-email');
				$username = Input::post('field-username');
				$password = Input::post('field-password');
				$password_repeat = Input::post('field-password-repeat');
				
				// Quick form validation
				if(!empty($email) && !empty($username) && !empty($password) && !empty($password_repeat) && ($password === $password_repeat)){
				
					try {
					    $userId = $this->auth->registerWithUniqueUsername($email, $password, $username, null);
					    Response::redirect('login');
					}
					catch (\Delight\Auth\InvalidEmailException $e) {
					    Response::redirect('register');
					}
					catch (\Delight\Auth\DuplicateUsernameException $e){
						Response::redirect('register');
					}
					catch (\Delight\Auth\InvalidPasswordException $e) {
					    Response::redirect('register');
					}
					catch (\Delight\Auth\UserAlreadyExistsException $e) {
					    Response::redirect('login');
					}
					catch (\Delight\Auth\TooManyRequestsException $e) {
					    Response::redirect('/');
					}
					
				} else {
					Response::redirect('register');
				}
				break;
			case "login":
				$email = Input::post('field-email');
				$password = Input::post('field-password');
				$remember = Input::post('field-remember');
				$rememberDuration = null;
				if($remember === "1"){
					$rememberDuration = (int) (60 * 60 * 24 * 365.25);
				}
				try {
    				$this->auth->login($email, $password, $rememberDuration);
					Response::redirect('/');
				}
				catch (\Delight\Auth\InvalidEmailException $e) {
				    Response::redirect('login/failed');
				}
				catch (\Delight\Auth\InvalidPasswordException $e) {
				    Response::redirect('login/failed');
				}
				catch (\Delight\Auth\EmailNotVerifiedException $e) {
				    Response::redirect('/');
				}
				catch (\Delight\Auth\TooManyRequestsException $e) {
				    Response::redirect('/');
				}
				Response::redirect('/');
				break;
			case "forgot":
				$email = Input::post('field-email');
				try {
				    $auth->forgotPassword($email, function ($selector, $token) {
				    	/*
				        echo 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email)';
				        echo '  For emails, consider using the mail(...) function, Symfony Mailer, Swiftmailer, PHPMailer, etc.';
				        echo '  For SMS, consider using a third-party service and a compatible SDK';
				        */
				        $url = Uri::base() . 'reset/' . \urlencode($selector) . '/' . \urlencode($token);
				    });
				
				    echo 'Request has been generated';
				}
				catch (\Delight\Auth\InvalidEmailException $e) {
				    Response::redirect('forgot/invalid-email');
				}
				catch (\Delight\Auth\EmailNotVerifiedException $e) {
				    Response::redirect('/');
				}
				catch (\Delight\Auth\ResetDisabledException $e) {
				    Response::redirect('/');
				}
				catch (\Delight\Auth\TooManyRequestsException $e) {
				    Response::redirect('/');
				}
				break;
			case "reset":
				$password = Input::post('field-password');
				$password_repeat = Input::post('field-password-repeat');
				$selector = Input::post('field-selector');
				$token = Input::post('field-token');
				if ($this->auth->canResetPassword($selector, $token) && ($password === $password_repeat)) {
					try {
    					$this->auth->resetPassword($selector, $token, $password);
						Response::redirect('login');
					}
					catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
					    Response::redirect('forgot');
					}
					catch (\Delight\Auth\TokenExpiredException $e) {
					    Response::redirect('forgot');
					}
					catch (\Delight\Auth\ResetDisabledException $e) {
					    Response::redirect('/');
					}
					catch (\Delight\Auth\InvalidPasswordException $e) {
					    Response::redirect('forgot');
					}
					catch (\Delight\Auth\TooManyRequestsException $e) {
					    Response::redirect('/');
					}
				}
				break;
			default:
				Response::redirect('/');
				break;
		}
    	
    	Response::redirect('/');

    }
    
}