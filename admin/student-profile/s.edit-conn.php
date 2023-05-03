<?php

include('../../connections.php');

$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
// $name = $fname . " " . $lname;
$email = $_POST['email'];
$course = $_POST['course'];
$contact_no = $_POST['contact_no'];
$address = $_POST['address'];
$birthdate = $_POST['birthdate'];
$sex = $_POST['sex'];
$bio = $_POST['bio'];


$sql ="UPDATE student_profile 
        SET firstname='$fname', 
            lastname='$lname', 
            email='$email', 
            course='$course', 
            contact_no='$contact_no', 
            address='$address', 
            birthdate='$birthdate', 
            sex='$sex', 
            bio='$bio' 
        WHERE firstname='$fname'"; // change to id after include


if (mysqli_query($conn, $sql)) {
    $actions = "Updated $fname $lname\'s details from Student Profiles.";
    echo "<script type='text/javascript'>alert('$actions') </script>";
    include('../to-log.php');

    echo '<script>
            window.location.href = "s.profile.php";
          </script>';

} else {
    echo "Error updating record: " . mysqli_error($conn);
}