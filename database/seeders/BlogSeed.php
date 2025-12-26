<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::create([
            'id_category' => 1,
            'title' => 'Perjalanan Saya ikut LKS',
            'description' => 'Pengalaman berharga saya saat mengikuti Lomba Kompetensi Siswa (LKS) di bidang teknologi informasi.',
            'slug' => 'perjalanan-saya-ikut-lks',
            'content' => 'Saya sangat bersemangat ketika pertama kali mendengar tentang Lomba Kompetensi Siswa (LKS). Sebagai seorang pelajar yang memiliki minat besar dalam bidang teknologi informasi, saya melihat ini sebagai kesempatan emas untuk menguji kemampuan saya dan belajar lebih banyak lagi.',
        ]);
    }
}
