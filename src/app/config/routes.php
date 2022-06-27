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
    'book' => 'main/book',
    'dashboard' => 'dispatch/dashboard',
    'view/(:any)' => 'dispatch/view/$1',
    'add_driver' => 'dispatch/adddriver',
    'edit_driver/(:any)' => 'dispatch/editdriver/$1',
    'add_rule' => 'dispatch/addrule',
    'edit_rule/(:any)' => 'dispatch/editrule/$1',
    'accept/(:any)' => 'main/accept/$1',

	// REST API
	//'api/v1-0/GET/(:any)/(:any)' => 'api/get/$1/$2',
	//'api/v1-0/POST/(:any)' => 'api/post/$1',
	
	'submit/(:any)' => 'api/post/$1',
	'api/(:any)' => 'javascript/ajax/$1',
	'auth/(:any)' => 'auth/post/$1',
	'logout' => 'auth/logout',

	/**
	 * -------------------------------------------------------------------------
	 *  Page not found
	 * -------------------------------------------------------------------------
	 *
	 */
	'_404_' => 'main/unknown'
);
