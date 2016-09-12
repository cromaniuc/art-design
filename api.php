<?php


include("mysqlconnect.php");

header("content-type:application/json");

if(isset($_GET['action']) && $_GET['action'] == 'list'){
      
      $isPictura = (int) filter_var($_GET['isPictura'], FILTER_VALIDATE_BOOLEAN);


       $query_list = "SELECT * FROM images_tbl WHERE isPictura = '$isPictura' ORDER BY submission_date";

      $result = mysql_query($query_list) or die("error in $query_list == ----> ".mysql_error());
      $jsonResponse = array();
      
      $index = 0;
      while($row = mysql_fetch_assoc($result)){
        $jsonResponse[$index] = $row;
        $index++;
      }
      echo json_encode($jsonResponse);
}

if(isset($_POST['action']) &&  $_POST['action'] == 'delete'){
    
      $id = $_POST['id'];
      $query_delete = "DELETE FROM images_tbl WHERE id = '$id'";
      mysql_query($query_delete) or die("error in $query_save == ----> ".mysql_error());

      $response = array('status' => 'ok', 'msg' => 'Image deleted!');
      echo json_encode($response);
}

if(isset($_POST['action']) && $_POST['action'] == 'save'){

      $isPictura = (int) filter_var($_POST['isPictura'], FILTER_VALIDATE_BOOLEAN);

      $name = $_POST['name'];
      $description = $_POST['description'];
      $dimensions = $_POST['dimensions'];
      $content = $_POST['content'];

     	$query_save="INSERT into images_tbl (title, description, dimensions, content, isPictura, submission_date) VALUES ('$name', '$description', '$dimensions', '$content', '$isPictura', now());";
    	mysql_query($query_save) or die("error in $query_save == ----> ".mysql_error());

      $response = array('status' => 'ok', 'msg' => 'Image saved!');
      echo json_encode($response);
}

if(isset($_POST['action']) && $_POST['action'] == 'update'){


      $id = $_POST['id'];
      $name = $_POST['name'];
      $description = $_POST['description'];
      $dimensions = $_POST['dimensions'];

     	$query_update="UPDATE images_tbl SET title='$name', description='$description', dimensions='$dimensions' WHERE id = '$id'";
    	mysql_query($query_update) or die("error in $query_update == ----> ".mysql_error());

      $response = array('status' => 'ok', 'msg' => 'Image updated!');
      echo json_encode($response);
}

exit();

?>