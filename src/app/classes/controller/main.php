<?php

class Controller_Main extends Controller_Ice{
	public function action_unknown(){
    	$this->layout->page = 404;
        $this->layout->title = "404: Page Not Found";
        $this->layout->content = 'unknown';
    }
    public function action_index(){
        $this->layout->page = 1;
        $this->layout->title = "Home";
        $this->layout->description = "HOME PAGE!! Example desc, which overrides the default desc.";
        $this->layout->content = 'home';
    }
    public function action_about(){
        $this->layout->page = 2;
        $this->layout->title = "About";
        $this->layout->content = 'about';
    }
    public function action_register(){
    	$this->layout->page = 3;
        $this->layout->title = "Register";
        $this->layout->page_layout = 'full';
        $this->layout->content = 'register';
    }
    public function action_login(){
    	$this->layout->page = 4;
        $this->layout->title = "Login";
        $this->layout->page_layout = 'full';
        $this->layout->content = 'login';
    }
    public function action_forgot(){
    	$this->layout->page = 5;
        $this->layout->title = "Reset Password (Step 1/2)";
        $this->layout->page_layout = 'full';
        $this->layout->content = 'forgot';
    }
    public function action_book(){
    	$this->layout->page = 6;
        $this->layout->title = "Book Reservation";
        $this->layout->content = 'book';
    }
    public function action_accept($token){
    	$this->layout->page = 8999;
        $this->layout->title = "Accept Reservation";
        $this->layout->content = 'dispatch/accept_job';
        $get_link = Model_Link::find('all', array(
		    'where' => array(
		        array('token', $token),
		    ),
		    'limit' => 1,
		));
		if(!empty($get_link)){
			$reservation = $get_link;
			foreach ($reservation as $n => $res){
				$get_reservation = Model_Reservation::find($res['reservation']);
			}
			if(!empty($get_reservation)){
				$this->layout->page_data['reservation'] = $get_reservation;
			}
		}
    }
    public function action_reset($selector, $token){
    	if($selector === "" || $token === ""){
    		Response::redirect('forgot');
    	}
    	$this->layout->page = 9000;
    	$this->layout->page_data['selector'] = $selector;
    	$this->layout->page_data['token'] = $token;
        $this->layout->title = "Reset Password (Step 2/2)";
        $this->layout->page_layout = 'full';
        $this->layout->content = 'reset';
    }
}