<?php 

    //get the id of the record we just entered. we are going to a get parameter
    //access the database to get the record we just entered
    //use that info on this page to personalize the confirmation message

    $eventId = $_GET['eventId']; //get the parameter from the url get name value pair

    echo "<h3>You entered a new record with an id of $eventId. We will look that information up from the database and display it to you.";

    //connect to database
    //create the sql statment
    //prepare the statment
    //bing the parameters
    //execute the statment
    //fetch the row from the statment object into a php assoc array
    //display the fields on the page as needed

    try {

        require '../../unit6/6-2/dbConnect.php';

        $sql = "SELECT events_name, events_description FROM wdv341_events WHERE events_id=:eventId;";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(":eventId", $eventId);

        $stmt->execute();

        echo "working so far";

        $eventRecord = $stmt->fetch(PDO::FETCH_ASSOC);

        //echo $eventRecord['events_name'];
        

    }//end of try block

    catch(PDOException $e){
        $message = "There has been a problem. The system administrator has been contacted. Please try again later.";

        error_log($e->getMessage());			//Delivers a developer defined error messageto the PHP log file at c:\xampp/php\logs\php_error_log
        error_log(var_dump(debug_backtrace()));
        
        //Clean up any variables or connections that have been left hanging by this error.		
        
        //header('Location: files/505_error_response_page.php');	sends control to a Userfriendly page	

    }//end of catch block

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
    <h1>WDV341 Events Input Response Page</h1>
    <h3>Your Event has been submitted.</h3>
    <p>Event Name: <?php echo $eventRecord['events_name']?></p>
    <p>Event Description: <?php echo $eventRecord['events_description']?></p>
</body>
</html>