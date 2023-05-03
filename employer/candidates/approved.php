<?php
    include '../../connections.php';

    $application_id = $_GET['app_id'];
    $sql = "UPDATE job_applications SET status = 'Approved' WHERE application_id = '$application_id'";
    $conn->query($sql);
    header('Location: candidates.php');
?>