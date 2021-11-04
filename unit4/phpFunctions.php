<?php 

   $date = date_create(); 

    function stringInput($inString) {
        echo strlen($inString);
        echo nl2br("<br>");
        trim($inString);
        echo strtolower($inString);
        echo nl2br("<br>");
        if(strpos(strtolower($inString), "dmacc") !== false) {
            echo "Word Found";
        }
        else {
            echo "Word not found";
        }
    }

    function phoneNumber($inNumber) {
        echo("The original number is $inNumber.\n");
        if(  preg_match( '/^(\d{3})(\d{3})(\d{4})$/', $inNumber,  $matches ) )
        {
            $result = $matches[1] . '-' .$matches[2] . '-' . $matches[3];
        }
        echo("The formatted number is $result.");
    }

    function formatMoney($inNum) {
        echo '$' . number_format($inNum, 2);
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
    <p>
        <?php echo date_format($date, "m/d/Y");?>
    </p>
    <p>
        <?php echo date_format($date, "d/m/Y");?>
    </p>
    <p>
        <?php echo stringInput("Hello World, I GO to DMACC!"); ?>
    </p>
    <p>
        <?php echo phoneNumber(1234567890); ?>
    </p>
    <p>
        <?php echo formatMoney(123456); ?>
    </p>
</body>
</html>