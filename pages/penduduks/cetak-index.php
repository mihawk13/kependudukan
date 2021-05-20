<?php
require_once("../../assets/lib/fpdf/fpdf.php");
require_once("../../config/koneksi.php");

class PDF extends FPDF
{
    // Page header
    function Header()
    {
      // Logo
      $this->Image('../../assets/img/manggarai.jpeg',20,10);

    	// Arial bold 15
    	$this->SetFont('Times','B',15);
    	// Move to the right
    	// $this->Cell(60);
    	// Title
        $this->Cell(308,8,'PEMERINTAH KABUPATEN MANGGARAI',0,1,'C');
        $this->Cell(308,8,'KECAMATAN RUTENG',0,1,'C');
    	$this->Cell(308,8,'KELURAHAN WAE BELANG',0,1,'C');
    	// Line break
    	$this->Ln(5);

        $this->SetFont('Times','BU',12);
        for ($i=0; $i < 10; $i++) {
            $this->Cell(308,0,'',1,1,'C');
        }

        $this->Ln(1);

        $this->Cell(308,8,'LAPORAN DATA PENDUDUK',0,1,'C');
        $this->Ln(2);

        $this->SetFont('Times','B',9.5);

        // header tabel
        $this->cell(8,7,'NO.',1,0,'C');
        $this->cell(23,7,'NIK',1,0,'C');
        $this->cell(40,7,'NAMA',1,0,'C');
        $this->cell(35,7,'TEMPAT LHR',1,0,'C');
        $this->cell(20,7,'TGL. LHR',1,0,'C');
        $this->cell(8,7,'JK',1,0,'C');
        $this->cell(8,7,'U',1,0,'C');
        $this->cell(50,7,'ALAMAT',1,0,'C');
        $this->cell(7,7,'RT',1,0,'C');
        $this->cell(7,7,'RW',1,0,'C');
        $this->cell(20,7,'AGAMA',1,0,'C');
        $this->cell(26,7,'PERNIKAHAN',1,0,'C');
        $this->cell(16,7,'PDDKN',1,0,'C');
        $this->cell(20,7,'KERJA',1,0,'C');
        $this->cell(24,7,'STATUS',1,1,'C');

    }

    // Page footer
    function Footer()
    {
    	// Position at 1.5 cm from bottom
    	$this->SetY(-15);
    	// Arial italic 8
    	$this->SetFont('Arial','I',8);
    	// Page number
    	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

// ambil dari database
$query = "SELECT *, TIMESTAMPDIFF(YEAR, `tanggal_lahir`, CURDATE()) AS usia FROM penduduk";
$hasil = mysqli_query($db, $query);
$data = array();
while ($row = mysqli_fetch_assoc($hasil)) {
  $data[] = $row;
}


$pdf = new PDF('L', 'mm', [210, 330]);
$pdf->AliasNbPages();
$pdf->AddPage();

// set font
$pdf->SetFont('Times','',9);

// set penomoran
$nomor = 1;

foreach ($data as $pdd) {
    $pdf->cell(8, 7, $nomor++ . '.', 1, 0, 'C');
    $pdf->cell(23, 7, strtoupper($pdd['nik']), 1, 0, 'C');
    $pdf->cell(40, 7, substr(strtoupper($pdd['nama']),0 , 17), 1, 0, 'L');
    $pdf->cell(35, 7, strtoupper($pdd['tempat_lahir']), 1, 0, 'L');
    $pdf->cell(20, 7, ($pdd['tanggal_lahir'] != '0000-00-00') ? date('d-m-Y', strtotime($pdd['tanggal_lahir'])) : '', 1, 0, 'C');
    $pdf->cell(8, 7, substr(strtoupper($pdd['jenis_kelamin']), 0, 1), 1, 0, 'C');
    $pdf->cell(8, 7, strtoupper($pdd['usia']), 1, 0, 'C');
    $pdf->cell(50, 7, substr(strtoupper($pdd['alamat']), 0, 20), 1, 0, 'L');
    $pdf->cell(7, 7, strtoupper($pdd['rt']), 1, 0, 'C');
    $pdf->cell(7, 7, strtoupper($pdd['rw']), 1, 0, 'C');
    $pdf->cell(20, 7, strtoupper($pdd['agama']), 1, 0, 'C');
    $pdf->cell(26, 7, strtoupper($pdd['status_perkawinan']), 1, 0, 'C');
    $pdf->cell(16, 7, strtoupper($pdd['pendidikan_terakhir']), 1, 0, 'C');
    $pdf->cell(20, 7, strtoupper($pdd['pekerjaan']), 1, 0, 'C');
    $pdf->cell(24, 7, strtoupper($pdd['status']), 1, 1, 'C');
}

	$pdf->Ln(10);

$pdf->Output();
?>
