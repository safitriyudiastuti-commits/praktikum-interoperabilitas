<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $fillable = ['product_id', 'jumlah', 'total_harga', 'tanggal'];
}
