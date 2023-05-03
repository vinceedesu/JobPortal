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

        $adminID = $_GET['id'];
        $result = selectWhere($conn, 'admin_accounts', '*', 'id', $adminID);
        $row = mysqli_fetch_assoc($result);
    ?>

    <form method="POST">
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto mt-5">
                <div class="container-sm mb-5 mt-5 py-5 p-5 bg-light login-form">
                <form method="POST">
                <h2>Edit Account</h2><br>
                <div class="form-group">
                    <label for="name" class="fw-bold">Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>">
                </div>
                <div id="adminnametaken">
                </div>
                <br>
                <div class="form-group">
                    <label for="username" class="fw-bold">Username</label>
                    
                    <input type="text" class="form-control" name="username" value="<?php echo $row['username'];?>">
                </div>
                <div id="adminusertaken">
                </div>
                <br>
                <div class="form-group">
                <label for="email" class="fw-bold">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $row['email'];?>">
                </div>
                <div id="adminemailtaken">

                </div>
                <br>
                <div class="form-group">
                    <label for="admin_type" class="fw-bold">Admin Type: </label>
                    <select name="admin_type">
                        <?php
                            if($row['admin_type'] == 'Admin'){
                                echo "<option value='Admin' selected>Admin</option>";
                                echo "<option value='Superadmin'>Superadmin</option>";
                            }else{
                                echo "<option value='Admin'>Admin</option>";
                                echo "<option value='Superadmin' selected>Superadmin</option>";
                            }
                        ?>
                    </select>
                </div>
                <br><br>
                <input type="submit" class="btn btn-primary" name="updateAdmin" value="Update">
                <a class ="btn btn-danger" href="admin-accounts.php">Cancel</a>
                </div>
            </div>
        </div>
    </div>

        
        <?php
             

            if(isset($_POST['updateAdmin'])){
                $name = $_POST['name'];    
                $username = $_POST['username'];
                $email = $_POST['email']; 
                $admintype = $_POST['admin_type'];      
                $tablename="admin_accounts";
                $columnquery="*";
                
                
        
                $sql ="UPDATE admin_accounts
                    SET username='$username', name='$name', email='$email', admin_type='$admintype'
                    WHERE id = '$adminID'";
                    if (mysqli_query($conn, $sql)) {
                        echo "<script type='text/javascript'>alert('Admin Updated Successfully!') </script>";
                        
                        $actions = "Edited $username profile.";
                        include('../../to-log.php');
                        
                        echo "<script type='text/javascript'>window.location.href = 'admin-accounts.php';</script>";
        
                    } else {
                        echo "Error updating record: " . mysqli_error($conn);
                    }
                
            }
        ?>

    </form>

</body>
</html>