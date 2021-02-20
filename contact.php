<?php

$msg = '';
$msgClass = '';

if(filter_has_var(INPUT_POST, 'submit')) {
    $name = htmlspecialchars($_POST["appointment_name"]);
    $email = htmlspecialchars($_POST["appointment_email"]);
    $date = htmlspecialchars($_POST["appointment_date"]);
    $time = htmlspecialchars($_POST["appointment_time"]);
    $phone = htmlspecialchars($_POST["phone"]);

    if(!empty($email) && !empty($name) && !empty($date)) {


            if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $msg = 'Παρακαλω συμπληρώστε τα απαιτούμενα πεδία';
                $msgClass = 'alert-danger';
            } else {
                echo 'Ευχαριστούμε, το αίτημα σας στάλθηκε επιτυχώς';
                $toEmail = 'kvstaw4@hotmail.com';
                $subject = 'Αίτημα Για Ραντεβού Απο ' .$appointment_name;
                $body = '<h2>Αίτημα Για Ραντεβού</h2>
                <h4>Ονομα</h4><p>'.$appointment_name.'</p>
                <h4>email</h4><p>'.$appointment_email.'</p>
                <h4>Ημερομηνία</h4><p>'.$appointment_date.'</p>
                <h4>Ώρα</h4><p>'.$appointment_time.'</p>
                <h4>Τηλέφωνο</h4><p>'.$phone.'</p>';

                $headers = "MIME-Version: 1.0" ."\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                $headers .= "From: " .$appointment_name. "<" .$appointment_email. ">". "\r\n";

                if(mail($toEmail, $subject, $body, $headers)) {
                    $msg = 'Ευχαριστούμε, το αίτημα σας στάλθηκε επιτυχώς';
                    $msgClass = 'alert-success';
                } else {
                    $msg = 'Υπηρξε κάποιο πρόβλημα, το αίτημα δεν στάλθηκε!';
                    $msgClass = 'alert-danger';
                }
                    
            }
    }   else {
            $msg = 'Παρακαλω συμπληρώστε τα απαιτούμενα πεδία!';
            $msgClass = 'alert-danger';
    }
}

?>