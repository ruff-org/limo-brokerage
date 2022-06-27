<?php

	class Controller_Dispatch extends Controller_Ice {
		public function action_dashboard(){
			if($this->layout->auth->isLoggedIn()){
				
				if(!$this->layout->auth->hasRole(\Delight\Auth\Role::ADMIN)){
					Response::redirect('/');
				}
				
				$reservations = Model_Reservation::find('all');
				$this->layout->page_data['reservations'] = $reservations;
				$this->layout->page_data['drivers'] = Model_Driver::find('all'); 
				$this->layout->page_data['rules'] = Model_Rule::find('all'); 
				$this->layout->page = 9;
		        $this->layout->title = "Admin Dashboard";
		        $this->layout->content = 'dispatch/dashboard';
			} else {
				Response::redirect('login');
			}
		}
		public function action_view($id){
			if($this->layout->auth->isLoggedIn()){
				$get_reservation = Model_Reservation::find($id);
				if(!empty($get_reservation)){
					$this->layout->page_data['drivers'] = Model_Driver::find('all'); 
					$this->layout->page_data['reservation'] = $get_reservation;
					if($this->layout->page_data['reservation']['driver'] !== '0' && $this->layout->page_data['reservation']['driver'] !== 0){
						$this->layout->page_data['driver'] = Model_Driver::find($this->layout->page_data['reservation']['driver']);
					} else {
						$this->layout->page_data['driver'] = array(
							'driver_name' => 0 	
						);
					}
					$this->layout->page = 9;
			        $this->layout->title = "View Job";
			        $this->layout->content = 'dispatch/view';
				}
			} else {
				Response::redirect('login');
			}
		}
		public function action_adddriver(){
			if($this->layout->auth->isLoggedIn()){
				
				if(!$this->layout->auth->hasRole(\Delight\Auth\Role::ADMIN)){
					Response::redirect('/');
				}
				
				$this->layout->page = 10;
		        $this->layout->title = "Add Driver";
		        $this->layout->content = 'dispatch/adddriver';
			} else {
				Response::redirect('login');
			}
		}
		
		public function action_addrule(){
			if($this->layout->auth->isLoggedIn()){
				
				if(!$this->layout->auth->hasRole(\Delight\Auth\Role::ADMIN)){
					Response::redirect('/');
				}
				
				$this->layout->page = 11;
		        $this->layout->title = "Add Rule";
		        $this->layout->content = 'dispatch/addrule';
			} else {
				Response::redirect('login');
			}
		}
		
		public function action_editdriver($id){
			if($this->layout->auth->isLoggedIn()){
				
				if(!$this->layout->auth->hasRole(\Delight\Auth\Role::ADMIN) || empty($id)){
					Response::redirect('/');
				}
				
				$get_driver = Model_Driver::find($id);
				if(!empty($get_driver)){
					$this->layout->page_data['driver'] = $get_driver;
				}
				
				$this->layout->page = 12;
		        $this->layout->title = "Edit Driver";
		        $this->layout->content = 'dispatch/editdriver';
			} else {
				Response::redirect('login');
			}
		}
		
		public function action_editrule($id){
			if($this->layout->auth->isLoggedIn()){
				
				if(!$this->layout->auth->hasRole(\Delight\Auth\Role::ADMIN)){
					Response::redirect('/');
				}
				
				$get_rule = Model_Rule::find($id);
				if(!empty($get_rule)){
					$this->layout->page_data['rule'] = $get_rule;
				}
				
				$this->layout->page = 12;
		        $this->layout->title = "Edit Rule";
		        $this->layout->content = 'dispatch/editrule';
			} else {
				Response::redirect('login');
			}
		}
		
	}