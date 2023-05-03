<html>
<meta charset="UTF-8">
<?php
    include('../../header-link.php');
?>

<style>
  body {
    font-family: 'Hammersmith One', sans-serif;
    color:black;
  }
</style>

<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FFDD6C; font-size: 17px;">
        <div class="container-fluid">
          <a class="navbar-brand logo" href="../../index.php">
            <img src="../../assets/img/jobportal_logo2.png" width="275px" class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
          aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <ul class="navbar-nav mx-auto ">
            <li class="nav-item mx-3">

                <a class="nav-link fs-5 fw-bold " href="../dashboard/index.php">Home</a>
              </li>
              <li class="nav-item mx-3">
                <a class="nav-link fs-5 fw-bold " href="../profile/index.php">Profile</a>
              </li>
              <li class="nav-item mx-3">
                <a class="nav-link fs-5 fw-bold" href="../jobs/index.php">Jobs</a>
              </li>
              <li class="nav-item mx-3">
                <a class="nav-link fs-5 fw-bold" href="../candidates/candidates.php">Candidates</a>
              </li>
            </ul>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a class="nav-link fs-5 fw-bold" href="../../logout.php">Sign Out</a></li>
      </ul>
  </div>
</div>
</nav>
</body>
</html>
