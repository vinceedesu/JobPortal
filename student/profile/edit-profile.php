<?php
include '../../connections.php';
include '../sessions.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../../header-link.php';?>
    <link rel="stylesheet" href="../../assets/CSS/styles.css">
    <title>Edit Profile</title>
    </head>

    <body>
        <?php
include '../navbar.php';

$student_id = $_SESSION['student_id'];
selectWhere($conn, 'student_profile', '*', 'id', $student_id);

?>

<div class="container p-3 mx-auto">
    <div class="row ms-5 me-5">
        <div class="container border px-5 py-4 mb-5 rounded shadow">
            <div class="row">
                <div class="col-12">
                    <h1 class='text-center'>Edit Profile </h1>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col d-flex flex-row-reverse">
                <?php

                    $p_img = $row['p_img'];

                    if ($logo == null) { ?>

                        <img src='../../assets/img/no-profile.png' class='img-fluid' alt='profile picture' style='height: 150px; width: 150px;'>";
                    <?php } else {
                        echo "<img src='../../assets/img/student-profile/$p_img' class='img-fluid' alt='profile picture' style='height: 150px; width: 150px;'>";
                    }
                ?>
            </div>
                <div class="col mt-auto me-n5">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        +
                    </button>

                                <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">

                            <div class="modal-content">
                                <form action="" method="POST">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Picture</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="file">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" name = "updataImg">Save changes</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <form method="POST">
            <div class="row mt-3">
                <div class="col form-group">
                    <label for="name" class="fw-bold">First Name</label>
                    <input type="text" class="form-control" name= "firstname" id="firstname" value= "<?php echo $row['firstname']; ?>">
                </div>
                <div class="col form-group">
                    <label for="address" class="fw-bold">Last Name</label>
                    <input type="text" class="form-control" name= "lastname" id="lastname" value= "<?php echo $row['lastname']; ?>">
                </div>
            </div>
            <div class="row mt-3">
                <div class=" col form-group">
                    <label for="email" class="fw-bold">Email</label>
                    <input type="text" class="form-control" name= "email" id="email" value= "<?php echo $row['email']; ?>">
                </div>
            </div>
            <div class="row">
                <div class ="col">
                    <div id="editEmail">

                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col form-group">
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
                </div>
            </div>


            <div class="row mt-3">
                <div class="col form-group">
                    <label for="contact_no" class="fw-bold">Contact Number</label>
                    <input type="text" class="form-control" name= "contact_no" id="contact_no" value= "<?php echo $row['contact_no']; ?>">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col form-group">
                    <label for="address" class="fw-bold">Address</label>
                    <input type="text" class="form-control" name= "address" id="address" value= "<?php echo $row['address']; ?>">
                </div>
            </div>
            <div class="row mt-3">
                <div class="form-group">
                    <label for="birthdate" class="fw-bold">Birthdate</label>
                    <input type="text" class="form-control" name= "birthdate" id="birthdate" value= "<?php echo $row['birthdate']; ?>">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col form-group">
                    <label for="sex" class="fw-bold">Sex</label>
                    <input type="text" class="form-control" name= "sex" id="sex" value= "<?php echo $row['sex']; ?>">
                </div>
            </div>
            <div class="row mt-5">
                <div class = "col d-flex flex-row-reverse">
                    <button type="submit" class="btn btn-primary" name="updateInfo">Update</button>
                </div>
                <div class="col">
                    <a href="s.profile.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
<?php
    if(isset($_POST['updateImg'])){
        $p_img = $_FILES['p_img']['name'];
        $target = "../assets/img/student-profile/".basename($_FILES['p_img']['name']);
        $sql ="UPDATE student_profile 
        SET p_img = '$p_img'
        WHERE id = $student_id";


        if(move_uploaded_file($_FILES['p_img']['tmp_name'], $target)){
            echo "Image uploaded successfully";
            echo '<script>
            window.location.href = "profile/student-profile.php";
          </script>';

          if (mysqli_query($conn, $sql)) {
            echo "<script type='text/javascript'>alert('Profile Updated Successfully!') </script>";
            header("location:edit-profile.php");
            echo "<script> </script>";

        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }

        }else{
            echo "There was a problem uploading image";
        }
    }
    if(isset($_POST['updateInfo'])){
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $email = $_POST['email'];
        $course = $_POST['course'];
        $contact_no = $_POST['contact_no'];
        $address = $_POST['address'];
        $birthdate = $_POST['birthdate'];
        $sex = $_POST['sex'];
        $bio = $_POST['bio'];

        
            $sql ="UPDATE student_profile 
                SET firstname='$fname', lastname='$lname', email='$email', course='$course', contact_no='$contact_no', address='$address', birthdate='$birthdate', sex='$sex', bio='$bio' 
                WHERE id='$student_id'";

            if (mysqli_query($conn, $sql)) {
                echo "<script type='text/javascript'>alert('Profile Updated Successfully!') </script>";
                echo '<script>
                        window.location.href = "student-profile.php";
                      </script>';

            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }       
}
?>
    </body>

</html>