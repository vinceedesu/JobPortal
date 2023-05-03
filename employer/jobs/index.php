<?php
    include('../../connections.php');
    include('../sessions.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include('../../header-link.php'); ?>
        <title>Jobs</title>
    </head>

    <body>
        <?php
            include('../navbar.php');
        ?>
        
<div class="container pt-5">
    <div class="row">
    <div class="col-sm">
     <h1>Jobs</h1>
    </div>
    <form>
    <div class="col-sm">
       <a type = "button" class="btn btn-warning align-content-lg-end" href="add-jobs.php">Add Job</a>
    </div>
</form> <br><br>
<table class="table">
  <thead>
    <tr>
        <th>Title</th>
        <th>Summary</th>
        <th>Qualification</th>
        <th>Category</th>
        <th>Job Type</th>
        <th>Work Setup</th>
        <th>Salary</th>
        <th>Actions</th>
    </tr>
  </thead>
  <tbody>
   <?php
        $result = selectWHERE($conn,"job_list","*", "CompanyId", $_SESSION['company_id']);
        $resultCheck = mysqli_num_rows($result);
    
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
            <td>" . $row['jobTitle'] . "</td>
            <td>" . $row['jobSummary'] . "</td>
            <td>" . $row['jobQuali'] . "</td>
            <td>" . $row['jobCategory'] . "</td>
            <td>" . $row['jobType'] . "</td>
            <td>" . $row['workSetup'] . "</td>
            <td>" . $row['min'] . " - ". $row['max']. "</td>
            <td>
                <a class='btn btn-primary' href='edit-jobs.php?jobID=" . $row['jobID'] . "'>Edit</a>
                 <a class='btn btn-danger' href='delete-jobs.php?jobID=" . $row['jobID'] . "'>Delete</a>
            </td>
            </tr>";

                        }
                    }
                ?>
  </tbody>
</table>

</div>

        <table>
            <thead>
                <tr>
                    
                    
                </tr>
            </thead>
                
            <tbody>
                <?php
                    
                ?>
            </tbody>    
        </table>

    </body>
</html>
