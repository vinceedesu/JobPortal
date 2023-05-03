<!-- <a href="../dashboard/dashboard.php">Home</a>
<a href="../jobs/find-job.php">Find a Job</a>
<a href="../jobs/company-list.php">Company List</a>
<a href="../profile/student-profile.php">User Profile</a>
<a href="../logout.php">Logout</a> -->

<nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background: linear-gradient(to left, #F6C724, #7C2424);">
    <div class="container-fluid">
      <a class="navbar-brand logo" href="../../index.php">
        <img src="../../assets/img/jobportal_logo1.png" height="120px" width="275px"  class="d-inline-block align-text-top">

      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"  
        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav mx-auto">
          
          <li class="nav-item">
            <a class="nav-link fs-5 fw-bold text-white" href="../dashboard/index.php">Home</a>
          </li>
          <li class="nav-item mx-5">
            <a class="nav-link  fs-5 fw-bold text-white" href="../jobs/company-list.php">Company Lists</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-5 fw-bold text-white" href="../jobs/find-job.php">Find A Job</a>
          </li>
        </ul>
        <ul class="navbar-nav d-flex flex-row-reverse">
          <div class="dropdown">


            <a class="btn  dropdown-toggle text-center" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <!-- Student Profile is shown here -->

            <?php  
              $id = $_SESSION['student_id'];
              $sql = "SELECT * FROM student_profile WHERE id = '$id'";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($result);
              $resultCheck = mysqli_num_rows($result);

              if ($resultCheck > 0) {
                  if($row['p_img'] == ''){
                  echo '<img src="../../assets/img/no-profile.png" alt="" class="rounded-circle" width="40px"   height="40px" >';
                }else{
                  echo '<img src="../../assets/img/student-profile/'.$row['p_img'].'" alt="" class="rounded-circle" width="50px" height="50px" background-color="#7C2424)">';
              }
              }
            ?>
            
            </a>
              
            <ul class="dropdown-menu dropdown-menu-right">
              <li><a class="dropdown-item" href="../profile/student-profile.php">Profile</a></li>
              <li><a class="dropdown-item" href="../jobs/my-applications.php">My Applications</a></li>
              <li><a class="dropdown-item" href="../../logout.php">Logout</a></li>
            </ul>
          </div>
        </ul>
      </div>
    </div>
  </nav>
