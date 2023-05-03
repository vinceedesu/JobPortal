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
        <title>Edit Jobs</title>
    </head>

    <body>
        <?php
            include('../navbar.php');
        ?>
        
        <div class="container mt-5">
    <div class="row">
    </div>
    <div id="PostJobCon" class="container-sm mt-5 py-5 p-5 bg-light login-form">
    <div class="col-15 ">
            <form action="" method="post">
            <div class="col-md-12 text-center">
                <h1> <strong> Edit Jobs </strong></h1>
                </div> <br>

    <?php
    $jobID = $_GET['jobID'];
    $sql = "SELECT * FROM job_list WHERE jobID = '$jobID'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    ?>

<div class="col-15 ">
            <form action="" method="post">

            <div class="form-group">
                <input type="hidden" name="<?php echo $row['jobID']?>" value=
                '<?php echo $row['jobID']?>'>
            </div>

            <div class="form-group">
                <label for="jobTitle" class= "form-label mb-2 fw-bold">Job Title</label>
                <br>
                <input type="text" class="form-control" value='<?php echo $row['jobTitle'] ?>' name="jobTitle">
                
            </div><br>

            <div class="form-group">
                <label for="Job Summary" class= "form-label mb-2 fw-bold">Job Summary</label>
                <br>
                <input type="text" class="form-control" value='<?php echo $row['jobSummary'] ?>' name="jobSummary">
               
            </div><br>

            <div class="form-group">
                <label for="quali" class= "form-label mb-2 fw-bold">Job Qualification</label>
                <br>
                <input type="text" class="form-control" value='<?php echo $row['jobQuali'] ?>' name="jobQuali">
                
            </div><br>

            <div class="form-group">
                <label for="jobTitle" class= "form-label mb-2 fw-bold">Job Category</label>
                <br>
                <select name="jobCategory" class="form-control">
                    <?php
                    if($row['jobCategory'] == 'Business and Financial Services' ){
                        echo "<option value='Business and Financial Services' selected> Business and Financial Services </option>";
                        echo "<option value='Construction' > Construction </option>";
                        echo "<option value='Education' > Education </option>";
                        echo "<option value='Food & Beverage/Catering/Restaurant' > Food & Beverage/Catering/Restaurant </option>";
                        echo "<option value='Health, Pharmaceuticals, and Biotech' > Health, Pharmaceuticals, and Biotech </option>";
                        echo "<option value='Hospitality' > Hospitality </option>";
                        echo "<option value='Information Technology' > Information Technology </option>";
                        echo "<option value='Law Firm' selected> Law Firm </option>";
                        echo "<option value='Real Estate' > Real Estate </option>";
                        echo "<option value='Transportation/Logistics' > Transportation/Logistics </option>";
                        echo "<option value='Wholesale/Retail and Distribution' > Wholesale/Retail and Distribution </option>";

                    } elseif($row['jobCategory'] == 'Construction'){
                        echo "<option value='Business and Financial Services'> Business and Financial Services </option>";
                        echo "<option value='Construction' selected> Construction </option>";
                        echo "<option value='Education'> Education </option>";
                        echo "<option value='Food & Beverage/Catering/Restaurant'> Food & Beverage/Catering/Restaurant </option>";
                        echo "<option value='Health, Pharmaceuticals, and Biotech'> Health, Pharmaceuticals, and Biotech </option>";
                        echo "<option value='Hospitality'> Hospitality </option>";
                        echo "<option value='Information Technology'> Information Technology </option>";
                        echo "<option value='Law Firm'> Law Firm </option>";
                        echo "<option value='Real Estate'> Real Estate </option>";
                        echo "<option value='Transportation/Logistics'> Transportation/Logistics </option>";
                        echo "<option value='Wholesale/Retail and Distribution'> Wholesale/Retail and Distribution </option>";
                        
                    } elseif($row['jobCategory'] == 'Education'){
                        echo "<option value='Business and Financial Services' > Business and Financial Services </option>";
                        echo "<option value='Construction' > Construction </option>";
                        echo "<option value='Education' selected> Education </option>";
                        echo "<option value='Food & Beverage/Catering/Restaurant' > Food & Beverage/Catering/Restaurant </option>";
                        echo "<option value='Health, Pharmaceuticals, and Biotech' > Health, Pharmaceuticals, and Biotech </option>";
                        echo "<option value='Hospitality' > Hospitality </option>";
                        echo "<option value='Information Technology' > Information Technology </option>";
                        echo "<option value='Law Firm' > Law Firm </option>";
                        echo "<option value='Real Estate' > Real Estate </option>";
                        echo "<option value='Transportation/Logistics' > Transportation/Logistics </option>";
                        echo "<option value='Wholesale/Retail and Distribution' > Wholesale/Retail and Distribution </option>";
                        
                    } elseif($row['jobCategory'] == 'Food & Beverage/Catering/Restaurant'){
                        echo "<option value='Business and Financial Services' > Business and Financial Services </option>";
                        echo "<option value='Construction' > Construction </option>";
                        echo "<option value='Education' > Education </option>";
                        echo "<option value='Food & Beverage/Catering/Restaurant' selected> Food & Beverage/Catering/Restaurant </option>";
                        echo "<option value='Health, Pharmaceuticals, and Biotech' > Health, Pharmaceuticals, and Biotech </option>";
                        echo "<option value='Hospitality' > Hospitality </option>";
                        echo "<option value='Information Technology' > Information Technology </option>";
                        echo "<option value='Law Firm' > Law Firm </option>";
                        echo "<option value='Real Estate' > Real Estate </option>";
                        echo "<option value='Transportation/Logistics' > Transportation/Logistics </option>";
                        echo "<option value='Wholesale/Retail and Distribution' > Wholesale/Retail and Distribution </option>";
                        
                    } elseif($row['jobCategory'] == 'Health, Pharmaceuticals, and Biotech'){
                        echo "<option value='Business and Financial Services' > Business and Financial Services </option>";
                        echo "<option value='Construction' > Construction </option>";
                        echo "<option value='Education' > Education </option>";
                        echo "<option value='Food & Beverage/Catering/Restaurant' > Food & Beverage/Catering/Restaurant </option>";
                        echo "<option value='Health, Pharmaceuticals, and Biotech' selected> Health, Pharmaceuticals, and Biotech </option>";
                        echo "<option value='Hospitality' > Hospitality </option>";
                        echo "<option value='Information Technology' > Information Technology </option>";
                        echo "<option value='Law Firm' > Law Firm </option>";
                        echo "<option value='Real Estate' > Real Estate </option>";
                        echo "<option value='Transportation/Logistics' > Transportation/Logistics </option>";
                        echo "<option value='Wholesale/Retail and Distribution' > Wholesale/Retail and Distribution </option>";
                        
                    } elseif($row['jobCategory'] == 'Hospitality'){
                        echo "<option value='Business and Financial Services' > Business and Financial Services </option>";
                        echo "<option value='Construction' > Construction </option>";
                        echo "<option value='Education' > Education </option>";
                        echo "<option value='Food & Beverage/Catering/Restaurant' > Food & Beverage/Catering/Restaurant </option>";
                        echo "<option value='Health, Pharmaceuticals, and Biotech' > Health, Pharmaceuticals, and Biotech </option>";
                        echo "<option value='Hospitality' selected> Hospitality </option>";
                        echo "<option value='Information Technology' > Information Technology </option>";
                        echo "<option value='Law Firm' > Law Firm </option>";
                        echo "<option value='Real Estate' > Real Estate </option>";
                        echo "<option value='Transportation/Logistics' > Transportation/Logistics </option>";
                        echo "<option value='Wholesale/Retail and Distribution' > Wholesale/Retail and Distribution </option>";
                        
                    } elseif($row['jobCategory'] == 'Information Technology'){
                        echo "<option value='Business and Financial Services' > Business and Financial Services </option>";
                        echo "<option value='Construction' > Construction </option>";
                        echo "<option value='Education' > Education </option>";
                        echo "<option value='Food & Beverage/Catering/Restaurant' > Food & Beverage/Catering/Restaurant </option>";
                        echo "<option value='Health, Pharmaceuticals, and Biotech' > Health, Pharmaceuticals, and Biotech </option>";
                        echo "<option value='Hospitality' > Hospitality </option>";
                        echo "<option value='Information Technology' selected> Information Technology </option>";
                        echo "<option value='Law Firm' > Law Firm </option>";
                        echo "<option value='Real Estate' > Real Estate </option>";
                        echo "<option value='Transportation/Logistics' > Transportation/Logistics </option>";
                        echo "<option value='Wholesale/Retail and Distribution' > Wholesale/Retail and Distribution </option>";
                        
                    } elseif($row['jobCategory'] == 'Law Firm'){
                        echo "<option value='Business and Financial Services' > Business and Financial Services </option>";
                        echo "<option value='Construction' > Construction </option>";
                        echo "<option value='Education' > Education </option>";
                        echo "<option value='Food & Beverage/Catering/Restaurant' > Food & Beverage/Catering/Restaurant </option>";
                        echo "<option value='Health, Pharmaceuticals, and Biotech' > Health, Pharmaceuticals, and Biotech </option>";
                        echo "<option value='Hospitality' > Hospitality </option>";
                        echo "<option value='Information Technology' > Information Technology </option>";
                        echo "<option value='Law Firm' selected> Law Firm </option>";
                        echo "<option value='Real Estate' > Real Estate </option>";
                        echo "<option value='Transportation/Logistics' > Transportation/Logistics </option>";
                        echo "<option value='Wholesale/Retail and Distribution' > Wholesale/Retail and Distribution </option>";
                        
                    } elseif($row['jobCategory'] == 'Real Estate'){
                        echo "<option value='Business and Financial Services' > Business and Financial Services </option>";
                        echo "<option value='Construction' > Construction </option>";
                        echo "<option value='Education' > Education </option>";
                        echo "<option value='Food & Beverage/Catering/Restaurant' > Food & Beverage/Catering/Restaurant </option>";
                        echo "<option value='Health, Pharmaceuticals, and Biotech' > Health, Pharmaceuticals, and Biotech </option>";
                        echo "<option value='Hospitality' > Hospitality </option>";
                        echo "<option value='Information Technology' > Information Technology </option>";
                        echo "<option value='Law Firm' > Law Firm </option>";
                        echo "<option value='Real Estate' selected> Real Estate </option>";
                        echo "<option value='Transportation/Logistics' > Transportation/Logistics </option>";
                        echo "<option value='Wholesale/Retail and Distribution' > Wholesale/Retail and Distribution </option>";
                        
                    } elseif($row['jobCategory'] == 'Transportation/Logistics'){
                        echo "<option value='Business and Financial Services' > Business and Financial Services </option>";
                        echo "<option value='Construction' > Construction </option>";
                        echo "<option value='Education' > Education </option>";
                        echo "<option value='Food & Beverage/Catering/Restaurant' > Food & Beverage/Catering/Restaurant </option>";
                        echo "<option value='Health, Pharmaceuticals, and Biotech' > Health, Pharmaceuticals, and Biotech </option>";
                        echo "<option value='Hospitality' > Hospitality </option>";
                        echo "<option value='Information Technology' > Information Technology </option>";
                        echo "<option value='Law Firm' > Law Firm </option>";
                        echo "<option value='Real Estate' > Real Estate </option>";
                        echo "<option value='Transportation/Logistics' selected> Transportation/Logistics </option>";
                        echo "<option value='Wholesale/Retail and Distribution' > Wholesale/Retail and Distribution </option>";
                        
                    } elseif($row['jobCategory'] == 'Wholesale/Retail and Distribution'){
                        echo "<option value='Business and Financial Services' > Business and Financial Services </option>";
                        echo "<option value='Construction' > Construction </option>";
                        echo "<option value='Education' > Education </option>";
                        echo "<option value='Food & Beverage/Catering/Restaurant' > Food & Beverage/Catering/Restaurant </option>";
                        echo "<option value='Health, Pharmaceuticals, and Biotech' > Health, Pharmaceuticals, and Biotech </option>";
                        echo "<option value='Hospitality' > Hospitality </option>";
                        echo "<option value='Information Technology' > Information Technology </option>";
                        echo "<option value='Law Firm' > Law Firm </option>";
                        echo "<option value='Real Estate' > Real Estate </option>";
                        echo "<option value='Transportation/Logistics' > Transportation/Logistics </option>";
                        echo "<option value='Wholesale/Retail and Distribution' selected> Wholesale/Retail and Distribution </option>";
                        
                    }
                    ?>

                </select>
                </div><br>
               
            <div class="form-group">
                <label for="jobTitle" class= "form-label mb-2 fw-bold">Work Setup</label>
                <br>
                <select name="workSetup" id="workSetup" class="form-control">
                    <?php
                    if($row['workSetup'] == 'WFH'){
                        echo "<option value='WFH' selected>Work from Home </option>";
                    }
                    ?>
                </select>
               
            </div> <br>

            <div class="form-group">
                <label for="jobTitle" class= "form-label mb-2 fw-bold">Salary</label>
                <br>
                <div class="col">
                <input type="text" name= "min" class="form-control" value= "<?php echo $row['min']; ?>"> 
                </div>
                -
                <div class="col">
                <input type="text" name= "max" class="form-control" value= "<?php echo $row['max']; ?>">
                </div> <br>
                <br>
                <br>
                <?php
                include ('jobs-edit-conn.php');
                ?>
                </div>  <br>
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a> 
            </form>

                </div>
                
                    </div> 
            </div>
        </div>
    </div>
    </body>
    
</html>
