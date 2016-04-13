<?php
// Start the session
session_start();
$hostname = "127.0.0.1";
$username = "root";
$password ="";
$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");


$obj = json_decode(file_get_contents('php://input')); 
$uname = $_SESSION["loadname"];







mysql_select_db("user", $connection) or die("Could not select database");

$result =  mysql_query("select * from favr where login='$uname'") or die("Could not issue MySQL query");		
	$allfa = array();
	while($row = mysql_fetch_array($result)){
	
	$rows =  array("cname" => $row[1]); 
	array_push($allfa, $rows);	
	}
	echo json_encode($allfa);  			
	
	


            mysql_close($connection);
 



?>