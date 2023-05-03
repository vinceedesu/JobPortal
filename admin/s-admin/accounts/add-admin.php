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
    <?php include('../../../header-link.php'); ?>
    <title>Add Admin</title>
</head>

<body>
<?php
        include('../s-admin-navbar.php');
    ?>

    <form method="POST">
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto mt-5">
                <div class="container-sm mb-5 mt-5 py-5 p-5 bg-light login-form">
                <form method="POST">
                <h2>Add Admin</h2><br>
                <div class="form-group">
                    <label class=fw-bold>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name">
                </div>
                <br>
                <div class="form-group">
                    
                    <label class=fw-bold>Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>
                <br>
                <div class="form-group">
                    
                    <label class=fw-bold>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <br>
                <div class="form-group">
                    
                    <label class=fw-bold>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <br>
                <div class="form-group">
                    
                    <label class=fw-bold>Confirm Password</label>
                    <input type="password" class="form-control" name="password2" placeholder="Confirm Password">
                </div>
                <br>
                <div class="form-group">
                    <label class="fw-bold">Admin Type: </label>
                    <select name="admin_type" >
                        <option value="Admin">Admin</option>
                        <option value="Superadmin">Superadmin</option>
                    </select>
                </div>
                <br><br>
                <input type="submit" class="btn btn-primary" name="register" value="Sign Up">
                <a href="admin-accounts.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </div>
    </div>
        
        <?php
            
            if(isset($_POST['register'])){
                $name = $_POST['name'];    
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password']; 
                $admintype = $_POST['admin_type'];      
                $tablename="admin_accounts";
                $columnquery="*";
                
                $result = selectWhere($conn, $tablename, $columnquery, 'username', $username);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "Account Exist";
                    }
                  } else {

                    // Insert Data
                    $dataquery = "admin_accounts(username,name,email,password,admin_type)";
                    $valuequery="('$username','$name','$email','$password','$admintype')";
                    insertData($conn,$dataquery,$valuequery);

                    $actions = "Added $username as $admintype.";
                    include('../../to-log.php');

                    header('Location: admin-accounts.php');
                  }
            }
        ?>

    </form>

</body>
</html>