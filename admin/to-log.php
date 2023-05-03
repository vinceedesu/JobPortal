<?php
    $admin_id = $_SESSION['admin_id'];
    $admin_type = $_SESSION['admin_type'];

    $sql = "INSERT INTO s_admin_logs(admin_id, admin_type, actions)
            VALUES ('$admin_id',
            '$admin_type',
            '$actions')";
    $conn->query($sql);
