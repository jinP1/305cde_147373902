<?php
// Start the session
session_start();
$hostname = "127.0.0.1";
$username = "root";
$password ="";
$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");
mysql_select_db("loli", $connection) or die("Could not select database");


//$obj = json_decode(file_get_contents('php://input')); 




//if(isset($_GET['cname'])){
	$cname = $_GET['cname'];
	$result = mysql_query("select * from c where cname='$cname'") or die("Could not issue MySQL query");
	$row = mysql_fetch_array($result);
	$rows =  array("id" => $row[0],"cname" => $row[1],"age" => $row[2],"inf" => $row[3],"pox" => $row[4],"poy" => $row[5]); 
	echo json_encode($rows);  	
/*}else{
	$result = mysql_query("select * from c") or die("Could not issue MySQL query");
	$list = array();
	while($row = mysql_fetch_array($result)){
	$rows =  array("id" => $row[0],"cname" => $row[1],"age" => $row[2],"inf" => $row[3] );    
	array_push($list, $rows);
	}	
	echo json_encode($list); 
}*/


// Echo session variables that were set on previous page
//echo "Favorite color is " . $_SESSION["loadname"] ;


      
//header("Content-Type: application/json", true);

mysql_close($connection);
 
//$num_row=mysql_num_rows($result);
//echo $num_row;


?>