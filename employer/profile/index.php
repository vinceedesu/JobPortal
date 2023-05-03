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
        <title>Company Profile</title>
    </head>

    <body>
        <?php
            include('../navbar.php');
        ?>
        
        <div class="container mt-5">
    <div class="col-8 mx-auto mt-3">
                <div id="LogInCon" class="container-sm mt-5 py-5 p-5 bg-light login-form">
                    <h1 class='text-center'> <strong> Company Profile </strong></h1>
                </div>
            </div>

    <?php
    $company_id = $_SESSION['company_id'];
    $sql = "SELECT * FROM company_list WHERE company_id = '$company_id'";
    $result = $conn->query($sql);
    
    // Check if there is any data
    if ($result->num_rows > 0) {
        // Output the company profile data
        while($row = $result->fetch_assoc()) {
    ?>
    <div class="row mb-5">
        <div class="col-15 ">
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
                    <div class="col d-flex flex-row-reverse">
                        <a href="company-edit-profile.php" class="btn btn-danger">Edit Profile</a>
                    </div>
                    <div class="col-12 mt-3">
                        <p class="text-left fs-1" name="name"><?php echo $row["name"]; ?></p> <br> <br>
                    </div> 

                        <h2> Information </h2>
                        <hr style="border-top: 5px solid black;">
                    </div>
                    <div class="col-12 mt-3">
                        <p class="text-left fs-5">Employer Name</p>
                        <h6 text-left fs-3><?php echo $row["employer_name"]; ?></h6>
                    </div>
                    <div class="col-12 mt-3">
                        <p class="text-left fs-5">Company Email</p>
                        <h6 text-left fs-3><?php echo $row["email"]; ?></h6>
                    </div>
                    <div class="col-12 mt-3">
                        <p class="text-left fs-5">Address</p>
                        <h6 text-left fs-3><?php echo $row["address"]; ?></h6>
                    </div>
                    <div class="col-12 mt-3">
                        <p class="text-left fs-5">Contact Number</p>
                        <h6 text-left fs-3><?php echo $row["contact_no"]; ?></h6>
                    </div>
                    <div class="col-12 mt-3">
                        <p class="text-left fs-5">Company Size</p>
                        <h6 text-left fs-3><?php echo $row["size"]; ?></h6> <br> <br>
                    </div>
                    <h2> About the Company </h2>
                    <hr style="border-top: 5px solid black;">
                    
                    <div class="col-12 mt-3">
                        <p class="text-left fs-5">Company Overview</p>
                        <h6 text-left fs-3><?php echo $row["overview"]; ?></h6>
                    </div>
                    <br>
                </div>
                <br>
                <br>
            </div>
            <br>
                <br>
        </div>
    </div>
    <?php
        }
    } else {
        echo "0 results";
    }
    
    $conn->close();
    ?>

    </body>
    
</html>
