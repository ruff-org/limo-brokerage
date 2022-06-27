<?php

class Controller_User extends Controller_Ice{
	public function action_profile($id){
		$user = null;
		if($id === 'me' || $id === ''){
			if($this->layout->auth->isLoggedIn()){
				Response::redirect('profile/' . $this->layout->auth->getUserId());
			}
		}
		if(is_numeric($id)){
			$user = Model_User::find($id);
		}
		if($user === null){ Response::redirect('/'); }
		
		// Redirect to dashboard, if admin user
		if($this->layout->auth->hasRole(\Delight\Auth\Role::ADMIN)){
			Response::redirect('dashboard');
		} 
		
		$this->layout->page_data['user'] = $user;
    	$this->layout->page = 7;
        $this->layout->title = "User's Profile";
        $this->layout->content = 'profile';
    }
    public function action_account(){
    	if(!$this->layout->auth->isLoggedIn()){
    		Response::redirect('login');
    	}
    	$this->layout->page = 8;
        $this->layout->title = "Account Settings";
        $this->layout->content = 'account';
    }
    
}