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
        <h2 class="mb-4">Detail Form</h2>
        <form action="#" method="POST" id="frm" enctype="multipart/form-data">
        <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="uploadfile" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Gender</label><br>
                <input type="radio" name="gender" value="Male" required> Male
                <input type="radio" name="gender" value="Female" required> Female
            </div>
            <!-- <div class="mb-3">
                <label for="images" class="form-label">Upload Images</label>
                <input type="file" class="form-control" id="images" name="images" multiple required>
            </div> -->
            <!-- <input type="submit" value="Register" class="btn btn-primary" name="register">Submit</input> -->
            <input type="submit" value="Register" class="btn btn-primary" name="register">
        </form>
    </div>
    
    <!-- jquery cdn links -->

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js" integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="app.js"></script>

</body>
</html>

<?php

if(isset($_POST['register'])) 
{

    // File upload code start

    $filename = $_FILES["uploadfile"]["name"];
    $tempname =  $_FILES["uploadfile"]["tmp_name"];
    $folder = "images/".$filename;
    // echo $folder;
    move_uploaded_file($tempname,$folder);

    // File upload code ends

    $name= trim($_POST['name']);
    $email= trim($_POST['email']);
    $address= trim($_POST['address']);
    $dob= trim($_POST['dob']);
    $gender= $_POST['gender'];

    if($name !="" && $email != "" && $address != "" && $dob != "" && $gender != "" ){

    
    // $images= $_FILES['images'];  // Change this for file uploads

    // $query= "INSERT INTO table1 values('$name','$email','$address','$dob','$gender');";
    $query= "INSERT INTO table1 ( `std_image`,`Name`, `Email Address`, `Address`, `Date of Birth`, `Gender`) VALUES ('$folder','$name', '$email', '$address', '$dob', '$gender');";
    $data = mysqli_query($connection,$query);
    if($data){
        echo "<script>alert('✅ Data inserted successfully!');</script>";
    }else{
        echo "query is failed";
    }

    }
    else{

        echo "<script>alert('✅ Please fill the form')</script>";

    }
 }
 
?>
