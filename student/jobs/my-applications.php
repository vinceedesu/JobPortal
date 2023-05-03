<?php
    include('../../connections.php');
    include('../sessions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include('../../header-link.php'); ?>
  <link rel="stylesheet" href="../../assets/CSS/styles.css">
  <title>Find Job</title>
</head>
</head>
<body>
<?php
   include '../navbar.php';  
?>
<div class="container">
    <div class="row p-5 border mt-5 shadow">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <p class="fs-1"> My Applications</p>
                </div>
            </div>

            <div class="row px-5">
                <table class="table border">
                    <thead>
                      <tr>
                        <th scope="col">Job Title</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                        <?php
                          $student_id = $_SESSION['student_id'];
                          $sql = "SELECT * FROM job_applications WHERE studentID = '$student_id'";
                          $result = $conn->query($sql);
                          $resultCheck = mysqli_num_rows($result);

                          if($resultCheck > 0){
                            while($row = $result->fetch_assoc()){
                              $job_id = $row['jobID'];
                              $sql2 = "SELECT * FROM job_list WHERE jobID = '$job_id'";
                              $result2 = $conn->query($sql2);
                              $resultCheck2 = mysqli_num_rows($result2);

                              if($resultCheck2 > 0){
                                echo "<tr>";
                                while($row2 = $result2->fetch_assoc()){                                          
                                  $company_id = $row2['CompanyId'];
                                  $sql3 = "SELECT * FROM company_list WHERE company_id = '$company_id'";
                                  $result3 = $conn->query($sql3);
                                  $resultCheck3 = mysqli_num_rows($result3);

                                  if($resultCheck3 > 0){
                                      while($row3 = $result3->fetch_assoc()){
                                          echo "<td>" . $row2['jobTitle'] . "</td>";
                                          echo "<td>" . $row3['name'] . "</td>";
                                          echo "<td>" . $row['status'] . "</td>";
                                          echo "<td> <button class='btn btn-danger btn-sm'> Cancel </button></td>";
                                      }
                                  }
                              }
                                echo "</tr>";
                              }
                            }
                          } 

                        ?>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


</body>
</html>