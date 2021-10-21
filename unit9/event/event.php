<?php 
//the event class used to describe the properties and methods available to the events from the wdv341 events table

class Event {
    //comments
    //properties

    public $eventId;
    public $eventName;
    public $eventDescription;
    //constructor method - skip
    //setters/getters
    function setEventId($inId) {
        $this->eventId = $inId;
    }
    function getEventId() {
        return $this->eventId;
    }

    function setEventName($inName) {
        $this->eventName = $inName;
    }
    function getEventName() {
        return $this->eventName;
    }

    //processing methods
    

}


?>