<?php 

    /*
        get data from a database
            -connect to database
            -sql select to get data from database
            -prepare the statement
                bind the parameters
            -execute the statement (run it)

            use a fetch command to pull the data from the statement/results object into php assoc array
            pull th data fields from the array looks like $row['product_name']

            place the new data into an html area to display echo $....
            do this for each piece of data in the record

            if this works then we will do this for all rows
                use a foreach loop to access each row to build the output
    */

    $productArray = []; //create array to store products

    include '../../unit6/6-2/dbConnect.php';

    try {
        $sql = "SELECT product_name, product_description, product_price, product_image, product_status, product_inStock FROM wdv341_products;";
        $stmt = $conn->prepare($sql);   //prepare statment
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);   //$result is an array

        $productObj = new stdClass();               // creates generic php object
        $productObj->product_name = $result['product_name']; //add property to object
        $productObj->product_description = $result['product_description'];
        $productObj->product_price = $result['product_price'];
        $productObj->product_image = $result['product_image'];
        $productObj->product_status = $result['product_status'];
        $productObj->product_inStock = $result['product_inStock'];    

        //$productJSON = json_encode($productObj);    //convert php object into a json object

        //echo $productJSON;

        array_push($productArray, $productObj);  //add first product to array

        foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $result) {
            $productObj = new stdClass();               // creates generic php object
            $productObj->product_name = $result['product_name']; //add property to object
            $productObj->product_description = $result['product_description'];
            $productObj->product_price = $result['product_price'];
            $productObj->product_image = $result['product_image'];
            $productObj->product_status = $result['product_status'];
            $productObj->product_inStock = $result['product_inStock'];  
            
            //$productJSON = json_encode($productObj);    //convert php object into a json object

            //echo $productJSON; 

            array_push($productArray, $productObj);  //add rest of products to array

        }//end of forEach row on the database result

        //echo $productArray;

        $productArrayJSON = json_encode($productArray);

        echo $productArrayJSON; //return JSON formatted array of objects

    }
    catch(PDOException $e) {
        echo "Errors: " . $e->getMessage();
    }

?>
