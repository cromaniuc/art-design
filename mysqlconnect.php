<?php
/**********MYSQL Settings****************/
$host="localhost";
$databasename="ciprianr_romaniuc";
$user="ciprianr_romaniuc";
$pass="*****";
/**********MYSQL Settings****************/


$conn=mysql_connect($host,$user,$pass,$databasename);

// Check connection 
if (mysqli_connect_errno($conn)) 
  { 
  echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
    }else{
		 $db_select = mysql_select_db($databasename, $conn); 
			if (!$db_select) { 
					die("Database selection failed:: " . mysql_error()); 
			} 
	} 
?>