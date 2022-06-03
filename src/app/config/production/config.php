<?php

return array(
	'base_url' => 'https://blazed.watch/',
	
	'security' => array(
		/**
		 * ---------------------------------------------------------------------
		 *  Salt to make sure the generated security tokens aren't predictable.
		 * ---------------------------------------------------------------------
		 */
		 'token_salt' => base64_encode(random_bytes(30)),
	),
);