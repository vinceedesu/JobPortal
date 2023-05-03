<?php
    if(isset($_SESSION['username'])){
        if($_SESSION['user_type'] == 'Employer'){
            header('location: employer/dashboard/');
        }
        elseif($_SESSION['user_type'] == 'Student'){
            header('location: student/dashboard/');
        }
    }
?>