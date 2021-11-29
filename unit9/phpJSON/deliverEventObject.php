<?php 

    class Event {

        public $eventId;
        public $eventName;
        public $eventDescription;
        public $eventPresenter;
        public $eventDate;
        public $eventTime;

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

        function setEventDescription($inDescription) {
            return $this->eventDescription = $inDescription;
        }
        function getEventDescription() {
            return $this->getEventDescription;
        }
        
        function setEventPresenter($inPresenter) {
            return $this->eventPresenter = $inPresenter;
        }
        function getEventPresenter() {
            return $this->getEventPresenter;
        }
        
        function setEventDate($inDate) {
            return $this->eventDate = $inDate;
        }
        function getEventDate() {
            return $this->getEventDate;
        }
        
        function setEventTime($inTime) {
            return $this->eventTime = $inTime;
        }
        function getEventTime() {
            return $this->getEventTime;
        }
    
    }//end event class definition

    include '../../unit6/6-2/dbConnect.php';

    try {
        $sql = "SELECT * FROM wdv341_events WHERE events_id=3;";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $outputObj = new Event();
        $outputObj->setEventId($result['events_id']);
        $outputObj->setEventName($result['events_name']);
        $outputObj->setEventDescription($result['events_description']);
        $outputObj->setEventPresenter($result['events_presenter']);
        $outputObj->setEventDate($result['events_date']);
        $outputObj->setEventTime($result['events_times']);

        echo json_encode($outputObj);

    }
    catch(PDOException $e) {
        echo "Errors: " . $e->getMessage();
    }

?>
