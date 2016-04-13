<?php
// Start the session
session_start();
$hostname = "127.0.0.1";
$username = "root";
$password ="";
$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");


$username=$_POST['userid'];
$pwd=$_POST['password'];
$flag=$_POST['flag'];

//echo $flag;
if(($flag=="login")&&($username!="")&&($pwd!="")){
mysql_select_db("user", $connection) or die("Could not select database");
$result = mysql_query("select * from person where login='$username' and pw='$pwd' ") or die(" ");
//$num_row=mysql_num_rows($result);
//echo $num_row;
if(mysql_num_rows($result)==1){
echo "login";
// Set session variables
$_SESSION["loadname"] = $username;
}else 
	echo "no data";
}else if(($flag=="re")&&($username!="")&&($pwd!="")){
		mysql_select_db("user", $connection) or die("Could not select database");
	$chk = mysql_query("select * from person where login='$username' ") or die("Could not issue MySQL query");	
	if(mysql_num_rows($chk)==0){
$result = mysql_query("INSERT INTO person (login , pw) VALUES ('$username', '$pwd') ") or die(" ");
		echo "Created";
		//fav		
		mysql_query("INSERT INTO favr (login) VALUES ('$username') ") or die(" ");
	}else
		echo "used";
//$num_row=mysql_num_rows($result);
//echo $num_row;
}else
	echo "enter word";

?>