<?php
    include '../connections.php';    
    include 'sessions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../header-link.php'; ?>

    <title>Admin Portal</title>
</head>
<body>

<section class="vh-100 d-flex justify-content-center align-items-center">
      <div class="container py-5 pt-1 h-100 ">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-xl-10 ">
            <div class="card" style="border-radius: 1.5rem;">
              <div class="row g-0">
                <div class="col-md-12 col-lg-12 px-5 d-flex align-items-center">
                  <div class="card-body p-4 text-black">
    
                <form action="index.php" method="post">
                    <h1>Admin Portal</h1>
                    <br>
                    <div class=form-group>
                        <label class = "form-label fw-bold"for="username">Username</label>
                        <br>
                        <input class="form-control" type="text" name="username" placeholder="Enter username">
                    </div>
                    <br>
                    <div class=form-group>
                    
                        <label class="form-label fw-bold" for="password">Password</label>
                        <br>
                        <input class="form-control" type="password" name="password" placeholder="Enter password">
                    </div>
                    <br>
                    <input class="btn btn-primary" type="submit" name="login" value="Sign In">
            
            <?php
                
                if(isset($_POST['login'])){
                    $username = $_POST['username'];
                    $password = $_POST['password'];    
                    $tablename="admin_accounts";
                    $columnquery="*";
                    
                    $result = selectWhere($conn, $tablename, $columnquery, 'username', $username);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $_SESSION['username']=$username;
                            $_SESSION['admin_type']=$row['admin_type'];
                            
                            if($row['admin_type']=='Superadmin'){
                                header('Location: s-admin\dashboard\dashboard.php');
                            }else{
                                header('Location: dashboard\dashboard.php');
                            }
                        }
                    } else {
                        echo "No account existing.";
                    }
                }
            ?>

            </form>
            </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</body>

</html>