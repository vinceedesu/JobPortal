<?php
    include ('../../connections.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../../header-link.php'); ?>
    <?php
        include('../admin-navbar.php');
    ?>
    <title>Edit User</title>
</head>
<body>
    <div id="PostJobCon" class="container-sm mt-5 py-5 p-5 bg-light login-form">
    <form action="" method="post">
    <div class="col-md-12 text-center">
      <h1> Edit User Listing </h1>
    </div> <br> <br>
        
            <?php
                $id = $_GET['userID'];
                $sql = "SELECT * FROM users WHERE userID = '$id'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                include ('u.edit-conn.php');
            ?>
            
            
            <div class="form-group">
                <label for="username    " class= "form-label mb-2 fw-bold">Username</label>
                <input type="text" class="form-control" name= "username" id="username" value= "<?php echo $row['username']; ?>">
            </div>
            <br>

            <div class="form-group">
                <label for="email" class= "form-label mb-2 fw-bold">Email</label>
                <input type="text" class="form-control" name= "email" id="email" value= "<?php echo $row['email']; ?>">
            </div><br>

     

            
            <div class="form-group">
                <label for="password" class= "form-label mb-2 fw-bold">Password</label>
                <input type="text" class="form-control" name= "password" id="password" value= "<?php echo $row['password']; ?>">
            </div>

            <br>
            
            <div class="form-group">
            <label for="userType" class= "form-label mb-2 fw-bold">User Type</label> <br> 
            <select id="userType" name="userType">
            <?php
                if($row['userType'] == 'Student'){
                    echo "<option value='Student' selected> Student </option>";
                    echo "<option value='Employer'> Employer </option>";
                    } else {
                        echo "<option value='Student'> Student </option>";
                        echo "<option value='Employer' selected> Employer </option>";
                    }


            ?>
            </select> 
                </div> <br> <br>
      

            <button type="submit" class="btn btn-primary" name="edit">Update</button>
            <a href="u.listing.php" class="btn btn-danger">Cancel</a>
            </div>
    </form>
</body>
</html>
