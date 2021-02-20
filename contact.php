<?php

if (isset($_POST['submit'])) {
    $name = $_POST['appointment_name'];
    $email = $_POST['appointment_email'];
    $date = $_POST['appointment_date'];
    $time = $_POST['appointment_time'];
    $phone = $_POST['phone'];

    $mailTo = "kvstaw4@hotmail.com";
    $headers = "From: ".$email;
    $txt = "mail from ".$name;

    mail($mailTo, $txt, $headers);
}

