<?php
    include('../../connections.php');
    include('../sessions.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/style.css"></link>
        <title>Edit Company Profile</title>
        <style>
    textarea {
    resize: none;
    }
    </style>

    </head>


    <body>
        <?php
            include('../navbar.php');
        ?>
        <br><br>
        <div class="container">
            <div class="col-8 mx-auto mt-3">
                <div id="LogInCon" class="container-sm mt-5 py-5 p-5 bg-light login-form">
                    <h1 class='text-center'> <strong> Edit Company Profile </strong></h1>
                </div>
            </div>

            
            <form method="post" enctype="multipart/form-data">
                    <?php
                    $company_id = $_SESSION['company_id'];
                    $sql = "SELECT * FROM company_list WHERE company_id = '$company_id'";
                    $result = $conn->query($sql);
                    ?>

                <div class="container-fluid mr-8 pb-4 shadow rounded">
                <div class="col-8 mx-auto mt-5">
                    <div class="row">
                    
                        <div class="col-12 mx-auto text-center mt-3" style="height: 150px;">
                        <?php
                        $logo = $row['logo'];
                        if ($logo == NULL) {
                        
                            echo "<img src='../../assets/img/UI/no-profile.png' class='img-fluid rounded-circle' alt='profile picture' style='height: 150px; width: 150px;'>";
                        } else {
                            echo "<img src='../../assets/img/employer-profile/$logo' class='img-fluid rounded-circle' alt='profile picture' style='height: 150px; width: 150px;'>";
                        }
                        ?>
                        </div>
                </div>

                    <h2> Information </h2>
                    <hr style="border-top: 5px solid black;">

                    <div class="form-group">
                    <label class="form-group" for="name"> Company Name: </label>
                        <input type="text" name="name" placeholder="<?php echo $row['name']?>" value="<?php echo $row['name']?>" class="form-control" ><br>
                    </div>

                    <div class="form-group">
                        <label class="form-group" for="email">Contact Person:</label> 
                        <input class="form-control" type="text" name="employer_name" placeholder="<?php echo $row['employer_name']?>" value="<?php echo $row['employer_name']?>"><br>
                    </div>  

                    <div class="form-group">
                        <label class="form-group" for="email">Company Email:</label> 
                        <input class="form-control" type="text" name="email" placeholder="<?php echo $row['email']?>" value="<?php echo $row['email']?>"><br>
                    </div>   

                    <div class="form-group">
                        <label class="form-group" for="adrress">Company Address:</label>  
                        <input type="text" name="address" class="form-control" placeholder="<?php echo $row['address']?>" value="<?php echo $row['address']?>"><br>
                    </div>    
                    <div class="form-group">
                        <label class="form-group" for="contact_no">Company Contact No.:</label>  
                         
                        <input class="form-control" type="tel" id="contact_no" name="contact_no" pattern="[0-9]{11}" placeholder="<?php echo $row['contact_no']?>" value="<?php echo $row['contact_no']?>"><br>
                    </div>
                    <div class="form-group">

                        <label class="form-group" for="size">Company Size:</label>  
                        <input type="number" name="size" class="form-control" placeholder="<?php echo $row['size']?>" value="<?php echo $row['size']?>"><br>
                    </div> <br>

                    <h2> About the Company </h2>
                    <hr style="border-top: 5px solid black;">
                        

                    <div class="form-group">
                        <br>
                        <label class="form-group" for="overview">Company Overview:</label>  
                                
                        <textarea id="overview" name="overview" rows="8" cols="40" class="form-control" placeholder="<?php echo $row['overview']?>" value="<?php echo $row['overview']?>"></textarea><br>
                    </div> 

                    <br> <br>
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                
                    <a href="index.php" class="btn btn-danger">Cancel</a> 
                    </div>
            </form>

                    <?php include 'c.edit-conn.php'; ?>
                </div>
            </div> 
            </div>
        </div>
    </div> 
</div>
                   
    </body> <br> <br>
    
</html>