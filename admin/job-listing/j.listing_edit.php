

<?php 
  include('../../connections.php');
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../../header-link.php'; ?>
    <?php
        include('../admin-navbar.php');
    ?>
    <link rel="stylesheet" href="assets/CSS/styles.css">
    <title>Add Job</title>
</head>

<body style="background-image: url('');">
  
  <div id="PostJobCon" class="container-sm mt-5 py-5 p-5 bg-light login-form">
    <form action= j.listing_edit_conn.php method= "POST">
    <div class="col-md-12 text-center">
      <h1> Edit Job Listing </h1>
    </div> <br>

        <?php
            
            $jobID = $_GET['jobID'];
            $sql = mysqli_query($conn, "SELECT * FROM job_list WHERE jobID = '$jobID'");
            while($row=mysqli_fetch_array($sql)){

        ?>
    
        <div class="form-group">
        <input type="hidden" name="jobID" value="<?php echo $jobID; ?>">
      </div>

      <div class="form-group">
        <label for="job_title" class= "form-label mb-2 fw-bold">Job Title</label>
        <input type="text" class="form-control" name= "jobTitle" id="jobTitle" value= "<?php echo $row['jobTitle']; ?>">
      </div>
      <br>

      <div>
        <label for="jobSummary" class= "form-label mb-2 fw-bold">Job Summary</label>
        <textarea id="jobSummary" class="form-control" name="jobSummary"  rows="8" cols="50"><?php echo $row['jobSummary']; ?></textarea>
      </div> <br>

      <div>
        <label for="jobQuali" class= "form-label mb-2 fw-bold">Job Requirements</label>
        <textarea id="jobQuali" class="form-control" name="jobQuali"   rows="8" cols="50"><?php echo $row['jobQuali']; ?></textarea>
      </div>
      <br>

      <div class="form-group">
        <label for="jobCategory" class= "form-label mb-2 fw-bold">Job Category</label> <br> <br>
        <select id="jobCategory" class="form-control" name="jobCategory" value= "<?php echo $row['jobCategory']; ?>">
            <option value="none"> Choose Job Category  </option>
            <option value="business"> Business and Financial Services  </option>
            <option value="construction"> Construction  </option>
            <option value="education"> Education  </option>
            <option value="restaurant"> Food & Beverage/Catering/Restaurant </option>
            <option value="health"> Health, Pharmaceuticals, and Biotech </option>
            <option value="hospitality"> Hospitality </option>
            <option value="it"> Information Technology </option>
            <option value="law"> Law Firm </option>
            <option value="estate"> Real Estate </option>
            <option value="transpo"> Transportation/Logistics  </option>
            <option value="distribution"> Wholesale/Retail and Distribution  </option>
            
        </select>
      </div>
      <br>

      <div class="form-group">
        <label for="jobType" class= "form-label mb-2 fw-bold">Job Type</label> <br> <br>
        <select id="jobType" class="form-control" name="jobType" value= "<?php echo $row['jobType']; ?>">
              <?php
          if($row['jobType'] == "Full-Time"){
            echo "<option value='Full-Time' selected> Full-Time </option>";
            echo "<option value='Part-Time'> Part-Time </option>";
          }else{
            echo "<option value='Full-Time'> Full-Time </option>";
            echo "<option value='Part-Time' selected> Part-Time </option>";
            }
              ?>
        </select>
      </div>
      <br>

      <div class="form-group">
        <label for="workSetup" class= "form-label mb-2 fw-bold">Work Setup</label> <br> <br>
        <select id="workSetup" class="form-control" name="workSetup" value= "<?php echo $row['workSetup']; ?>">
        <?php
          if($row['workSetup'] == "Onsite"){
            echo "<option value='Onsite' selected> On-site </option>";
            echo "<option value='WFH'> Work from Home </option>";
          }else{
            echo "<option value='Onsite'> On-site </option>";
            echo "<option value='WFH' selected> Work from Home </option>";
          }
          ?>
        </select>
      </div>
      <br>
      <div class="form-group">
        <label for="exampleInputEmail1salary" class= "form-label mb-2 fw-bold">Salary</label>
          
        <div class="col">
          <input type="text" name= "min" class="form-control" value= "<?php echo $row['min']; ?>"> 
        </div>
        -
        <div class="col">
          <input type="text" name= "max" class="form-control" value= "<?php echo $row['max']; ?>">
        </div> <br>
      </div>
      <br>
        <?php } ?>
      
      <br>
    
      <button type="submit" class="btn btn-primary" name="updateJob">Update</button>
      <a href="j.listing.php" class="btn btn-danger">Cancel</a>
    </form>
