<?php
	date_default_timezone_set("Asia/Jakarta");

	$pdf = new FPDF('L', 'pt', 'A4');
	$pdf->SetTitle('Laporan Rekapitulasi Barang');
	$pdf->AliasNbPages();
	$pdf->SetTopMargin(30);
	$pdf->SetLeftMargin(20);
	$pdf->SetRightMargin(20);
	$pdf->SetAutoPageBreak(true, 50);

	$pdf->AddPage();
	$pdf->Image('./assets/logo.png',32,25,50);
	$pdf->SetFont('helvetica','B',16);
	$pdf->Cell(70);
	$pdf->Cell(0,10,'MARKET PLACE',2,0,'C');
	$pdf->Ln(14);
	$pdf->SetFont('helvetica','',12);
	$pdf->Cell(70);
	$pdf->Cell(0,10,'MARKET PLACE',0,0,'C');
	$pdf->Ln(14);
	$pdf->Cell(70);
	$pdf->SetFont('helvetica','I',9);
	$pdf->Cell(0,10,'Jl. Suryakencana No.18 Kel. Cisarua Kec. Cikole Kota Sukabumi',0,0,'C');
	$pdf->SetLineWidth(1);
	$pdf->Line(20,77,820,77);
	$pdf->SetLineWidth(1,5);
	$pdf->Line(20,79,820,79);

	$pdf->SetY(110);
	$pdf->SetFont('helvetica','BUI',16);
	$pdf->Cell(0,10,'Laporan Rekapitulasi Data Barang',0,0,'C');
	$pdf->Ln(25);

	$pdf->SetX(120);
	$pdf->SetFont('helvetica','B',10);
	$pdf->SetLineWidth(1,5);
	$pdf->SetFillColor(0,191,255);
	$pdf->Cell(20, 15, "No", 1, "LR", "C", true);
	$pdf->Cell(90, 15, "Gambar", 1, "LR", "C", true);
	$pdf->Cell(90, 15, "ID Barang", 1, "LR", "C", true);
	$pdf->Cell(80, 15, "Merk", 1, "LR", "C", true);
	$pdf->Cell(120, 15, "Jenis", 1, "LR", "C", true);
	$pdf->Cell(80, 15, "Stok", 1, "LR", "C", true);
	$pdf->Cell(80, 15, "Harga", 1, "LR", "C", true);

	$pdf->Ln();
	if ($data_barang) {
		$no=0;
		$nilaiY = $pdf->GetY();
		foreach ($data_barang as $key ) {
			$no ++;
			$pdf->SetX(120);
			$pdf->Cell(20, 40, $no, 1, "LR", "C");
			$pdf->Image(base_url('assets/auth/produk').'/'.$key->gambar,158,$nilaiY,35);
			$pdf->Cell(90, 40, '', 1, "LR", "C");
			$pdf->Cell(90, 40, $key->kd_barang, 1, "LR", "C");
			$pdf->Cell(80, 40, $key->nama_barang, 1, "LR", "C");
			$pdf->Cell(120, 40, $key->jenis, 1, "LR", "C");
			$pdf->Cell(80, 40, $key->stock, 1, "LR", "C");
			$pdf->Cell(80, 40, $key->harga, 1, "LR", "C");
			$pdf->Ln();
			$nilaiY = $pdf->GetY();
		}
	}
	
	$pdf->Output('Rekap-Barang-'.date('dFY').'.pdf','I');
?>