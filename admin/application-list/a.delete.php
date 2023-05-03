<?php
if (isset ($_GET['id'])){

    $id = $_GET["id"];
    include('../../connections.php');

        $idsSql = "SELECT jobID, studentID FROM `job_applications` WHERE application_id = $id";
        $result = mysqli_query($conn, $idsSql);
        $row = $result->fetch_assoc();
    $job_id = $row['jobID'];
    $student_id = $row['studentID'];

        $uidSql = "SELECT firstname, lastname FROM `student_profile` WHERE id = $student_id";
        $result = mysqli_query($conn, $uidSql);
        $row = $result->fetch_assoc();
        $uid = $row['userID'];
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];

        $cidSql = "SELECT CompanyId, jobTitle FROM `job_list` WHERE jobID = $job_id";
        $result = mysqli_query($conn, $cidSql);
        $row = $result->fetch_assoc();
    $company_id = $row['CompanyId'];
    $job_title = $row['jobTitle'];

        $cnameSql = "SELECT name FROM `company_list` WHERE company_id = $company_id";
        $result = mysqli_query($conn, $cnameSql);
        $row = $result->fetch_assoc();
    $company_name = $row['name'];

    $sql = "DELETE FROM `job_applications` WHERE application_id = $id";
    $conn->query($sql);

    $actions = "Deleted $firstname $lastname\'s application, $job_title, at $company_name from Application Lists.";
    include('../to-log.php');
}

header("location: a.list.php");
exit;