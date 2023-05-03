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

    <title>Edit Student Profile</title>
</head>
<body>

<div id="PostJobCon" class="container-sm mt-5 py-5 p-5 bg-light login-form">
<form action="s.edit-conn.php" method="post">

    <?php
        $id = $_GET['id'];
        $result = selectData($conn, 'student_profile', '*');
        $row = mysqli_fetch_assoc($result)
        
    ?>
    <div class="col-md-12 text-center">
      <h1> Edit Student Profile </h1>
    </div> <br>

    <div class="form-group">
        <label for="name" class="fw-bold">First Name</label>
        <input type="text" class="form-control" name= "firstname" id="firstname" value= "<?php echo $row['firstname']; ?>">
    </div> <br>
    
    <div class="form-group">
        <label for="address" class="fw-bold">Last Name</label>
        <input type="text" class="form-control" name= "lastname" id="lastname" value= "<?php echo $row['lastname']; ?>">
    </div> <br>

    <div class="form-group">
        <label for="email" class="fw-bold">Email</label>
        <input type="text" class="form-control" name= "email" id="email" value= "<?php echo $row['email']; ?>">
    </div> <br>

    <div class="form-group">
    <label class="signup_label" for="course">Program:</label> 
                <select class="select_dropdown" id="course" name="course" value= "<?php echo $row['course']; ?>">
                    <option value=""> Choose Course </option>
                    <optgroup label="College of Accountancy and Finance (CAF)">
                    <option value="Accountancy"> Bachelor of Science in Accountancy (BSA)  </option>
                    <option value="Management Accounting"> Bachelor of Science in Management Accounting (BSMA)  </option>
                    <option value="Business Administration"> Bachelor of Science in Business Administration Major in Financial Management (BSBAFM) </option>
            
                    <optgroup label="College of Architecture, Design and the Built Environment ">
                    <option value="Architecture">Bachelor of Science in Architecture (BS-ARCH) </option>
                    <option value="Interior Design">Bachelor of Science in Interior Design (BSID) </option>
                    <option value="Environmental Planning">Bachelor of Science in Environmental Planning (BSEP) </option>

                    <optgroup label="College of Business Administration (CBA)">
                    <option value="Business Administration Doctor">Doctor in Business Administration (DBA)</option>
                    <option value="Business Administration Master">Master in Business Administration (MBA) </option>
                    <option value="Human Resource Management">Bachelor of Science in Business Administration major in Human Resource Management (BSBAHRM)</option>
                    <option value="Marketing Management">Bachelor of Science in Business Administration major in Marketing Management (BSBA-MM) </option>
                    <option value="Entrepreneurship">Bachelor of Science in Entrepreneurship (BSENTREP) </option>
                    <option value="Office Administration"> Bachelor of Science in Office Administration (BSOA) </option>

                    <optgroup label="College of Communication (COC)">
                    <option value="Advertising and Public Relations">Bachelor in Advertising and Public Relations (BADPR) </option>
                    <option value="Broadcasting">Bachelor of Arts in Broadcasting (BA Broadcasting) </option>
                    <option value="Communication Research">Bachelor of Arts in Communication Research (BACR) </option>
                    <option value="Journalism">Bachelor of Arts in Journalism (BAJ) </option>

                    <optgroup label="College of Computer and Information Sciences (CCIS)">
                    <option value="Computer Science">Bachelor of Science in Computer Science (BSCS) </option>
                    <option value="Information Technology">Bachelor of Science in Information Technology (BSIT) </option>

                    <optgroup label="College of Education (COED)">
                    <option value="Home Economics">Bachelor of Technology and Livelihood Education (BTLEd) major in Home Economics </option>
                    <option value="Industrial Arts">Bachelor of Technology and Livelihood Education (BTLEd) major in Industrial Arts</option>
                    <option value="Information and Communication Technology">Bachelor of Technology and Livelihood Education (BTLEd) major in Information and Communication Technology </option>
                    <option value="Information Science">Bachelor of Library and Information Science (BLIS) </option>
                    <option value="English">Bachelor of Secondary Education (BSEd) major in English</option>
                    <option value="Mathematics">Bachelor of Secondary Education (BSEd) major in Mathematics</option>
                    <option value="Science">Bachelor of Secondary Education (BSEd) major in Science</option>
                    <option value="Filipino">Bachelor of Secondary Education (BSEd) major in Filipino</option>
                    <option value="Social Studies">Bachelor of Secondary Education (BSEd) major in Social Studies</option>
                    <option value="Elementary Education"> Bachelor of Elementary Education (BEEd)</option>
                    <option value="Early Childhood Education">Bachelor of Early Childhood Education (BECEd) </option>

                    <optgroup label="College of Engineering (CE)">
                    <option value="Civil Engineering">Bachelor of Science in Civil Engineering (BSCE)</option>
                    <option value="Computer Engineering">Bachelor of Science in Computer Engineering (BSCpE) </option>
                    <option value="Electrical Engineering">Bachelor of Science in Electrical Engineering (BSEE) </option>
                    <option value="Electronics Engineering">Bachelor of Science in Electronics Engineering (BSECE) </option>
                    <option value="Industrial Engineering">Bachelor of Science in Industrial Engineering (BSIE) </option>
                    <option value="Mechanical Engineering">Bachelor of Science in Mechanical Engineering (BSME) </option>
                    <option value="Railway Engineering">Bachelor of Science in Railway Engineering (BSRE) </option>

                    <optgroup label="College of Human Kinetics (CHK)">
                    <option value="Physical Education">Bachelor of Physical Education (BPE) </option>
                    <option value="Exercises and Sports">Bachelor of Science in Exercises and Sports (BSESS) </option>

                    <optgroup label="College of Political Science and Public Administration (CPSPA)">
                    <option value="Public Administration">Bachelor of Public Administration (BPA) </option>
                    <option value="International Studies">Bachelor of Arts in International Studies (BAIS) </option>
                    <option value="Political Economy">Bachelor of Arts in Political Economy (BAPE) </option>
                    <option value="Political Science">Bachelor of Arts in Political Science (BAPS) </option>
                                        
                    <optgroup label="College of Social Sciences and Development (CSSD)">
                    <option value="History">Bachelor of Arts in History (BAH) </option>
                    <option value="Sociology">Bachelor of Arts in Sociology (BAS) </option>
                    <option value="Cooperatives">Bachelor of Science in Cooperatives (BSC) </option>
                    <option value="Economics">Bachelor of Science in Economics (BSE) </option>
                    <option value="Psychology">Bachelor of Science in Psychology (BSPSY) </option>

                    <optgroup label="College of Science (CS)">
                    <option value="Food Technology">Bachelor of Science Food Technology (BSFT) </option>
                    <option value="Applied Mathematics">Bachelor of Science in Applied Mathematics (BSAPMATH) </option>
                    <option value="Biology">Bachelor of Science in Biology (BSBIO) </option>
                    <option value="Chemistry">Bachelor of Science in Chemistry (BSCHEM) </option>
                    <option value="Mathematics">Bachelor of Science in Mathematics (BSMATH) </option>
                    <option value="Nutrition and Dietetics ">Bachelor of Science in Nutrition and Dietetics (BSND) </option>
                    <option value="Physics">Bachelor of Science in Physics (BSPHY) </option>
                    <option value="Statistics">Bachelor of Science in Statistics (BSSTAT) </option>

                    <optgroup label="College of Tourism, Hospitality and Transportation Management (CTHTM)">
                    <option value="Hospitality Management">Bachelor of Science in Hospitality Management (BSHM) </option>
                    <option value="Tourism Managemen">Bachelor of Science in Tourism Management (BSTM) </option>
                    <option value="Transportation Management">Bachelor of Science in Transportation Management (BSTRM) </option>  
                          
                </select>

    </div> <br>

    <div class="form-group">
        <label for="contact_no" class="fw-bold">Contact Number</label>
        <input type="text" class="form-control" name= "contact_no" id="contact_no" value= "<?php echo $row['contact_no']; ?>">
    </div> <br>

    <div class="form-group">
        <label for="address" class="fw-bold">Address</label>
        <input type="text" class="form-control" name= "address" id="address" value= "<?php echo $row['address']; ?>">
    </div> <br>

    <div class="form-group">
        <label for="birthdate" class="fw-bold">Birthdate</label>
        <input type="text" class="form-control" name= "birthdate" id="birthdate" value= "<?php echo $row['birthdate']; ?>">
    </div> <br>

    <div class="form-group">
        <label for="sex" class="fw-bold">Sex</label>
        <input type="text" class="form-control" name= "sex" id="sex" value= "<?php echo $row['sex']; ?>">
    </div> <br>
    <br>
    <button type="submit" class="btn btn-primary" name="update">Update</button>
    <a href="s.profile.php" class="btn btn-danger">Cancel</a>
</form>
    

</body>
</html>