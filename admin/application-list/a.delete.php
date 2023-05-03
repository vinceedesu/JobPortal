<?php
if (isset ($_GET['id'])){

    $id = $_GET["id"];
    include('../../connections.php');

    $sql = "DELETE FROM `job_applications` WHERE application_id = $id";
    $conn->query($sql);
}

header("location: a.list.php");
exit;