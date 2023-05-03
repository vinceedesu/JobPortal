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

    <style>
  .candidate-links nav ul {
  list-style: none;
  margin: 0;
  padding: 0;
  }

.candidate-links nav li {
  display: inline-block;
  margin-right: 10px;
  
}

.candidate-links nav a {
  display: block;
  padding: 10px;
  text-decoration: none;
  color: black;
}

.candidate-links nav a:hover {
  text-decoration: underline;
}

.candidate-links nav a:active {
    text-decoration: underline;
}

.candidate {
  padding: 20px 0 10px;
  margin-bottom: 20px;
  text-align: center;
  overflow: hidden;
  position: relative;
  border: 1px solid lightgrey;
  border-radius: 5px;
}

.candidate .picture {
  display: inline-block;
  height: 100px;
  width:100;
  margin-bottom: 10px;
  z-index: 1;
  position: relative;
}

.candidate .picture img {
  width: 100%;
  height: auto;
  border-radius: 50%;
  transform: scale(1);
}


.title{
    font-family: 'Signika', sans-serif;
}

.view{
    font-family: 'Signika', sans-serif;
    font-size: 12px;
}
</style>

    <body>
        <?php
            include('../navbar.php');
        ?>
    
    <div class="pt-5 px-5 pb-0">
    <h1>Candidates</h1>
    <!-- <br>

<div class="candidate-links">
    <nav>
        <ul>
          <li><a href="candidates.html">Lists</a></li>
          <li><a href="#">Hired</a></li>
          <li><a href="#">Rejected</a></li>
        </ul>
      </nav>
</div> -->
      


    <hr>

 
    <div class="container">
        <div class="row">

        <?php
            $company_id = $_SESSION['company_id'];
            $sql = "SELECT * FROM job_applications WHERE companyID='$company_id' AND status='Pending'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
              while($row = mysqli_fetch_assoc($result)){
                $student_id = $row['studentID'];
                $jobID = $row['jobID'];

                $sql = "SELECT * FROM student_profile WHERE id = '$student_id'";
                $result2 = mysqli_query($conn, $sql);
                $row2 = mysqli_fetch_assoc($result2);
                
                $sql = "SELECT * FROM job_list WHERE jobID = '$jobID'";
                $result3 = mysqli_query($conn, $sql);
                $row3 = mysqli_fetch_assoc($result3);

                ?>
                <div class='col-12 col-sm-6 col-md-4 col-lg-3'>
                <div class='candidate'>
                  <div class='picture'>
                    <img class='img-fluid' src='../../assets/img/student-profile/<?php echo $row2['p_img'];?>' alt='student pic'>
                    <img class='img-fluid' src='' alt=''>
                  </div>
                  <div class='candidate-content'>
                    <h5 class='name'><?php echo $row2['firstname']." ".$row2['lastname'];?></h5>
                    <h6 class='admin_index_formtitle'><?php echo $row3['jobTitle'];?></h6>
                    <p class='button'><a href='student-profile.php?student_id=<?php echo $row['studentID']; 
                    ?>&app_id=<?php echo $row['application_id']; 
                    ?>'>View Profile</a></p>
                  </div>
                </div>
              </div>
              <?php
              }
            }
        ?>

        </div>
      </div>

    <?php
            //include('../footer.php');
        ?>
    </body>
</html>

