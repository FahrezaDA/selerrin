<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produk')->insert([

        [
            'nama_produk' => 'Teh Gelas',
            'foto_produk' => 'admin',
            'harga_produk' => '12',
            'stok_produk' => '60',
        ],

        [
            'nama_produk' => 'Teh Melati',
            'foto_produk' => 'admin',
            'harga_produk' => '10',
            'stok_produk' => '60',
        ],


        ]);
    }
}
