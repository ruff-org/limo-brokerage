<?php

class Model_Link extends Orm\Model{
	protected static $_table_name = 'magic_links';
	protected static $_properties = array('id', 
	    'token' => array(
            'data_type' => 'varchar'
        ),
        'reservation' => array(
            'data_type' => 'int'
        ),
        'active' => array(
            'data_type' => 'enum'
        ),
    );
}