<?php
if (isset ($_GET['id'])){

    $studentId = $_GET["id"];
    include('../../connections.php');

    $uidSql = "SELECT userID, firstname, lastname FROM `student_profile` WHERE id = $studentId";
    $result = mysqli_query($conn, $uidSql);
    $row = $result->fetch_assoc();
    $uid = $row['userID'];
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];

    $sql = "DELETE FROM `job_applications` WHERE studentID = $studentId";
    $conn->query($sql);

    $sql = "DELETE FROM `student_profile` WHERE id = $studentId";
    $conn->query($sql);

    $sql = "DELETE FROM `users` WHERE userID = $uid";
    $conn->query($sql);

    $actions = "Deleted $firstname $lastname from Student Profiles.";
    include('../to-log.php');
}

header("location: s.profile.php");
exit;