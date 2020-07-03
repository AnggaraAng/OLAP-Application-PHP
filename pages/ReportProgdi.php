<?php
require '../vendor/autoload.php';

// koneksi php dan mysql
$koneksi = mysqli_connect("localhost","root","","db_bi");

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// sheet peratama
$sheet->setTitle('Laporan Progdi');
$sheet->setCellValue('A1', 'Kode Progdi');
$sheet->setCellValue('B1', 'Nama Progdi');
$sheet->setCellValue('C1', 'Jenjang');
$sheet->setCellValue('D1', 'Kode Fakultas');

// membaca data dari mysql
$dtl_progdi = mysqli_query($koneksi,"select * from dtl_progdi");
$row = 2;
while($record = mysqli_fetch_array($dtl_progdi))
{
    $sheet->setCellValue('A'.$row, $record['kode_progdi']);
    $sheet->setCellValue('B'.$row, $record['nama_progdi']);
    $sheet->setCellValue('C'.$row, $record['jenjang']);
    $sheet->setCellValue('D'.$row, $record['kode_fakultas']);
    $row++;
}

$writer = new Xlsx($spreadsheet);
$writer->save('Laporan Progdi.xlsx');
header('Location: ../index.php');
?>