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

    <title>Edit Company Profile<</title>
</head>
<body>
    
<div id="PostJobCon" class="container-sm mt-5 py-5 p-5 bg-light login-form">
<form action="c.edit-conn.php" method="post">
<div class="col-md-12 text-center">
      <h1> Edit Company Profile </h1>
    </div> <br> <br>

    <?php
        $id = $_GET['company_id'];
        $result = selectData($conn, 'company_list', '*');
        $row = mysqli_fetch_assoc($result)
        
    ?>
   
    <div class="form-group">
        <label for="name" class="fw-bold">Company Name</label>
        <input type="text" class="form-control" name= "name" id="name" value= "<?php echo $row['name']; ?>">
    </div> <br>
    
    <div class="form-group">
        <label for="address" class="fw-bold">Company Address</label>
        <input type="text" class="form-control" name= "address" id="address" value= "<?php echo $row['address']; ?>">
    </div> <br>

    <div class="form-group">
        <label for="email" class="fw-bold">Email Address</label>
        <input type="text" class="form-control" name= "email" id="email" value= "<?php echo $row['email']; ?>">
    </div> <br>

    <div class="form-group">
        <label for="employer_name" class="fw-bold">Contact Person</label>
        <input type="text" class="form-control" name= "employer_name" id="employer_name" value= "<?php echo $row['employer_name']; ?>">
    </div> <br>

    <div class="form-group">
        <label for="contact_no" class="fw-bold">Contact Number</label>
        <input type="text" class="form-control" name= "contact_no" id="contact_no" value= "<?php echo $row['contact_no']; ?>">
    </div> <br>

    <div class="form-group">
        <label for="size" class="fw-bold">Company Size</label>
        <input type="text" class="form-control" name= "size" id="size" value= "<?php echo $row['size']; ?>">
    </div> <br>

    <div class="form-group">
        <label for="logo" class="fw-bold">Logo</label>
        <input type="text" class="form-control" name= "logo" id="logo" value= "<?php echo $row['logo']; ?>">
    </div> <br> <br>

    <button type="submit" class="btn btn-primary" name="update">Update</button>
    <a href="c.listing.php" class="btn btn-danger">Cancel</a>
</form>
    

</body>
</html>