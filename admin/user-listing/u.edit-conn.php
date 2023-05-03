<?php

if(isset($_POST['edit'])){

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$userType = $_POST['userType'];


$sql ="UPDATE users SET username='$username', email='$email', password='$password', userType='$userType' WHERE userID='$id'";

if (mysqli_query($conn, $sql)) {
    $actions = "Updated $username details from Users.";
    echo "<script type='text/javascript'>alert('$actions') </script>";
    include('../to-log.php');

    echo '<script>
            window.location.href = "u.listing.php";
          </script>';

} else {
    echo "Error updating record: " . mysqli_error($conn);
}
}
