<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class BookExportController extends Controller
{
    public function export(){
        $books = DB::table('books')->select("title", "deskripsi", "author", "cover", "kategori_buku", "kategori_kelas")->get();

        // membuat spreadsheed baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // header kolom
        $sheet->setCellValue("A1", "#");
        $sheet->setCellValue("B1", "Judul");
        $sheet->setCellValue("C1", "Penulis");
        $sheet->setCellValue("D1", "Kategori Buku");
        $sheet->setCellValue("E1", "Kategori Kelas");
        $sheet->setCellValue("F1", "Cover");

        $row = 2;
        $number = 1;
        foreach($books as $book){
            $sheet->setCellValue("A{$row}", $number);
            $sheet->setCellValue("B{$row}", $book->title);
            $sheet->setCellValue("C{$row}", $book->author);
            $sheet->setCellValue("D{$row}", $book->kategori_buku);
            $sheet->setCellValue("E{$row}", $book->kategori_kelas);

            $row++;
            $number++;
        }

        // Menambahkan gambar
        if (!empty($book->cover)) {
            $drawing = new Drawing();
            $drawing->setPath(storage_path('app/public/covers/' . $book->cover)); // Path gambar di folder public/images/
            $drawing->setHeight(400); // Tinggi gambar
            $drawing->setWidth(400);
            $drawing->setCoordinates("F{$row}"); // Menempatkan gambar di kolom F pada baris saat ini
            $drawing->setWorksheet($sheet);
        }

        // Set header untuk file Excel
        $filename = 'books_' . date('Y-m-d_H-i-s') . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"{$filename}\"");

        // Simpan dan unduh file
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
}
