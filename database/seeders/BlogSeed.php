<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeed extends Seeder
{
    public function run(): void
    {
        $blogs = [
            [
                'id_category' => 1,
                'title' => 'Belajar Coding dari Nol',
                'description' => 'Pengalaman belajar coding dari nol hingga memahami dasar pemrograman.',
                'content' => 'Belajar coding dari nol bukan hal yang mudah, namun sangat mungkin dilakukan. Kunci utamanya adalah konsistensi, latihan rutin, dan tidak takut mencoba hal baru meskipun sering menemui error.',
                'thumbnail' => 'https://cdn.pixabay.com/photo/2016/11/19/14/00/code-1839406_1280.jpg',
            ],
            [
                'id_category' => 1,
                'title' => 'Mengapa Logic Lebih Penting dari Bahasa Pemrograman',
                'description' => 'Memahami pentingnya logika dalam dunia pemrograman.',
                'content' => 'Bahasa pemrograman bisa berubah, tetapi logika akan selalu dibutuhkan. Dengan logika yang baik, seorang programmer dapat mempelajari bahasa baru dengan lebih cepat dan efektif.',
                'thumbnail' => 'https://cdn.pixabay.com/photo/2017/08/10/03/30/computer-2615456_1280.jpg',
            ],
            [
                'id_category' => 1,
                'title' => 'Pengalaman Pertama Membuat Website',
                'description' => 'Cerita pertama kali membuat website sederhana.',
                'content' => 'Website pertama saya dibuat menggunakan HTML dan CSS. Meski tampilannya sederhana, dari sini saya belajar struktur web, styling, dan bagaimana browser bekerja.',
                'thumbnail' => 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885_1280.jpg',
            ],
            [
                'id_category' => 1,
                'title' => 'Laravel Membuat Coding Lebih Terstruktur',
                'description' => 'Alasan Laravel menjadi framework favorit banyak developer.',
                'content' => 'Laravel menyediakan struktur yang jelas, fitur lengkap, dan dokumentasi yang sangat membantu. Dengan Laravel, pengembangan aplikasi web menjadi lebih cepat dan terorganisir.',
                'thumbnail' => 'https://cdn.pixabay.com/photo/2016/11/19/14/00/code-1839406_1280.jpg',
            ],
            [
                'id_category' => 1,
                'title' => 'Pentingnya Version Control dengan Git',
                'description' => 'Git sebagai alat wajib developer modern.',
                'content' => 'Git membantu developer melacak perubahan kode, bekerja dalam tim, dan menghindari kehilangan data. Penguasaan Git adalah skill wajib di dunia industri.',
                'thumbnail' => 'https://cdn.pixabay.com/photo/2017/08/10/03/30/computer-2615456_1280.jpg',
            ],
            [
                'id_category' => 1,
                'title' => 'Error adalah Guru Terbaik Programmer',
                'description' => 'Belajar dari setiap error yang muncul.',
                'content' => 'Setiap error memberikan pelajaran baru. Dengan membaca pesan error dan mencari solusinya, kemampuan problem solving programmer akan terus meningkat.',
                'thumbnail' => 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885_1280.jpg',
            ],
            [
                'id_category' => 1,
                'title' => 'Belajar Backend Development',
                'description' => 'Mengenal dunia backend dan server.',
                'content' => 'Backend development berfokus pada logika aplikasi, database, dan server. Bahasa seperti PHP, Node.js, dan Python sering digunakan dalam pengembangan backend.',
                'thumbnail' => 'https://cdn.pixabay.com/photo/2016/11/19/14/00/code-1839406_1280.jpg',
            ],
            [
                'id_category' => 1,
                'title' => 'Database dalam Aplikasi Web',
                'description' => 'Peran penting database dalam aplikasi.',
                'content' => 'Database digunakan untuk menyimpan data secara terstruktur. MySQL, PostgreSQL, dan SQLite adalah contoh database yang sering digunakan dalam pengembangan web.',
                'thumbnail' => 'https://cdn.pixabay.com/photo/2017/08/10/03/30/computer-2615456_1280.jpg',
            ],
            [
                'id_category' => 1,
                'title' => 'Belajar Coding untuk Karier Masa Depan',
                'description' => 'Coding sebagai investasi skill jangka panjang.',
                'content' => 'Di era digital, kemampuan coding membuka banyak peluang karier. Mulai dari web developer, mobile developer, hingga software engineer.',
                'thumbnail' => 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885_1280.jpg',
            ],
            [
                'id_category' => 1,
                'title' => 'Konsistensi adalah Kunci Menjadi Programmer',
                'description' => 'Tips menjaga konsistensi saat belajar coding.',
                'content' => 'Belajar sedikit setiap hari jauh lebih efektif dibanding belajar banyak namun jarang. Konsistensi akan membentuk kebiasaan dan meningkatkan kemampuan secara bertahap.',
                'thumbnail' => 'https://cdn.pixabay.com/photo/2016/11/19/14/00/code-1839406_1280.jpg',
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::create([
                'id_category' => $blog['id_category'],
                'title'       => $blog['title'],
                'description' => $blog['description'],
                'slug'        => Str::slug($blog['title']),
                'content'     => $blog['content'],
                'thumbnail'   => $blog['thumbnail'],
                'status'      => 'published',
            ]);
        }
    }
}
