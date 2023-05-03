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

    <title>Company Listing</title>
</head>
<body>



    <html lang="en">
    <?php
        include('../admin-navbar.php');
    ?>

    <div class="container py-5">
    <div class="row justify-content-center">
    <h2 class="mb-4 pb-4" style="text-align: center;"></h2>
    <h2 class="mb-3 pb-3 fw-bold" style="text-align: left;">Company List</h2>

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
          </form> <br> 
      </div>
      <form action="" method="post">  
      <button type="button" name="export-xls" class="btn btn-warning" onclick="tableToExcel('excel-table-clist', 'W3C Excel Table')"><i class="fa-sharp fa-solid fa-file-excel"></i>&nbsp Export Table</button>
    </form>  
        <?php
        include_once '../../export.php';
        ?>
  </div>


  <table class="table table-striped table-sm" id="excel-table-clist">
    <thead>
      <tr>
        <th scope="col">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Company Name</font>
          </font>
        </th>
        <th scope="col">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Address</font>
          </font>
        </th>
        <th scope="col">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Email Address</font>
          </font>
        </th>
        <th scope="col">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Employer Name</font>
          </font>
        </th>
        <th scope="col">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Contact Number</font>
          </font>
        </th>
        <th scope="col">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Company Size</font>
          </font>
        </th>
        <th scope="col">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Logo</font>
          </font>
        </th>
        <th scope="col">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Actions</font>
          </font>
        </th>
      </tr>
    </thead>

    <tbody>
      <!-- <tr>
        <td>
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">BPI</font>
          </font>
        </td>
        <td>
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Manila</font>
          </font>
        </td>
        <td>
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">@gmail</font>
          </font>
        </td>
        <td>
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">09123456789</font>
          </font>
        </td>
        <td>
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Juan Dela Cruz</font>
          </font>
        </td>
        <td>
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">old</font>
          </font>
        </td>
        <td>
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">.jpg</font>
          </font>
        </td>
        <td>
          <font style='vertical-align: inherit;'>
            <input style='vertical-align: inherit;' class='btn btn-primary btn-sm' type='submit' value='Edit' />
            <input style='vertical-align: inherit;' class='btn btn-danger btn-sm mr-5' type='submit' value='Delete' />
          </font>
        </td>
      </tr> -->

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
  $sql = "SELECT *FROM company_list";
} else {
  $sql = "SELECT * FROM company_list WHERE CONCAT(name, employer_name, email, address) LIKE '%$search%' ORDER BY name, employer_name, email, address DESC";
}
$all_company = mysqli_query($conn, $sql);
    

    if ($all_company ->num_rows > 0) {
      while ($row = mysqli_fetch_assoc($all_company)) {
          echo "<tr>
          <td><font style='vertical-align: inherit;'>
              <font style='vertical-align: inherit;'>". $row['name'] . "</font>
              </font></td
              ><td><font style='vertical-align: inherit;'>
              <font style='vertical-align: inherit;'>". $row['address'] . "</font>
              </font></td
              ><td><font style='vertical-align: inherit;'>
              <font style='vertical-align: inherit;'>". $row['email'] . "</font>
              </font></td
              ><td><font style='vertical-align: inherit;'>
              <font style='vertical-align: inherit;'>". $row['employer_name'] . "</font>
              </font></td
              ><td><font style='vertical-align: inherit;'>
              <font style='vertical-align: inherit;'>" . $row['contact_no'] . "</font>
              </font></td
              ><td><font style='vertical-align: inherit;'>
              <font style='vertical-align: inherit;'>". $row['size'] . "</font>
              </font></td
              ><td><font style='vertical-align: inherit;'>
              <font style='vertical-align: inherit;'>" . $row['logo'] . "</font>
              </font></td>
              ";
              echo "<td>";
              echo "<div class='btn-group'>";
              echo "<a class='btn btn-success' href='c.edit.php?company_id=". $row['company_id']."'> Edit </a>";
              echo "<a class='btn btn-danger' href='c.delete.php?company_id=". $row['company_id']."'>Delete </a>";
              echo "</div>";
              echo "</td>";
              echo "</tr>";
      }
  }

    
    ?>
      

    </tbody>
  </table>
</div>

    <!-- <table>

        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Logo</th>
                <th>Company Size</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table> -->

</body>
</html>