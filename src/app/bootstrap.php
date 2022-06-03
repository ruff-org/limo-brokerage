<?php
// Bootstrap the framework - THIS LINE NEEDS TO BE FIRST!
require COREPATH.'bootstrap.php';
// Add framework overload classes here
\Autoloader::add_classes(array(
	// Example: 'View' => APPPATH.'classes/myview.php',
));
\Autoloader::register();
/**
 * Your environment.  Can be set to any of the following:
 *
 * Fuel::DEVELOPMENT
 * Fuel::TEST
 * Fuel::STAGING
 * Fuel::PRODUCTION
 */
Fuel::$env = Arr::get($_SERVER, 'FUEL_ENV', Arr::get($_ENV, 'FUEL_ENV', getenv('FUEL_ENV') ?: Fuel::DEVELOPMENT));
\Fuel::init('config.php');