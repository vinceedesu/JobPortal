<?php 

            if(isset($_POST['submit'])){
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname']; 
                $email = $_POST['email'];
                $course = $_POST['course'];
                $address = $_POST['address'];   
                $contact_no = $_POST['contact_no'];
                $sex = $_POST['sex'];
                $birthdate = $_POST['birthdate'];
                $bio = htmlentities($_POST['bio']);
                
                $user_id=$_SESSION['user_id'];
                
                $p_img = $_FILES['p_img']['name'];
                $target = "../assets/img/student-profile/".basename($_FILES['p_img']['name']);

                $tablename="student_profile";
                $columnquery="*";

                $result = selectWhere($conn, $tablename, $columnquery, 'email', $email);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        
                        echo "Account Exist";
                    }
                  } else {
                    $dataquery = "student_profile(firstname,lastname,email,course,contact_no,address,birthdate,sex,bio, p_img, userID)";
                    $valuequery="('$firstname','$lastname','$email','$course','$contact_no','$address','$birthdate','$sex','".$bio."','$p_img','$user_id')";
                    insertData($conn,$dataquery,$valuequery);
                    
                    if(move_uploaded_file($_FILES['p_img']['tmp_name'], $target)){
                        echo "Image uploaded successfully";
                        echo '<script>
                        window.location.href = "profile/student-profile.php";
                      </script>';
                    }else{
                        echo "There was a problem uploading image";
                    }

                  }
                }
