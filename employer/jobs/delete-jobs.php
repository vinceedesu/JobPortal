<?php
include('../../connections.php');
if (isset ($_GET['id'])){

    $jobID = $_GET["id"];

    $sql = "SELECT jobTitle FROM job_list WHERE jobID = $jobID";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $jobTitle = $row['jobTitle'];

    $company_id = $_SESSION['company_id'];
    $actions = "Deleted a job: $jobTitle";
    $dataquery = "admin_logs(company_id, actions)";
    $valuequery="('$company_id', '$actions')";

    $sql = "INSERT INTO $dataquery VALUES $valuequery";
    mysqli_query($conn, $sql);
    $sql = "DELETE FROM `job_list` WHERE jobID = $jobID";
    $conn->query($sql);

    mysqli_query($conn, $sql);
}

header("location: index.php");
exit;
