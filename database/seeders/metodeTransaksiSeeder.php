<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetodeTransaksiSeeder extends Seeder
{
    public function run()
    {
        DB::table('metode_transaksi')->insert([
            ['nama' => 'Cash'],
            ['nama' => 'Debit'],
            ['nama' => 'Transfer'],
            ['nama' => 'Kartu Kredit'],
        ]);
    }
}
