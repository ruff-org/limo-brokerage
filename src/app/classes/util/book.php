<?php

	class Util_Book {
		public static function generate_reservation_number(){
			$e = true;
			$random_str = "";
			while($e){
				//Generate an 8 character random string
				$random_str = \ice\Util_String::randomString(8);
				//Check if string has been used before
				$find_res = Model_Reservation::find('all', array(
				    'where' => array(
				        array('reservation_number', $random_str),
				    )
				));
				if(empty($find_res)){
					$e = false;
				} else {
					continue;
				}
			}
			return $random_str;
		}
		public static function generate_link_token(){
			$e = true;
			$random_str = "";
			while($e){
				//Generate an 8 character random string
				$random_str = \ice\Util_String::randomString(15);
				//Check if string has been used before
				$find_res = Model_Link::find('all', array(
				    'where' => array(
				        array('token', $random_str),
				    )
				));
				if(empty($find_res)){
					$e = false;
				} else {
					continue;
				}
			}
			return $random_str;
		}
	}