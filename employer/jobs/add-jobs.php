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
    <?php include '../../header-link.php'; ?>
    <link rel="stylesheet" href="assets/CSS/styles.css">
    <title>Add Job</title>
</head>

<body style="background-image: url('');">
<?php
?>
  <div id="PostJobCon" class="container-sm mt-5 py-5 p-5 bg-light login-form">
    <form method= "POST">

      <div class="form-group">
        <label for="job_title">Job Title</label>
        <input type="text" class="form-control" name= "job_title" id="job_title" placeholder="Enter Job Title">
      </div>
      <br>

      <div>
        <label for="job_summary">Job Summary</label>
        <textarea id="job_summary" class="form-control" name="job_summary" placeholder="Write Job Summary" required rows="8" cols="50"></textarea>
      </div> <br>

      <div>
        <label for="job_reqs">Job Requirements</label>
        <textarea id="job_reqs" class="form-control" name="job_reqs" placeholder="Write Job Requirements" required rows="8" cols="50"></textarea>
      </div>
      <br>

      <div class="form-group">
        <label for="job_category">Job Category</label> <br> <br>
        <select id="job_category" name="job_category">
            <option value="none"> Choose Job Category  </option>
            <option value="Business and Financial Services"> Business and Financial Services  </option>
            <option value="Construction"> Construction  </option>
            <option value="Education"> Education  </option>
            <option value="Food & Beverage/Catering/Restaurant"> Food & Beverage/Catering/Restaurant </option>
            <option value="Health, Pharmaceuticals, and Biotech"> Health, Pharmaceuticals, and Biotech </option>
            <option value="Hospitality"> Hospitality </option>
            <option value="Information Technology"> Information Technology </option>
            <option value="Law Firm"> Law Firm </option>
            <option value="Real Estate"> Real Estate </option>
            <option value="Transportation/Logistics "> Transportation/Logistics  </option>
            <option value="Wholesale/Retail and Distribution"> Wholesale/Retail and Distribution  </option>
        </select>
      </div>
      <br>

      <div class="form-group">
        <label for="job_type">Job Type</label> <br> <br>
        <select id="job_type" name="job_type">
            <option value="Full-Time"> Full-Time </option>
            <option value="Part-Time"> Part-Time </option>
        </select>
      </div>
      <br>

      <div class="form-group">
        <label for="workSetup">Work Setup</label> <br> <br>
        <select id="workSetup" name="workSetup">
            <option value="Onsite"> On-site </option>
            <option value="WFH"> Work from Home </option>
        </select>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1salary">Salary</label>
        <input type="number" name= "min" class="form-control" 
          > -
          <input type="number" name= "max" class="form-control" 
          >
      </div>
      <br>
      <br>
      <button type="submit" class="btn btn-primary" name="postJob">Post</button>
    </form>


    
    <?php          
    $company_id=$_SESSION['company_id'];
          
    if(isset($_POST['postJob'])){
        $jobTitle = $_POST['job_title'];
        $jobSummary = $_POST['job_summary']; 
        $jobQuali = $_POST['job_reqs'];   
        $jobCategory = $_POST['job_category']; 
        $jobType = $_POST['job_type']; 
        $workSetup = $_POST['workSetup']; 
        $min = $_POST['min'];
        $max = $_POST['max'];

        $tablename="job_list";
        $columnquery="*";
        $result = selectWhere($conn, $tablename, $columnquery, 'jobTitle', $jobTitle);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "Job Exist";
            }
          } else {
            $dataquery = "job_list(jobTitle, jobSummary, jobQuali, jobCategory, jobType, workSetup, min, max, companyID)";
            $valuequery="('$jobTitle','$jobSummary','$jobQuali','$jobCategory','$jobType', '$workSetup', '$min' , '$max', $company_id)";
            insertData($conn, $dataquery, $valuequery);

            $company_id = $_SESSION['company_id'];
            $actions = "Added a job: $jobTitle";
            $dataquery = "admin_logs(company_id, actions)";
            $valuequery="('$company_id', '$actions')";

            $sql = "INSERT INTO $dataquery VALUES $valuequery";
            mysqli_query($conn, $sql);
            
            echo '<script>
            window.location.href = "index.php";
            </script>';
          }

        }
      ?>

  </div>
</body>
</html>