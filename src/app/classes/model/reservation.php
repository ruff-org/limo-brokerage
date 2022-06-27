<?php

class Model_Reservation extends Orm\Model{
	protected static $_properties = array('id', 
	    'vendor_name' => array(
            'data_type' => 'varchar'
        ),
        'customer_name' => array(
            'data_type' => 'varchar'
        ),
        'customer_email' => array(
            'data_type' => 'varchar'
        ),
        'reservation_number' => array(
            'data_type' => 'varchar'
        ),
        'pickup_date' => array(
            'data_type' => 'date'
        ),
        'pickup_time' => array(
            'data_type' => 'varchar'
        ),
        'pickup_info' => array(
            'data_type' => 'varchar'
        ),
        'driver' => array(
            'data_type' => 'int'
        ),
        'total_cost' => array(
        	'data_type' => 'int'
        )
    );
}

