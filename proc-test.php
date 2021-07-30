<?php

/* Getting file name */
$filename = $_FILES['file']['name'];
$name = $_POST['name'];
/* Location */
$location = "./".$name.'.jpg';
$uploadOk = 1;
$imageFileType = pathinfo($location,PATHINFO_EXTENSION);

/* Valid Extensions */
$valid_extensions = array("jpg","jpeg","png");
/* Check file extension */
if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
   $uploadOk = 0;
}

if($uploadOk == 0){
   echo "error in uploading";
}else{
   /* Upload file */
   if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
      echo "success";
   }else{
      echo "unable to upload";
   }
}

?>