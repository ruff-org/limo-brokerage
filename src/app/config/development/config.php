<?php

return array(
	'base_url' => 'https://blazed.sbs/ice_php_test/',
	
	'security' => array(
		 'token_salt' => base64_encode(random_bytes(30)),
	),
);
