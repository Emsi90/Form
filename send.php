<?php
$to = 'marcinchojnacki00@gmail.com';
$fname = $_POST['fname'] . "\r\n";
$lname = $_POST['lname'] . "\r\n";
$email = $_POST['email'] . "\r\n";

$fnamee = 'Imie: ' . $_POST['fname'];
$lnamee = 'Nazwisko: ' . $_POST['lname'];
$address = 'Adres: ' . $_POST['address'];
$postal = 'Kod pocztowy: ' . $_POST['postal'];
$phone = 'Numer telefonu: ' . $_POST['phone'];
$emaill = 'Adres email: ' . $_POST['email'];
$date = 'Termin: ' . $_POST['date'];
$topic = 'Temat: ' . $_POST['topic'];
$message = 'Wiadomość: ' . $_POST['textarea'];

$headers = 'From: ' . $_POST['email'] . "\r\n" .
	'Content-type: text/html; charset=utf-8';

$msg = "$fnamee
";
$msg.= "$lnamee
";
$msg.= "$address
";
$msg.= "$postal
";
$msg.= "$phone
";
$msg.= "$emaill
";
$msg.= "$date
";
$msg.= "$topic
";
$msg.= "$message
";

mail($to, trim($fname), $lname, $email, $headers);
//header('Location: sukces.html');

?>
