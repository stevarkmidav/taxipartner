<?php 

error_reporting(E_ALL);
  @ini_set('display_errors', 1);
  @ini_set('display_startup_errors', 1);

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';


$mail->isSMTP();                                      
$mail->Host = 'smtp.gmail.com'; 
$mail->SMTPAuth = true;                               
$mail->Username = '@gmail.com';                 // Логин = почта
$mail->Password = '';  // перейти по ссылке и сделать пароль   // Пароль от ящика
$mail->SMTPSecure = 'ssl';                            
$mail->Port = 465;                                   
 
$mail->setFrom('@gmail.com', 'TaxiPartner');   // От кого письмо 
$mail->addAddress('@gmail.com');     // Add a recipient
$mail->isHTML(true);                                 

$mail->Subject = 'TaxiPartner request';
$mail->Body    = '
		User send request <br> 
	Name: ' . $name . ' <br>
	Email: ' . $email . '<br>
	Phone: ' . $phone . ' <br>';

if(!$mail->send()) {
    return false;
} else {
    return true;
}
?>



