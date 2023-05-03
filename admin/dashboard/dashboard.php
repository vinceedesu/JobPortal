<?php
    include('../../connections.php');
    // include('../sessions-admin.php')
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include('../../header-link.php'); ?>
        <title>Logs</title>
    </head>

    <body>
        <?php
            include('../admin-navbar.php');
        ?>
        
        <h1>Dashboard</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Company</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM admin_logs";
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['company_id'] . "</td>";
                        echo "<td>" . $row['actions'] . "</td>";
                        echo "</tr>";
                    }
                }
            ?>
        </tbody>
    </table>

    </body>
</html>
