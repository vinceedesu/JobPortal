<?php
    include '../../connections.php';
    include('../sessions.php');
?>

<!DOCTYPE html>
<html lang="en">

<?php
  $jobID = $_GET['jobID'];
  $result = selectWhere($conn, 'job_list', '*', 'jobID',$jobID);
  if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $jobTitle = $row['jobTitle'];
    $jobSummary = $row['jobSummary'];
    $jobQuali = $row['jobQuali'];
    $jobCategory = $row['jobCategory'];
    $jobType = $row['jobType'];
    $workSetup = $row['workSetup'];
    $min =$row['min'];
    $max =$row['max'];
    $CompanyId =$row['CompanyId'];
    $_SESSION['CompanyId'] = $CompanyId;
    $cresult = selectWhere($conn, 'company_list', '*', 'company_id',$CompanyId);
    $crow = mysqli_fetch_assoc($cresult);

    $companyName = $crow['name'];

             
    if(isset($_POST['submit'])){

      $student_id = $_SESSION['student_id'];
      $dataquery = "job_applications (jobID, studentID, companyID, status)";
      $valuequery = "($jobID, $student_id, $CompanyId, 'Pending')";
      insertData($conn, $dataquery, $valuequery);
      echo '<script>
      window.location.href = "../jobs/my-applications.php";
    </script>';
    }
  }
?>

<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../../header-link.php'; ?>
    <link rel="stylesheet" href="assets/CSS/styles.css">
    <link rel="stylesheet" href="assets/CSS/login-bg.css">
    <title>Apply Now</title>
</head>
<body>
 <?php
 include ('../navbar.php');
 ?>

  
  <div class="container-xl">
    <br>
    <h1>Job Description</h1>
    <hr>
    <div class="container-xl rounded  my-2 bg-light ">
      <div class=" container py-2">
        <p class="mt-3"><strong> Job Title: </strong><?php echo $jobTitle; ?> </p>
        <p class="mt-3"><strong> Company Name: </strong><?php echo $companyName; ?> </p>  
        <p class="mt-3"><strong> Job Salary: </strong><?php echo $min." - ".$max ?> </p> 
        <p class="mt-3"><strong> Work Setup: </strong><?php echo $workSetup; ?> </p>
        <p class="mt-3"><strong> Job Type: </strong><?php echo $jobType; ?> </p>  
        <p class="mt-3"><strong> Job Qualifications: </strong><?php echo $jobQuali; ?> </p>       
        <p class="mt-3"><strong> Job Category: </strong><?php echo $jobCategory; ?> </p>    
        <p class="mt-3"><strong> Job Summary </strong> <?php echo $jobSummary; ?> </p> 
       

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ready to Apply now?</h5>
        
      </div>
      <div class="modal-body">
       Are you sure you want to apply to this company?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form method="post">
            <input name="submit" type="submit" class="btn btn-primary" value="Apply">
              </form>
      </div>
    </div>
  </div>
</div>
        
         <div class="container-fluid">
           <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"> Apply</button>
            <a type="button" class="btn btn-danger" href="companyProfile.php?company_id=<?php echo $CompanyId?>">About Company</a>

        </div>
      </div>
    </div>
  </div>