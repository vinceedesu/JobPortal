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

    <title>Student Register Form</title>
    <!-- Text area tag: disable default resize option -->
</head>
<body style="display: flex;">
    <section class="signup_container">
        <div class="signup_bg">

            <div class="signup_header">
                <img src="../assets/img/jobportal_logo3.png" class="header_icon"/>
            </div>

            <form class="signup_form" id="" method="post" enctype="multipart/form-data">
                <span class="header_login">Student Registration</span>
                <span class="footer_text">Please fill out the form</span>

                <label class="signup_label" for="S.name"> First Name: </label>
                <input type="text" name="firstname" placeholder="Enter first name" class="signup_input" required>

                <label class="signup_label" for="S.name"> Last Name: </label>
                <input type="text" name="lastname" placeholder="Enter last name" class="signup_input" required>

                <label class="signup_label" for="S.email">Email:</label> 
                <input class="signup_input2" type="text" name="email" placeholder="example@email.com" required>

                <label class="signup_label" for="course">Program:</label> 
                <select class="select_dropdown" id="course" name="course">
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

                <label class="signup_label" for="S.adress">Address:</label>  
                <input type="text" name="address" class="signup_input2" placeholder="somewhere" required>
                <label class="form-group" for="S.contact_no">Phone No.:</label>  
                <input class="signup_input" type="tel" id="contact_no" name="contact_no" pattern="[0-9]{11}" placeholder="09XXXXXXXXX" required>

                <label class="signup_label" for="S.logo">Upload Profile:</label>
                <input class="signup_input4" type="file" name="p_img" accept="image/png, image/jpg, image/jpeg, image/PNG" required>

                <label class="signup_label">Sex:</label> 
                <select class="select_dropdown" id="sex" name="sex">
                    <option value="none"> Select Sex </option>
                    <option value="Male"> Male  </option>
                    <option value="Female"> Female  </option>
                </select>

                <label class="signup_label" for="birthday">Birthdate:</label>
                <input class="bday_calendar" type="date" id="birthday" name="birthdate"> 

                <label class="signup_label" for="S.bio">Bio:</label>         
                <textarea id="bio" name="bio" rows="8" cols="40" class="form-control"></textarea>
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