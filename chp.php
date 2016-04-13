<?php
// Start the session
session_start();
$hostname = "127.0.0.1";
$username = "root";
$password ="";
$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");


$pw1=$_POST['pw1'];
$pw2=$_POST['pw2'];
$uname = $_SESSION["loadname"];

//echo $flag;
if($pw1==$pw2){
mysql_select_db("user", $connection) or die("Could not select database");
mysql_query("UPDATE person set pw = $pw2 WHERE login = $uname") or die("Could not issue MySQL query");
echo "changed";



}

?>