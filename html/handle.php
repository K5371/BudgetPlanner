<?php


$result_template = "<!DOCTYPE html>\n
<html>\n
<head>\n
	<title>Result</title>\n
</head>\n
<body>\n
$result
</body>\n
</html>\n";
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


?>