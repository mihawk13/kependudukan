<?php
require_once("../../assets/lib/fpdf/fpdf.php");
require_once("../../config/koneksi.php");

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Logo
        $this->Image('../../assets/img/manggarai.jpeg', 20, 10);

        // Arial bold 15
        $this->SetFont('Times', 'B', 15);
        // Move to the right
        // $this->Cell(60);
        // Title
        $this->Cell(308, 8, 'PEMERINTAH KABUPATEN MANGGARAI', 0, 1, 'C');
        $this->Cell(308, 8, 'KECAMATAN RUTENG', 0, 1, 'C');
        $this->Cell(308, 8, 'KELURAHAN WAE BELANG', 0, 1, 'C');
        // Line break
        $this->Ln(5);

        $this->SetFont('Times', 'BU', 12);
        for ($i = 0; $i < 10; $i++) {
            $this->Cell(308, 0, '', 1, 1, 'C');
        }

        $this->Ln(1);

        $this->Cell(308, 8, 'LAPORAN DATA KELAHIRAN', 0, 1, 'C');
        $this->Ln(2);

        $this->SetFont('Times', 'B', 9.5);

        $this->Cell(40);
        // header tabel
        $this->cell(8, 7, 'NO', 1, 0, 'C');
        $this->cell(70, 7, 'NAMA', 1, 0, 'C');
        $this->cell(35, 7, 'JENIS KELAMIN', 1, 0, 'C');
        $this->cell(40, 7, 'TANGGAL LAHIR', 1, 0, 'C');
        $this->cell(50, 7, 'TEMPAT LAHIR', 1, 1, 'C');
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

include 'data-index.php';


$pdf = new PDF('L', 'mm', [210, 330]);
$pdf->AliasNbPages();
$pdf->AddPage();

// set font
$pdf->SetFont('Times', '', 9);

// set penomoran
$nomor = 1;

foreach ($data_lahir as $dtlahir) {
    $pdf->Cell(40);
    $pdf->cell(8, 7, $nomor++, 1, 0, 'C');
    $pdf->cell(70, 7, strtoupper($dtlahir['nama_bayi']), 1, 0, 'C');
    $pdf->cell(35, 7, strtoupper($dtlahir['jk']), 1, 0, 'C');
    $pdf->cell(40, 7, $dtlahir['tgl_kelahiran'], 1, 0, 'C');
    $pdf->cell(50, 7, strtoupper($dtlahir['tempat_lahir']), 1, 1, 'C');
}

$pdf->Ln(10);

$pdf->Output();
