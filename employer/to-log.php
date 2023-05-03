<?php
    $company_id = $_SESSION['company_id'];

    $sql = "INSERT INTO admin_logs(company_id, actions)
            VALUES ('$company_id',
            '$actions')";
    $conn->query($sql);
