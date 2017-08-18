<?php

   if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $fname = trim($_POST["fname"]);
        $lname = trim($_POST["lname"]);
        $email = trim($_POST["email"]);

        $address = trim($_POST["address"]);
        $postal = trim($_POST["postal"]);
        $phone = trim($_POST["phone"]);
        $date = trim($_POST["date"]);
        $topic = trim($_POST["topic"]);
        $message = trim($_POST["textarea"]);

        $msg = "Imię: $fname\n";
        $msg .= "Nazwisko: $lname\n";
        $msg .= "Adres: $address\n";
        $msg .= "Kod pocztowy: $postal\n";
        $msg .= "Numer telefonu: $phone\n";
        $msg .= "Adres e-mail: $email\n";
        $msg .= "Termin: $date\n";
        $msg .= "Temat: $topic\n";
        $msg .= "Wiadomość:\n $message\n";



        $to = "marcinchojnacki00@gmail.com";
        $subject = "Wiadomośc z formularza od $fname $lname!";
        $headers = "From: $fname $lname <$email>";

        mail($to, $subject, $msg, $headers);
       

   } else {
        http_response_code(403);
        echo "Wystąpił problem z Twoim zgłoszeniem, spróbuj ponownie.";
   }

//function test_input($data) {
//  $data = trim($data);
//  $data = stripslashes($data);
//  $data = htmlspecialchars($data);
//  return $data;
//}

?>
