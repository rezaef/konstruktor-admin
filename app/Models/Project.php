<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_project',
        'lokasi',
        'status',
        'start_date',
        'deskripsi',
    ];

    protected $casts = [
        'start_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // 🔗 Relasi
    public function cashIns()
    {
        return $this->hasMany(CashIn::class);
    }

    public function cashOuts()
    {
        return $this->hasMany(CashOut::class);
    }

    // 📊 Method Bantuan
    public function totalPemasukan(): float
    {
        return $this->cashIns()->sum('jumlah');
    }

    public function totalPengeluaran(): float
    {
        return $this->cashOuts()->sum('harga_total');
    }

    public function saldo(): float
    {
        return $this->totalPemasukan() - $this->totalPengeluaran();
    }

    public function progresKeuangan(): float
    {
        $totalPemasukan = $this->totalPemasukan();
        $totalKontrak = $this->cashIns()->where('nama', 'like', '%Kontrak%')->sum('jumlah')
                         ?: $totalPemasukan; // fallback jika tidak ada label khusus

        return $totalKontrak > 0 ? ($totalPemasukan / $totalKontrak) * 100 : 0;
    }

    // ✨ Accessor
    public function namaProject(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucwords($value),
        );
    }

    public function statusBadge(): string
    {
        return match (strtolower($this->status)) {
            'selesai' => 'bg-success',
            'berjalan' => 'bg-primary',
            'tertunda' => 'bg-warning',
            'dibatalkan' => 'bg-danger',
            default => 'bg-secondary',
        };
    }
}
