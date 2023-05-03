<?php
    include '../connections.php';

    $username=$_SESSION['username'];
    $result = selectWhere($conn, 'users', '*', 'username', "$username");
    $row = $result->fetch_assoc();
    $_SESSION['user_id']=$row['userID'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../header-link.php' ?>
    <link rel="stylesheet" href="assets/css/style.css"></link>

    <title>Student Register Form</title>
    <!-- Text area tag: disable default resize option -->
    <style>
    textarea {
    resize: none;
    }
    </style>

</head>
<body>
    <div>

        <div class="container">
            <div class="col-8 mx-auto mt-5">
            <div id="LogInCon" class="container-sm mt-5 py-5 p-5 bg-light login-form">
                
                    <form id="" method="post" enctype="multipart/form-data">
                    <h1>Student Registration</h1>
                    <p>Please fill out the form</p>
                    <hr>

                    <div class="form-group">
                    <label class="form-group" for="S.name"> First Name: </label>
                        <input type="text" name="firstname" placeholder="Enter first name" class="form-control" required><br>
                    </div>
                    <div class="form-group">
                    <label class="form-group" for="S.name"> Last Name: </label>
                        <input type="text" name="lastname" placeholder="Enter last name" class="form-control" required><br>
                    </div>

                    <div class="form-group">
                        <label class="form-group" for="S.email">Email:</label> 
                        <input class="form-control" type="text" name="email" placeholder="example@email.com" required><br>
                    </div> 
                    <div class="form-group">
        <label for="course">Program:</label> <br>
        <select id="course" name="course">
            <option value="none"> Choose Course  </option>
            <option value="Computer Engineering"> Computer Engineering  </option>
            <option value="Civil Engineering"> Civil Engineering  </option>
            <option value="Electrical Engineering"> Electrical Engineering  </option>
            <option value="Electronics & Communications Engineering"> Electronics & Communications Engineering </option>
            <option value="Industrial Engineering"> Industrial Engineering </option>
            <option value="Mechanical Engineering"> Mechanical Engineering </option>
            <option value="Railway Engineering"> Railway Engineering </option>
            
        </select>
      </div> <br>

                    <div class="form-group">
                        <label class="form-group" for="S.adress">Address:</label>  
                        <input type="text" name="address" class="form-control" placeholder="somewhere" required><br>
                    </div>    
                    <div class="form-group">
                        <label class="form-group" for="S.contact_no">Phone No.:</label>  
                         
                        <input class="form-control" type="tel" id="contact_no" name="contact_no" pattern="[0-9]{11}" placeholder="09XXXXXXXXX" required><br>
                    </div>
                    <div class="form-group">
                         
                         <label class="form-group" for="S.logo">Upload Profile:</label> <br>
                         <input class="form-control-file" type="file" name="p_img" accept="image/png, image/jpg, image/jpeg, image/PNG"><br>
                         <!-- Text Area: Compnay Overview -->
                     </div><br>
                     <div class="form-group">
        <label for="course">Sex:</label> <br>
        <select id="sex" name="sex">
            <option value="none"> Select Sex </option>
            <option value="Male"> Male  </option>
            <option value="Female"> Female  </option>
            
        </select>
      </div> <br>
                        <!-- Enable preview for image upload -->
                    
                    <!-- <div class="form-group">
                         
                        <label class="form-group" for="C.logo">Profile Picture:</label> 
                        <input class="form-control-file" type="file" name="logo" accept="image/png, image/jpg, image/jpeg, image/PNG"><br> -->
                        <!-- Text Area: Compnay Overview -->
                    <!-- </div> -->
                    <div class="form-group">
                        <br>
                        <label for="birthday">Birthdate:</label>
                <input type="date" id="birthday" name="birthdate"><br>
                    </div>    

                    <div class="form-group">
                        <br>
                        <label class="form-group" for="S.bio">Bio:</label>  
                                
                        <textarea id="bio" name="bio" rows="8" cols="40" class="form-control"></textarea><br>
                    </div>                

                <input type="submit" name="submit" value="Submit"  class="btn btn-primary">
                    
                    <input type="reset"  class="btn btn-danger"><br>
                </form>
                <?php
                    include('register.php');
                ?>
            </div>
        </div>
        </div>

    </div>
</body>
</html>