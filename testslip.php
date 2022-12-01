<?php
require_once('tcpdf/tcpdf.php');

class MYPDF extends TCPDF{
    public function Header() {
        $image_file = K_PATH_IMAGES.'tcpdf_logo.jpg';
        $this->Image($image_file, 10, 5, 25, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        date_default_timezone_set('Asia/Calcutta');
        $tDate = date("F j, Y, g:i a");
        $html = '<p>W: www.xyma.in M: info@xyma.in</p>';
        $this->writeHTML($html, true, false, false, false, 'R');
        $this->Cell(182.5, 4, 'Report Generated on: '.$tDate, 0, 0, 'R', 0, '', 0, false, 'T', 'M');       
        
        // $html ='<hr>';
        // $html ='<hr>';
        // $this->writeHTML($html, true, false, false, false, ''); 
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
    
    // public function Header(){
    // $this->SetFont('helvetica', 'B', 20);
    // // Title to right allignment
    // $this->Cell(0, 15, '<< Header TITLE >>', 0, false, 'R', 0, '', 0, false, 'M', 'M');
}
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 003');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

$pdf->SetPrintHeader(true);
$pdf->SetPrintFooter(true); 
// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('');
$pdf->setTitle('');
$pdf->setSubject('');
$pdf->setKeywords('');

// set default header data
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}



// bg image properties
// $pdf->AddPage();

// $bMargin = $pdf->getBreakMargin();
// // get current auto-page-break mode
// $auto_page_break = $pdf->getAutoPageBreak();
// // disable auto-page-break
// $pdf->SetAutoPageBreak(false, 0);


// // set bacground image
// $img_file = K_PATH_IMAGES.'bg2.jpg';
// $pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// // restore auto-page-break status
// $pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// // set the starting point for the page content
// $pdf->setPageMark();


// set font
$pdf->SetFont('times', 'B', 11);

// add a page
$pdf->AddPage();

//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')

// test Cell stretching
$pdf->Cell(0, 7, 'XYMA ANALYTICS PRIVATE LIMITED', 1, 1, 'C', 0, '', 0);
$pdf->Cell(0, 8, 'B4 01 B Block 4th Floor Taramani IIT Madras Research Park Chennai-600113', 1, 1, 'C', 0, '', 0);
$pdf->Cell(0, 7, 'PAY SLIP', 1, 1, 'C', 0, '', 0);
//$pdf->Cell(45, 0, 'TEST CELL STRETCH: scaling', 1, 1, 'C', 0, '', 1);
//$pdf->Cell(45, 0, 'TEST CELL STRETCH: scaling', 1, 1, 'C', 0, '', 1);

//$pdf->Cell(0, 0, 'TEST CELL STRETCH: scaling', 1, 1, 'C', 0, '', 1);
//$pdf->Cell(0, 0, 'TEST CELL STRETCH: force scaling', 1, 1, 'C', 0, '', 2);
//$pdf->Cell(0, 0, 'TEST CELL STRETCH: spacing', 1, 1, 'C', 0, '', 3);
//$pdf->Cell(0, 0, 'TEST CELL STRETCH: force spacing', 1, 1, 'C', 0, '', 4);

$pdf->Ln(5);

//$pdf->Cell(45, 0, 'TEST CELL STRETCH: scaling', 1, 1, 'C', 0, '', 1);
//$pdf->Cell(45, 0, 'TEST CELL STRETCH: force scaling', 1, 1, 'C', 0, '', 2);
//$pdf->Cell(45, 0, 'TEST CELL STRETCH: spacing', 1, 1, 'C', 0, '', 3);
//$pdf->Cell(45, 0, 'TEST CELL STRETCH: force spacing', 1, 1, 'C', 0, '', 4);


// example using general stretching and spacing

// for ($stretching = 90; $stretching <= 110; $stretching += 10) {
//     for ($spacing = -0.254; $spacing <= 0.254; $spacing += 0.254) {

//         // set general stretching (scaling) value
//         $pdf->setFontStretching($stretching);

//         // set general spacing value
//         $pdf->setFontSpacing($spacing);

//         $pdf->Cell(0, 0, 'Stretching '.$stretching.'%, Spacing '.sprintf('%+.3F', $spacing).'mm, no stretch', 1, 1, 'C', 0, '', 0);
//         $pdf->Cell(0, 0, 'Stretching '.$stretching.'%, Spacing '.sprintf('%+.3F', $spacing).'mm, scaling', 1, 1, 'C', 0, '', 1);
//         $pdf->Cell(0, 0, 'Stretching '.$stretching.'%, Spacing '.sprintf('%+.3F', $spacing).'mm, force scaling', 1, 1, 'C', 0, '', 2);
//         $pdf->Cell(0, 0, 'Stretching '.$stretching.'%, Spacing '.sprintf('%+.3F', $spacing).'mm, spacing', 1, 1, 'C', 0, '', 3);
//         $pdf->Cell(0, 0, 'Stretching '.$stretching.'%, Spacing '.sprintf('%+.3F', $spacing).'mm, force spacing', 1, 1, 'C', 0, '', 4);

//         $pdf->Ln(2);
//     }
// }

// ---------------------------------------------------------
// table starts from here
include 'connection.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql= "select e.*,s.desig, s.salary, d.epf, d.pt, d.hi, d.tds, d.deduction, b.bname, b.bno, b.ifsc, b.bbranch from emp e , salary s, deduction d, bank b where e.emp_id='$id' AND e.emp_id = s.emp_id AND e.emp_id = d.emp_id AND e.emp_id = b.emp_id";

    //$sql= "select e.*,s.desig, s.salary, d.deduction, b.bname, b.bno, b.ifsc, b.bbranch from emp e , salary s, deduction d, bank b where e.emp_id='$id' AND e.emp_id = s.emp_id AND e.emp_id = d.emp_id AND e.emp_id = b.emp_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    {
        $name = $row["name"];
        $email = $row["email"];
        $empid = $row["emp_id"];
        $phone = $row["phone"];
        $desig = $row["desig"];
        $salary = $row["salary"];
        $jd = $row['jdate'];
        $bname = $row["bname"];
        $bno = $row["bno"];
        $ifsc = $row["ifsc"];
        $bbranch = $row["bbranch"];
        $salary = $row["salary"];
        $ded = $row["deduction"];
        $net = $row["salary"] - $row["deduction"];

$html = '<div style="text-align:center; line-height:3px;">PERSONAL INFORMATION</div><br/>';
$pdf->writeHTML($html, true, false, true, false, '');
$tbl = '<br><table border="1" cellpadding="8">
<tr>
<td style="padding: 10px">Name</td>
<td style="padding: 10px">'.$name.'</td>
</tr>
<tr>
<td>Email</td>
<td>'.$email.'</td>
</tr>
<tr>
<td>Employee Id</td>
<td>'.$empid.'</td>
</tr>
<tr>
<td>Phone</td>
<td>'.$phone.'</td>
</tr>
<tr>
<td>Date Of Joining</td>
<td>'.$jd.'</td>
</tr>
<tr>
<td>Bank</td>
<td>'.$bname.'</td>
</tr>
<tr>
<td>Bank Account</td>
<td>'.$bno.'</td>
</tr>
<tr>
<td>IFSC</td>
<td>'.$ifsc.'</td>
</tr>

</table><br/>';
    }
}
}
}
$pdf->writeHTML($tbl, true, false, true, false, 'C');
//Table02
//  include 'connection.php';
//  if(isset($_GET['id'])){
//      $id = $_GET['id'];
//      $sql= "select e.*,s.desig, s.salary, d.epf, d.pt, d.hi, d.tds, d.deduction, b.bname, b.bno, b.ifsc, b.bbranch from emp e , salary s, deduction d, bank b where e.emp_id='$id' AND e.emp_id = s.emp_id AND e.emp_id = d.emp_id AND e.emp_id = b.emp_id";
 //    $result = $conn->query($sql);
 //    if ($result->num_rows > 0) {
//     while($row = $result->fetch_assoc()) {
//     {
//         $name = $row["name"];
//         $email = $row["email"];
//         $empid = $row["emp_id"];
//         $phone = $row["phone"];
//         $desig = $row["desig"];
//         $salary = $row["salary"];
//         $jd = $row['jdate'];
//         $bname = $row["bname"];
//         $bno = $row["bno"];
//         $ifsc = $row["ifsc"];
//         $epf = $row["epf"];
//         $pt = $row["pt"];
//         $hi = $row["hi"];
//         $tds = $row["tds"];
//         $bbranch = $row["bbranch"];
//         $salary = $row["salary"];
//         $ded = $row["deduction"];
//         $net = $row["salary"] - $row["deduction"];

// $html = '<div style="text-align:center; line-height:3px;">DEDUCTION</div><br/>';
// $pdf->writeHTML($html, true, false, true, false, '');
// $tbl = '<br><table border="1" cellpadding="8">
// <tr>
// <td style="padding: 10px">EPF</td>
// <td style="padding: 10px">'.$epf.'</td>
// </tr>
// <tr>
// <td>Professional Tax</td>
// <td>'.$pt.'</td>
// </tr>
// <tr>
// <td>Health Insurance</td>
// <td>'.$hi.'</td>
// </tr>
// <tr>
// <td>TDS</td>
// <td>'.$tds.'</td>
// </tr>
// <tr>

// </table><br/>';
//     }
// }
// }
// }
//$pdf->writeHTML($tbl, true, false, true, false, 'C');
// table starts from here
include 'connection.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql= "select e.*,s.desig, s.salary, d.epf, d.pt, d.hi, d.tds, d.deduction, b.bname, b.bno, b.ifsc, b.bbranch from emp e , salary s, deduction d, bank b where e.emp_id='$id' AND e.emp_id = s.emp_id AND e.emp_id = d.emp_id AND e.emp_id = b.emp_id";

    //$sql= "select e.*,s.desig, s.salary, d.deduction, b.bname, b.bno, b.ifsc, b.bbranch from emp e , salary s, deduction d, bank b where e.emp_id='$id' AND e.emp_id = s.emp_id AND e.emp_id = d.emp_id AND e.emp_id = b.emp_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    {
        $name = $row["name"];
        $email = $row["email"];
        $empid = $row["emp_id"];
        $phone = $row["phone"];
        $desig = $row["desig"];
        $salary = $row["salary"];
        $jd = $row['jdate'];
        $bname = $row["bname"];
        $bno = $row["bno"];
        $ifsc = $row["ifsc"];
        $bbranch = $row["bbranch"];
        $salary = $row["salary"];
        $epf = $row["epf"];
        $pt = $row["pt"];
        $hi = $row["hi"];
        $tds = $row["tds"];
        $ded = $row["deduction"];
        //$net = $row["salary"] - $row["deduction"];

$html = '<div style="text-align:center; line-height:3px;">DEDUCTION</div><br/>';
$pdf->writeHTML($html, true, false, true, false, '');
$tbl = '<br><table border="1" cellpadding="8">
<tr>
<td>EPF</td>
<td>'.$epf.'</td>
</tr>
<tr>
<td>Professional tax</td>
<td>'.$pt.'</td>
</tr>
<tr>
<td>Health Insurance</td>
<td>'.$hi.'</td>
</tr>
<tr>
<td>TDS</td>
<td>'.$tds.'</td>
</tr>
<tr>
<td>Deduction</td>
<td>'.$ded.'</td>
</tr>

</table><br/>';
    }
}
}
}
$pdf->writeHTML($tbl, true, false, true, false, 'C');


$html = '<table border="1" cellpadding="9">';
$html .="<tr>
        <th>Department</th>
        <th>Salary</th>
        <th>Deduction</th>
        <th>Net pay</th>
        </tr>";


include 'connection.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
$sql= "select e.*,s.desig, s.salary, d.deduction from emp e , salary s, deduction d where e.emp_id='$id' AND e.emp_id = s.emp_id AND e.emp_id = d.emp_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    {
        $desig = $row["desig"];
        $salary = $row["salary"];
        $ded = $row["deduction"];
        $net = $row["salary"] - $row["deduction"];

        $html .="<tr>
        <td>". $desig."</td>
        <td>". $salary ."</td>
        <td>". $ded ."</td>
        <td>". $net ."</td>
        </tr>";
    }
}
}
}
$html .= '</table>';
$pdf->writeHTML($html, true, false, true, false, '');

//Close and output PDF document
$pdf->Output('example_004.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+