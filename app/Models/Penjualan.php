<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    //
    protected $table = 't_penjualan';
    protected $primaryKey = 'penjualan_id';

    protected $fillable = [
        'user_id',
        'pembeli',
        'penjualan_kode',
        'tanggal',
    ];

    public function details()
        {
            return $this->hasMany(PenjualanDetail::class, 'penjualan_id', 'penjualan_id');
        }

    public function user()
    {
        return $this->belongsTo(MUser::class, 'user_id', 'user_id');
    }

}
