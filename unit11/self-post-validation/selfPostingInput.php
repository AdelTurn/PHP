<?php 

$vaildUser = false; //on first time the user is invaild in order to display the form

if(isset($_POST['submit'])) {
    //form has been submitted and needs processed
    //get the data from the post variable
    $eventsName = $_POST['events_name'];
    $eventsDescription = $_POST['events_description'];
    $eventsPresenter = $_POST['events_presenter'];
    $honey = $_POST['events_location'];

    //check the honeypot for content/validation
    if($honey != "") {
        //invaild result
        $vaildUser = false;     //its a bot
    }
    else {
        //valid user
        $vaildUser = true;      //user input display conformation msg
    }

}
else {
    //display form to user so they can enter data
    echo "<h1>Show user the form so they can enter data!</h1>";
}

?>

<style>
    .honey {
        display: none;
    }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        if($vaildUser) {
        ?>
            <h1>Thank you for submitting your event!</h1>
            <h2>The results we have from your event are</h2>
            <h3>Event Name: <?php echo $eventsName;?></h3>
            <h3>Event Description: <?php echo $eventsDescription;?></h3>
            <h3>Event Presenter: <?php echo $eventsPresenter;?></h3>
        <?php
        }
        else {
        ?>
            <h1>Input Event</h1>
            <form action="selfPostingInput.php" method="post">
                <p>
                    <label for="events_name">Event Name: </label>
                    <input type="text" name="events_name" id="events_name" required>
                </p>
                <p>
                    <label for="events_description">Event Description: </label>
                    <input type="text" name="events_description" id="events_description" required>
                </p>
                <p>
                    <label for="events_presenter">Event Presenter: </label>
                    <input type="text" name="events_presenter" id="events_presenter" required>
                </p>
                <p class="honey">
                    <label for="events_location">Event Location: </label>
                    <input type="text" name="events_location" id="events_location">
                </p>
                <p>
                    <input type="submit" name="submit" id="submit" value="submit">
                    <input type="reset">
                </p>
            </form>
        <?php
        }
    ?>
</body>
</html>