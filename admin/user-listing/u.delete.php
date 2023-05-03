<?php
if (isset ($_GET['userID'])){
    
    $userID = $_GET["userID"];
    include('../../connections.php');

    $utypeSql = "SELECT userType, username FROM `users` WHERE userID = $userID";
    $result = mysqli_query($conn, $utypeSql);
    $row = $result->fetch_assoc();
    $utype = $row['userType'];
    $username = $row['username'];

    if ($utype == 'Student'){
        $sidSql = "SELECT id FROM `student_profile` WHERE userID = $userID";
        $result = mysqli_query($conn, $sidSql);
        $row = $result->fetch_assoc();
        $studentId = $row['id'];

        $sql = "DELETE FROM `job_applications` WHERE studentID = $studentId";
        $conn->query($sql);

        $sql = "DELETE FROM `student_profile` WHERE id = $studentId";
        $conn->query($sql);
    }

    elseif ($utype == 'Employer'){
        $cidSql = "SELECT company_id FROM `company_list` WHERE userID = $userID";
        $result = mysqli_query($conn, $cidSql);
        $row = $result->fetch_assoc();
        $company_id = $row['company_id'];

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
    }

    $sql = "DELETE FROM `users` WHERE userID = $userID";
    $conn->query($sql);

    $actions = "Deleted $username from Users.";
    include('../to-log.php');
}

header("location:u.listing.php");
exit;