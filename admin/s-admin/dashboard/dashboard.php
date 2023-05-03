<?php
    include '../../../connections.php';
    include('../sessions.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Dashboard</title>

    </head>

    <body>


    <?php
        include('../s-admin-navbar.php');
    ?>

            <h1>Admin Logs</h1>
            
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Admin ID</th>
                    <th>Admin Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    $sql = "SELECT * FROM s_admin_logs";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['admin_id'] . "</td>";
                            echo "<td>" . $row['admin_type'] . "</td>";
                            echo "<td>" . $row['actions'] . "</td>";
                            echo "</tr>";
                        }
                    }

                ?>
            </tbody>
        </table>
        
    </body>

</html>