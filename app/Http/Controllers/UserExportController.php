<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class UserExportController extends Controller
{
    public function export(){
        $users = DB::table('users')->select('name', 'email', 'nisn', 'kelas')->get();

        // membuat spreadsheed baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // header kolom
        $sheet->setCellValue("A1", "#");
        $sheet->setCellValue("B1", "Nama");
        $sheet->setCellValue("C1", "NISN");
        $sheet->setCellValue("D1", "Kelas");
        $sheet->setCellValue("E1", "Email");

        $row = 2;
        $number = 1;
        foreach($users as $user){
            $sheet->setCellValue("A{$row}", $number);
            $sheet->setCellValue("B{$row}", $user->name);
            $sheet->setCellValue("C{$row}", $user->nisn);
            $sheet->setCellValue("D{$row}", $user->kelas);
            $sheet->setCellValue("E{$row}", $user->email);
            $row++;
            $number++;
        }

        // Set header untuk file Excel
        $filename = 'users_' . date('Y-m-d_H-i-s') . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"{$filename}\"");

        // Simpan dan unduh file
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
}
