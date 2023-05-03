<?php

include('../../../connections.php');
include('../sessions.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include('../../../header-link.php'); ?>
        <link rel="stylesheet" href="../../../assets/CSS/styles.css">
        <title>Admin Accounts</title>

    </head>
    <body>

    <?php
        include('../s-admin-navbar.php');

        

        //table sort
        if(isset($_GET['order'])){
          $order = $_GET['order'];
        }
        else{
          $order = 'username';
        }

        if(isset($_GET['sort'])){
          $sort = $_GET['sort'];
        }
        else{
          $sort='ASC';
        }

        $order_by = $order . ' ' . $sort;
            
    ?>
        
    <div class="container py-5">
    <div class="row justify-content-center">
    <h2 class="mb-4 pb-4" style="text-align: center;"></h2>
    <h2 class="mb-2 fw-bold" style="text-align: left;">Admin Accounts</h2>
    <div class="mb-5">
    <a href="add-admin.php" class="btn btn-primary" role="button">Add Admin Account</a>
    </div>
    <div class="row mb-3 pb-3">
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
      <!-- search bar -->
      <div class="col">
      <form class="form-inline"  method="GET">
                <div class="input-group">
                    <input type="search" name="search" id="search" class="form-control" placeholder="Search here.." />
                    <div class="input-group-append">
                       <button type="submit" class="btn btn-primary">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                       <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                        </button>
                    </div>
                </div>    
                      
                </form>
      </div>
      


      <?php 
      if (isset($_GET['search'])) {

        $search = $_GET['search'];

      } 
      else {

        $search = 'default value';

      }

      //output all data

      if($search == 'default value'){
        $result = sortData($conn,"admin_accounts","*",$order_by);
        $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';
      }
      else{
        $sql = "SELECT * FROM admin_accounts WHERE CONCAT(username, name, email, admin_type) LIKE '$search%' ORDER BY username, name, email, admin_type DESC";
        $result = $conn->query($sql);
      }
      $resultCheck = mysqli_num_rows($result);
     
      ?>
    </div>

  </div>

  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">
          <a href="?order=username&&sort=<?php echo $sort; ?>" class="cheese">
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;">User Name</font>
            </font>
          </a>
        </th>
        <th scope="col">
        <a href="?order=name&&sort=<?php echo $sort; ?>" class="cheese">
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;">Name</font>
            </font>
          </a>
        </th>
        <th scope="col">
        <a href="?order=email&&sort=<?php echo $sort; ?>" class="cheese">
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;">Email</font>
            </font>
          </a>
        </th>
        <th scope="col">
        <a href="?order=admin_type&&sort=<?php echo $sort; ?>" class="cheese">
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;">Admin</font>
            </font>
          </a>
        </th>
        <th scope="col">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Actions</font>
          </font>
        </th>
      </tr>
    </thead>

            <?php
                 if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>

                        <td>" . $row['username'] . "</td>
                        <td>" . $row['name'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>" . $row['admin_type'] . "</td>";
                        
                        echo "<td>";
                        echo "<div class='btn-group'>";
                        echo "<a class='btn btn-success' href='edit-admin.php?id=" . $row['id'] ."'>Edit</a>";
                        echo "<a class='btn btn-danger' href='delete-admin.php?id=" . $row['id'] ."'>Delete</a>";
                        echo "</div>";
                        echo "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>

        </table>

    </body>
</html>