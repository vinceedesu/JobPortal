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
    <link rel="stylesheet" href="../assets/CSS/styles.css">

    <title>Company Register Form</title>
    <!-- Text area tag: disable default resize option -->
    <style>
    textarea {
    resize: none;
    }
    </style>

</head>
<body style="display: flex;">
    <section class="signup_container">
        <div class="signup_bg">
            <div class="signup_header">
                <img src="../assets/img/jobportal_logo3.png" class="header_icon"/>
            </div>

            <form class="signup_form" id=""action="" method="post" enctype="multipart/form-data">
                <span class="header_login">Company Registration</span>
                <span class="footer_text">Please fill out the form</span>
                <label class="signup_label" for="C.name"> Company Name: </label>
                <input type="text" name="name" placeholder="Enter company name" class="signup_input" required>
                <label class="signup_label" for="C.email">Contact Person:</label> 
                <input class="signup_input2" type="text" name="employer_name" placeholder="Enter employer name" required>
                <label class="signup_label" for="C.email">Company Email:</label> 
                <input class="signup_input2" type="text" name="email" placeholder="example@email.com" required>
                <label class="signup_label" for="C.ardress">Company Address:</label>  
                <input type="text" name="address" class="signup_input2" placeholder="somewhere" required>
                <label class="signup_label" for="C.contact_no">Company Contact No.:</label>      
                <input class="signup_input" type="tel" id="contact_no" name="contact_no" pattern="[0-9]{11}" placeholder="09XXXXXXXXX" required>
                <label class="signup_label" for="C.size">Company Size:</label>  
                <input type="number" name="size" placeholder="" class="signup_input" required>
                <label class="signup_label" for="C.logo">Company Logo:</label> 
                <input class="signup_input4" type="file" name="logo" accept="image/png, image/jpg, image/jpeg, image/PNG">
                <label class="signup_label" for="C.overview">Company Overview:</label>           
                <textarea id="overview" name="overview" rows="8" cols="40" class="form-control"></textarea>
                <div class="button_div">
                    <input type="reset"  class="btn btn-danger">
                    <input type="submit" name="submit" value="Submit"  class="btn btn-primary">        
                    
                </div>
            </form>

            <div class="signup_footer">
                <span class="footer_text"> Job Portal Solutions 2023 Grp. 2 & 3 <br> All Rights Reserved </span>
            </div>
        </div>
    </section>
            
            <?php
                    include('register.php');
                ?>
            </div>
        </div>
        </div>

    </div>
</body>
</html>