<?php
//Model-Controller Area.  The PHP processing code goes in this area.
require_once('functions.php');

$vaildUser = false; //on first time the user is invaild in order to display the form
$inCheckbox = "";

// PHP form submission code goes here
if(isset($_POST['submit'])) {
    //form has been submitted and needs processed
    echo "<h1>Form has been submitted and needs processed!</h1>";
    //get the data from the post variable
    $inFName = $_POST['first_name'];
    $inLName = $_POST['last_name'];
    $inEmail = $_POST['email'];
    $inHoneypot = $_POST['address'];
    $inSubType = $_POST['subType'];
    $inFindUs = $_POST['findUs'];
    
    if(isset($_POST['checkbox'])) {
        $inCheckbox = "Yes";
    }
    else {
        $inCheckbox = "No";
    }

    //check the honeypot for content/validation
    if($inHoneypot != "") {
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
<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>WDV 341 Intro PHP - Code Example</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <style>
        *,:after,:before{-moz-box-sizing:border-box;-webkit-box-sizing:border-box;box-sizing:border-box}body{font:normal 15px/25px 'Open Sans',Arial,Helvetica,sans-serif;color:#444;text-align:left}h1,h2,h3{font-weight:400}h1{font:normal 40px/120px 'Open Sans',Arial,Helvetica,sans-serif;text-align:center;color:#444;margin:0}h1 span{color:#484c9b}h2{font-size:25px;line-height:30px;color:#484c9b;margin:50px 0 10px}h3{font-size:18px;line-height:35px;margin:50px 0 0}a{color:#484c9b;text-decoration:none}a:focus,a:hover{text-decoration:underline}p{margin:0 0 2rem}p span{color:#aaa}header{width:98%;margin:40px auto 0;border-bottom:1px solid #ddd;padding-bottom:40px;text-align:center}header p{margin:0}section{width:95%;max-width:910px;margin:40px auto}pre{background:#f9f9f9;padding:10px;font-size:12px;border:1px solid #eee;white-space:pre-wrap;border-radius:10px}table{border:1px solid #eee;background:#f9f9f9;width:100%;border-collapse:collapse;border-spacing:0;margin-bottom:3rem}thead{background:#5965af;color:#fff}tbody tr td,thead td{padding:.5rem .75rem}tbody tr:nth-child(even){background:#efefef}tbody tr td:first-child{padding-left:1.25rem}tbody tr td:first-child,tbody tr td:nth-child(3),thead td:first-child,thead td:nth-child(3){width:15%}tbody tr td:nth-child(2),thead td:nth-child(2){width:20%}tbody tr td:last-child,thead td:last-child{width:50%}@media only screen and (min-width:768px){body{font-size:20px;line-height:30px}h2{font-size:30px;line-height:45px}h3{font-size:22px;line-height:45px;margin-top:50px}p{margin-bottom:2rem}h1{font-size:60px}pre{padding:20px;font-size:15px}}

        .address {
            display: none;
        }

    </style>
</head>

<body>
    <header>
        <h1>WDV341 Intro <span>PHP</span></h1>
        <p>Form Handler Result Page - Code Example</p>
    </header>

    <section>
        <h2>Newsletter Signup</h2>
        <p>Please enter your full name and email to recieve our super sweet newsletter!</p>

        <?php 
        
            if($vaildUser) {
                //display confirmation msg
            ?>
                <!--Success message-->
                <h4>Thank You <?php echo $inFName . " " . $inLName ?></h4>  
                <h4>Subscription Type: <?php echo $inSubType?></h4> 
                <h4>Recieve Special Offers: <?php echo $inCheckbox?></h4> 
                <h4>How You Found Us: <?php echo $inFindUs?></h4> 
                <h4>A sign up confirmation has been sent to <?php echo $inEmail?>. Thank you for your support!</h4> 
        <?php
            }
            else {
                //display form
        ?>
            <!--Input/intake form-->
            <form id="newsletter-form" name="newsletter_form" method="post" action="form-handler-homework.php">
                <p>First Name: <input type="text" name="first_name" id="first-name" /></p>
                <p>Last Name: <input type="text" name="last_name" id="last-name" /></p>
                <p>Email: <input type="text" name="email" id="email" /></p>
                <p class="address">Address: <input type="text" name="address" id="address" /></p>
                <p>
                    <label for="subType">Please Select a Subscription Type.</label>
                    <br>
                    <label for="normal">Normal</label>
                    <input type="radio" name="subType" id="normal" value="Normal">
                    <label for="expert">Expert</label>
                    <input type="radio" name="subType" id="expert" value="Expert">
                </p>
                <p>
                    <label for="yes">Recieve Special Offers and Latest Updates?</label>
                    <br>
                    <label for="yes">Yes</label>
                    <input type="checkbox" name="checkbox" id="yes" value="Yes">
                </p>
                <p>
                    <label for="findUs">How did you find us?</label>
                    <br>
                    <select name="findUs" id="findUs">
                        <option value="">Please Select One</option>
                        <option value="Word of Mouth">Word of Mouth</option>
                        <option value="Internet">Internet</option>
                        <option value="Podcast">Podcast</option>
                    </select>
                </p>

                <p>
                    <input type="submit" name="submit" id="button" value="Submit" />
                    <input type="reset" name="button2" id="button2" value="Clear Form" />
                </p>
            </form>
        <?php    
            }
        ?>
    </section>
</body>

</html>