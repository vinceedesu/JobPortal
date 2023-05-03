<?php  
 function fetch_data()  
 {  
      $output = '';  
      include('../../connections.php');
      $sql = "SELECT * FROM job_list ORDER BY jobID ASC";  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          <td>'.$row["jobID"].'</td>   
                          <td>'.$row["jobTitle"].'</td> 
                          <td>'.$row["jobSummary"].'</td> 
                          <td>'.$row["jobQuali"].'</td>
                          <td>'.$row["jobCategory"].'</td> 
                          <td>'.$row["jobType"].'</td> 
                          <td>'.$row["workSetup"].'</td> 
                          <td>'.$row["min"].'</td> 
                          <td>'.$row["max"].'</td> 
                     </tr>  
                          ';  
      }  
      return $output;  
 }  
 if(isset($_POST["generate_pdf"]))  
 {  
      require_once('../../tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Job Listing Database");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 11);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <h4 align="center">Job Listing Database</h4><br /> 
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th align= "center" width="8%"><b>Job ID</b></th>    
                <th align= "center" width="15%"><b>Job Title</b></th>
                <th align= "center" width="15%"><b>Job Summary</b></th>  
                <th align= "center" width="20%"><b>Job Qualifications</b></th>  
                <th align= "center" width="10%"><b>Job Category</b></th>
                <th align= "center" width="10%"><b>Job Type</b></th>
                <th align= "center" width="10%"><b>Work Setup</b></th>
                <th align= "center" width="8%"><b>Job Salary (Min)</b></th>   
                <th align= "center" width="8%"><b>Job Salary (Max)</b></th>   
           </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('joblist.pdf', 'I');  
 }  
 ?>  