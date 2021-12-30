<?php
    // ob_start();
    include "../../config.php";
    require "fpdf/fpdf.php";
    date_default_timezone_set('Asia/Jakarta');

    $pdf = new FPDF('L','cm','A4');
    // REPORT HEADER 
    $pdf->SetMargins(1,1,1);
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(29,0.5,'LAPORAN DATA KONSULTASI TAKHRIJ HADIST',0,1,'C');
    $pdf->ln(1);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(3,0.8,"Tanggal cetak : ".date("d/m/Y"),0,0,'L');

    // AKHIR REPORT HEADER

    // REPORT DETAIL 
    
    $pdf->SetFont('Arial','B',11);
    $pdf->ln(1);
    $pdf->Cell(1,0.8,'No.',1,0,'C');
    $pdf->Cell(2.5,0.8,'Tanggal',1,0,'C');
    $pdf->Cell(6,0.8,'Nama',1,0,'C');
    $pdf->Cell(15,0.8,'Kalimat Hadist',1,0,'C');
    $pdf->Cell(3,0.8,'Hasil',1,1,'C');
    $no=1;

    $tglawal=$_POST['tglawal'];
    $tglakhir=$_POST['tglakhir'];
    $sql = "SELECT*FROM konsultasi WHERE tanggal BETWEEN '$tglawal' AND '$tglakhir' ORDER BY idkonsultasi DESC";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)) {
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(1,0.8,$no,1,0,'C');
        $pdf->Cell(2.5,0.8,''.$row['tanggal'].'',1,0,'L');
        $pdf->Cell(6,0.8,''.$row['nama'].'',1,0,'L');
        $pdf->Cell(15,0.8,''.$row['kalimat'].'',1,0,'L');
        $pdf->Cell(3,0.8,''.$row['hasil'].'',1,1,'L');
        $no++;
    }

    $pdf->Cell(29,0.8,'Hal: '.$pdf->PageNo().'/{nb}',0,0,'C');
    $pdf->Output("laporan_konsultasi.pdf","I");

?>