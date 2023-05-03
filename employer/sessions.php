<?php
    if(isset($_SESSION['username'])){
        if($_SESSION['user_type'] == 'Student'){
            header('location: student/dashboard/');
        }
    }
    else{
        header('location: ../../index.php');
    }
    
    $user_id=$_SESSION['user_id'];
    $result = selectWhere($conn, 'company_list', '*', 'userID', "$user_id");
    $row = $result->fetch_assoc();
    $_SESSION['company_id'] = $row['company_id'];