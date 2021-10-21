<?php 
//test the event class

require 'event.php'; //get access to the class

//create an event object

$newEvent = new Event();

//test name setter
$newEvent->setEventName("WDV341");
//test name getter
echo $newEvent->getEventName();

?>