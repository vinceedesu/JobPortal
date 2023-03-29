<?php
    include '../../../connections.php';
    include('../sessions.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Dashboard</title>

    </head>

    <body>


    <?php
        include('../s-admin-navbar.php');
    ?>

            <div class="container py-5">
    <div class="row justify-content-center">
    <h2 class="mb-4 pb-4" style="text-align: center;"></h2>
    <h2 class="mb-3 pb-3 fw-bold" style="text-align: left;">Admin Logs</h2>
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
        <input type="search" name="search" id="search" class="form-control">
        <button type="submit" class="btn btn-primary">
              <i class="fas fa-search">Search</i>
            </button>
          </form>
      </div>
    </div> <br>
    <form action="s.admin_logs_pdf.php" method="post">  
      <input type="submit" name="generate_pdf" class="btn btn-success" value="Generate Report" />  
    </form>  

  </div>
  <br>

  <table class="table table-striped table-sm">
    <thead>
      <tr>
      <th scope="col">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">ID</font>
          </font>
        </th>
        <th scope="col">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Admin ID</font>
          </font>
        </th>

        <th scope="col">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Admin Type</font>
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
                <?php

                    $sql = "SELECT * FROM s_admin_logs";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                          $admin_id = $row['admin_id'];
                          $sql2 = "SELECT * FROM admin_accounts WHERE id = '$admin_id'";
                          $result2 = mysqli_query($conn, $sql2);
                          $row2 = mysqli_fetch_assoc($result2);


                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row2['username'] . "</td>";
                            echo "<td>" . $row['admin_type'] . "</td>";
                            echo "<td>" . $row['actions'] . "</td>";
                            echo "</tr>";
                        }
                    }

                ?>
            </tbody>
        </table>
        
    </body>

</html>