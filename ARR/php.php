<?php 
//date creatiojn
$date = date_create();

//output date for footer
$outputDate = date_format($date, "Y");

//defaults login status to false on all pages
$loggedIn = false;

?>