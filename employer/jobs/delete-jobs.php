<?php
include('../../connections.php');
if (isset ($_GET['jobID'])){

    $jobID = $_GET["jobID"];

    $sql = "SELECT jobTitle FROM job_list WHERE jobID = $jobID";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $jobTitle = $row['jobTitle'];

    $company_id = $_SESSION['company_id'];
    $actions = "Deleted job: $jobTitle";
    include '../to-log.php';

    $sql = "DELETE FROM job_list WHERE jobID = $jobID";
    $conn->query($sql);
}

header("location: index.php");
exit;