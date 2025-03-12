<?php

require('fpdf181/fpdf.php');
$pdf = new FPDF('L', 'mm', 'A5');
$pdf->SetAutoPageBreak(false);
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190,7, 'MinaLaundry',0,1,'C');
$pdf->SetFont('Arial', 'B',12);
$pdf->Cell(190,7,'DATA OBAT',0,1,'C');

$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(25,6,'KODE OBAT',1,0);
$pdf->Cell(85,6,'NAMA OBAT',1,0,'C');
$pdf->Cell(27,6,'STOK OBAT',1,0,'C');
$pdf->Cell(25,6,'HARGA OBAT',1,1,'C');

$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(240, 248, 254);
$pdf->SetTextColor(0);

include 'koneksi.php';
$masakan = mysqli_query($conn, "SELECT * FROM tabel_transaksi_ismi");berdasarkan id
while ($row=mysqli_fetch_array($masakan)){
    $pdf->Cell(25,6,$row['kode_obat_ismi'],1,0);
    $pdf->Cell(85,6,$row['nama_obat_ismi'],1,0,'C');
    $pdf->Cell(27,6,$row['stok_obat_ismi'],1,0,'C');
    $pdf->Cell(25,6,$row['harga_ismi'],1,1,'C');
}
$pdf->Output();
