<?php
// Start the session
session_start();
$hostname = "127.0.0.1";
$username = "root";
$password ="";
$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");


$obj = json_decode(file_get_contents('php://input')); 
//$uname = $_SESSION["loadname"];




$cid=$_GET['cid'];
$cmc=$_GET['cmc'];
$flag=$_GET['flag'];

mysql_select_db("loli", $connection) or die("Could not select database");

if($flag=="s"){
	mysql_query("INSERT INTO cm (cid , cmc) VALUES ('$cid', '$cmc') ") or die("Could not issue MySQL query");
	}else if($flag=="r"){
	$result =	mysql_query("select * from cm where cid='$cid' ") or die("Could not issue MySQL query");
	
	$allcm = array();
	while($row = mysql_fetch_array($result)){		
	//$row = mysql_fetch_array($result);
	$rows =  array("cmc" => $row[2], "time" => $row[3]); 
	array_push($allcm, $rows);	
	}
	echo json_encode($allcm); 	
	}
	//if(mysql_num_rows($chk)==0){}
	
		
	


            mysql_close($connection);
 



?>