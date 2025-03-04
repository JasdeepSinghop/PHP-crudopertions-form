<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <style>
        body{
            background:#EDF0F2;
        }
        table{
            background-color: white;
        }
        .update,.delete{
            background-color: green;
            color: white;
            border: 0;
            outline: none;
            border-radius: 5px;
            height: 22px;
            width: 8opx;
            font-weight: bold;
            cursor: pointer;
        }
        .delete{
            background-color: red;
        }
    </style>
</head>
<body>
    
</body>

<?php

include("connection.php");
error_reporting(0);

$query=  "SELECT * FROM table1";

$data = mysqli_query($connection,$query);

$total = mysqli_num_rows($data);

// $result = mysqli_fetch_assoc($data);



// echo $result['Name']." ".$result['Email Address']." ".$result['Address']." ".$result['Date of Birth']." ".$result['Gender']; 



// echo $total;

if($total != 0){
    // echo "Table has records" ;

    ?>

        <h2 align="center">Displaying Records</h2>
        <center>
    <table border="1" cellspacing="7" width="95%">
        <tr>
        <th width="5%">ID</th>
        <th width="5%">Image</th>
        <th width="10%">Name</th>
        <th width="25%">Email Address</th>
        <th width="25%">Address</th>
        <th width="10%">Date of Birth</th>
        <th width="10%">Gender</th>
        <th width="10%">Operations</th>
        </tr>
    

    <?php

    while($result = mysqli_fetch_assoc($data)){
       
        echo "
              <tr>
                 <td>".$result['id']."</td>

                 <td><img src='".$result['std_image']."' height='100px' width='100px'></td>

                 <td>".$result['Name']."</td>
                 <td>".$result['Email Address']."</td>
                 <td>".$result['Address']."</td>
                 <td>".$result['Date of Birth']."</td>
                 <td>".$result['Gender']."</td>
                 <td>
                    <a href='update_design.php?id=" . urlencode($result['id']) . "'><input type='submit' value='Update' class='update'></a>
                    <a href='delete.php?id=" . urlencode($result['id']) . "'><input type='submit' value='Delete' class='delete' onclick = 'return checkdelete()'></a>
                </td>
               </tr>
               ";

    }

}else{
    echo "Table has no records";
}

?>

</table>
</center>

<script>
    function checkdelete(){
        return confirm('Are you sure you want to delete');
    }
</script>

</html>

<!-- echo $result['Name']." ".$result['Email Address']." ".$result['Address']." ".$result['Date of Birth']." ".$result['Gender']."<br>"; -->