<?php


include("mysqlconnect.php");

header("content-type:application/json");

if($_GET['action'] == 'list'){
      $query_list = "SELECT * FROM images_tbl";
      $result = mysql_query($query_list) or die("error in $query_list == ----> ".mysql_error());
      $jsonResponse = array();
      
      $index = 0;
      while($row = mysql_fetch_assoc($result)){
        $jsonResponse[$index] = $row;
        $index++;
      }
      echo json_encode($jsonResponse);
}

if($_POST['action'] == 'delete'){
      $name = $_POST['image_id']
      $query_delete="DELETE from images_tbl where image_id='$image_id';";

      mysql_query($query_delete) or die("error in $query_delete == ----> ".mysql_error());

      $response = array('status' => 'ok', 'msg' => 'Image deleted!');
      echo json_encode($response);
}

if($_POST['action'] == 'save'){

      $name = $_POST['payload']['name'];
      $description = $_POST['payload']['description'];
      $dimensions = $_POST['payload']['dimensions'];
      $content = $_POST['payload']['content'];

     	$query_save="INSERT into images_tbl (image_name, image_description, image_dimensions, image_content) VALUES ('$name', '$description', '$dimensions', '$content');";
    	mysql_query($query_save) or die("error in $query_save == ----> ".mysql_error());

      $response = array('status' => 'ok', 'msg' => 'Image saved!');
      echo json_encode($response);
}

exit();

?>