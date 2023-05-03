<?php
    include '../../connections.php';

    $application_id = $_GET['app_id'];
    $sql = "UPDATE job_applications SET status = 'Approved' WHERE application_id = '$application_id'";
    $conn->query($sql);
    header('Location: candidates.php');

    $sql2 = "SELECT * FROM job_applications WHERE application_id = '$application_id'";
    $result = $conn->query($sql2);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0){
        while($row = $result->fetch_assoc()){
            $job_id = $row['jobID'];
            $student_id = $row['studentID'];
        }
    }
    $sql3 = "SELECT * FROM job_list WHERE jobID = '$job_id'";
    $result2 = $conn->query($sql3);
    $resultCheck2 = mysqli_num_rows($result2);
    if($resultCheck2 > 0){
        while($row2 = $result2->fetch_assoc()){
            $job_title = $row2['jobTitle'];
        }
    }

    $sql4 = "SELECT * FROM student_profile WHERE id = '$student_id'";
    $result3 = $conn->query($sql4);
    $resultCheck3 = mysqli_num_rows($result3);
    if($resultCheck3 > 0){
        while($row3 = $result3->fetch_assoc()){
            $student_name = $row3['firstname'] . " " . $row3['lastname'];
        }
    }

    $actions = "Approved $student_name\'s Application in Job: $job_title";
    include '../to-log.php';
?>