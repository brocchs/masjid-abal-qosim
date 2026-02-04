<?php

namespace App\Imports;

use App\Models\CashFlow;
use Carbon\Carbon;
use Exception;

class CashFlowImport
{
    protected $errors = [];
    protected $successCount = 0;
    protected $user_id;

    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    public function import($filePath)
    {
        $this->errors = [];
        $this->successCount = 0;

        // Load Excel file
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();
        
        // Validasi header
        $header = array_map('strtolower', array_map('trim', $rows[0]));
        $expectedHeaders = ['tanggal', 'jenis', 'jumlah', 'deskripsi'];
        if (!$this->validateHeaders($header, $expectedHeaders)) {
            $this->errors[] = [
                'row' => 1,
                'message' => 'Format header salah. Header harus: tanggal, jenis, jumlah, deskripsi'
            ];
            return false;
        }

        // Process data rows
        for ($i = 1; $i < count($rows); $i++) {
            $data = $rows[$i];
            $rowNumber = $i + 1;
            
            if (count($data) < 4) {
                $this->errors[] = [
                    'row' => $rowNumber,
                    'message' => 'Jumlah kolom tidak sesuai. Harus ada 4 kolom.'
                ];
                continue;
            }

            $validation = $this->validateRow($data, $rowNumber);
            if (!$validation['valid']) {
                $this->errors[] = [
                    'row' => $rowNumber,
                    'message' => $validation['message']
                ];
                continue;
            }

            try {
                // Handle date from Excel
                $date = $data[0];
                if (is_numeric($date)) {
                    $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($date)->format('Y-m-d');
                } else {
                    $date = Carbon::createFromFormat('d/m/Y', trim($date))->format('Y-m-d');
                }

                CashFlow::create([
                    'transaction_date' => $date,
                    'type' => strtolower(trim($data[1])) === 'pemasukan' ? 'credit' : 'debit',
                    'amount' => floatval(str_replace(['.', ','], ['', '.'], trim($data[2]))),
                    'description' => trim($data[3]),
                    'user_id' => $this->user_id
                ]);
                $this->successCount++;
            } catch (Exception $e) {
                $this->errors[] = [
                    'row' => $rowNumber,
                    'message' => 'Gagal menyimpan data: ' . $e->getMessage()
                ];
            }
        }

        return true;
    }

    protected function validateHeaders($header, $expected)
    {
        if (count($header) !== count($expected)) {
            return false;
        }

        foreach ($expected as $index => $expectedHeader) {
            if (strtolower(trim($header[$index])) !== $expectedHeader) {
                return false;
            }
        }

        return true;
    }

    protected function validateRow($data, $row)
    {
        // Validasi tanggal
        $date = trim($data[0]);
        if (empty($date)) {
            return ['valid' => false, 'message' => 'Kolom tanggal kosong'];
        }
        
        try {
            Carbon::createFromFormat('d/m/Y', $date);
        } catch (Exception $e) {
            return ['valid' => false, 'message' => 'Format tanggal salah. Gunakan format: dd/mm/yyyy (contoh: 31/12/2024)'];
        }

        // Validasi jenis
        $type = strtolower(trim($data[1]));
        if (!in_array($type, ['pemasukan', 'pengeluaran'])) {
            return ['valid' => false, 'message' => 'Kolom jenis harus diisi "Pemasukan" atau "Pengeluaran"'];
        }

        // Validasi jumlah
        $amount = trim($data[2]);
        if (empty($amount)) {
            return ['valid' => false, 'message' => 'Kolom jumlah kosong'];
        }
        
        $cleanAmount = str_replace(['.', ','], ['', '.'], $amount);
        if (!is_numeric($cleanAmount) || floatval($cleanAmount) <= 0) {
            return ['valid' => false, 'message' => 'Kolom jumlah harus berupa angka positif (contoh: 100000 atau 100.000)'];
        }

        // Validasi deskripsi
        if (empty(trim($data[3]))) {
            return ['valid' => false, 'message' => 'Kolom deskripsi kosong'];
        }

        return ['valid' => true];
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function getSuccessCount()
    {
        return $this->successCount;
    }
}
