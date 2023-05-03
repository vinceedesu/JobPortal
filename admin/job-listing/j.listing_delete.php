<?php
if (isset ($_GET['jobID'])){
    $jobID = $_GET["jobID"];
    include('../../connections.php');

    $cidSql = "SELECT CompanyId, jobTitle FROM `job_list` WHERE jobID = $jobID";
    $result = mysqli_query($conn, $cidSql);
    $row = $result->fetch_assoc();
    $company_id = $row['CompanyId'];
    $job_title = $row['jobTitle'];

    $cnameSql = "SELECT name FROM `company_list` WHERE company_id = $company_id";
    $result = mysqli_query($conn, $cnameSql);
    $row = $result->fetch_assoc();
    $company_name = $row['name'];

    $sql = "DELETE FROM `job_applications` WHERE jobID = $jobID";
    $conn->query($sql);

    $sql = "DELETE FROM `job_list` WHERE jobID = $jobID";
    $conn->query($sql);

    $actions = "Deleted $company_name\'s $job_title from Job Lists.";
    include('../to-log.php');
}

header("location:j.listing.php");
exit;
?>