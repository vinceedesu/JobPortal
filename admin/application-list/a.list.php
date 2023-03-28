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
        <input type="search" name="search" id="search" class="form-control">
        
        <button type="submit" class="btn btn-primary">
              <i class="fas fa-search">Search</i>
            </button>
          </form>
      </div>
    </div> <br>
    <form action="u.listing_pdf.php" method="post">  
      <input type="submit" name="generate_pdf" class="btn btn-success" value="Generate Report" />  
    </form>  

  </div>


  <table class="table table-striped table-sm">
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

            if (isset($_GET['search']) && !empty($_GET['search'])) {

              $search = $_GET['search'];

            } else {
 
              $search = 'default value';

            }

            if ($search == 'default value') {
              $sql = "SELECT 
              job_applications.application_id, 
              job_list.jobTitle, 
              student_profile.firstname,
              student_profile.lastname,
              company_list.employer_name,
              job_applications.status
              FROM (((job_applications
              INNER JOIN job_list ON job_applications.jobID = job_list.jobID)
              INNER JOIN student_profile ON job_applications.studentID = student_profile.id)
              INNER JOIN company_list ON job_applications.companyID = company_list.company_id)";
            } else {
              $sql = "SELECT 
              job_applications.application_id, 
              job_list.jobTitle, 
              student_profile.firstname,
              student_profile.lastname,
              company_list.employer_name,
              job_applications.status
              FROM (((job_applications
              INNER JOIN job_list ON job_applications.jobID = job_list.jobID)
              INNER JOIN student_profile ON job_applications.studentID = student_profile.id)
              INNER JOIN company_list ON job_applications.companyID = company_list.company_id)
              WHERE CONCAT(jobTitle, firstname, lastname, employer_name, status) 
              LIKE '%$search%' 
              ORDER BY jobTitle, firstname, lastname, employer_name, status";
            }
            
            
            $result = $conn -> query($sql);

            if ($result ->num_rows > 0){
                while($row = $result -> fetch_assoc()){
  
                    echo "<tr><td>" .
                    $row["application_id"] . "</td><td>" .
                    $row["jobTitle"] . "</td><td>" .
                    $row["firstname"]." ". $row['lastname']. "</td><td>" .
                    $row["employer_name"] . "</td><td>" .
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
              echo 'nodata';
            }
            $conn->close();
            ?> 
        </tbody>
    </table>

</body>
</html>