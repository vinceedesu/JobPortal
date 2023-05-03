<!DOCTYPE html>

<?php
 include('../connections.php');
 include('../sessions.php');

$results_per_page = 4;
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
    <?php include '../header-link.php'; ?>
    <link rel="stylesheet" href="assets/CSS/styles.css">
    <title>Find Job</title>
</head>

<body>

  <div class="container mt-5 div-margins">
    <div class="row">
      <div class="col-4 ml-auto">
        <p class="header-text">Latest Job post</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
          magna aliqua.</p>
      </div>
      <div class="col-2">
      </div>
      <div class="col-6 my-auto">
        <div class="input-group pr-auto">
          <form action="find-job.php" method="GET">
            <div class="form-outline">
              <input type="search" name="search" id="search" class="form-control" placeholder="Search here.." />
            </div>
            <button type="submit" class="btn btn-danger">
              <i class="bi bi-search"></i>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">

      <?php

      if (isset($_GET['search']) && !empty($_GET['search'])) {
        // Perform the search using $_GET['q']
        $search = $_GET['search'];
        // ...
      } else {
        // Display an error message or provide a default value
        $search = 'default value';
        // ...
      }

      if ($search == 'default value') {
        $sql = "SELECT *FROM job_list LIMIT " . $page_first_result . ',' . $results_per_page;
      } else {
        $sql = "SELECT *FROM job_list WHERE jobTitle LIKE '%$search%' LIMIT " . $page_first_result . ',' . $results_per_page;
      }
      $all_jobs = mysqli_query($conn, $sql);
      // $row = mysqli_fetch_assoc($all_jobs);
      while ($row = mysqli_fetch_assoc($all_jobs)) {
      ?>
        <div class="col-3 mb-5">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row["jobTitle"]; ?> </h5>
              <p class="skills"> <b> Job Summary: </b> <?php echo $row["jobSummary"]; ?> </p>
              <p class="job_type"> <b> Job Type: </b> <?php echo $row["jobType"]; ?> </p>
              <p class="salary"> <b> Salary: </b> <?php echo $row["jobSalary"]; ?> </p>
              <p class="positions"> <b> Job Category: </b> <?php echo $row["jobCategory"]; ?> </p>
              <a href="Apply-Page.php" class="btn btn-primary">Apply Now</a>
              
            </div>
          </div>
        </div>

      <?php
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