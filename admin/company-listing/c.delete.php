<?php
if (isset ($_GET['company_id'])){
    $company_id = $_GET["company_id"];
    include('../../connections.php');

    $uidSql = "SELECT userID, name FROM `company_list` WHERE company_id = $company_id";
    $result = mysqli_query($conn, $uidSql);
    $row = $result->fetch_assoc();
    $uid = $row['userID'];
    $company_name = $row['name'];

    $jidSql = "SELECT jobID FROM `job_list` WHERE CompanyId = $company_id";
    $result = mysqli_query($conn, $jidSql);
    if (mysqli_num_rows($result) > 0){
        while($jidRow = $result->fetch_assoc()){
            $jid = $jidRow['jobID'];
            $sql = "DELETE FROM `job_applications` WHERE jobID = $jid";
            $conn->query($sql);
        }
    }
    
    $sql = "DELETE FROM `job_list` WHERE CompanyId = $company_id";
    $conn->query($sql);

    $sql = "DELETE FROM `company_list` WHERE company_id = $company_id";
    $conn->query($sql);

    $sql = "DELETE FROM `users` WHERE userID = $uid";
    $conn->query($sql);

    $actions = "Deleted $company_name from Company List.";
    include('../to-log.php');
}

header("location:c.listing.php");
exit;
