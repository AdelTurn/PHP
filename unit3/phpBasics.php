<?php

    $yourName = "Adel Turnadzic";
    $numberOne = 5;
    $numberTwo = 10;
    $languages = array("PHP", "HTML", "JavaScript");

    $jsLanguages = "";
    foreach($languages as $value){
        $jsLanguages .= "'" . $value . "',  ";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script>
        <?php 
            echo "let languages = [$jsLanguages];";
        ?>
        console.log(languages);
    </script>

</head>
<body>
    <h1>PHP Basics</h1>
    <h2><?php echo $yourName ?></h2>
    <p>Number One: <?php echo $numberOne ?></p>
    <p>Number Two: <?php echo $numberTwo ?></p>
    <p>Number Total: <?php echo $numberOne + $numberTwo?></p>
    <script>
        document.write(languages);
    </script>
</body>
</html>