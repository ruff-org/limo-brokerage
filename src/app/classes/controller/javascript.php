<?php

class Controller_Javascript extends Controller{
	
	public function post_ajax($type){
		switch($type){
			case "email":
				$payload = Input::json();
				$to_email = $payload['toEmail'];
				$to_name = Input::post('to-name');
				$reservation_id = intval($payload['reservationId']);
				$magic_link = Model_Link::forge();
				$magic_link->token = Util_Book::generate_link_token();
				$magic_link->reservation = $reservation_id;
				$magic_link->active = "1";
				$magic_link->save();
				if (filter_var($to_email, FILTER_VALIDATE_EMAIL)) {
					$subject = 'New Reservation';
					$email_body = '
						Click on the link below to access the reservation details:
						' . Uri::base() . 'accept/' . $magic_link->token . '/
					';
					Util_Email::send_email(
							$subject, 
							$email_body,
							$to_email, 
							$to_name, 
							Layout_Site::email, 
							Layout_Site::company);
				}
				break;
			case "updatedriver":
				$payload = Input::json();
				$reservation = intval($payload['reservationId']);
				$driver = intval($payload['newDriver']);
				
				if(!empty($reservation) && !empty($driver)){
					$get_reservation = Model_Reservation::find($reservation);
					if(!empty($get_reservation)){
						$get_reservation->driver = $driver;
						$get_reservation->save();
					}
				}
				break;
			case "deletedriver":
				$payload = Input::json();
				$driver = intval($payload['driverId']);
				
				if(!empty($driver)){
					$get_driver = Model_Driver::find($driver);
					if(!empty($get_driver)){
						File::delete(DOCROOT . '/' . Layout_Site::img_path . $get_driver->vehicle_image);
						$get_driver->delete();
					}
				}
				break;
			case "deleterule":
				$payload = Input::json();
				$rule = intval($payload['ruleId']);
				
				if(!empty($rule)){
					$get_rule = Model_Rule::find($rule);
					if(!empty($get_rule)){
						$get_rule->delete();
					}
				}
				break;
		}
	}
    
}