<?php

	$destination = $_POST['destination'];
	$duration = $_POST['duration'];
	$budget = $_POST['budget'];
	$target = $_POST['target'];
    $destination = str_replace('%20', ' ', $destination);
	// Connecting MySQL
	$servername = "localhost:3306";
	$username = "budgetplanner_yijielu2";
	$password = "946983Yy2.2";
	$database = "budgetplanner_test";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $database);

	// Check connection
	if ($conn->connect_errno) {
	    printf("Connect failed: %s\n", $conn->connect_error);
	    exit();
	}
	if ($target == 'Hotels') {
	    $query = sprintf(
	    "Select id, hotel_name, price_high from %s 
        where city = '%s'and price_high * %d < %d 
        order by price_high
        desc
        limit 50",
	    $target, $destination, $duration, $budget);
	    $result = $conn->query($query);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo $row["hotel_name"] . "@@@" . $row["price_high"] . "@@@" . $row["id"] . "\n";
            }
        } else {
            echo "No results found";
        }
	}
	else {
	    $query = sprintf(
	    "Select business_id, name, attributes__RestaurantsPriceRange2 from %s 
        where city = '%s'and attributes__RestaurantsPriceRange2 * %d * 200 < %d 
        order by attributes__RestaurantsPriceRange2
        desc
        limit 50",
        $target, $destination, $duration, $budget);
        $result = $conn->query($query);
	
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $dollar_sign = "";
                for ($i = 0; $i < $row["attributes__RestaurantsPriceRange2"] - 1; $i++) {
                    $dollar_sign .= "$";
                }
                echo $row["name"] . "@@@" . $dollar_sign . "@@@" . $row["business_id"] . "\n";
            }
        } else {
            echo "No results found";
        }
	}
	    
	

?>