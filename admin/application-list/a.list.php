<?php

    include('../../connections.php');
    // include('../../sessions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        include '../../header-link.php';
    ?>
    <title>Application Listing</title>
</head>
<body>

    <?php
        include('../admin-navbar.php');
    ?>

    <h1>Application Listing</h1>
    
    <table>

        <thead>
            <tr>
                <th>Application ID</th>
                <th>Job ID</th>
                <th>Student ID</th>
                <th>Application Status</th>
        </thead>
        
        <tbody>
            <?php
            $sql = "SELECT * FROM job_applications";
            $result = $conn -> query($sql);

            if ($result ->num_rows > 0){
                while($row = $result -> fetch_assoc()){
                    echo "<tr><td>" .
                    $row["application_id"] . "</td><td>" .
                    $row["jobID"] . "</td><td>" .
                    $row["studentID"] . "</td><td>" .
                    $row["status"] . "</td>";

                    echo "<td>";
                    echo "<div class='btn-group'>";
                    echo "<a class='btn btn-danger' href='a.delete.php?id=" .$row['application_id'] ."'>Delete </a>";
                    echo "</div>";
                    echo "</td>";

                    echo "</tr>";



                }
            }
            else{
                    
            }
            $conn->close();
            ?> 
        </tbody>
        
        <tbody>

        </tbody>
    </table>

</body>
</html>