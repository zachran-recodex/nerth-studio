<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'title' => 'HOPE',
            'slug' => Str::slug('hero'),
            'image' => 'images/product1.jpg',
            'price' => 149900,
            'description' => 'Banyak harapan yang ada dipundak kita semua. Harapan orang-orang yang sebisa mungkin harus kita usahakan meski hasil belum tentu sesuai dengan apa yang kita upayakan.',
            'background' => 'images/bg1.jpg'
        ]);

        Product::create([
            'title' => 'SCRF',
            'slug' => Str::slug('scrf'),
            'image' => 'images/product2.jpg',
            'price' => 149900,
            'description' => 'Kehidupan yang indah tidak dapat terjadi begitu saja, dalam hidup kita perlu pengorbanan, pengorbanan perlu perjuangan, dan perjuangan perlu ketabahan.',
            'background' => 'images/bg2.jpg'
        ]);

        Product::create([
            'title' => 'FBDR',
            'slug' => Str::slug('fbdr'),
            'image' => 'images/product3.jpg',
            'price' => 149900,
            'description' => 'Tidak ada dari kita yang tahu apa yang mungkin terjadi bahkan menit berikutnya, namun kita tetap melangkah maju. Karena kita percaya. Karena kita memiliki keyakinan.',
            'background' => 'images/bg3.jpg'
        ]);
    }
}
