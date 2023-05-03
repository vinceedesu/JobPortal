<?php

include('../../connections.php');

$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$employer_name = $_POST['employer_name'];
$contact_no = $_POST['contact_no'];
$size = $_POST['size'];
$logo = $_POST['logo'];

$sql ="UPDATE company_list 
        SET name='$name', 
            address='$address', 
            email='$email', 
            employer_name='$employer_name', 
            contact_no='$contact_no', 
            size='$size', 
            logo='$logo' 
        WHERE email='$email'";

if (mysqli_query($conn, $sql)) {
    $actions = "Updated $name\'s details from Company List.";
    echo "<script type='text/javascript'>alert('$actions') </script>";
    include('../to-log.php');

    echo '<script>
            window.location.href = "c.listing.php";
          </script>';

} else {
    echo "Error updating record: " . mysqli_error($conn);
}
