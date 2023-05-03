<?php
    // Admin Accounts Table
    $tablequery = "admin_accounts(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50),    
    password VARCHAR(100),
    admin_type enum('Admin','Superadmin'),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
    createTable($conn, $tablequery);

    // Superadmin Account    
	$sql = "SELECT * FROM admin_accounts WHERE username='superadmin'";
	$result = $conn->query($sql);
	if ($result->num_rows === 0){
		$sql = "INSERT INTO admin_accounts (username, name, email, password, admin_type) 
					VALUES ('superadmin', 'superadmin', 'superadmin@gmail.com', 'superadmin', 'Superadmin')";
                    // Admin pass: superadmin
		$conn->query($sql);
	}
	else{
		//echo "Superadmin exists.";
	}

 $tablequery = "`users` (
    `userID` int AUTO_INCREMENT,
    `username` varchar(24),
    `email` varchar(50),
    `password` varchar(100),
    `userType` varchar(10),
    PRIMARY KEY (`userID`)
  )";
    createTable($conn, $tablequery);

    // Company List Table
    $tablequery = "`company_list` (
        `company_id` int AUTO_INCREMENT,
        `name` varchar(50),
        `employer_name` varchar(50),
        `email` varchar(50),
        `address` varchar(140),
        `contact_no` varchar(12),
        `size` int,
        `logo` varchar(50),
        `overview` varchar(140),
        `userID` int,
        PRIMARY KEY (`company_id`),
        FOREIGN KEY (`userID`) REFERENCES `users`(`userID`)
      )";
    createTable($conn, $tablequery);

    // Student Profile Table
    $tablequery = "`student_profile` (
        `id` int AUTO_INCREMENT,
        `firstname` varchar(24),
        `lastname` varchar(24),
        `email` varchar(50),
        `course` varchar(50),
        `contact_no` varchar(12),
        `address` varchar(140),
        `birthdate` date,
        `sex` varchar(6),
        `bio` text(140),
        `p_img` varchar(50),
        `userID` int,
        PRIMARY KEY (`id`),
        FOREIGN KEY (`userID`) REFERENCES `users`(`userID`)
      )";
    createTable($conn, $tablequery);
    
    // Job List Table
    $tablequery = "`job_list` (
        `jobID` int AUTO_INCREMENT,
        `jobTitle` varchar(25),
        `jobSummary` varchar(50),
        `jobQuali` varchar(50),
        `jobCategory` varchar(16),
        `jobType` varchar(16),
        `workSetup` varchar(16),
        `min` int(8),
        `max` int(8),
        `CompanyId` int,
        PRIMARY KEY (`jobID`),
        FOREIGN KEY (`CompanyId`) REFERENCES `company_list`(`company_id`)
      )";
    createTable($conn, $tablequery);
    
    // Job Applications Table
    $tablequery = "`job_applications` (
      `application_id` int AUTO_INCREMENT,
      `jobID` int,
      `studentID` int,
      `companyID` int,
      `status` varchar(10),
      PRIMARY KEY (`application_id`),
      FOREIGN KEY (`jobID`) REFERENCES `job_list`(`jobID`),
      FOREIGN KEY (`studentID`) REFERENCES `student_profile`(`id`),
      FOREIGN KEY (`companyID`) REFERENCES `company_list`(`company_id`)
    )";
    createTable($conn, $tablequery);

    // Sadmin Logs Table
    $tablequery = "`s_admin_logs` (
      `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
      `admin_id` int(11) NOT NULL,
      `admin_type` enum('Superadmin','Admin') NOT NULL,
      `actions` varchar(255) NOT NULL
    )";
  createTable($conn, $tablequery);

  // Sadmin Logs Table
  $tablequery = "`admin_logs` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `company_id` int(11) NOT NULL,
    `actions` varchar(255) NOT NULL
  )";
createTable($conn, $tablequery);