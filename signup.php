<?php
    include ('connections.php');
    include ('sessions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'header-link.php'; ?>
    <link rel="stylesheet" href="assets/CSS/styles.css">
    <title>Sign Up</title>
</head>

<body style="display: flex;">

<section class="signup_container">
      <div class="signup_bg">
        <div class="signup_header">
          <img src="assets/img/jobportal_logo3.png" class="header_icon"/>
        </div>

        <form class="signup_form" method="POST" enctype="multipart/form-data" onsubmit="">
          <span class="header_login">Sign Up</span>
          <label class="signup_label" for="username">Username </label>
          <input class="signup_input" type="text" name="username" placeholder="Enter username" required="">

          <div class="password_div">
            <div class="password_col">
              <label class="signup_label" for="password">Password</label>
              <input  class="signup_input3" type="password" name="password" placeholder="Enter password" >
            </div>
            <div class="password_col">
              <label  class="signup_label" for="Cpassword">Confirm Password</label>
              <input  class="signup_input3" type="password" name="password2" placeholder="Confirm password" >
            </div>
        </div>

          <label class="signup_label" for="email">Email</label>
          <input class="signup_input2" type="email" name="email" placeholder="Enter email">
          <label for="user_type" class="signup_label">Role</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="usertype" id="usertype" value ="Student">
            <label class="signup_label" for="student">Student
          </div>  
          <div class="form-check">  
            <input class="form-check-input" type="radio" name="usertype" id="usertype" value = "Employer">
            <label class="signup_label" for="employer">Employer
          </div>
          <button type="submit" class="signup_button" name="register">Sign Up</button>
          <p class="footer_text">Already have an account?<a href="login.php"> Log In</a></p>
        </form>

        <div class="signup_footer">
          <span class="footer_text"> Job Portal Solutions 2023 Grp. 2 & 3 <br> All Rights Reserved </span>
        </div>

      </div>

      <?php
            
            if(isset($_POST['register'])){
                $username = $_POST['username'];
                $password1 = $_POST['password']; 
                $password2 = $_POST['password2']; 
                $email = $_POST['email'];   
                $usertype = $_POST['usertype'];      
                $tablename="admin_accounts";
                $columnquery="*";
                

                            
                $result = selectWhere($conn, $tablename, $columnquery, 'username', $username);

                $eresult = selectWhere($conn, $tablename, $columnquery, 'email', $email);



                if ($result->num_rows > 0) {
 
                      echo "<script>
                      document.getElementById('usernameerrormsg').innerHTML = 'Username Taken.';
                    </script>";

                  } 
                  if ($eresult->num_rows > 0) {
    
                      echo "<script>
                      document.getElementById('emailerrormsg').innerHTML = 'Email Taken.';
                    </script>";
                  }
                  if($password1 != $password2){
                    echo "<script>
                      document.getElementById('passworderrormsg').innerHTML = 'Password does not match.';
                    </script>";
                  }

                  if ($result->num_rows <= 0 && $eresult->num_rows <= 0 && $password1 == $password2) {
                    $dataquery = "users(username,email,password,usertype)";
                    $valuequery="('$username','$email','$password1','$usertype')";

                    insertData($conn,$dataquery,$valuequery);
                    $_SESSION['username']=$username;
                    $_SESSION['user_type']=$usertype;
                    // echo "Account Created";
                    if($usertype == "Student"){
                      // header("Location: student.php");
                      echo '<script>
                        window.location.href = "student/student-register.php";
                      </script>';
                    }
                    else if($usertype == "Employer"){
                      echo '<script>
                        window.location.href = "employer/employer-register.php";
                      </script>';
                    }
                    else{
                      echo "Error";
                    }
                  }
            }
          
         
        ?>

</section>


</body>
</html>