<?php  
 $connect = mysqli_connect("localhost", "root", "", "teste_db");  
 include ("PHPExcel/IOFactory.php");  
 $html="<table border='1'>";  
 $objPHPExcel = PHPExcel_IOFactory::load('exemplo.xls');  
 foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)   
 {  
      $highestRow = $worksheet->getHighestRow();  
      for ($row=2; $row<=$highestRow; $row++)  
      {  
           $html.="<tr>";  
           $name = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());  
           $email = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
           $data = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue()); 
           $sql = "INSERT INTO tbl_excel(excel_name, excel_email, excel_data) VALUES ('".$name."', '".$email."', '".$data."')";  
           mysqli_query($connect, $sql);  
           $html.= '<td>'.$name.'</td>';  
           $html .= '<td>'.$email.'</td>';
           $html .= '<td>'.$data.'</td>'; 
           $html .= "</tr>";  
      }
 }  
 $html .= '</table>';  
 echo $html;  
 echo '<br />Data Inserted';  
 ?>