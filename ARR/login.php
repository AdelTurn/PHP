<?php 

  require "php.php";

  session_start();

  $errMSG = "";

  if(isset($_POST['submit'])) {

      $loginName = $_POST["userName"];
      $loginPW = $_POST["password"];

      try {
          require '../unit6/6-2/dbConnect.php';

          $sql = "SELECT event_user_name, event_user_password FROM event_user WHERE event_user_name=:loginName AND event_user_password=:loginPW;";
          $stmt = $conn->prepare($sql);

          $stmt->bindParam(":loginName", $loginName);
          $stmt->bindParam(":loginPW", $loginPW);

          $stmt->execute();

          $resultArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
          $numRows = count($resultArray);

          if($numRows == 1) {
              $_SESSION['loggedIn'] = true;
              $loggedIn = true;
          }
          else {
              $errMSG = "Invaild Username/Password Please Try Again!";
          }

        }//end of try block

      catch(PDOException $e){
			$message = "There has been a problem. The system administrator has been contacted. Please try again later.";
	
			error_log($e->getMessage());

	    }//end of catch block

    }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <!--My CSS-->
    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body class="text-center">
    <?php 
    
      if($loggedIn) {
        header("location: reviews.php");
      }
      else {
    ?>
    <main class="form-signin">
        <form method="post" action="login.php">
            <i class="fas fa-font"></i>
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
            <h5 class="errMSG"> <?php echo $errMSG; ?></h5>
            <div class="form-floating">
                <input type="text" class="form-control" id="userName" name="userName" placeholder="Username">
                <label for="userName">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign in</button>
        </form>
    </main>
    <?php
    }
    ?>

    
  </body>
</html>
