<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";

$connection = mysqli_connect ($servername,$username,$password,$dbname);

if($connection){
    // echo "connection succesful";

}else{
    echo "connection failed".mysqli_connection_error();
}

?>