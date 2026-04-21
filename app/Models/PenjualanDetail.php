<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenjualanDetail extends Model
{
    //
    protected $table = 't_penjualan_detail';
    protected $primaryKey = 'detail_id';

    protected $fillable = [
        'penjualan_id',
        'barang_id',
        'jumlah',
        'harga',
        'subtotal',
    ];

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'penjualan_id', 'penjualan_id');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'barang_id');
    }

    protected static function booted()
    {
        static::creating(function ($detail) {
            $stok = \App\Models\Stok::where('barang_id', $detail->barang_id)->first();

            if ($stok && $stok->jumlah < $detail->jumlah) {
                throw new \Exception('Stok tidak mencukupi!');
            }

            $detail->subtotal = $detail->harga * $detail->jumlah;
        });

        static::created(function ($detail) {
            $stok = \App\Models\Stok::where('barang_id', $detail->barang_id)->first();

            if ($stok) {
                $stok->decrement('jumlah', $detail->jumlah);
            }

            $detail->penjualan->update([
                'total_harga' => $detail->penjualan->details()->sum('subtotal')
            ]);
        });

        static::updating(function ($detail) {
            $oldJumlah = $detail->getOriginal('jumlah');
            $newJumlah = $detail->jumlah;
            $selisih = $newJumlah - $oldJumlah;

            $stok = \App\Models\Stok::where('barang_id', $detail->barang_id)->first();

            if ($stok) {
                if ($selisih > 0) {
                    if ($stok->jumlah < $selisih) {
                        throw new \Exception('Stok tidak mencukupi!');
                    }
                    $stok->decrement('jumlah', $selisih);
                } elseif ($selisih < 0) {
                    $stok->increment('jumlah', abs($selisih));
                }
            }

            $detail->subtotal = $detail->harga * $detail->jumlah;
        });

        static::updated(function ($detail) {
            $detail->penjualan->update([
                'total_harga' => $detail->penjualan->details()->sum('subtotal')
            ]);
        });

        static::deleted(function ($detail) {
            $stok = \App\Models\Stok::where('barang_id', $detail->barang_id)->first();

            if ($stok) {
                $stok->increment('jumlah', $detail->jumlah);
            }

            $detail->penjualan->update([
                'total_harga' => $detail->penjualan->details()->sum('subtotal')
            ]);
        });
    }
}
