<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="template.css">
	<title>Result</title>
</head>
<body>

<div class="topnav">
  <a href="#home">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
</div>

<?php

	$url = $_SERVER['REQUEST_URI'];
	$query = parse_url($url, PHP_URL_QUERY);
	parse_str($query, $output);
	// parsed destination, duration, budget for SQL query use
	$destination = $output['destination'];
	$duration = $output['duration'];
	$budget = $output['budget'];
	echo $destination;
	echo "<br>";
	echo $duration;
	echo "<br>";
	echo $budget;
	$servername = "localhost";
	$username = "budgetplanner_yijielu2";
	$password = "password";

	// Create connection
	$conn = new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	echo "Connected successfully";
?>

</body>
</html>