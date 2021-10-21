<?php 
    $currentDate; //define new variable

    //mm-dd-yyyy

    $date = date_create(); //create current DateTime object

    $outputDate = date_format($date, "m-d-Y");

    $midTermDate = date_create("2021-10-20");

    /*
        Algorithm for date handling/display 
        1. What date do you want to use?
        2. what format will you need to use or display?
        3. where will you display it?
        4.create a date object          -date_create()
        5. format the date object       -date_format()
        6. display where needed.        -echo
    */

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
    <h1>WDV341 Intro PHP</h1>
    <h2>Unit-4 Functions and Dates</h2>
    <p>Today is <?php echo $outputDate;?></p>
    <p>Your midterm exam will be <?php echo date_format($midTermDate, "l F jS, Y");?>.</p>
</body>
</html>