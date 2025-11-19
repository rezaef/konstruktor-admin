<?php

namespace Database\Seeders;

use App\Models\MetodeTransaksi;
use Illuminate\Database\Seeder;

class metodeTransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MetodeTransaksi::create(['name' => 'Cash']);
        MetodeTransaksi::create(['name' => 'Debit']);
        MetodeTransaksi::create(['name' => 'Transfer']);
        MetodeTransaksi::create(['name' => 'Kartu Kredit']);
    }
}
