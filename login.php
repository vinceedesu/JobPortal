<?php
    include 'connections.php';
    include 'sessions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'header-link.php'; ?>
    <link rel="stylesheet" href="assets/CSS/styles.css">
    <link rel="stylesheet" href="assets/CSS/loginBg.css">
    <title>Job Portal</title>
    
</head>

<body style="display: flex;">
  <section class="login_container">
    <div class="login_bg">
      <form method="post" class="login_form">
        <img src="assets/img/jobportal_logo3.png" class="login_icon"/>
        <span class="header_login">Welcome back! Good to see you again!</span>
        <label class="login_label" for="username">Username </label>  
        <input class="login_input" type="text" name="username" id="form2Example17"  />
        <label class="login_label" for="password">Password</label>
        <input class="login_input" type="password" id="form2Example27" name="password"  />
        <button class="login_button" type="submit" name="submit">Login</button>
        <p class="login_subtext">Don't have an account? <a href="signup.php">Register here!</a></p>
        <p class="login_subtext"><a href="admin/index.php">Click Here</a> To Login to your Admin Account</p>
      </form> 
      <?php
                      if(isset($_POST['submit'])){
                        $username = $_POST['username'];
                        $password = $_POST['password'];
          
                        $query = "SELECT * FROM users WHERE username = '$username'";
                        $result = mysqli_query($conn, $query);
                        if ($result->num_rows > 0) {
                          $row = mysqli_fetch_assoc($result);
                          if($row['username'] == $username && $row['password'] == $password){
                            $_SESSION['user_id']=$row['userID'];
                            $_SESSION['username']=$username;
                            $_SESSION['user_type']=$row['userType'];
                    
                            if($row['userType'] == 'Student'){
                              echo '<script>
                              window.location.href = "student/dashboard/index.php";
                            </script>';
                            }
                            else if($row['userType'] == 'Employer'){
                              echo '<script>
                              window.location.href = "employer/dashboard/index.php";
                            </script>';
                            }
                            else{
                              echo '<script>
                              window.location.href = "index.php";
                            </script>';
                            }
                          }
                        }else{
                          echo "<script>alert('Invalid Email or Password')</script>";
                        }
                        
                      }
                    ?>
    </div> 
  </section>
</body>
</body>
</html>