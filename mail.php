<?php


$fname = trim($_POST['fname']) . "\r\n";
$lname = trim($_POST['lname']) . "\r\n";
$email = trim($_POST['email']) . "\r\n";

$address = trim($_POST['address']);
$postal = trim($_POST['postal']);
$phone = trim($_POST['phone']);
$date = trim($_POST['date']);
$topic = trim($_POST['topic']);
$message = trim($_POST['textarea']);

$msg = "Imię: $fname\n";
$msg .= "Nazwisko: $lname\n";
$msg .= "Adres: $address\n";
$msg .= "Kod pocztowy: $postal\n";
$msg .= "Numer telefonu: $phone\n";
$msg .= "Adres e-mail: $email\n";
$msg .= "Termin: $date\n";
$msg .= "Temat: $topic\n";
$msg .= "Wiadomość:\n $message\n";



$to = 'marcinchojnacki00@gmail.com';
$subject = 'Wiadomośc z formularza od $fname $lname!';
$headers = "From: $fname $lname <$email>";

mail($to, $subject, $msg, $headers);


//function test_input($data) {
//  $data = trim($data);
//  $data = stripslashes($data);
//  $data = htmlspecialchars($data);
//  return $data;
//}

?>
