<?php

class Model_Rule extends Orm\Model{
	protected static $_properties = array('id', 
	    'title' => array(
            'data_type' => 'varchar'
        ),
        'description' => array(
            'data_type' => 'text'
        )
    );
}