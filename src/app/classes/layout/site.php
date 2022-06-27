<?php
class Layout_Site{

    /*
        Configuration - Conditionals
        Layout_Site::enable_schema  = Enable LD-JSON Schema in HTML Document
    */
    const enable_schema = true;
    /* 
        Site-wide configuration 
        Layout_Site::site_dir   = Main text direction of the site.
        Layout_Site::site_lang  = Main language of the site.
        Layout_Site::site_name  = Name of Zone.
        Layout_Site::site_color = Hex code to set theme color.
        Layout_Site::site_desc  = Default description for pages where its not overridden.
        Layout_Site::email      = Company / Site Email
        Layout_Site::phone      = Company / Site Phone number
                                    (Format: X-XXX-XXX-XXXX)
        Layout_Site::motto      = Company / Site slogan.
        Layout_Site::social     = Array (
            'twitter'           = Twitter Handle
            'facebook'          = Facebook Profile
            'instagram'         = Instagram Profile
            'linkedin'          = Linkedin Profile (business or personal)
        )
        Layout_Site::fb_app_id  = App ID for our BLZ ONE Facebook App.
        Layout_Site::prefetch_list = Arrau (
            ... <- DNS Prefetch targets
        )
        Layout_Site::favicon    = URL of favicon.
    */
    const company = 'Blazed Labs LLC';
    const brand_site = 'https://blazedlabs.com/';
    const site_dir = 'ltr';
    const site_lang = 'en';
    const site_name  = 'Limo Brokerage';
    const site_color = '#333333';
    const site_desc = 'Brokerage management system and dispatch application.';
    const email = 'hello@blazed.space';
    const phone = '1-855-788-2348';
    const motto = 'limo brokerage';
    
    const img_path = 'assets/img/drivers/';
    
    /*
        Example social array.
    */
    const social = array(
        'twitter' => 'BlazedLabs',
        'facebook' => 'blazedlabs',
        'instagram' => 'blazed_labs',
        'linkedin' => 'company/blazed-labs/'
    );
    /* // */
    //Blazed Federated Identity on Facebook
    const fb_app_id = '980497166040811';
    const prefetch_list = array(
        'blazed.sirv.com',
        'fonts.googleapis.com',
        'cdnjs.cloudflare.com',
        'unpkg.com'
    );
    /* // */
    const favicon = 'https://blazed.sirv.com/RTM/limo/cone.png';
    /*
		get_social
		Returns a list of social media profiles
	*/
    public static function get_social(){
        //Use:
        // return Layout::social;
        return \ice\Layout::get_social_array();
    }
    /*
        Layout_Site::get_company()
    */
    public static function get_company(){
        return Layout_Site::company;
    }
    /*
        Layout_Site::get_brand_site()
    */
    public static function get_brand_site(){
        return Layout_Site::brand_site;
    }
    /*
        Layout_Site::image($e = 0)
            $e = Image to pull.
            @Returns image URL corresponding to index ($e).
            0 = nav-bar image
            1 = dark beaker logo
            2 = blz logo
            3 = beaker banner
            4 = lockscreen beaker
    */
    public static function image($e = 0){
        $z = '';
        switch($e){
            case 0:
                $z = 'https://blazed.sirv.com/RTM/limo/cone.png?h=40&w=40';
                break;
            case 1:
                $z = 'https://blazed.sirv.com/RTM/limo/cone.png?h=50&w=50';
                break;
            case 2:
                $z = 'https://blazed.sirv.com/RTM/limo/cone.png?h=50&w=50';
                break;
            case 3:
                $z = 'https://blazed.sirv.com/logo/Wallpaper-Beaker.png';
                break;
            case 4:
                $z = 'https://blazed.sirv.com/logo/Lockscreen-Beaker.png';
                break;
        }
        return $z;
    }
    /*
        Layout_Site::nav_title = Top menu text.
    */
    const nav_title = 'limo';

    /*
        Layout_Site::nav_menu()
            @Returns array of nav bar menu.
    */
    public static function nav_menu(){
        return array(
            array(
                'label' => 'Home',
                'url' => Uri::base(),
                'num' => 1
            ),
            array(
                'label' => 'About',
                'url' => Uri::base() . 'about/',
                'num' => 2
            ),
        );
    }



}