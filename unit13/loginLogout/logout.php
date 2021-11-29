<?php 

    //need to join session to destroy it
    session_start();

    //clear and session vairables related to this user

    session_unset();

    session_destroy();

    //clear any session vairables related to this user
    //close any connections for this user
    //redirect back to the site home page

    header("location: login.php");

?>