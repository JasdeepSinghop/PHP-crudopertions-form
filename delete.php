<?php 
include ("connection.php");

$id = $_GET['id'];
$query = "DELETE from table1 WHERE id='$id' ";
$data = mysqli_query($connection,$query);

if($data){
    echo "<script>alert('✅ Record Updated');</script>";
    ?>

    <!-- php stop -->

<!-- Meta code for redirect -->

    <!-- php start -->
<meta http-equiv = "refresh" content = "0; url = http://localhost/crud/display.php"/>

 <?php   
}else{
    echo "failed to delete";
}

?>