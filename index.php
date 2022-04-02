<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
  <title>PHP File Upload</title>
</head>
<body>
  <?php
    if (isset($_SESSION['message']) && $_SESSION['message'])
    {
      printf('<b>%s</b>', $_SESSION['message']);
      unset($_SESSION['message']);
    }
    
  ?>
  <form method="POST" action="upload.php" enctype="multipart/form-data">
    <div>
      <span>Upload a File:</span>
      <input type="file" name="uploadedFile" />
    </div>
 
    <input type="submit" name="uploadBtn" value="Upload" />
  </form>

  <?php
  $lista = null;
  $directorio = opendir("uploaded_files/");

  while ($uploadedFile = readdir($directorio)) {
      if ($uploadedFile != '.' && $uploadedFile != '..') {
          if (is_dir("uploaded_files/".$uploadedFile)) {
              $lista .= "<a class=' col-md-6' href='uploaded_files/.$uploadedFile' target='_blank'> $uploadedFile/</a><br></br>";
          } else {
              $lista .= "<a class=' col-md-6' href='uploaded_files/.$uploadedFile' target='_blank'> $uploadedFile</a><br></br>";
          }
      }
  }
  echo $lista;
  ?>
</body>
</html>