<?php 

    error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="uploadfile"><br></br>
        <input type="submit" name="submit" value="Upload Files">
    </form>
</body>
</html>

<?php

// $folder = "/images";
$filename = $_FILES["uploadfile"]["name"];
$tempname =  $_FILES["uploadfile"]["tmp_name"];
$folder = "images/".$filename;
// echo $folder;
move_uploaded_file($tempname,$folder);
// print_r($_FILES["uploadfile"]);

echo "<img src='$folder' height='100px' width='100px'> "
?>
<!-- <img src="images/1111.jpeg" height="100px" width="100px">  -->