<?php
    include ('../../connections.php');
    include('../sessions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../../header-link.php'; ?>
    <link rel="stylesheet" href="../../assets/CSS/styles.css">
    <title>Student Profile</title>
</head>
<body>
<?php
    include '../navbar.php';  
?>

<div class="container mb-3 pb-3 mt-5">
 <div class="row mt-5">
              </div>
  
    <div class="row mt-5">
      <div class="col-4 ">
        <div class="container-fluid shadow rounded">
          <div class="row">
            <div class="col-12 mx-auto text-center mt-3" style="height: 150px;">
            <?php
                
                $student_id = $_SESSION['student_id'];
                $sql = "SELECT * FROM student_profile WHERE id = '$student_id';";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);


                if ($resultCheck > 0) { 
                    $row = mysqli_fetch_assoc($result);
                    $fullname = $row['firstname'] . ' ' . $row['lastname']; 
                    ?>
                
                <?php
                $p_img = $row['p_img'];

                if ($p_img == NULL) {
                  
                    echo "<img src='../../assets/img/UI/no-profile.png' class='img-fluid rounded-circle' alt='profile picture' style='height: 150px; width: 150px;'>";
                } else {
                    echo "<img src='../../assets/img/student-profile/$p_img' class='img-fluid rounded-circle' alt='profile picture' style='height: 150px; width: 150px;'>";
                }

                $bio = $row['bio'];
                ?>
             
            </div>
            <div class="col-12 mt-3">
              <p class="text-center fs-3"><?php echo $fullname ?></p>
            </div>
            <div class="col-12 text-center">
              <p class="fs-3">About Me:</p>
            </div>
            <div class="col-12 mt-0">
              <p class="fs-5 text-wrap lh-sm text-break text-justify mx-4"><?php echo $bio ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <!-- replace paragraph with list or add new list then put this for loop -->
              <p class="fs-5"></p>
            </div>
            <div class="col-3 m-2">
              <p> </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col  ms-4">
        <div class="container-fluid">
                 <div class="row">
            <div class="col-12 pt-3 shadow rounded">
              <div class="container-fluid">
                <div class="row">
                  <div class="col">
                    <p class="fs-1 bold">Basic Information</p>
                  </div>
                  <div class ="col d-flex flex-row-reverse mb-auto mt-2">
                    <a href="edit-profile.php" class="btn btn-primary">Edit Profile</a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <p class="fs-4">Course</p>
                    <p><?php echo $row['course']; ?></p>
                  </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p class="fs-4">Email Address</p>
                        <p><?php echo $row['email']; ?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <p class="fs-4">Birthdate</p>
                        <p><?php echo $row['birthdate']; ?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <p class="fs-4">Sex</p>
                        <p><?php echo $row['sex']; ?></p>
                    </div>
                </div>

              </div>
            </div>
            </div>

            <?php 
            }
                ?>
          <div class="row">
              <div class="col-12 mt-5 shadow rounded">
              <div class="container-fluid">
              <div class="row">
                <div class="col">
                  <p class="fs-1 bold">Pending Applications</p>
                </div>
              </div>
              <table class="table">
                  <thead>
                      <tr>
                        <th scope="col">Job Title</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Status</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                        <?php
                          $student_id = $_SESSION['student_id'];
                          $sql = "SELECT * FROM job_applications WHERE studentID = '$student_id' AND status = 'Pending'";
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
    </div>
  </div>

</body>
</html>

