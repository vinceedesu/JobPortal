<?php
if (isset ($_GET['id'])){
    $id = $_GET["id"];
    include('../../../connections.php');

    $unSql = "SELECT username FROM `admin_accounts` WHERE id = $id";
    $result = mysqli_query($conn, $unSql);
    $row = $result->fetch_assoc();
    $username = $row['username'];

    $sql = "DELETE FROM `admin_accounts` WHERE id = $id";
    $conn->query($sql);

    $actions = "Deleted $username from Admin Accounts.";
    include('../../to-log.php');
}

header("location:admin-accounts.php");
exit;
?>