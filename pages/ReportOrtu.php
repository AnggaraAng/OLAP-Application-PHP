<?php
require '../vendor/autoload.php';

// koneksi php dan mysql
$koneksi = mysqli_connect("localhost","root","","db_bi");

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// sheet peratama
$sheet->setTitle('Laporan Orang Tua');
$sheet->setCellValue('A1', 'Kode Ortu');
$sheet->setCellValue('B1', 'Nama Ortu');
$sheet->setCellValue('C1', 'Alamat Ortu');
$sheet->setCellValue('D1', 'Kota Ortu');
$sheet->setCellValue('E1', 'Telpon Ortu');

// membaca data dari mysql
$dtl_mhs = mysqli_query($koneksi,"select * from dtl_mhs");
$row = 2;
while($record = mysqli_fetch_array($dtl_mhs))
{
    $sheet->setCellValue('A'.$row, $record['kode_ortu']);
    $sheet->setCellValue('B'.$row, $record['nama_ortu']);
    $sheet->setCellValue('C'.$row, $record['alm_ortu']);
    $sheet->setCellValue('D'.$row, $record['kota_ortu']);
    $sheet->setCellValue('E'.$row, $record['tlp_ortu']);
    $row++;
}

$writer = new Xlsx($spreadsheet);
$writer->save('Laporan Ortu.xlsx');
header('Location: ../index.php');
?>