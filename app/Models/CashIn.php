<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class CashIn extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'tanggal',
        'nama',
        'metode_transaksi_id',
        'jumlah',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'jumlah' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // 🔗 Relasi
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function metode()
    {
        return $this->belongsTo(MetodeTransaksi::class, 'metode_transaksi_id');
    }

    // ✨ Accessor
    public function jumlahFormatted(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => 'Rp ' . number_format($value, 0, ',', '.'),
        );
    }

    public function isTermin(): bool
    {
        return str_contains(strtolower($this->nama), 'termin') ||
               str_contains(strtolower($this->nama), 'pembayaran');
    }
}
