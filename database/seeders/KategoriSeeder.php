<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //  $kategoris = [
        //     [
        //         'nama' => 'Komputer',
        //         'deskripsi' => 'Kategori untuk semua perangkat komputer dan aksesoris'
        //     ],
        //     [
        //         'nama' => 'Barang', 
        //         'deskripsi' => 'Kategori untuk berbagai macam barang umum'
        //     ],
        //     [
        //         'nama' => 'HP',
        //         'deskripsi' => 'Kategori untuk smartphone dan perangkat mobile'
        //     ]
        // ];

        // foreach ($kategoris as $kategori) {
        //     Kategori::create([
        //         'nama_kategori' => $kategori['nama'],
        //         'slug' => Str::slug($kategori['nama']),
        //         'deskripsi' => $kategori['deskripsi']
        //     ]);
        // }
        $faker = Faker::create('id_ID');
        for ($i=0; $i < 5; $i++) { 
            Kategori::create([
                'nama_kategori' => $faker->sentence(2),
                'slug' => $faker->slug(),
                'deskripsi' => $faker->paragraph(3)
            ]);
        }
    }
}
