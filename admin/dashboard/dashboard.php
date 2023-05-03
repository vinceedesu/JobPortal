<?php
    include('../../connections.php');
    // include('../sessions-admin.php')
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include('../../header-link.php'); ?>
        <title>Logs</title>
    </head>

    <body>
        <?php
            include('../admin-navbar.php');
        ?>
        
        <div class="container py-5">
    <div class="row justify-content-center">
    <h2 class="mb-4 pb-4" style="text-align: center;"></h2>
    <h2 class="mb-3 pb-3 fw-bold" style="text-align: left;">Logs</h2>

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
            </button>
          </form>
      </div>
    </div> <br>
    <form action="" method="post">  
      <button type="button" name="export-xls" class="btn btn-warning" onclick="tableToExcel('excel-table', 'W3C Excel Table')"><i class="fa-sharp fa-solid fa-file-excel"></i>&nbsp Export Table</button>
</form>  
<?php
include_once '../../export.php';
?>

  </div>


  <table class="table table-striped table-sm" id="excel-table">
    <thead>
      <tr>
      <th scope="col">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;"> ID</font>
          </font>
        </th>
        <th scope="col">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Company</font>
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

        <tbody>
            <?php
                $sql = "SELECT * FROM admin_logs";
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                      $company_id = $row['company_id'];
                      $sql = "SELECT * FROM company_list WHERE company_id = $company_id";
                      $result2 = mysqli_query($conn, $sql);
                      $row2 = mysqli_fetch_assoc($result2);

                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row2['name'] . "</td>";
                        echo "<td>" . $row['actions'] . "</td>";
                        echo "</tr>";
                    }
                }
            ?>
        </tbody>
    </table>

    </body>
</html>
