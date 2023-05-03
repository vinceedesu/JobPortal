<?php
            
            if(isset($_POST['submit'])){
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname']; 
                $email = $_POST['email'];   
                $address = $_POST['address'];
                $sex = $_POST['sex'];
                $birthdate = $_POST['birthdate'];
                $student_id = "3";
                $bio = $_POST['bio'];
                

                $tablename="user_profile";
                $columnquery="*";
 
               
                
                $result = selectWhere($conn, $tablename, $columnquery, 'student_id', $student_id);



                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        
                        echo "Account Exist";
                    }
                  } else {
                    $dataquery = "user_profile(firstname,lastname,email,student_id,address,birthdate,sex,bio)";
                    $valuequery="('$firstname','$lastname','$email','$student_id','$address','$birthdate','$sex','$bio')";
                    insertData($conn,$dataquery,$valuequery);
                  }
            }