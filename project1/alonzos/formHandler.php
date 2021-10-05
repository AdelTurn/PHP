<?php 
    
    $date = date_create();
    $outputDate = date_format($date, "m/d/Y");

    $to = $_POST["email"];
    $subject = "Alonzo's - " . $_POST["select_reason"];
    $message = "Hello " . $_POST["name"] . "." . "\n" . 
    "Thank you so much for reaching out to us here at Alonzo's on " . $outputDate .  "\n" . 
    "about " . $_POST["select_reason"] . "." . " We will be sure to get back to you soon.";
    $headers = "From: contact@adelturnadzic.com" . "\r\n";

    mail($to,$subject,$message,$headers);

    $to2 = "adelturnadzic@gmail.com";
    $subject2 = "Contact Form - " . $_POST["select_reason"];
    $message2 = "Contact Name - " . $_POST["name"] . "\n" . 
    "Contact Email - " . $_POST["email"] . "\n" . 
    "Contact Reason - " . $_POST["select_reason"] . "\n" . 
    "Contact Message - " . $_POST["message"] . "\n" . 
    "Contact Date - " . $outputDate;
    $headers2 = "From: contact@adelturnadzic.com" . "\r\n";

    mail($to2,$subject2,$message2,$headers2);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alonzo's - Contact</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
        <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5htfWcESESeXbGf9sOXngnab3raopZ4s&callback=initMap" type="text/javascript"></script>

    <style>
        .section-title {
            text-align: center;
        }
    </style>

    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Arizonia&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!--My Script-->
    <script src="js/myscript.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-md">
        <div class="d-flex w-50 order-0">
            <a class="navbar-brand mr-1 logo" href="index.html"><span class="letter-a">A</span>lonzo's</a>
        </div>
        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse justify-content-center order-2" id="collapsingNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="menu.html">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="reservations.html">Reservations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>
            </ul>
        </div>
        <span class="navbar-text small text-truncate mt-1 w-50 text-right order-1 order-md-last">
            <a href="reservations.html" class="nav-button">Book a Table</a>
        </span>
    </nav>
    <div class="header-contact">
        <div class="overlay">

        </div>
        <div class="text-container">
            <p class="header-text">Contact</p>
        </div>
    </div>
    <div class="main">
        <div>
            <div class="container pad-class">
                <div class="row">
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p class="section-title">Thank you <?php echo $_POST["name"]; ?> we have sent you an email at <?php echo $_POST["email"] ?>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="row">
            <div class="col-12 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <p class="footer-title"><span class="letter-a">A</span>lonzo's</p>
                <p>Alonzo’s is a fine dining Italian restaurant that has been serving it's community with great food and
                    impeccable service for 5 years now and will continue to do so.</p>
            </div>
            <div class="col-12 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <p class="footer-title">ADDRESS</p>
                <span>58 Johnson Ave <br>Des moines, Iowa 1111</span>
                <br>
                <br>
                <span>P: +1 800 000 111</span>
                <br>
                <span>E: contact@example.com</span>
            </div>
            <div class="col-12 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <p class="footer-title">ADDRESS</p>
                <span>Monday – Sunday</span>
                <br>
                <span>Lunch: 12PM – 2PM</span>
                <br>
                <span>Dinner: 6PM – 10PM</span>
                <br>
                <br>
                <span>Happy Hours: 4PM – 6PM</span>
            </div>
            <div class="col-12 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <p class="footer-title">SITE MAP</p>
                <span><a href="index.html">Home</a></span>
                <br>
                <span><a href="about.html">About</a></span>
                <br>
                <span><a href="menu.html">Menu</a></span>
                <br>
                <span><a href="reservations.html">Reservations</a></span>
                <br>
                <span><a href="contact.html">Contact</a></span>
            </div>
            <div class="col-12 col-lg-9 col-md-9 col-sm-12 col-xs-12 top-fix">
                <p>&copy;<script>document.write(currentCopyright());</script>, Alonzo's Fine Dining</p>
            </div>
            <div class="col-12 col-lg-3 col-md-3 col-sm-12 col-xs-12 top-fix">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-twitter"></i>
            </div>
        </div>
    </footer>
</body>
</html>