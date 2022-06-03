<?php

return array(
	/*
		Section 1: Base
	*/
	'_root_' => 'main/index',
	'about' => 'main/about',
    'register' => 'main/register',
    'login' => 'main/login',
    'forgot' => 'main/forgot',
    'reset/(:any)/(:any)' => 'main/reset/$1/$2',
    'profile' => 'user/profile/me',
    'profile/(:any)' => 'user/profile/$1',
    'account' => 'user/account',
    
    'docs' => 'help/docs/home',
    'docs/(:any)' => 'help/docs/$1',

	// REST API
	//'api/v1-0/GET/(:any)/(:any)' => 'api/get/$1/$2',
	//'api/v1-0/POST/(:any)' => 'api/post/$1',
	
	'submit/(:any)' => 'api/post/$1',
	'logout' => 'api/logout',

	/**
	 * -------------------------------------------------------------------------
	 *  Page not found
	 * -------------------------------------------------------------------------
	 *
	 */
	'_404_' => 'main/unknown'
);
