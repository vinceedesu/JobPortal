<?php

if(isset($_POST['edit'])){

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$userType = $_POST['userType'];


$sql ="UPDATE users SET username='$username', email='$email', password='$password', userType='$userType' WHERE username='$username'";

if (mysqli_query($conn, $sql)) {
    echo "<script type='text/javascript'>alert('Company Updated Successfully!') </script>";
    header("location:u.listing.php");
    echo "<script> </script>";

} else {
    echo "Error updating record: " . mysqli_error($conn);
}
}
