<?php

	$query = $_POST['query'];
	$id = $_POST['id'];
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
	
	$result = $conn->query($query);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if ($_POST['target'] == 'hotel') {
                echo $row['hotel_name'];
            }
            else if ($_POST['target'] == 'review') {
                echo $row['review_text'] . "@@@" . $row['review_id'] . "~~~";
            }
            else if ($_POST['target'] == 'broke') {
                echo $row['name'] . "@@@" . $row['stars'] . "@@@" . $row['business_id'] . "~~~";
            }
            else {
                echo $row['name'];
            }
        }
    } else {
        echo "No results found";
    }

	

?>