<?php
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	class Util_Email{
		public static function send_email($subject, $email_body, $to, $to_name, $bcc = '', $bcc_name = ''){
			$status = false;
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->SMTPDebug = 0;
			$mail->SMTPAuth = true;                
			$mail->SMTPSecure = "tls";
			$mail->Host = "smtp.gmail.com";
			$mail->Port = 587;
			$mail->Username = "hello@blazed.space";
			$mail->Password = "qmvwmipvpcjsotfv";
			$mail->CharSet = 'windows-1250';
			$mail->SetFrom ('hello@blazed.space', 'Blazed Labs LLC');
			$mail->AddBCC($bcc, $bcc_name);
			$mail->Subject = $subject;
			$mail->ContentType = 'text/plain';
			$mail->IsHTML(false);
			$mail->Body = $email_body;
			// you may also use $mail->Body = file_get_contents('your_mail_template.html');
			$mail->AddAddress ($to, $to_name);
			if(!$mail->Send())
			{
			        //$error_message = "Mailer Error: " . $mail->ErrorInfo;
			        $status = false;
			} else {
			        //$error_message = "Successfully sent!";
			        $status = true;
			}
			return $status;
		}
	}