<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapData extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'jmlh_terjual',
        'total_harga',
        'tanggal',
    ];

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
