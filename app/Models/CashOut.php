<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class CashOut extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'tanggal',
        'nama',
        'qty',
        'metode_transaksi_id',
        'harga_satuan',
        'harga_total',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'harga_satuan' => 'decimal:2',
        'harga_total' => 'decimal:2',
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

    // ✨ Accessor & Mutator
    public function hargaSatuanFormatted(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => 'Rp ' . number_format($value, 0, ',', '.'),
        );
    }

    public function hargaTotalFormatted(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => 'Rp ' . number_format($value, 0, ',', '.'),
        );
    }

    // Auto hitung harga_total saat simpan
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->harga_total) {
                $model->harga_total = $model->qty * $model->harga_satuan;
            }
        });

        static::updating(function ($model) {
            $model->harga_total = $model->qty * $model->harga_satuan;
        });
    }

    // Kategori pengeluaran (untuk grafik)
    public function kategori(): string
    {
        $lower = strtolower($this->nama);
        if (str_contains($lower, 'material') || str_contains($lower, 'besi') || str_contains($lower, 'semen')) {
            return 'Material';
        }
        if (str_contains($lower, 'upah') || str_contains($lower, 'gaji') || str_contains($lower, 'kerja')) {
            return 'Upah';
        }
        if (str_contains($lower, 'alat') || str_contains($lower, 'sewa')) {
            return 'Sewa Alat';
        }
        return 'Lainnya';
    }
}
