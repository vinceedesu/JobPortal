<?php
    include '../../connections.php';
    include('../sessions.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include('../../header-link.php'); ?>
        <link rel="stylesheet" href="../../assets/CSS/styles.css">
        
        <title>Home</title>

    </head>

    <body>

        <?php
        
            include('../navbar.php');
        
        ?>

<div class="">
    <img src="../../assets\img\student-hompage\opportunity awaits poster.png"height="725px" width="100%"> 
    <div class="bg"></div>
    <div class="row">
      <div class="col-12 text-center">
        <img src="../../assets\img\student-hompage\image for landing page website.png" alt="" width="100%">
      </div>
    </div>
  </div>

  <div class="container mx-5 mt-5">
    <div class="row mx-5 mt-5">
      <div class="col text-center">
        <img src="../../assets\img\student-hompage\bridge_employee.jpg" alt="img" style="border: 0.5px solid rgba(0, 0, 0, 0.408); " width="400px" height="400px">
      </div>
      <div class="col">
        <p class=" fw-bolder fs-1">The Bridge between employee and employer.</p>
        <h4>Giving employees and companies an easier way to connect in job hunting is essential for finding the best fit for both parties. </h4>
       
      </div>
    </div>
  </div>

  <div class="container mx-5 mt-5">
    <div class="row mx-5 mt-5">
      <div class="col-6 mt-5">
        <p class="fw-bolder fs-1">We desire to help students start their career right!</p>
        <h4>Students can find exciting opportunities to kickstart their career paths. As a student, finding the right job can be a daunting task, we can make it easy to explore a range of options and connect with potential employers.</h4>
       
      </div>
      <div class="col-6 text-center mt-5">
        <img src="../../assets\img\student-hompage\desire_help_students.jpg" alt="img" style="border: 0.5px solid rgba(0, 0, 0, 0.408); " width="100%" height="400px">
      </div> 
    </div>
  </div>
    <?php
        include('../footer.php');
    ?>

        
    </body>

</html>