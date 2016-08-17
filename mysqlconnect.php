<?php
/**********MYSQL Settings****************/
$host="localhost";
$databasename="ciprian_romaniuc";
$user="ciprian";
$pass="";
/**********MYSQL Settings****************/


$conn=mysql_connect($host,$user,$pass);

if($conn)
{
$db_selected = mysql_select_db($databasename, $conn);
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}
}
else
{
    die('Not connected : ' . mysql_error());
}
?>