<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nama_customer',
        'nomorHp',
        'waktu_beli',
        'nama_produk',
        'jumlah_beli',
        'total_harga',
        'status',
        'id',
    ];

    protected $table = 'orders';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Products::class, 'nama_produk', 'nama_produk');
    }
}
