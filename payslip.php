<?php


require_once('tcpdf/tcpdf.php');
require_once('TCPDF/config/tcpdf_config.php');
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'tclogo.jpg';
        $this->Image($image_file, 10, 10, 25, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
       // $this->SetFont('helvetica', 'B', 20);
        // Title
        //$this->Cell(0, 15, 'PAYSLIP', 0, false, 'C', 0, '', 0, false, 'M', 'M');
         
    }
     // Load table data from file
     public function LoadData() {
        
        // $lines = file($file);
        // $data = array();
        // foreach($lines as $line) {
        //     $data[] = explode(';', chop($line));
        // }
        // return $data;

        //require_once('pdf.php');
        include 'connection.php';
        $sql = "SELECT * FROM `emp`";
        $result = $conn->query($sql);
        return $result;
    }
// Colored table
public function ColoredTable($header,$data) {
    // Colors, line width and bold font
    $this->SetFillColor(33, 37, 41);
    $this->SetTextColor(255);
    $this->SetDrawColor(128, 0, 0);
    $this->SetLineWidth(0.3);
    $this->SetFont('', 'B');
    // Header
    $w = array(25, 40, 60, 25, 25);
    $num_headers = count($header);
    for($i = 0; $i < $num_headers; ++$i) {
        $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
    }
    $this->Ln();
    // Color and font restoration
    $this->SetFillColor(222, 222, 222);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Data
    $fill = 0;
    foreach($data as $row) {
        $this->Cell($w[0], 6, $row['emp_id'], 'LR', 0, 'L', $fill);
        $this->Cell($w[1], 6, $row['name'], 'LR', 0, 'L', $fill);
        $this->Cell($w[2], 6, $row['email'], 'LR', 0, 'L', $fill);
        $this->Cell($w[3], 6, $row['jdate'], 'LR', 0, 'L', $fill);
        $this->Cell($w[4], 6, $row['phone'], 'LR', 0, 'L', $fill);
        $this->Ln();
        $fill=!$fill;
    }
    $this->Cell(array_sum($w), 0, '', 'T');
}

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'B', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 003');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'B', 12);

// add a page
$pdf->AddPage();

// set some text to print
$txt = <<<EOD
PAY SLIP

EOD;

// print a block of text using Write()
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
$header = array('Id', 'Name', 'Mobile No', 'Join Date', 'Phone');

// ---------------------------------------------------------
// data loading
$data = $pdf->LoadData('');

// print colored table
$pdf->ColoredTable($header, $data);

//Close and output PDF document
$pdf->Output('test.pdf', 'I');

?>