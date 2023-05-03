<?php

include('../../connections.php');

$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$employer_name = $_POST['employer_name'];
$contact_no = $_POST['contact_no'];
$size = $_POST['size'];
$logo = $_POST['logo'];

$sql ="UPDATE company_list SET name='$name', address='$address', email='$email', employer_name='$employer_name', contact_no='$contact_no', size='$size', logo='$logo' WHERE name='$name'";

if (mysqli_query($conn, $sql)) {
    echo "<script type='text/javascript'>alert('Company Updated Successfully!') </script>";
    header("location:c.listing.php");
    echo "<script> </script>";

} else {
    echo "Error updating record: " . mysqli_error($conn);
}
