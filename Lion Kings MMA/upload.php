<?php
if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
  $tempFilePath = $_FILES['image']['tmp_name'];
  $targetPath = 'uploads/' . $_FILES['image']['name'];
  
  if (move_uploaded_file($tempFilePath, $targetPath)) {
    echo 'Image uploaded successfully!';
  } else {
    echo 'Failed to upload image.';
  }
} else {
  echo 'Error occurred during image upload.';
}
?>
