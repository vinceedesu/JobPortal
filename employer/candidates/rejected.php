<?php
    include '../../connections.php';

    $application_id = $_GET['app_id'];
    $sql = "UPDATE job_applications SET status = 'Rejected' WHERE application_id = '$application_id'";
    $conn->query($sql);
    header('Location: candidates.php');
?>