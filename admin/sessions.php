<?php
    if(isset($_SESSION['username'])){
        if($_SESSION['admin_type']=='Superadmin'){
            header('Location: s-admin\dashboard\dashboard.php');
        }elseif($_SESSION['admin_type']=='Admin'){
            header('Location: dashboard\dashboard.php');
        }
    }
