<?php
include ("connection.php");

$id = $_GET['id'];
$query=  "SELECT * FROM table1 where id = '$id'";

$data = mysqli_query($connection,$query);

$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);

// // echo $_GET['id'];
// // echo $_GET['name'];
// // echo $_GET['email'];
// // echo $_GET['address'];
// // echo $_GET['dob'];
// // echo $_GET['gender'];

?>

<?php include("connection.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Form</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">UPDATE DETAILS</h2>
        <form action="#" method="POST" id="frm" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" value=<?php echo $result['Name']; ?> class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" value=<?php echo $result['Email Address']; ?> class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" value=<?php echo $result['Address']; ?> class="form-control" id="address" name="address" required>
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" value=<?php echo $result['Date of Birth']; ?> class="form-control" id="dob" name="dob" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Gender</label><br>
                <input type="radio" name="gender" value="Male" <?php if($result['Gender'] == 'Male'){
                    echo "checked";
                } ?> required> Male
                <input type="radio" name="gender" value="Female"  <?php if($result['Gender'] == 'Female'){
                    echo "checked";
                } ?> required> Female
            </div>
            <!-- <div class="mb-3">
                <label for="images" class="form-label">Upload Images</label>
                <input type="file" class="form-control" id="images" name="images" multiple required>
            </div> -->
            <!-- <input type="submit" value="Register" class="btn btn-primary" name="register">Submit</input> -->
            <input type="submit" value="Update" class="btn btn-primary" name="update">
        </form>
    </div>
    
    <!-- jquery cdn links -->

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js" integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="app.js"></script>

</body>
</html>

<?php

if(isset($_POST['update'])) {
    $name= $_POST['name'];
    $email= $_POST['email'];
    $address= $_POST['address'];
    $dob= $_POST['dob'];
    $gender= $_POST['gender'];
    // $images= $_FILES['images'];  // Change this for file uploads

    // $query= "INSERT INTO table1 values('$name','$email','$address','$dob','$gender');";
    // $query= "INSERT INTO table1 (`Name`, `Email Address`, `Address`, `Date of Birth`, `Gender`) VALUES ('$name', '$email', '$address', '$dob', '$gender');";

    $query = "UPDATE table1 SET 
    `Name` = '$name', 
    `Email Address` = '$email', 
    `Address` = '$address', 
    `Date of Birth` = '$dob', 
    `Gender` = '$gender' 
    WHERE `id` = '$id'";

    $data = mysqli_query($connection,$query);
    if($data){
        echo "<script>alert('✅ Record Updated');</script>";
        ?>

        <!-- php stop -->

        <!-- Metacode Redirect -->

    <meta http-equiv = "refresh" content = "0; url = http://localhost/crud/display.php"/>

    <!-- php start -->
    <?php   
    }else{
        echo "query is failed";
    }
 }
 
?>
