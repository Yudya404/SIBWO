<?php 

session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
require('../fpdf17/fpdf.php');
require("../conn.php");

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',13);
$pdf->Image('img/logo.jpg',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'Imagine Organizer',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Gg. Durasit Masjid Baitul Muttaqien Rt 01 Rw 07 Purwosari - Pasuruan 67162.',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Website : WWW.IO.COM',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,0.7,'Laporan Data Pemesanan WO',0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
//$pdf->Cell(6,0.7,"Laporan Booking pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->Cell(1, 0.8, 'No', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'No Po', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Produk', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Tanggal', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Qty', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Status', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Total', 1, 0, 'C');
$pdf->ln(1);
//ambil paramater tanggal GET/POST
$tgl_awal = $_POST['tgl_awal']; //penamaan disesuaikan
$tgl_akhir = $_POST['tgl_akhir']; //penamaan disesuaikan

$no=1;
$qy = "select * from po_terima ";
if (isset($tgl_awal) and isset($tgl_akhir)) {
	$qy.=" where tanggal between '$tgl_awal' and '$tgl_akhir' "; //kolom disesuaikan
}
$query=mysqli_query($koneksi,$qy);
while($lihat=mysqli_fetch_array($query)){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(4, 0.8, $lihat['nopo'],1, 0, 'C');
	$pdf->Cell(4, 0.8, $lihat['nama'],1, 0, 'C');
	$pdf->Cell(4, 0.8, $lihat['tanggal'], 1, 0,'C');
	$pdf->Cell(2, 0.8, $lihat['qty'], 1, 0,'C');
	$pdf->Cell(3, 0.8, $lihat['status_pelayanan'], 1, 0,'C');
	$pdf->Cell(3, 0.8, "Rp. ".number_format($lihat['total'])." ,-", 1, 1,'C');
	
	$no++;
}

$qy = "select sum(total) as total from po_terima";
if (isset($tgl_awal) and isset($tgl_akhir)) {
	$qy.=" where tanggal between '$tgl_awal' and '$tgl_akhir' "; //kolom disesuaikan
}
$q=mysqli_query($koneksi,$qy);
// select sum(total_harga) as total from barang_laku where tanggal='$tanggal'
while($total=mysqli_fetch_array($q)){
	$pdf->Cell(18, 0.8, "Total Pendapatan", 1, 0,'C');		
	$pdf->Cell(3, 0.8, "Rp. ".number_format($total['total'])." ,-", 1, 0,'C');	
}

/*$qy = "select sum(laba) as total_laba from barang_laku";
if (isset($tglawal) and isset($tglakhir)) {
	$qy.=" where tanggal between '$tglawal' and '$tglakhir' "; //kolom disesuaikan
}
$qu=mysqli_query($connect,$qy);
// select sum(total_harga) as total from barang_laku where tanggal='$tanggal'
while($tl=mysqli_fetch_array($qu)){
	$pdf->Cell(3, 0.8, "Rp. ".number_format($tl['total_laba'])." ,-", 1, 1,'C');	
}*/
$pdf->Output("laporan_Pemesanan_Makanan.pdf","I");
}
 ?> 