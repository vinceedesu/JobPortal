<?php

// include('../../connections.php');

if(isset($_POST['submit'])) {

    $name = $_POST['name'];
    $employer_name = $_POST['employer_name'];
    $email = $_POST['email'];
    $contact_no = $_POST['contact_no'];
    $address = $_POST['address'];
    $size = $_POST['size'];
    $overview = $_POST['overview'];

    $sql ="UPDATE company_list SET name='$name', employer_name='$employer_name', email='$email', contact_no='$contact_no', address='$address', size='$size', overview='$overview' WHERE email='$email'";

    if (mysqli_query($conn, $sql)) {
        $actions = "Updated Company Profile of $name";
        include '../to-log.php';

        echo "<script type='text/javascript'>alert('Company Updated Successfully!') </script>";
        echo '<script>
        window.location.href = "index.php";
      </script>';
        echo "<script> </script>";

    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
