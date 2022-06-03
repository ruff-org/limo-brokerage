<?php
    class Util_Auth{
        /*
            Util_Auth::new_auth()
                @Returns New auth element.
        */
        /*
        public static function new_auth(){
            \Config::get('db', true);
            return new \Delight\Auth\Auth(new PDO(\Config::get('db')["default"]["connection"]["dsn"], 
            \Config::get('db')["default"]["connection"]["username"], 
            \Config::get('db')["default"]["connection"]["password"]));
        }
        */
        public static function get_auth(){
        	$db_con = Config::get('db', true);
        	$query_string = $db_con['default']['type'] . ':dbname=' . $db_con['default']['connection']['database'] . ';host=' . $db_con['default']['connection']['hostname'] . ';charset=utf8mb4';
        	$db = new \PDO($query_string, $db_con['default']['connection']['username'], $db_con['default']['connection']['password']);
        	return new \Delight\Auth\Auth($db);
        }
    }