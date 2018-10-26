<?php
$destination = $_POST['destination'];
$budget = $_POST['budget'];
$duration = $_POST['duration'];

$result_template = "<!DOCTYPE html>\n
<html>\n
<head>\n
	<title>Result</title>\n
</head>\n
<body>\n
$destination
$budget
$duration
</body>\n
</html>\n";

$myfile = fopen("result.html", "w");
fwrite($myfile, $result_template);
fclose($myfile);
echo $destination;

?>