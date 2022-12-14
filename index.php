<?php 
include('db/db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawan-Form</title>
</head>
<body>
 <form  method="post">


<input type="text" minlength="3" maxlength="12" id="name" name="name" placeholder="enter name" required>

<input type="number"  id="number" name="number" placeholder="enter number" required>


<input type="submit"  id="submit" name="submit" >



 </form>   


 <?php
if(isset($_POST['submit'])){
$name=mysqli_real_escape_string($conn,$_POST['name']);
$num=mysqli_real_escape_string($conn,$_POST['number']);
$tsem="SELECT * FROM unique_data WHERE number='$num'";
$tsquery=mysqli_query($conn,$tsem);
$tsec=mysqli_num_rows($tsquery);
if ($tsec==1) {
    $dINSERT="INSERT INTO duplicate_data(name,number) VALUES('$name','$num')";
mysqli_query($conn,$dINSERT);
    echo"duplicate data";

}
else{
$INSERT="INSERT INTO unique_data(name,number) VALUES('$name','$num')";
mysqli_query($conn,$INSERT);
echo"Save data";
}
}
?>





</body>
</html>







<?php

?>