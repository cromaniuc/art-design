<?php

session_start();

$username = 'ab@gmail.com';
$password = 'cd';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   if ((isset($_POST['username']) && ($_POST['username'] == $username)) &&
      (isset($_POST['password']) && ($_POST['password'] == $password))) {
		      
		      $_SESSION['username'] = $username;
              $_SESSION['password'] = $password;

         header("Location: admin.php");
         exit();
   }else{
   		header("Location: login.html");	
   		exit();
   }
}

?>