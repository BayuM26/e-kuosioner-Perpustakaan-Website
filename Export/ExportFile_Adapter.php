<?php

session_start();

require_once '../lib/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment; 
use PhpOffice\PhpSpreadsheet\Style\Border;



$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$fontheader = [
    'font' => [
        'size' =>12,
        'bold'=>true,
    ],

    'alignment'=>[
        'horizontal'=>Alignment::HORIZONTAL_CENTER,    
    ],
];

$justBold = [
    'font' => [
        'size' =>10,
        'bold'=>true,
    ],
];

// borders
$justborder = [
    'font' => [
        'size' =>10,
        'bold'=>true,
    ],
    
    'borders' => [
        'allBorders' => [
            'borderStyle' => Border::BORDER_THIN,
            'color' => ['argb' => '000000'],
        ],
    ],
   
];

// style untuk judul kolom
    $fontJK = [
        'font'=>[
            'color'=>[
                'rgb'=>'000000'
            ],
            'bold'=>true,
            'size'=>10
        ],

        'alignment'=>[
            'horizontal'=>Alignment::HORIZONTAL_CENTER,    
        ],

        'borders' => [
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
                'color' => ['argb' => '000000'],
            ],
        ],
    ];
// end style untuk judul kolom

//style untuk isi kolom
    $fontisiKolom = [
        'font'=>[
            'size'=>10
        ],
        
        'alignment'=>[
            'horizontal'=>Alignment::HORIZONTAL_CENTER,
            'vertical'=>Alignment::VERTICAL_CENTER    
        ],
        
        'borders' => [
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
                'color' => ['argb' => '000000'],
            ],
        ],
    ];
// end style untuk isi kolom


$spreadsheet->getDefaultStyle()
    ->getFont()
    ->setName('Arial')
    ->setSize(10);

// HEADER
    $sheet ->setCellValue('B2',"TABULASI DATA KUESIONER KEPUASAN MASYARAKAT");

    // merge heading
        $sheet->mergeCells('B2:L2');
    // end merge heading

    $sheet->getStyle('B2')->applyFromArray($fontheader);

// end header




// isi 
    // judul kolom
        $sheet      ->setCellValue('C4', "ITEM SOAL")
                    ->setCellValue('B4', "No")
                    ->setCellValue('C5', "Q1")
                    ->setCellValue('D5', "Q2")
                    ->setCellValue('E5', "Q3")
                    ->setCellValue('F5', "Q4")
                    ->setCellValue('G5', "Q5")
                    ->setCellValue('H5', "Q6")
                    ->setCellValue('I5', "Q7")
                    ->setCellValue('J5', "Q8")
                    ->setCellValue('K5', "Q9");
    

        // mengatur size dan style judul kolom
            $spreadsheet->getActiveSheet()
                        ->getStyle('B4:K5')
                        ->applyFromArray($fontJK);
        // end mengatur size dan style judul kolom

        // merge heading
            $sheet->mergeCells('B4:B5');

            $sheet->mergeCells('C4:K4');
            $spreadsheet->getActiveSheet()
            ->getStyle('B4')
            ->getAlignment()
            ->setVertical(Alignment::VERTICAL_CENTER);
        // end merge heading
    // end judul kolom

    // isi kolom
        require_once '../koesioner_adapter.php';
 
            $query = $con->prepare("SELECT * FROM jawaban_responden jr, data_responden dt WHERE dt.id_data_responden = jr.id_jawaban_responden ORDER BY id_jawaban_responden ASC");
            $query->execute();          

        $angka = 6;
        $no = 1;
        
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
    
            $spreadsheet -> getActiveSheet()
                        ->setCellValue('B' . $angka, $no)
                        ->setCellValue('C' . $angka, $row['Q1'])
                        ->setCellValue('D' . $angka, $row['Q2'])
                        ->setCellValue('E' . $angka, $row['Q3'])
                        ->setCellValue('F' . $angka, $row['Q4'])
                        ->setCellValue('G' . $angka, $row['Q5'])
                        ->setCellValue('H' . $angka, $row['Q6'])
                        ->setCellValue('I' . $angka, $row['Q7'])
                        ->setCellValue('J' . $angka, $row['Q8'])
                        ->setCellValue('K' . $angka, $row['Q9']);           

                $angka++;
                $no++;
        }
        
         // panggil style
         $sheet->getStyle('B6:K'.$angka)->applyFromArray($fontisiKolom);
         // end panggil style


// Perhitungan
        $total = $angka+1;
        $total2 = $total+1;

        $NNR = $total+2;
        $NNR2 = $NNR+1;

        $NNRtertbg = $NNR+2;
        $NNRtertbg2 = $NNRtertbg+1;

        $IKM2 = $NNRtertbg+2;
        $IKM = $NNRtertbg+3;
        
        $spreadsheet -> getActiveSheet()
                    ->setCellValue('B'.$total, "TOTAL")
                    ->setCellValue('B'.$NNR, "NNR")
                    ->setCellValue('B'.$NNRtertbg, "NNRtertbg");

        $sheet->mergeCells('B'.$total.':B'.$total2);
        $sheet->mergeCells('B'.$NNR.':B'.$NNR2);
        $sheet->mergeCells('B'.$NNRtertbg.':B'.$NNRtertbg2);

        $spreadsheet -> getActiveSheet()
                    ->setCellValue('C'.$total, "=SUM(C6:C".$angka.")")
                    ->setCellValue('C'.$NNR, "=SUM(C6:C".$angka.")/COUNT(C6:C".$angka.")")
                    ->setCellValue('C'.$NNRtertbg, "=C".$NNR. "* 0.111");

        $sheet->mergeCells('C'.$total.':C'.$total2);
        $sheet->mergeCells('C'.$NNR.':C'.$NNR2);
        $sheet->mergeCells('C'.$NNRtertbg.':C'.$NNRtertbg2);

        $spreadsheet -> getActiveSheet()
                    ->setCellValue('D'.$total, "=SUM(D6:D".$angka.")")
                    ->setCellValue('D'.$NNR, "=SUM(D6:D".$angka.")/COUNT(D6:D".$angka.")")
                    ->setCellValue('D'.$NNRtertbg, "=D".$NNR ."* 0.111");

        $sheet->mergeCells('D'.$total.':D'.$total2);
        $sheet->mergeCells('D'.$NNR.':D'.$NNR2);
        $sheet->mergeCells('D'.$NNRtertbg.':D'.$NNRtertbg2);

        $spreadsheet -> getActiveSheet()
                    ->setCellValue('E'.$total, "=SUM(E6:E".$angka.")")
                    ->setCellValue('E'.$NNR, "=SUM(E6:E".$angka.")/COUNT(E6:E".$angka.")")
                    ->setCellValue('E'.$NNRtertbg, "=E".$NNR ."* 0.111");

        $sheet->mergeCells('E'.$total.':E'.$total2);
        $sheet->mergeCells('E'.$NNR.':E'.$NNR2);
        $sheet->mergeCells('E'.$NNRtertbg.':E'.$NNRtertbg2);

        $spreadsheet -> getActiveSheet()
                    ->setCellValue('F'.$total, "=SUM(F6:F".$angka.")")
                    ->setCellValue('F'.$NNR, "=SUM(F6:F".$angka.")/COUNT(F6:F".$angka.")")
                    ->setCellValue('F'.$NNRtertbg, "=F".$NNR ."* 0.111");

        $sheet->mergeCells('F'.$total.':F'.$total2);
        $sheet->mergeCells('F'.$NNR.':F'.$NNR2);
        $sheet->mergeCells('F'.$NNRtertbg.':F'.$NNRtertbg2);

        $spreadsheet -> getActiveSheet()
                    ->setCellValue('G'.$total, "=SUM(G6:G".$angka.")")
                    ->setCellValue('G'.$NNR, "=SUM(G6:G".$angka.")/COUNT(G6:G".$angka.")")
                    ->setCellValue('G'.$NNRtertbg, "=G".$NNR ."* 0.111");

        $sheet->mergeCells('G'.$total.':G'.$total2);
        $sheet->mergeCells('G'.$NNR.':G'.$NNR2);
        $sheet->mergeCells('G'.$NNRtertbg.':G'.$NNRtertbg2);

        $spreadsheet -> getActiveSheet()
                    ->setCellValue('H'.$total, "=SUM(H6:H".$angka.")")
                    ->setCellValue('H'.$NNR, "=SUM(H6:H".$angka.")/COUNT(H6:H".$angka.")")
                    ->setCellValue('H'.$NNRtertbg, "=H".$NNR ."* 0.111");

        $sheet->mergeCells('H'.$total.':H'.$total2);
        $sheet->mergeCells('H'.$NNR.':H'.$NNR2);
        $sheet->mergeCells('H'.$NNRtertbg.':H'.$NNRtertbg2);

        $spreadsheet -> getActiveSheet()
                    ->setCellValue('I'.$total, "=SUM(I6:I".$angka.")")
                    ->setCellValue('I'.$NNR, "=SUM(I6:I".$angka.")/COUNT(I6:I".$angka.")")
                    ->setCellValue('I'.$NNRtertbg, "=I".$NNR ."* 0.111");

        $sheet->mergeCells('I'.$total.':I'.$total2);
        $sheet->mergeCells('I'.$NNR.':I'.$NNR2);
        $sheet->mergeCells('I'.$NNRtertbg.':I'.$NNRtertbg2);

        $spreadsheet -> getActiveSheet()
                    ->setCellValue('J'.$total, "=SUM(J6:J".$angka.")")
                    ->setCellValue('J'.$NNR, "=SUM(J6:J".$angka.")/COUNT(J6:J".$angka.")")
                    ->setCellValue('J'.$NNRtertbg, "=J".$NNR ."* 0.111");

        $sheet->mergeCells('J'.$total.':J'.$total2);
        $sheet->mergeCells('J'.$NNR.':J'.$NNR2);
        $sheet->mergeCells('J'.$NNRtertbg.':J'.$NNRtertbg2);

        $spreadsheet -> getActiveSheet()
                    ->setCellValue('K'.$total, "=SUM(K6:K".$angka.")")
                    ->setCellValue('K'.$NNR, "=SUM(K6:K".$angka.")/COUNT(K6:K".$angka.")")
                    ->setCellValue('K'.$NNRtertbg, "=K".$NNR ."* 0.111");

        $sheet->mergeCells('K'.$total.':K'.$total2);
        $sheet->mergeCells('K'.$NNR.':K'.$NNR2);
        $sheet->mergeCells('K'.$NNRtertbg.':K'.$NNRtertbg2);

        $spreadsheet -> getActiveSheet()
                    ->setCellValue('L'.$NNRtertbg, "*)")
                    ->setCellValue('L'.$NNRtertbg2, "=SUM(C".$NNRtertbg.":K".$NNRtertbg.")");

        $spreadsheet -> getActiveSheet()
                    ->setCellValue('B'.$IKM2, "IKM UNIT PELAYANAN")
                    ->setCellValue('L'.$IKM2,"**)")
                    ->setCellValue('L'.$IKM, "=L".$NNRtertbg2."*25");

        $sheet->mergeCells('B'.$IKM2.':K'.$IKM);

        $sheet->getStyle('B'.$total.':K'.$NNRtertbg2)->applyFromArray($fontisiKolom);
        $sheet->getStyle('B'.$IKM2.':K'.$IKM)->applyFromArray($justborder);
        $sheet->getStyle('L'.$NNRtertbg.':M'.$IKM)->applyFromArray($justborder);
        $sheet->getStyle('Q16')->applyFromArray($fontheader);

        $sheet->getStyle('Q17')->applyFromArray($justBold);
        $sheet->getStyle('N16')->applyFromArray($justBold);

        $sheet->mergeCells('L'.$total.':M'.$NNR2);
        $sheet->mergeCells('L'.$NNRtertbg.':M'.$NNRtertbg);
        $sheet->mergeCells('L'.$NNRtertbg2.':M'.$NNRtertbg2);
        $sheet->mergeCells('L'.$IKM2.':M'.$IKM2);
        $sheet->mergeCells('L'.$IKM.':M'.$IKM);

        
// end perhitungan
      
// end isi kolom


    $sheet -> setCellValue('N5', "No.")
            ->setCellValue('N6', "U1")
            ->setCellValue('N7', "U2")
            ->setCellValue('N8', "U3")
            ->setCellValue('N9', "U4")
            ->setCellValue('N10', "U5")
            ->setCellValue('N11', "U6")
            ->setCellValue('N12', "U7")
            ->setCellValue('N13', "U8")
            ->setCellValue('N14', "U9")

            -> setCellValue('O5', "UNSUR PELAYANAN")
            -> setCellValue('O6', "Persyaratan")
            -> setCellValue('O7', "Prosedur")
            -> setCellValue('O8', "Waktu pelayanan")
            -> setCellValue('O9', "Biaya/tarif")
            -> setCellValue('O10', "Produk layanan")
            -> setCellValue('O11', "Kompetensi pelaksana")
            -> setCellValue('O12', "Prilaku pelaksana")
            -> setCellValue('O13', "Maklumat Pelayanan")
            -> setCellValue('O14', "Penanganan Pengaduan")

            -> setCellValue('P5', "NILAI RATA-RATA")
            -> setCellValue('P6', "=SUM(C6:C".$angka.")/COUNT(C6:C".$angka.")")
            -> setCellValue('P7', "=SUM(D6:D".$angka.")/COUNT(D6:D".$angka.")")
            -> setCellValue('P8', "=SUM(E6:E".$angka.")/COUNT(E6:E".$angka.")")
            -> setCellValue('P9', "=SUM(F6:F".$angka.")/COUNT(F6:F".$angka.")")
            -> setCellValue('P10', "=SUM(G6:G".$angka.")/COUNT(G6:G".$angka.")")
            -> setCellValue('P11', "=SUM(H6:H".$angka.")/COUNT(H6:H".$angka.")")
            -> setCellValue('P12', "=SUM(I6:I".$angka.")/COUNT(I6:I".$angka.")")
            -> setCellValue('P13', "=SUM(J6:J".$angka.")/COUNT(J6:J".$angka.")")
            -> setCellValue('P14', "=SUM(K6:K".$angka.")/COUNT(K6:K".$angka.")");

            $sheet -> getStyle('N6:P14')->applyFromArray($fontisiKolom);
            $sheet -> getColumnDimension('N')->setWidth(6);
            $sheet ->getColumnDimension('O')->setWidth(30);
            $sheet ->getColumnDimension('P')->setWidth(20);
            $sheet -> getStyle('N5:P5')->applyFromArray($fontJK);


            $sheet ->setCellValue('N16', "Keterangan :")
                    ->setCellValue('N17', "'-NNR")
                    ->setCellValue('O17', "'= Nilai rata-rata")
                    ->setCellValue('N18', "'-IKM")
                    ->setCellValue('O18', "' = Indeks Kepuasan Masyarakat")
                    ->setCellValue('N19', "'- U1 s.d. U14")
                    ->setCellValue('O19', "' = Unsur-Unsur pelayanan  ")
                    ->setCellValue('N20', "'-*)")
                    ->setCellValue('O20', "' = Jumlah NRR IKM tertimbang")
                    ->setCellValue('N21', "'-**)")
                    ->setCellValue('O21', "' =  Jumlah NRR Tertimbang x 25");

            $sheet ->setCellValue('Q16', "IKM UNIT PELAYANAN")
                    ->setCellValue('Q17', "MUTU Pelayanan :")

                    ->setCellValue('Q18', "A (Sangat Baik)")
                    ->setCellValue('R18', ": 88,31 - 100,00")

                    ->setCellValue('Q19', "B (BAIK)")
                    ->setCellValue('R19', ": 76,61 - 88,30")

                    ->setCellValue('Q20', "C (Kurang Baik)")
                    ->setCellValue('R20', ": 65,00 - 76,60")

                    ->setCellValue('Q21', "D(Tidak Baik)")
                    ->setCellValue('R21', ": 25,00 - 64,99");

// end isi


// SIMPAN FILE
    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header("Content-Disposition: attachment;filename=\"Data Kuesioner.xlsx\"");
// END SIMPAN FILE



$writer = IOFactory::createWriter($spreadsheet, "Xlsx");
$writer->save('php://output');



 