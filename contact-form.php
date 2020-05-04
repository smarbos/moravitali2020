<?php
require_once 'bower_components/PHPMailer/PHPMailerAutoload.php';
require_once 'config.php';
if (isset($_POST['inputName']) && isset($_POST['inputEmail']) && isset($_POST['inputMessage'])) {

    //check if any of the inputs are empty
    if (empty($_POST['inputName']) || empty($_POST['inputEmail']) || empty($_POST['inputMessage'])) {
        $data = array('success' => false, 'message' => 'Please fill out the form completely.');
        echo json_encode($data);
        exit;
    }

    //create an instance of PHPMailer
    $mail = new PHPMailer();

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "mail.moravitali.com.ar"; // SMTP server
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
// 1 = errors and messages
// 2 = messages only
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "mail.moravitali.com.ar"; // sets the SMTP server
$mail->Port       = 25;                    // set the SMTP port for the GMAIL server
$mail->Username   = "hola@moravitali.com.ar"; // SMTP account username
$mail->Password   = $master_piece;        // SMTP account password

    $mail->From = $mail->Username;
	//$mail->From = $_POST['inputEmail'];
    $mail->FromName = $_POST['inputName'];
	//$mail->FromName = $_POST['inputName'];
    $mail->AddAddress('hola@moravitali.com.ar'); //recipient
    $mail->Subject = "Contacto Mora Vitali";
    $mail->Body = "Nombre: " . $_POST['inputName'] . "\r\n\r\nMensaje: " . stripslashes($_POST['inputMessage'] . "\r\n\r\nEmail: " . $_POST['inputEmail'] . "\r\n\r\n");

    if (isset($_POST['ref'])) {
        $mail->Body .= "\r\n\r\nRef: " . $_POST['ref'];
    }

    if(!$mail->send()) {
        $data = array('success' => false, 'message' => 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo);
        echo json_encode($data);
        exit;
    }

    $data = array('success' => true, 'message' => 'Thanks! We have received your message.');
    echo json_encode($data);

} else {

    $data = array('success' => false, 'message' => 'Please fill out the form completely.');
    echo json_encode($data);

}
