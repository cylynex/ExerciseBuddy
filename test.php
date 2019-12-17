<?php
define('DBHOST','localhost');
define('DBUSER','cylynex');
define('DBPASSWORD','se1fserv');
define('DBNAME','exercisebuddy');
$dbconn = new mysqli(DBHOST,DBUSER,DBPASSWORD,DBNAME);

$query = "INSERT INTO exercises (exerciseName,exerciseType) VALUES ('TestEx','Humping') ";
	mysqli_query($dbconn,$query);
	

?>