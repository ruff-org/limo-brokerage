<?php

return array(
	'base_url' => 'http://localhost:8000/',
	
	'security' => array(
		 'token_salt' => base64_encode(random_bytes(30)),
	),
);
