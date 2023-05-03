<?php

include('../../connections.php');

$jobID = $_POST['jobID'];
$jobTitle = $_POST['jobTitle'];
$jobSummary = $_POST['jobSummary'];
$jobQuali = $_POST['jobQuali'];
$jobCategory = $_POST['jobCategory'];
$jobType = $_POST['jobType'];
$workSetup = $_POST['workSetup'];
$min = $_POST['min'];
$max = $_POST['max'];

// Update record in database
$sql = "UPDATE `job_list` SET `jobID`='$jobID',`jobTitle`='$jobTitle',`jobSummary`='$jobSummary',`jobQuali`='$jobQuali',`jobCategory`='$jobCategory',`jobType`='$jobType',`workSetup`='$workSetup',`min`='$min',`max`='$max' WHERE jobID = $jobID";
if (mysqli_query($conn, $sql)) {
echo "<script type='text/javascript'>alert('Job Post Updated Successfully!') </script>";
header("location:j.listing.php");
echo "<script> </script>";


} else {
echo "Error updating record: " . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);


?>