<?php

class Controller_Ice extends Controller{
	/*
		before()
			This function runs before the controller body.
	*/
    public function before(){
		//Load default layout
		$this->layout = Layout_Ice::new_document();
		$this->layout->page_layout = 'basic';
        $this->layout->response = "";
		$this->layout->auth = Util_Auth::get_auth();
		$this->layout->page_data = array();
	}
	/*
		after($request)
			This function runs after the controller body.
	*/
	public function after($request){
		if(!isset($this->layout->page)){
			Response::redirect('/');
		}
        $this->layout->bundle = Layout_Ice::create_bundle($this->layout->page);
        $this->layout->body = Layout_Ice::do_layout($this->layout->content, 
        $this->layout->title, $this->layout->page, $this->layout->page_layout, $this->layout->auth,
        $this->layout->page_data);
        return Response::forge(\ice\Util_Mini::html($this->layout->render()));
	}
}