<?php

class Model_User extends Orm\Model{
	protected static $_properties = array('id', 
	    'email' => array(
            'data_type' => 'varchar'
        ),
        'username' => array(
            'data_type' => 'varchar'
        )
    );
}