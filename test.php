<?php

include("connections.php");


if(isset($_POST['submit'])) {


    // img upload
    $target = "assets/img/student-profile/".basename($_FILES['p_img']['name']);
    $image_upload = $_FILES['p_img']['name'];

    // SQL query to add new record
    $sql = "INSERT INTO `test`(`id`, `p_img`) values (NULL, '$image_upload')";

    $conn->query($sql);
    
    // img upload in folder
    if(move_uploaded_file($_FILES['p_img']['tmp_name'], $target)){
        echo "Image uploaded successfully";
        
}
else{
    echo "Failed to upload image";
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>
<body>
    
    <form action="test.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="p_img">
        <input type="submit" name="submit" value="Upload">
    </form>
</body>
</html>