<?php
require 'Upload_Resize.php';
$Upload = new UploadResize;
if(isset($_POST['submitMulti'])){
   $file = $Upload->MultiUploadImg('image','img/');
    print_r($file);
}
if(isset($_POST['submitSingle'])){
    $file = $Upload->SingleUploadImg('imageSingle','img/');
    print_r($file);
}
?>

<!DOCTYPE html>
<html>
<body>

<form method="post" enctype="multipart/form-data">
  Select Multi image to upload:<br><br>
  <input type="file" name="image[]" accept="image/*">
  <input type="file" name="image[]" accept="image/*">
  <input type="submit" value="Upload"  name="submitMulti">
</form>
<hr>
<form method="post" enctype="multipart/form-data">
  Select Single image to upload:<br><br>
  <input type="file" name="imageSingle" accept="image/*">
  <input type="submit" value="Upload"  name="submitSingle">
</form>
</body>
</html> 
