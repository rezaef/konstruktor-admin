<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MetodeTransaksi extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    // 🔗 Relasi
    public function cashIns()
    {
        return $this->hasMany(CashIn::class, 'metode_transaksi_id');
    }

    public function cashOuts()
    {
        return $this->hasMany(CashOut::class, 'metode_transaksi_id');
    }

    // ✨ Helper: Icon & Warna untuk Dashboard Admin
    public function icon(): string
    {
        return match (strtolower($this->nama)) {
            'cash' => '💵',
            'debit' => '💳',
            'transfer' => '🏦',
            'kartu kredit' => '💳',
            default => '💰',
        };
    }

    public function badgeClass(): string
    {
        return match (strtolower($this->nama)) {
            'cash' => 'bg-success',
            'debit' => 'bg-info',
            'transfer' => 'bg-primary',
            'kartu kredit' => 'bg-warning text-dark',
            default => 'bg-secondary',
        };
    }

    // Untuk tampilan di dropdown/select
    public function label(): string
    {
        return $this->icon() . ' ' . $this->nama;
    }
}
