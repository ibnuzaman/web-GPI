<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_produk',
        'foto',
        'harga',
        'stok',
    ];

    protected $table = 'products';

    public function orders()
    {
        return $this->hasMany(Orders::class, 'product_id', 'id');
    }

    public function rekapData()
    {
        return $this->hasMany(RekapData::class);
    }
}
