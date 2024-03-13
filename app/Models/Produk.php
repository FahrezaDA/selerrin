<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    public $timestamps = false;
    protected $primaryKey='id_produk';
    protected $table= 'produk';
    protected $fillable=[
        'nama_produk',
        'foto_produk',
        'harga_produk',
        'stok_produk',
            ];


public function transactions()
{
    return $this->hasMany(Transaction::class);
}
}
