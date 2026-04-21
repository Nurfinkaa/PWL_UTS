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
        'tanggal',
        'total_harga',
    ];
}
