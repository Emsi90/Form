<?php

$fnameError = $fnameError = $fnameError = "";

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["fname"])) {
        $fnameError = "error";
    } else {
        $fname = test_input($_POST["fname"]);
    }
    if (empty($_POST["lname"])) {
        $lnameError = "error";
    } else {
        $lname = test_input($_POST["lname"]);
    }
    if (empty($_POST["email"])) {
        $emailError = "error";
    } else {
        $email = test_input($_POST["email"]);
    }
    
    if($fnameError = "" and $fnameError = "" and $fnameError = "") {
        $to = 'sztuka-18@o2.pl';
        $subject = 'Wiadomośc z formularza!';
//        mail($to, $fname, $lname, $email, $subject)
        if(mail($to, $fname, $lname, $email, $subject)){
            $success = "Formularz wysłany, dziekujemy za wiadomość!";
        }
    }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>