<?php

class Controller_Auth extends Controller{
	
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
				break;
			case "forgot":
				$email = Input::post('field-email');
				try {
				    $this->auth->forgotPassword($email, function ($selector, $token) {
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