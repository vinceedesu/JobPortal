<?php
include '../../connections.php';

$application_id = $_GET['app_id'];
$sql = "UPDATE job_applications SET status = 'Canceled' WHERE application_id = '$application_id'";
$conn->query($sql);
header('Location: my-applications.php');