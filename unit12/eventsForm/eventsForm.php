<?php 
    /*
        if(form is submitted) {
            process from data
        }
        else {
            display form
        }

        isset($_POST)
    */

    if(isset($_POST['submit'])){
        echo "FORM HAS BEEN SUBMITTED";

        $eventName = $_POST['event_name'];
        $eventDesc = $_POST['event_description'];
        $eventPresenter = $_POST['event_presenter'];
        $eventDate = $_POST['event_date'];
        $eventTime = $_POST['event_time'];

        //connect to database
        //create the sql statment
        //prepare the sql statment
        //bind parameters into the prepared statement
        //execute the prepared statment
        //display conformation message
        try {

            require '../../unit6/6-2/dbConnect.php';

            $sql = "INSERT INTO wdv341_events (events_name, events_description, events_presenter, events_date, events_time) VALUES (:eventName, :eventDesc, :eventPresenter, :eventDate, :eventTime)";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(":eventName", $eventName);
            $stmt->bindParam(":eventDesc", $eventDesc);
            $stmt->bindParam(":eventPresenter", $eventPresenter);
            $stmt->bindParam(":eventDate", $eventDate);
            $stmt->bindParam(":eventTime", $eventTime);

            $stmt->execute();

            echo "working so far";

        }//end of try block

        catch(PDOException $e){
			$message = "There has been a problem. The system administrator has been contacted. Please try again later.";
	
			error_log($e->getMessage());			//Delivers a developer defined error messageto the PHP log file at c:\xampp/php\logs\php_error_log
			error_log(var_dump(debug_backtrace()));
			
			//Clean up any variables or connections that have been left hanging by this error.		
			
			//header('Location: files/505_error_response_page.php');	sends control to a Userfriendly page	

	    }//end of catch block

    }
    else{
        echo "FORM HAS NOT BEEN SUBMITTED";
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
    <form method="post" action="eventsForm.php">

        <p>
            <label for="event_name">Event Name:</label>
            <input type="text" name="event_name" id="event_name">
        </p>
        <p>
            <label for="event_description">Event Description:</label>
            <input type="text" name="event_description" id="event_description">
        </p>
        <p>
            <label for="event_presenter">Event Presenter: </label>
            <input type="text" name="event_presenter" id="event_presenter">
        </p>
        <p>
            <label for="event_date">Event Date: </label>
            <input type="date" name="event_date" id="event_date">
        </p>
        <p>
            <select name="event_time" id="event_time">
                <option value="">Select Event Time</option>
                <option value="12:00:00">12:00 PM</option>
                <option value="13:00:00">1:00 PM</option>
                <option value="14:00:00">2:00 PM</option>
                <option value="15:00:00">3:00 PM</option>
                <option value="16:00:00">4:00 PM</option>
            </select>
        </p>
        <p>
            <input type="submit" value="submit" name="submit">
        </p>

    </form>
</body>
</html>