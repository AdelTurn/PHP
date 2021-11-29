<?php 

    /*
            This page will create a new event object
            it will access the events table from the database
            it will create and load an event object with data from the database
            it will then convert the event object into a JSON object
            it will echo "return" the JSON object to the calling program

            the program will return all the events from the events table
            how to combine all the events into 1 container to echo/return
            make an array of events and then return the array
    */

    require 'event.php';

    require "../../unit6/6-2/dbConnect.php";    //access the database

    $eventsArray = [];  //empty array to hold the event objects

    try {
        $sql = "SELECT events_id, events_name, events_description FROM wdv341_events";
        $stmt = $conn->prepare($sql);   //prepare the statment
        $stmt->execute();   //the result object is still in database formate
        
        //foreach row in the $stmt load the object
        //  add the object to an array
        //  after all rows are loaded convert array into JSON object
        
        foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {

            $eventObject = new Event();     //create a new PHP event object from the event class
            $eventObject->setEventId($row['events_id']);
            $eventObject->setEventName($row['events_name']);
            $eventObject->setEventDescription($row['events_description']);

            array_push($eventsArray, $eventObject);
        }

        echo json_encode($eventsArray);

    }//end try

    catch(PDOException $e) {
        echo "Errors: " . $e->getMessage();
    }






/*
    try {
        $sql = "SELECT events_id, events_name, events_description FROM wdv341_events";
        $stmt = $conn->prepare($sql);   //prepare the statment
        $stmt->execute();   //the result object is still in database formate
        $result = $stmt->fetch(PDO::FETCH_ASSOC);   //get 1 row from the result object
    }//end try

    catch(PDOException $e) {
        echo "Errors: " . $e->getMessage();
    }

    echo $result['events_id'];
    echo $result['events_name'];
    echo $result['events_description'];

    $eventObject->setEventId($result['events_id']);
    $eventObject->setEventName($result['events_name']);
    $eventObject->setEventDescription($result['events_description']);

    //echo $eventObject;  //what does this look like?   BAD!!!

    echo json_encode($eventObject);  //convert php object of event class into a json object


    //process next row(2) from the result object
    $result = $stmt->fetch(PDO::FETCH_ASSOC);   //get 1 row from the result object

    $eventObject->setEventId($result['events_id']);
    $eventObject->setEventName($result['events_name']);
    $eventObject->setEventDescription($result['events_description']);

    //echo $eventObject;  //what does this look like?   BAD!!!

    echo json_encode($eventObject);  //convert php object of event class into a json object
*///commenting off this way of doing it because you need to manually code it all one row at a time and that is not efficent

?>