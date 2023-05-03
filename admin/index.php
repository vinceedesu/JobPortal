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
    <link rel="stylesheet" href="../assets/CSS/styles.css">
    <link rel="stylesheet" href="../assets/CSS/loginBg.css">
    <title>Admin Portal</title>
</head>
<body style="display: flex;">

<section class="login_container">
  <div class="login_bg">
    <form class="admin_index_form" action="index.php" method="post">
      <img src="../assets/img/jobportal_logo3.png" class="login_icon"/>
      <span class="header_login">Admin Portal</span>
      <label class = "login_label"for="username">Username</label>
      <input class="login_input" type="text" name="username" placeholder="Enter username">
      <label class="login_label" for="password">Password</label>
      <input class="login_input" type="password" name="password" placeholder="Enter password">
      <input class="login_button" type="submit" name="login" value="Sign In">
    </form>
  </div>
      
              
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
                            $_SESSION['admin_id']=$row['id'];
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