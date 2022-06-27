<?php

class Model_Driver extends Orm\Model{
	protected static $_properties = array('id', 
		'driver_name' => array(
			'data_type' => 'varchar'	
		),
	    'vehicle_info' => array(
            'data_type' => 'varchar'
        ),
        'vehicle_image' => array(
            'data_type' => 'varchar'
        ),
        'vehicle_color' => array(
            'data_type' => 'varchar'
        ),
        'pass_limit' => array(
            'data_type' => 'int'
        ),
        'service_type' => array(
            'data_type' => 'varchar'
        ),
    );
}