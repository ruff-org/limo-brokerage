<?php

return array(
	'base_url' => 'https://blazed.sbs/limo-brokerage/',
	
	'security' => array(
		 'token_salt' => base64_encode(random_bytes(30)),
	),
);
