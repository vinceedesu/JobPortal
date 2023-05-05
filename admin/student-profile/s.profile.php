<?php
    include('../../connections.php');
    include('../sessions-admin.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../../header-link.php'); ?>

    <title>Student Profile</title>
</head>
<body>

    <?php
        include('../admin-navbar.php');
    ?>

    <h1></h1>
    <html lang="en">


    <div class="container py-5">
    <div class="row justify-content-center">
    <h2 class="mb-4 pb-4" style="text-align: center;"></h2>
    <h2 class="mb-3 pb-3 fw-bold" style="text-align: left;">Student Profile</h2>

    <div class="row mb-2 pb-2">
      <!-- <div class="col-auto mb-2"> -->
      <!-- <div class="col-auto">
        <label for="entries" class="col-sm-1 col-form-label">Show</label>
      </div>
      <div class="col-1">
        <input type="text" class="form-control" id="entries">
      </div>
      <div class="col-1 col-md-7">
        <label for="entries" class="col-sm-1 col-form-label">entries</label>
      </div> -->
      <!-- search bar(or palitan mo nalang nung search bar na gawa nyo) -->
      <div class="col-auto">
        <label for="search" class="col-form-label">Search:</label>
      </div>
      <div class="col-auto">
      <form action="" method="GET">
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
    </div> <br>
    <form action="" method="post">  
      <button type="button" name="export-xls" class="btn btn-warning" onclick="tableToExcel('excel-table-sprofile', 'W3C Excel Table')"><i class="fa-sharp fa-solid fa-file-excel"></i>&nbsp Export File</button>
    </form>  
        <?php
        include_once '../../export.php';
        ?>
  </div>


  <table class="table table-striped table-sm" id="excel-table-sprofile">
    <thead>
      <tr>
      <th scope="col">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;"> First Name</font>
          </font>
        </th>
        <th scope="col">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;"> Last Name</font>
          </font>
        </th>
        <th scope="col">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Email</font>
          </font>
        </th>
        <th scope="col">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Course</font>
          </font>
        </th>
        <th scope="col">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Address</font>
          </font>
        </th>
        <th scope="col">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Contact Number</font>
          </font>
        </th>
        <th scope="col">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Birthdate</font>
          </font>
        </th>
        <th scope="col">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Sex</font>
          </font>
        </th>
        <th scope="col">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Actions  </font>
          </font>
        </th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (isset($_GET['search']) && !empty($_GET['search'])) {

        $search = $_GET['search'];

      } else {

        $search = 'default value';
        // ...
      }

      if ($search == 'default value') {
        $sql = "SELECT * FROM student_profile";
      } else {
        $sql = "SELECT * FROM student_profile WHERE CONCAT(firstname, lastname, email, course, address, contact_no, birthdate, sex) LIKE '%$search%' ORDER BY firstname, lastname, email, course, address, contact_no, birthdate, sex DESC";
      }
      $result = $conn->query($sql);

      if ($result ->num_rows > 0){
          while($row = $result -> fetch_assoc()){
              echo "<tr><td>" .
              $row["firstname"] . "</td><td>" .
              $row["lastname"] . "</td><td>" .
              $row["email"] . "</td><td>" .
              $row["course"] . "</td><td>" .
              $row["address"] . "</td><td>" .
              $row["contact_no"] . "</td><td>" .
              $row["birthdate"] . "</td><td>" .
              $row["sex"] . "</td>";
              
            

              echo "<td>";
              echo "<div class='btn-group'>";
              echo "<a class='btn btn-success' href='s.edit.php?id=" .$row['id'] ."'>Edit </a>";
              echo "<a class='btn btn-danger' href='s.delete.php?id=" .$row['id'] ."'>Delete </a>";
              echo "</div>";
              echo "</td>";

              echo "</tr>";



          }
      }
      else{
            
      }
      $conn->close();
      ?> 

    </tbody>
 </table>

</body>

</html>