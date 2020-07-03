<?php
require '../vendor/autoload.php';

// koneksi php dan mysql
$koneksi = mysqli_connect("localhost","root","","db_bi");

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// sheet peratama
$sheet->setTitle('Laporan Mahasiswa');
$sheet->setCellValue('A1', 'Nim');
$sheet->setCellValue('B1', 'Nama');
$sheet->setCellValue('C1', 'Alamat');
$sheet->setCellValue('D1', 'Kota');
$sheet->setCellValue('E1', 'Tempat Lahir');
$sheet->setCellValue('F1', 'Tanggal Lahir');
$sheet->setCellValue('G1', 'Jenis Kelamin');
$sheet->setCellValue('H1', 'Agama');
$sheet->setCellValue('I1', 'Jurusan SMA');
$sheet->setCellValue('J1', 'Kode Status');
$sheet->setCellValue('K1', 'Kode Progdi');
$sheet->setCellValue('L1', 'Kode Ortu');
$sheet->setCellValue('M1', 'Angkatan');

// membaca data dari mysql
$dtl_mhs = mysqli_query($koneksi,"select * from dtl_mhs");
$row = 2;
while($record = mysqli_fetch_array($dtl_mhs))
{
    $sheet->setCellValue('A'.$row, $record['nim']);
    $sheet->setCellValue('B'.$row, $record['nama']);
    $sheet->setCellValue('C'.$row, $record['alamat']);
    $sheet->setCellValue('D'.$row, $record['kota']);
    $sheet->setCellValue('E'.$row, $record['tmp_lahir']);
    $sheet->setCellValue('F'.$row, $record['tgl_lahir']);
    $sheet->setCellValue('G'.$row, $record['jenis_kelamin']);
    $sheet->setCellValue('H'.$row, $record['agama']);
    $sheet->setCellValue('I'.$row, $record['jur_sma']);
    $sheet->setCellValue('J'.$row, $record['kode_status']);
    $sheet->setCellValue('K'.$row, $record['kode_progdi']);
    $sheet->setCellValue('L'.$row, $record['kode_ortu']);
    $sheet->setCellValue('M'.$row, $record['akt']);
    $row++;
}

$writer = new Xlsx($spreadsheet);
$writer->save('Laporan Mahasiswa.xlsx');
header('Location: ../index.php');
?>