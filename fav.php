<?php
// Start the session
session_start();
$hostname = "127.0.0.1";
$username = "root";
$password ="";
$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");


$obj = json_decode(file_get_contents('php://input')); 
$uname = $_SESSION["loadname"];





$cname=$_GET['cname'];
mysql_select_db("user", $connection) or die("Could not select database");


$chk = mysql_query("select * from favr where login='$uname' AND cname='$cname' ") or die("Could not issue MySQL query");	
	if(mysql_num_rows($chk)==0){
		mysql_query("INSERT INTO favr (login , cname) VALUES ('$uname', '$cname')") or die("Could not issue MySQL query");  
echo "added";  
	
//echo $cname;
	}else{		
		mysql_query("DELETE FROM favr WHERE login='$uname' and cname='$cname'") or die("Could not issue MySQL query");
		echo "deleted";		
	}
	


            mysql_close($connection);
 



?>