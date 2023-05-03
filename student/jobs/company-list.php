<!DOCTYPE html>

<?php
 include('../../connections.php');
 include('../sessions.php');

$results_per_page = 20;

$sql = "SELECT * FROM company_list";
$all_company = $conn->query($sql);
$number_of_result = mysqli_num_rows($all_company);
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
    <title>Company Profile</title>
</head>


<body>

<?php
include '../navbar.php';
?>


  <div class="container justify-content-center mt-50 mb-50">
    <div class="row justify-content-center">
      <div class="col-10 center">
        <div class="card card-body">
          <div class="container">

            <div class="row ">
              <div class="col align-middle" style="padding-top: 10px">
                <h1 class="text-left">Company List</h1>
              </div>
              <div class="col" style="padding-left: 300px; padding-top: 15px;">
              <form class="form-inline" action="company-list.php" method="GET">
                <div class="input-group">
                    <input type="search" name="search" id="search" class="form-control" placeholder="Search here.." />
                    <div class="input-group-append">
                       <button type="submit" class="btn btn-danger">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                       <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                        </button>
                    </div>
                </div>    
                      
                </form>
              </div>
            </div>
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
              $sql = "SELECT *FROM company_list LIMIT " . $page_first_result . ',' . $results_per_page;
            } else {
              $sql = "SELECT * FROM company_list WHERE CONCAT(name, employer_name, email, address) LIKE '%$search%' ORDER BY name, employer_name, email, address DESC LIMIT " . $page_first_result . ',' . $results_per_page;
            }
            $all_company = mysqli_query($conn, $sql);
            
            // $row = mysqli_fetch_assoc($all_jobs);
            if($number_of_result > 0){
            while ($row = mysqli_fetch_assoc($all_company)) {
            ?>
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="row card-body">
                    <div class="col-3 position-relative">
                    <?php
                $logo = $row['logo'];

                if ($logo == NULL) {
                  
                    echo "<img src='../../assets/img/UI/no-profile.png' class='img-fluid' alt='profile picture' style='height: 150px; width: 150px;'>";
                } else {
                    echo "<img src='../../assets/img/employer-profile/$logo' class='img-fluid' alt='profile picture' style='height: 150px; width: 150px;'>";
                }
                ?>
                      </div>
                      <div class="col-6">
                        <h5 class="card-title"><?php echo $row["name"] ?></h5>
                        <p class="card-text"><?php echo $row["email"] ?></p>
                        <p class="card-text"><?php echo $row["address"] ?></p>
                        <a href="CompanyProfile.php?company_id=<?php echo $row['company_id']?>" class="btn btn-primary">See more</a>
                      </div>                      
                    </div>
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
                    echo '<a class="page-link" href="company-list.php?page=' . ($page - 1) . '" aria-label="Previous">';
                    echo '<span aria-hidden="true">&laquo;</span>';
                  } else {
                    echo '<a class="page-link disabled" href="company-list.php?page=' . ($page - 1) . '" aria-label="Previous">';
                    echo '<span aria-hidden="true" class="disabled">&laquo;</span>';
                  }
                  ?>
                  </a>
                </li>
                <?php for ($page = 1; $page <= $number_of_page; $page++) {
                  echo '    <li class="page-item"><a class="page-link" href = "company-list.php?page=' . $page . '"> ' . $page . '</a></li>';
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
                    echo '<a class="page-link" href="company-list.php?page=' . ($page + 1) . '" aria-label="Next">';
                  } else {
                    echo '<a class="page-link disabled" href="company-list.php?page=' . ($page - 1) . '" aria-label="Next">';
                  }
                  ?>
                  <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
          <?php
          } 
          else{
            echo '
                    <div class = "col-12 text-center">
                    <p class = "fs-1 bold"> No Entries Found </p>
                    </div>';
          }
          ?>
            
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

</body>


</html>