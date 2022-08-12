<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'whatsapp_id',
        'nama_produk',
        'slug',
        'harga',
        'deskripsi_produk',
        'template_pemesanan'
    ];
}
