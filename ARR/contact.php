<?php 

    include "php.php";

    session_start();

    $validUser = false; //on first time the user is invaild in order to display the form

    $honey = "";    //sets honey pot variable and leaves it empty

    if(isset($_POST['submit'])) {//checks if form has been submitted

        $honey = $_POST["address"];

        if($honey != "") {//checks if honey pot is not empty, if is not empty the valid user stays false
            $validUser = false;
        }
        else {//if honey pot is empty the valid user is true and will send the emails
            $validUser = true;
            //date for contact form
            $contactDate = date_format($date, "m/d/Y");

            //contact form info - send to customer
            $to = $_POST["email"];
            $subject = "ARR Contact";
            $message = "Hello " . $_POST["name"] . "." . "\n" . 
            "Thank you so much for reaching out to us here at ARR on " . $contactDate .  "\n" . 
            " We will be sure to get back to you as soon as possible.";
            $headers = "From: contact@adelturnadzic.com" . "\r\n";

            mail($to, $subject, $message, $headers);

            //mail to my email
            $to2 = "adelturnadzic@gmail.com";
            $subject2 = "ARR Contact";
            $message2 = "Contact Name - " . $_POST["name"] . "\n" . 
            "Contact Email - " . $_POST["email"] . "\n" . 
            "Contact Message - " . $_POST["message"] . "\n" . 
            "Contact Date - " . $contactDate;
            $headers2 = "From: contact@adelturnadzic.com" . "\r\n";

            mail($to2,$subject2,$message2,$headers2);
        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <!--My CSS-->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<div class="border-bottom site-header sticky-top bg-white">
        <nav class="navbar navbar-light navbar-expand-lg bg-white stroke">
            <div class="container-fluid">
                <div class="d-flex flex-grow-1">
                    <a href="index.php" class="navbar-brand col-md-3 bg-white">
                        <i class="fas fa-font"></i>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navNavbar" aria-controls="navNavbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse flex-grow-1 text-right" id="navNavbar">
                    <ul class="navbar-nav ms-auto flex-nowrap">
                        <li class="nav-item">
                            <a class="nav-link px-2 m-2" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-2 m-2 link-secondary" href="reviews.php">Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-2 m-2 link-secondary" href="add.php">Add Review</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-2 m-2 link-secondary" href="contact.php">Contact</a>
                        </li>
                        <?php 
                            if(isset($_SESSION["loggedIn"])) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link px-2 m-2 link-secondary" href="logout.php">Logout</a>
                            </li>
                        <?php
                            }
                            else {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link px-2 m-2 link-secondary" href="login.php">Login</a>
                            </li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="header1">
        <div class="overlay">

        </div>
        <div class="text-container">
            <h1 class="header-text">Adel's Restaurant</h1>
            <h1 class="header-text">Reviews</h1>
        </div>
    </div>
    <div class="bodyCon">
        <?php 
            if($validUser) {//checks if the user passed the honey pot and is not a bot so it will give them this conformation message
        ?>
        <div class="sucMessage">
            <h1>Thank you <?php echo $_POST["name"]; ?> for contacting us, we have sent you an email at <?php echo $_POST["email"] ?>.</h1>
        </div>
        <?php
        }
        else {//if the user is not vaild
            if($honey != "") {//if the user is not vaild and the honey pot is not empty it will display the error message
        ?>
            <div class="errorMessage">
                <h1>We have detected suspicious activity. If you would like to try to send your email please go back to our contact page.</h1>
                <button onclick="window.location.href='contact.php'">Contact</button>
            </div>
        <?php       
            }
            else {//if it is not a vaild user but the honey pot is empty meaning they have not submitted the form yet they will see the form
        ?>
        <div class="formCon">
        <h1>Contact</h1>
            <form action="contact.php" method="post">
                <div class="row">
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div>
                            <label for="name">Name<span class="requiredRed">*</span></label>
                            <input type="text" name="name" id="name" required>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="email">Email<span class="requiredRed">*</span></label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="honey">
                    <label for="address">Address<span class="requiredRed">*</span></label>
                    <input type="text" name="address" id="address">
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="message">Additional Information<span class="requiredRed">*</span></label>
                    <textarea class="form-control" name="message" id="message" rows="6" required></textarea>
                </div>
                <input type="submit" name="submit">
            </form>
        </div>
        <?php
                }
            }
        ?>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <a href="index.php"><i class="fas fa-font"></i></a>
                </div>
                <div class="col-12 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <h6><a href="index.php">Home</a></h6>
                </div>
                <div class="col-12 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <h6><a href="reviews.php">Reviews</a></h6>
                </div>
                <div class="col-12 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <h6><a href="add.php">Add Review</a></h6>
                </div>
                <div class="col-12 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <h6><a href="contact.php">Contact</a></h6>
                </div>
                <div class="col-12 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <?php 
                        if(isset($_SESSION["loggedIn"])) {
                    ?>
                        <div class="col-12 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <h6><a href="logout.php">Logout</a></h6>
                        </div>                    
                    <?php
                        }
                        else {
                    ?>
                        <div class="col-12 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <h6><a href="login.php">Login</a></h6>
                        </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <div class="row copy">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h6>© <?php echo $outputDate?> Adel's Restaurant Reviews All Rights Reserved</h6>
                </div>
            </div>
        </div>
    </footer>

    <!--Bootstrap Script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>