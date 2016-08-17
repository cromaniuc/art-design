<?php


include("mysqlconnect.php");

    function GetImageExtension($imagetype)
   	 {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
           case 'image/jpeg': return '.jpg';
           case 'image/png': return '.png';
           default: return false;
       }
     }


header("content-type:application/json");

$pg1 = array(
       array
       (
            'username' => 'facingdown',
            'profile_pic' => 'img/default-avatar.png'
       ),
       array
       (
            'username' => 'doggy_bag',
            'profile_pic' => 'img/default-avatar.png'
       ),
       array
       (
            'username' => 'goingoutside',
            'profile_pic' => 'img/default-avatar.png'
       ),
       array
       (
            'username' => 'redditdigg',
            'profile_pic' => 'img/default-avatar.png'
       ),
       array
       (
            'username' => 'lots_of_pudding',
            'profile_pic' => 'img/default-avatar.png'
       ),
       'nextpage' => '#pg2'
);

$pg2 = array(
       array
       (
           'username' => 'treehousedude',
           'profile_pic' => 'img/default-avatar.png'
       ),
       array
       (
           'username' => 'anonymous',
           'profile_pic' => 'img/default-avatar.png'
       ),
       array
       (
           'username' => 'clever_username_99',
           'profile_pic' => 'img/default-avatar.png'
       ),
       'nextpage' => 'end'
);


// $_POST['page'] tells us which array of results to load.
// this can be more complex once you implement a functional database.
if($_POST['action'] == 'delete'){
print "Hello world1!";

}
  //echo json_encode($pg1);

if($_POST['action'] == 'save'){
echo json_encode($pg1);

     	//$query_upload="INSERT into images_tbl (image_name, image_path) VALUES ('bla', 'bla2');";
    	//mysql_query($query_upload) or die("error in $query_upload == ----> ".mysql_error());

  //echo json_encode($pg1);

}
  //echo json_encode($pg2);

exit();

?>