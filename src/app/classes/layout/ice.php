<?php

class Layout_Ice {
    /* 
        Layout_Ice::CONTENT_FOLDER = STRING
            Folder that contain the main content views.
        Layout_Ice::COMPONENTS_FOLDER = STRING
            Folder that contains modular components
        Layout_Ice::DIST_FOLDER
            Folder that holds the bundled assets
    */
    const CONTENT_FOLDER = 'pages';
    const COMPONENTS_FOLDER = 'components';
    const DIST_FOLDER = 'assets/dist';

    /*
        Layout_Ice::component($c)
            $c = Path to component.
            @Returns a formatted connection string.
    */
    public static function component($c){
        return Layout_Ice::COMPONENTS_FOLDER . '/' . $c;
    }
    /*
        Layout_Ice::page($p)
            $p = Path to page.
            @Returns a formatted connection string.
    */
    public static function page($p){
        return Layout_Ice::CONTENT_FOLDER . '/' . $p;
    }
    /*
        Layout_Ice::dist($d)
            $d = Path to dist resource.
            @Returns a formatted connection string.
    */
    public static function dist($d){
        return Layout_Ice::DIST_FOLDER . '/' . $d;
    }

    /*
        Layout_Ice::create_bundle($page = 0)
            $page = Page number.
            @Returns configured bundle object
    */
    public static function create_bundle($page = 0){
		$bundle_name = \ice\Util_Url::base64url_encode($page);
		$css_filter = new \DotsUnited\BundleFu\Filter\CallbackFilter(function($content) {
				return \ice\Util_Mini::css($content);
			}
		);
		$options = array(
			'name' => 'blz_' . $bundle_name,
			'doc_root' => DOCROOT,
			'css_cache_path' => Layout_Ice::dist('css'),
			'css_cache_url' => Uri::base() . Layout_Ice::dist('css'),
			'css_filter' => $css_filter,
			'js_cache_path' => Layout_Ice::dist('js'),
			'js_cache_url' => Uri::base() . Layout_Ice::dist('js'),
		);
		return new \DotsUnited\BundleFu\Bundle($options);
	}

    /*
        Layout_Ice::new_document()
            @Returns creates blank document
    */
    public static function new_document(){
        $d = Presenter::forge('document');
        return $d;
    }

    /*
        Layout_Ice::do_layout($content, $title, $page, $layout = 'basic')
            $content = Path to content for page.
            $title   = Title of page.
            $page    = Page number
            $layout  = Layout for page (default: basic)
            @Returns formatted layout.
    */
    public static function do_layout($content, $title = '', $page = 0, $layout = 'basic', $auth = null, $page_data = array()){
        $l = View::forge('layouts/' . $layout);
        $l->page = $page;
        $l->content = Layout_Ice::do_content($content, $page, $title, $page_data);
        $l->header = Layout_Ice::do_header($page, $auth);
        $l->footer = Layout_Ice::do_footer();
        return $l;
    }

    /*
        Layout_Ice::do_header($page = 0)
            $page = Page number (default 0)
    */
    public static function do_header($page = 0, $auth = null){
        $h = View::forge(Layout_Ice::component('header'));
        $h->auth = $auth;
        $h->menu = Layout_Site::nav_menu();
        $h->page = $page;
        return $h;
    }

    /*
        Layout_Ice::do_content($content, $page = 0, $title = '', $type = 'V')
            $content = Path to content.
            $page    = Page number (default 0)
            $title   = Page title (default '')
            $type    = 'V' - View (default 'V')
                       'P' - Presenter
            @Returns formated content section.

    */
    public static function do_content($content, $page = 0, $title = '', $page_data = array(), $type = 'V'){
        $search_loc = Layout_Ice::page($content);
        $c = "";
        if($type === 'P' || $type === 'p'){
            //load content from presenter
            $c = Presenter::forge($search_loc);
            $c->page = $page;
            $c->title = $title;
            $c->page_data = $page_data;
        } else {
            //load content from view
            $c = View::forge($search_loc);
            $c->page = $page;
            $c->title = $title;
            $c->page_data = $page_data;
        }
        return $c;
    }

    /*
        Layout_Ice::do_footer()
            @Returns standard page footer.
    */
    public static function do_footer(){
        $f = View::forge(Layout_Ice::component('footer'));
        return $f;
    }
	
}