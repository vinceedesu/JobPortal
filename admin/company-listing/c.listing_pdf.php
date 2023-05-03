<?php  
 function fetch_data()  
 {  
      $output = '';  
      include('../../connections.php');
      $sql = "SELECT * FROM company_list ORDER BY company_id ASC";  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          <td>'.$row["company_id"].'</td>   
                          <td>'.$row["name"].'</td> 
                          <td>'.$row["email"].'</td> 
                          <td>'.$row["address"].'</td>
                          <td>'.$row["contact_no"].'</td> 
                          <td>'.$row["size"].'</td> 
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
      $obj_pdf->SetTitle("Company Listing Database");  
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
      <h4 align="center">Company Listing Database</h4><br /> 
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th align= "center" width="13%"><b>Company ID</b></th>  
                <th align= "center" width="13%"><b>Company Name</b></th>      
                <th align= "center" width="19%"><b>Address</b></th>
                <th align= "center" width="19%"><b>Email Address</b></th>  
                <th align= "center" width="24%"><b>Contact Person</b></th>  
                <th align= "center" width="14%"><b>Company Size</b></th>
                 
           </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('companylist.pdf', 'I');  
 }  
 ?>  