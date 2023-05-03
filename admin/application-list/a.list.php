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

<style>
		/* Set display property of button and input to inline-block */
		button, input[type="text"] {
			display: inline-block;
			vertical-align: middle;
		}
	</style>
<body>

    <?php
        include('../admin-navbar.php');
    ?>


<div class="container py-5">
    <div class="row justify-content-center">
    <h2 class="mb-4 pb-4" style="text-align: center;"></h2>
    <h2 class="mb-3 pb-3 fw-bold" style="text-align: left;">Application Listing</h2>

    <div class="row mb-2 pb-2">
      <!-- <div class="col-auto mb-2"> -->
      <!-- <div class="col-auto">
        <label for="entries" class="col-sm-1 col-form-label">Show</label>
      </div>
      <div class="col-1">
        <input type="text" class="form-control" id="entries">
      </div>
      <div class="col-1 col-md-7">
        <label for="entries" class="col-sm-1 col-form-label">entries</label>
      </div> -->
      <!-- search bar(or palitan mo nalang nung search bar na gawa nyo) -->
      
      <div class="col-auto">
        <label for="search" class="col-form-label">Search:</label>
      </div>
      <div class="col-auto">
      <form action="" method="GET">
        
      <div class="input-group">
          <div class="form-outline" style="display: flex; flex-direction:row; gap: .2rem">
            <input type="search" name="search" id="search" class="form-control" placeholder="search here..." />
            <button type="submit" class="btn btn-primary">
              <i class="fas fa-search"></i>
            </button>
          </div>

        </div>
          </form>
      </div>
    </div> <br>
    <form action="" method="post">  
      <button type="button" name="export-xls" class="btn btn-warning" onclick="tableToExcel('excel-table-alist', 'W3C Excel Table')"><i class="fa-sharp fa-solid fa-file-excel"></i>&nbsp Export Table</button>
    </form>  
        <?php
        include_once '../../export.php';
        ?>
  </div>


  <table class="table table-striped table-sm" id="excel-table-alist">
    <thead>
      <tr>
      <th scope="col">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Application ID</font>
          </font>
        </th>
        <th scope="col">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Job Title</font>
          </font>
        </th>

        <th scope="col">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Student Name</font>
          </font>
        </th>
        <th scope="col">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Company Name</font>
          </font>
        </th>
        <th scope="col">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Application Status</font>
          </font>
        </th>
        <th scope="col">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Actions</font>
          </font>
        </th>
      </tr>
    </thead>
    <tbody>
            <?php
            $sql = "SELECT * FROM job_applications";
            $result = $conn -> query($sql);

            if ($result ->num_rows > 0){
                while($row = $result -> fetch_assoc()){
                    $jobID = $row['jobID'];
                    $student_id = $row['studentID'];
                    $company_id = $row['companyID'];
                    
                    $sql2 = "SELECT * FROM job_list WHERE jobID = '$jobID'";
                    $result2 = $conn -> query($sql2);
                    $row2 = $result2 -> fetch_assoc();
                    
                    $sql3 = "SELECT * FROM student_profile WHERE id = '$student_id'";
                    $result3 = $conn -> query($sql3);
                    $row3 = $result3 -> fetch_assoc();

                    $sql4 = "SELECT * FROM company_list WHERE company_id = '$company_id'";
                    $result4 = $conn -> query($sql4);
                    $row4 = $result4 -> fetch_assoc();


                    echo "<tr><td>" .
                    $row["application_id"] . "</td><td>" .
                    $row2["jobTitle"] . "</td><td>" .
                    $row3["firstname"]." ". $row3['lastname']. "</td><td>" .
                    $row4["employer_name"] . "</td><td>" .
                    $row["status"] . "</td>";

                    echo "<td>";
                    echo "<div class='btn-group'>";
                    echo "<a class='btn btn-danger' href='a.delete.php?id=" .$row['application_id'] ."'>Delete </a>";
                    echo "</div>";
                    echo "</td>";
                    echo "</tr>";

                }
            }
            $conn->close();
            ?> 
        </tbody>
    </table>

</body>
</html>