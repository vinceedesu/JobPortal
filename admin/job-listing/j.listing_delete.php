<?php
if (isset ($_GET['jobID'])){
    $jobID = $_GET["jobID"];
    include('../../connections.php');

    $sql = "DELETE FROM `job_applications` WHERE jobID = $jobID";
    $conn->query($sql);

    $sql = "DELETE FROM `job_list` WHERE jobID = $jobID";
    $conn->query($sql);
}

header("location:j.listing.php");
exit;
?>