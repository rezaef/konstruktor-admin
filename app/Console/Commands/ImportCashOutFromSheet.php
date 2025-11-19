<?php

namespace App\Console\Commands;

use Google\Client;
use Google\Service\Sheets;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportCashOutFromSheet extends Command
{
    protected $signature = 'import:cashout-sheet
                            {sheetId : Google Sheet ID}
                            {range? : Range, e.g., Sheet1!A1:F100}
                            {--project-id=1 : Project ID}';

    protected $description = 'Impor data cash_out dari Google Sheets (format sesuai DB)';

    public function handle()
    {
        $sheetId = $this->argument('sheetId');
        $range = $this->argument('range') ?? 'Sheet1'; // default sheet name
        $projectId = $this->option('project-id');

        // 🔐 Inisialisasi Google Client
        $client = new Client;
        $client->setAuthConfig(storage_path('app/google-service-account.json'));
        $client->addScope(Sheets::SPREADSHEETS_READONLY);

        $service = new Sheets($client);

        try {
            // 📥 Ambil data dari sheet
            $response = $service->spreadsheets_values->get($sheetId, $range);
            $rows = $response->getValues();

            if (empty($rows)) {
                $this->error('Sheet kosong.');

                return 1;
            }

            $headers = $rows[0]; // baris pertama = header
            $this->info('Header ditemukan: '.json_encode($headers));

            $dataRows = array_slice($rows, 1); // data mulai baris 2

            $success = 0;
            $errors = [];

            foreach ($dataRows as $i => $row) {
                try {
                    $this->importCashOutRow($row, $headers, $projectId);
                    $success++;
                } catch (\Exception $e) {
                    $errors[] = 'Baris '.($i + 2).': '.$e->getMessage();
                }
            }

            $this->info("✅ Berhasil: $success baris");
            if ($errors) {
                $this->error('❌ Gagal: '.count($errors).' baris');
                foreach ($errors as $err) {
                    $this->line("- $err");
                }
            }

        } catch (\Exception $e) {
            $this->error('Gagal mengakses sheet: '.$e->getMessage());

            return 1;
        }
    }

    private function importCashOutRow($row, $headers, $projectId)
    {
        // 🔍 Mapping kolom berdasarkan nama header (harus persis)
        $colMap = [
            'tanggal' => $this->findColumnIndex($headers, ['tanggal', 'Tanggal']),
            'nama' => $this->findColumnIndex($headers, ['nama', 'Nama']),
            'qty' => $this->findColumnIndex($headers, ['qty', 'Qty', 'Volume']),
            'metode_transaksi_id' => $this->findColumnIndex($headers, ['metode_transaksi_id', 'Metode Transaksi ID']),
            'harga_satuan' => $this->findColumnIndex($headers, ['harga_satuan', 'Harga Satuan']),
            'harga_total' => $this->findColumnIndex($headers, ['harga_total', 'Harga Total']),
        ];

        // 🧪 Validasi wajib: kolom harus ada
        foreach (['tanggal', 'nama', 'metode_transaksi_id'] as $key) {
            if ($colMap[$key] === null) {
                throw new \Exception("Kolom '$key' tidak ditemukan di header: ".json_encode($headers));
            }
        }

        // 📅 Tanggal
        $tanggal = $this->parseDate($row[$colMap['tanggal']] ?? null);
        if (! $tanggal) {
            throw new \Exception('Tanggal kosong/tidak valid');
        }

        // 📝 Nama
        $nama = trim($row[$colMap['nama']] ?? '');
        if (! $nama) {
            throw new \Exception('Nama pengeluaran kosong');
        }

        // 🔢 Qty & Harga
        $qty = (int) ($row[$colMap['qty']] ?? 1); // default 1 jika kosong
        $hargaSatuan = $this->parseAmount($row[$colMap['harga_satuan']] ?? 0);
        $hargaTotal = $this->parseAmount($row[$colMap['harga_total']] ?? 0);

        // 💳 Metode Transaksi ID (ambil langsung dari kolom)
        $metodeId = (int) ($row[$colMap['metode_transaksi_id']] ?? 3); // default: Transfer

        // ✅ Simpan ke database
        DB::table('cash_out')->updateOrInsert(
            [
                'project_id' => $projectId,
                'tanggal' => $tanggal,
                'nama' => $nama,
            ],
            [
                'qty' => $qty,
                'metode_transaksi_id' => $metodeId,
                'harga_satuan' => $hargaSatuan,
                'harga_total' => $hargaTotal ?: ($qty * $hargaSatuan), // hitung otomatis jika kosong
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );
    }

    private function findColumnIndex($headers, $candidates)
    {
        foreach ($candidates as $candidate) {
            $index = array_search($candidate, $headers);
            if ($index !== false) {
                return $index;
            }
        }

        return null;
    }

    private function parseDate($value)
    {
        if (! $value) {
            return null;
        }

        // Jika format Excel (angka serial date) → ubah ke tanggal
        if (is_numeric($value) && $value > 1 && $value < 100000) {
            try {
                $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value);

                return $date ? $date->format('Y-m-d') : null;
            } catch (\Exception $e) {
                // Jika gagal parsing Excel date, lanjut ke format teks
            }
        }

        // Format teks: force DD/MM/YYYY
        $value = trim($value);

        // Coba format DD/MM/YYYY dulu
        $date = \DateTime::createFromFormat('d/m/Y', $value);
        if ($date) {
            return $date->format('Y-m-d');
        }

        // Jika gagal, coba MM/DD/YYYY (untuk kompatibilitas)
        $date = \DateTime::createFromFormat('m/d/Y', $value);
        if ($date) {
            return $date->format('Y-m-d');
        }

        // Jika masih gagal, coba format lain
        $formats = [
            'Y-m-d',
            'd-m-Y',
            'j/n/Y',
            'j-n-Y',
            'd/m/y',
            'm/d/y',
        ];

        foreach ($formats as $format) {
            $date = \DateTime::createFromFormat($format, $value);
            if ($date) {
                return $date->format('Y-m-d');
            }
        }

        return null;
    }

    private function parseAmount($value)
    {
        // Hapus titik, koma, spasi → jadi angka
        $clean = preg_replace('/[^\d]/', '', (string) $value);

        return (float) ($clean ?: 0);
    }
}
