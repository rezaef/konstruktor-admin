<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Google\Client;
use Google\Service\Sheets;

class ImportProjectsFromSheet extends Command
{
    protected $signature = 'import:projects-sheet
                            {sheetId : Google Sheet ID}
                            {range? : Range, e.g., Sheet1!A1:E100}';

    protected $description = 'Impor data projects dari Google Sheets (testing)';

    public function handle()
    {
        $sheetId = $this->argument('sheetId');
        $range = $this->argument('range') ?? 'Sheet1'; // default sheet

        // 🔐 Inisialisasi Google Client
        $client = new Client();
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
            $this->info("Header ditemukan: " . json_encode($headers));

            $dataRows = array_slice($rows, 1); // data mulai baris 2

            $success = 0;
            $errors = [];

            foreach ($dataRows as $i => $row) {
                try {
                    $this->importProjectRow($row, $headers);
                    $success++;
                } catch (\Exception $e) {
                    $errors[] = "Baris " . ($i + 2) . ": " . $e->getMessage();
                }
            }

            $this->info("✅ Berhasil: $success proyek");
            if ($errors) {
                $this->error("❌ Gagal: " . count($errors) . " baris");
                foreach ($errors as $err) {
                    $this->line("- $err");
                }
            }

        } catch (\Exception $e) {
            $this->error("Gagal mengakses sheet: " . $e->getMessage());
            return 1;
        }
    }

    private function importProjectRow($row, $headers)
    {
        // 🔍 Mapping kolom sesuai header di screenshot Anda
        $colMap = [
            'nama_project' => $this->findColumnIndex($headers, ['Nama Proyek', 'nama_project', 'Project Name']),
            'lokasi' => $this->findColumnIndex($headers, ['Lokasi', 'lokasi', 'Location']),
            'status' => $this->findColumnIndex($headers, ['Status', 'status']),
            'start_date' => $this->findColumnIndex($headers, ['Tanggal Mulai', 'start_date', 'Start Date']),
            'deskripsi' => $this->findColumnIndex($headers, ['Deskripsi', 'deskripsi', 'Description']),
        ];

        // 🧪 Debug: cek apakah kolom ditemukan
        if ($colMap['nama_project'] === null) {
            throw new \Exception("Kolom 'Nama Proyek' tidak ditemukan di header: " . json_encode($headers));
        }

        // ✅ Validasi wajib: nama_project & lokasi
        $nama = trim($row[$colMap['nama_project']] ?? '');
        $lokasi = trim($row[$colMap['lokasi']] ?? '');

        if (!$nama || !$lokasi) {
            throw new \Exception("Nama project atau lokasi kosong");
        }

        // 📅 Parse start_date
        $startDate = null;
        if (isset($row[$colMap['start_date']]) && $row[$colMap['start_date']]) {
            $startDate = $this->parseDate($row[$colMap['start_date']]);
        }

        // 📝 Simpan ke database
        DB::table('projects')->updateOrInsert(
            ['nama_project' => $nama, 'lokasi' => $lokasi],
            [
                'status' => $row[$colMap['status']] ?? null,
                'start_date' => $startDate,
                'deskripsi' => $row[$colMap['deskripsi']] ?? null,
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );
    }

    private function findColumnIndex($headers, $candidates)
    {
        foreach ($candidates as $candidate) {
            $index = array_search($candidate, $headers);
            if ($index !== false) return $index;
        }
        return null;
    }

    private function parseDate($value)
    {
        if (!$value) return null;
        // Format: "07/06/2022" atau "2022-06-07"
        $formats = ['d/m/Y', 'Y-m-d', 'm/d/Y'];
        foreach ($formats as $format) {
            $date = \DateTime::createFromFormat($format, $value);
            if ($date) return $date->format('Y-m-d');
        }
        return null;
    }
}
