<?php

$userID=$_SESSION['user_id'];

if(isset($_POST['submit'])){

    $name = htmlentities($_POST['name']);
    $employer_name = htmlentities($_POST['employer_name']);
    $email = htmlentities($_POST['email']);
    $address = htmlentities($_POST['address']);
    $contact = htmlentities($_POST['contact_no']);
    $size = htmlentities($_POST['size']);
    $target = "../assets/img/employer-profile/".basename($_FILES['logo']['name']);
    $logo = htmlentities($_FILES['logo']['name']);
    $overview = htmlentities($_POST['overview']);

    //select table
    $tablename="company_list";
    $columnquery="*";

    // insert data
    $sql = "INSERT INTO $tablename (name,employer_name, email, address, contact_no, size, logo, overview, userID) values 
    ('$name','$employer_name', '$email', '$address', '$contact', '$size', '$logo', '".$overview."', $userID)";

    if ($conn->query($sql) === TRUE) {

        
        $user_id=$_SESSION['user_id'];
        $result = selectWhere($conn, 'company_list', '*', 'userID', "$user_id");
        $row = $result->fetch_assoc();
        $_SESSION['company_id'] = $row['company_id'];
        
        if(move_uploaded_file($_FILES['logo']['tmp_name'], $target)){
            echo "Image uploaded successfully";
            echo '<script>
            window.location.href = "dashboard/index.php";
          </script>';
        }else{
            echo "There was a problem uploading image";
        }

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    


                                                   
}