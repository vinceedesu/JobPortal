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

    <title>Company Register Form</title>
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
                
                    <form id=""action="" method="post" enctype="multipart/form-data">
                    <h1>Company Registration</h1>
                    <p>Please fill out the form</p>
                    <hr>

                    <div class="form-group">
                    <label class="form-group" for="C.name"> Company Name: </label>
                        <input type="text" name="name" placeholder="Enter company name" class="form-control" required><br>
                    </div>

                    <div class="form-group">
                        <label class="form-group" for="C.email">Contact Person:</label> 
                        <input class="form-control" type="text" name="employer_name" placeholder="Enter employer name" required><br>
                    </div>  

                    <div class="form-group">
                        <label class="form-group" for="C.email">Company Email:</label> 
                        <input class="form-control" type="text" name="email" placeholder="example@email.com" required><br>
                    </div>   

                    <div class="form-group">
                        <label class="form-group" for="C.ardress">Company Address:</label>  
                        <input type="text" name="address" class="form-control" placeholder="somewhere" required><br>
                    </div>    
                    <div class="form-group">
                        <label class="form-group" for="C.contact_no">Company Contact No.:</label>  
                         
                        <input class="form-control" type="tel" id="contact_no" name="contact_no" pattern="[0-9]{11}" placeholder="09XXXXXXXXX" required><br>
                    </div>
                    <div class="form-group">

                        <label class="form-group" for="C.size">Company Size:</label>  
                        <input type="number" name="size" placeholder="" class="form-control" required><br>
                    </div>
                        <!-- Enable preview for image upload -->
                    
                    <div class="form-group">
                         
                        <label class="form-group" for="C.logo">Company Logo:</label> 
                        <input class="form-control-file" type="file" name="logo" accept="image/png, image/jpg, image/jpeg, image/PNG"><br>
                        <!-- Text Area: Compnay Overview -->
                    </div>

                    <div class="form-group">
                        <br>
                        <label class="form-group" for="C.overview">Company Overview:</label>  
                                
                        <textarea id="overview" name="overview" rows="8" cols="40" class="form-control"></textarea><br>
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