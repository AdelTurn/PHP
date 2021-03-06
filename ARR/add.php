<?php 

include "php.php";

session_start();

$validUser = false; //on first time the user is invaild in order to display the form

$honey = "";    //sets honey pot variable and leaves it empty

$sucMsg = "";

$message = "";

if(isset($_POST['submit'])){
    
    $restaurantName = $_POST['restaurantName'];
    $reviewDate = $_POST['reviewDate'];
    $imageName = $_POST['imageName'];
    $reviewText = $_POST['reviewText'];
    $reviewRating = $_POST['reviewRating'];
    $honey = $_POST['reviewTime'];

    if($honey != "") {
        
    }
    else {
        try {

            require '../unit6/6-2/dbConnect.php';
    
            $sql = "INSERT INTO arr_reviews (review_name, review_date, review_img, review_body, review_rating) VALUES (:restaurantName, :reviewDate, :imageName, :reviewText, :reviewRating)";
            $stmt = $conn->prepare($sql);
    
            $stmt->bindParam(":restaurantName", $restaurantName);
            $stmt->bindParam(":reviewDate", $reviewDate);
            $stmt->bindParam(":imageName", $imageName);
            $stmt->bindParam(":reviewText", $reviewText);
            $stmt->bindParam(":reviewRating", $reviewRating);
    
            $stmt->execute();
    
            $newEventId = $conn->lastInsertId();

            $sucMsg = "Insert Successful";
    
        }//end of try block
    
        catch(PDOException $e){
            $message = "There has been a problem. The system administrator has been contacted. Please try again later.";
    
            error_log($e->getMessage());
            error_log(var_dump(debug_backtrace()));
    
        }//end of catch block
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
<?php 

        if(isset($_SESSION["loggedIn"])) {
    ?> 

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
        <div class="formCon">
            <h1>Add a Review</h1>
            <h1><?php echo $sucMsg; ?></h1>
            <h1><?php echo $message; ?></h1>
            <form action="add.php" method="post">
                <div>
                    <label for="restaurantName">Restaurant Name<span class="requiredRed">*</span></label>
                    <input type="text" name="restaurantName" id="restaurantName" required>
                </div>
                <div>
                    <label for="reviewDate">Review Date<span class="requiredRed">*</span></label>
                    <input type="date" name="reviewDate" id="reviewDate" required>
                </div>
                <div>
                    <label for="imageName">Image Name<span class="requiredRed">*</span></label>
                    <input type="text" name="imageName" id="imageName" required>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="reviewText">Review Text<span class="requiredRed">*</span></label>
                    <textarea class="form-control" name="reviewText" id="reviewText" rows="6"></textarea>
                </div>
                <div>
                    <label for="reviewRating">Review Rating<span class="requiredRed">*</span></label>
                    <input type="text" name="reviewRating" id="reviewRating" required>
                </div>
                <div class="honey">
                    <label for="reviewTime">Review Time<span class="requiredRed">*</span></label>
                    <input type="text" name="reviewTime" id="reviewTime">
                </div>
                <input type="submit" name="submit">
            </form>
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
                    <h6>?? <?php echo $outputDate?> Adel's Restaurant Reviews All Rights Reserved</h6>
                </div>
            </div>
        </div>
    </footer>

    <!--Bootstrap Script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
    </html>
    <?php      
        }
        else {
            header("location: login.php");
        }
    ?>
