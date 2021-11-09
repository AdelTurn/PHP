<?php 
    include '../../unit6/6-2/dbConnect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .content {
            width: 80%;
            max-width: 1000px;
            margin: auto;
        }
        .flexArea {
            display: flex;
        }
        .flexArea div {
            margin: 20px;
        }
    </style>
</head>
<body>
    <div class="content">
    <h1>All Events from the Events Table</h1>
    <div class="flexArea">
    <?php 
        try {

            $sql = "SELECT * FROM wdv341_events;";
            $stmt = $conn->prepare($sql);   //prepare the statement
            $stmt->execute();               //result object is still in database format
        
            foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
                echo "<div>";
                echo "<p>";
                echo "Event Id: " . $row['events_id'];
                echo "</p>";
                echo "<p>";
                echo "Event Name: " . $row['events_name'];
                echo "</p>";
                echo "<p>";
                echo "Event Description: " . $row['events_description'];
                echo "</p>";
                echo "<p>";
                echo "Event Presenter: " . $row['events_presenter'];
                echo "</p>";
                echo "<p>";
                echo "Event Date: " . $row['events_date'];
                echo "</p>";
                echo "<p>";
                echo "Event Time: " . $row['events_times'];
                echo "</p>";
                echo "<p>";
                echo "Event Date Inserted: " . $row['events_date_inserted'];
                echo "</p>";
                echo "<p>";
                echo "Event Date Updated: " . $row['events_date_updated'];
                echo "</p>";
                echo "</div>";
            }
        
        }
        catch(PDOException $e) {
            echo "Errors: " . $e->getMessage();
        }
    ?>
    </div>
    </div>
</body>
</html>