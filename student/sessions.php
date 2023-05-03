<?php
    if(isset($_SESSION['username'])){
        if($_SESSION['user_type'] == 'Employer'){
            header('location: employer/dashboard/');
        }
    }
    else{
        header('location: ../../index.php');
    }

    $user_id=$_SESSION['user_id'];
    $result = selectWhere($conn, 'student_profile', '*', 'userID', "$user_id");
    $row = $result->fetch_assoc();
    $_SESSION['student_id']=$row['id'];