<?php
 require_once 'class.user.php';
  $user = new USER(); 
  
if ($_POST['step']==1) {




 $title = trim($_POST['title']);
    $plotsize = trim($_POST['plotsize']);
    $location = trim($_POST['location']);
      $rating = trim($_POST['price']);
    $description = trim($_POST['description']);
      $type = trim($_POST['type']);
      $fullname = trim($_POST['fullname']);
      $contactnum = trim($_POST['contactnum']);
      $email = trim($_POST['email']);
      $path = 'images/';

$img = $_FILES['input-b3']['name'];
$dst = $path . $_FILES['input-b3']['name'];

if (($img_info = getimagesize($img)) === FALSE)
  die("Image not found or not an image");

$width = $img_info[0];
$height = $img_info[1];

switch ($img_info[2]) {
  case IMAGETYPE_GIF  : $src = imagecreatefromgif($img);  break;
  case IMAGETYPE_JPEG : $src = imagecreatefromjpeg($img); break;
  case IMAGETYPE_PNG  : $src = imagecreatefrompng($img);  break;
  default : die("Unknown filetype");
}

$tmp = imagecreatetruecolor($width, $height);
imagecopyresampled($tmp, $src, 0, 0, 0, 0, $width, $height, $width, $height);

// $imageinsert = $user->runQuery("INSERT INTO  ( filename) VALUES (:filename)");
        // $imageinsert ->bindparam(":filename",basename($_FILES["fileToUpload"]["name"]));
        // $imageinsert->execute();
        // $getID = $user->runQuery("SELECT MAX(id) FROM imageid ");
        // $getID->execute();
        // $row = $getID->fetchColumn();
        $tdst = $path;
        $jpgimg=imagejpeg($tmp, $tdst.".jpg");
move_uploaded_file($jpgimg,$path);


    if($user->plotsell($title,$plotsize,$location,$price,$description,$type,$fullname,$contactnum,$email)){     
      
      $user->redirect("plotsell.html");
    }
}
?>