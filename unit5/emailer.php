<?php 

    //testing email() in php

    $to = "adelturnadzic@gmail.com";
    $subject = "information from wdv341 php email function()";
    $message = "This verifies that the application can send an email.";
    $headers = "From: contact@adelturnadzic.com" . "\r\n";

    if (mail($to,$subject,$message,$headers)) {
        echo "Accepted email";
    }
    else {
        echo "email failed";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>