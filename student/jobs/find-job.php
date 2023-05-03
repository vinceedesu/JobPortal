<!DOCTYPE html>

<?php
include('../../connections.php');
include('../sessions.php');


$results_per_page = 20;
$sql = "SELECT * FROM job_list";
$all_jobs = $conn->query($sql);
$number_of_result = mysqli_num_rows($all_jobs);
$number_of_page = ceil($number_of_result / $results_per_page);
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}


$page_first_result = ($page - 1) * $results_per_page;
?>



<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include('../../header-link.php'); ?>
  <link rel="stylesheet" href="../../assets/CSS/styles.css">
  <title>Find Job</title>
</head>

<body>
  <?php

  include '../navbar.php';
  ?>
  <div class="container mt-5 div-margins">
    <div class="row">
      <div class="col-4 ml-auto">
        <p class="header-text">Latest Job posts</p>
        <p>Find the latest job posts here. Seek the job that you desire. Good luck job seekers!</p>
      </div>
      <div class="col-2">
      </div>
      <div class="col-6 my-auto">
        <form action="" method = "GET">
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
    </div>
  </div>
  </div>
  <div class="container">
    <div class="row">

      <?php

      if (isset($_GET['search']) && !empty($_GET['search'])) {

        $search = $_GET['search'];

      } else {

        $search = 'default value';
        // ...
      }

      if ($search == 'default value') {
        $sql = "SELECT *FROM job_list LIMIT " . $page_first_result . ',' . $results_per_page;
      } else {
        $sql = "SELECT * FROM job_list WHERE CONCAT(jobTitle, jobSummary, jobType, jobCategory) LIKE '%$search%' ORDER BY jobTitle, jobSummary, jobType, jobCategory DESC LIMIT " . $page_first_result . ',' . $results_per_page;
      }
      
      $all_jobs = $conn->query($sql);

      // $row = mysqli_fetch_assoc($all_jobs);
      if ($number_of_result > 0) {
        while ($row = mysqli_fetch_assoc($all_jobs)) {
          ?>
          <div class="col-3 mb-5">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">
                  <?php echo $row["jobTitle"]; ?>
                </h5>
                <p class="skills"> <b> Job Summary: </b>
                  <?php echo $row["jobSummary"]; ?>
                </p>
                <p class="job_type"> <b> Job Type: </b>
                  <?php echo $row["jobType"]; ?>
                </p>
                <p class="salary"> <b> Salary: </b>
                  <?php echo $row["min"] . "-" . $row["max"]; ?>
                </p>
                <p class="positions"> <b> Job Category: </b>
                  <?php echo $row["jobCategory"]; ?>
                </p>
                <a href="Apply-Page.php?jobID=<?php echo $row['jobID']; ?>" class="btn btn-primary">Apply Now</a>

              </div>
            </div>
          </div>

          <?php
        }
      } else {
        echo '
          <div class = "col-12 text-center">
          <p class = "fs-1 bold"> No Entries Found </p>
          </div>';
      }
      ?>

      <nav class="mx-auto" aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item">
            <?php
            $pageNumber = 1;
            if ($page >= 2) {
              echo '<a class="page-link" href="find-job.php?page=' . ($page - 1) . '" aria-label="Previous">';
              echo '<span aria-hidden="true">&laquo;</span>';
            } else {
              echo '<a class="page-link disabled" href="find-job.php?page=' . ($page - 1) . '" aria-label="Previous">';
              echo '<span aria-hidden="true" class="disabled">&laquo;</span>';
            }
            ?>
            </a>
          </li>
          <?php for ($page = 1; $page <= $number_of_page; $page++) {
            echo '    <li class="page-item"><a class="page-link" href = "find-job.php?page=' . $page . '"> ' . $page . '</a></li>';
          }

          if (!isset($_GET['page'])) {
            $page = 1;
          } else {
            $page = $_GET['page'];
          }
          ?>
          <li class="page-item">
            <?php
            if ($page < $number_of_page) {
              echo '<a class="page-link" href="find-job.php?page=' . ($page + 1) . '" aria-label="Next">';
            } else {
              echo '<a class="page-link disabled" href="find-job.php?page=' . ($page - 1) . '" aria-label="Next">';
            }
            ?>
            <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>

    </div>
  </div>


</body>

</html>