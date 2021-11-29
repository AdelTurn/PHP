<?php 
    session_start();    //allows access to the application session
    /*
        if(form is submitted) {
            process from data
        }
        else {
            display form
        }

        isset($_POST)
    */

    $vaildUser = false; //assume invaild user until signed on
    $errMSG = "";

    if(isset($_POST['submit'])) {
        echo "Form has been submitted";

        $loginName = $_POST["loginName"];
        $loginPW = $_POST["loginPassword"];

        //connect to database
        //create the sql statment
        //prepare the statment
        //bing the parameters
        //execute the statment
            //how to tell that we have a vaild user
                //if the select returns at least one record assume a vaild user
                //if the select returns 0 records then assume an invaild user

            //if you have a valid username and password then display admin info
            //else display invaild username or password and display the form again

        try {
            require '../../unit6/6-2/dbConnect.php';

            $sql = "SELECT event_user_name, event_user_password FROM event_user WHERE event_user_name=:loginName AND event_user_password=:loginPW;";
            $stmt = $conn->prepare($sql);


            $stmt->bindParam(":loginName", $loginName);
            $stmt->bindParam(":loginPW", $loginPW);

            $stmt->execute();

            /*
            $count = $stmt->fetchColumn();

            echo "Found $count rows in event_user table.";

            if($count == "") {
                echo "invaild username/password. Display error and form.";
            }
            else {
                echo "Welcome back $count";
            }
            */

            //how do we know that we have a vaild user? - fetchAll() technique
            $resultArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $numRows = count($resultArray);

            if($numRows == 1) {
                //vaild user
                $_SESSION['vaildUser'] = true;
                $vaildUser = true;  //we have a vaild user
                //display admin options
            }
            else {
                //invaild user
                $errMSG = "Invaild Username/Password Please Try Again!";
                //display form and error message
            }

            echo "working so far";

        }//end of try block

        catch(PDOException $e){
			$message = "There has been a problem. The system administrator has been contacted. Please try again later.";
	
			error_log($e->getMessage());			//Delivers a developer defined error messageto the PHP log file at c:\xampp/php\logs\php_error_log
			error_log(var_dump(debug_backtrace()));
			
			//Clean up any variables or connections that have been left hanging by this error.		
			
			//header('Location: files/505_error_response_page.php');	sends control to a Userfriendly page	

	    }//end of catch block

    }
?>
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
    /*
        if you have a vaild user display block 1
        else display block 2
    */
    
    if($vaildUser) {
    ?>
    <div>
        <h3>Welcome to the admin aread for vaild users</h3>
        <p>You have the following options availabe as an administrator.</p>
        <ol>
            <li><a href="inputEvent.php">input new products</a></li>
            <li>delete products</li>
            <li>update products</li>
            <li><a href="logout.php">log off</a></li>
        </ol>
    </div>
    <?php  

    }

    else {
    ?>
        <h1>My Compnay Sign on Page</h1>
        <form method="post" action="login.php">
            <div>
                <label for="loginName">Username: </label>
                <input type="text" name="loginName" id="loginName">
            </div>
            <div>
                <label for="loginPassword">Password: </label>
                <input type="password" name="loginPassword" id="loginPassword">
            </div>
            <h3> <?php echo $errMSG; ?> </h3>
            <div>
                <input type="submit" value="Sign On" name="submit">
                <input type="reset">
            </div>
        </form>
    <?php

    }
?>

</body>
</html>