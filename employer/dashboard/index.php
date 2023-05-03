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
        <title>Home</title>
    </head>

<style>


.image-container1 {
    width: 300px; 
    height: 300px; 
    overflow: hidden; 
    float: left; 
    margin-right: 30px;
  }

  .image-container1 img {
    width: 100%; 
  }

.text-container1 {
  overflow: hidden;
}

.image-container2 {
    width: 300px; 
    height: 300px; 
    overflow: hidden; 
    float: right; 
    margin-left: 30px;
  }

  .image-container2 img {
    width: 100%; 
  }

.text-container2 {
  overflow: hidden;
  text-align: right;
}

.text1{
  font-size: 30px;
}

.text2{
  font-size: 20px;
  font-family: 'Signika', sans-serif;
}

.text3{
  font-size:30px;
}

.text4{
  font-size: 20px;
  font-family: 'Signika', sans-serif;
}

.image{
  border: 0.5px solid rgba(0, 0, 0, 0.408)
}

.container-fluid {
  background-color: #FFDD6C;
  
}

.list-unstyled a{
    color: black;
}
.list-unstyled a:hover{
    color: #800;
}

</style>


<body>
        <?php
            include('../navbar.php');
        ?>
<div>
  <img src="../../assets/img/employer-homepage/employer-banner1.jpg" alt="banner no. 1" width="100%">
</div>

<div>
  <img src="../../assets/img/employer-homepage/employer-banner2.jpg" alt="banner no. 2" width="100%">
</div>

<div class="container3">
  <div class="container mx-5 mt-5">
    <div class="row mx-5 mt-5">
      <div class="container1" style="padding-left: 100px;">
        <div class="image-container1" >
          <img src="../../assets/img/employer-homepage/bridge_employee.jpg" alt="image" class="image">
        </div>
          <div class="text-container1">
            <p class="text1" style="padding-right: 200px;">The bridge between employee and employer</p>
            <p class="text2" style="padding-right: 150px;">Giving employees and companies an easier way to connect in job hunting is essential for finding the best fit
               for both parties.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container3">
  <div class="container mx-5 mt-5">
    <div class="row mx-5 mt-5">
      <div class="col-12 mt-5">
        <div class="container2" style="padding-right: 130px;">
          <div class="image-container2">
            <img src="../../assets/img/employer-homepage/desire_help_employers.jpg" alt="image" class="image">
          </div>
            <div class="text-container2">
              <p class="text3" style="padding-left: 150px;">We help employers find their ideal employees!</p>
              <p class="text4" style="padding-left: 85px; margin-bottom:90px;">Job portal allow employers to target their job ads to specific demographics, such as location, education level, or work experience. 
              It offer tools to help employers track and manage applications, making it easier to identify candidates and stay organized.</p>
            </div>
          
        </div>
      </div>
    </div>
  </div>
</div>

<?php
    include('../footer.php');
    ?>
</body>     

</html>
