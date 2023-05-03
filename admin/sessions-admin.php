<?php
    if($_SESSION['username']){
        if($_SESSION['admin_type']!='Admin'){
            header('Location: ../index.php');
        }
    }
    else{
        header('Location: ../index.php');
    }

    // $admin_id=$_SESSION['admin_id'];
    // $result = selectWhere($conn, 'admin_accounts', '*', 'id', "$admin_id");
    // $row = $result->fetch_assoc();
    // $_SESSION['admin_id'] = $row['id'];