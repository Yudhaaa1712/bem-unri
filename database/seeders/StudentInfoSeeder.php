<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudentInfo;

class StudentInfoSeeder extends Seeder
{
    public function run(): void
    {
        $studentInfos = [
            [
                'title' => 'Juara 1 Lomba Karya Tulis Ilmiah Nasional',
                'excerpt' => 'Ahmad Rizki Pratama meraih juara 1 dalam lomba karya tulis ilmiah tingkat nasional dengan tema inovasi teknologi.',
                'content' => 'Ahmad Rizki Pratama, mahasiswa Teknik Informatika UNRI, berhasil meraih juara 1 dalam lomba karya tulis ilmiah tingkat nasional dengan tema "Inovasi Teknologi untuk Pembangunan Berkelanjutan". Penelitian yang dilakukan berfokus pada pengembangan sistem smart farming menggunakan IoT untuk meningkatkan produktivitas pertanian di daerah rural. Karya tulis ini dinilai sangat inovatif dan memiliki potensi implementasi yang tinggi.',
                'category' => 'prestasi',
                'author' => 'Ahmad Rizki Pratama',
                'image' => null,
                'views' => 150,
                'tags' => json_encode(['lomba', 'karya tulis', 'teknologi', 'nasional']),
                'is_published' => true,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Beasiswa Prestasi Akademik 2025',
                'excerpt' => 'Program beasiswa untuk mahasiswa berprestasi dengan IPK minimal 3.50, mencakup biaya kuliah penuh dan tunjangan bulanan.',
                'content' => 'Program Beasiswa Prestasi Akademik 2025 merupakan bentuk apresiasi terhadap mahasiswa yang menunjukkan prestasi akademik yang luar biasa. Beasiswa ini memberikan bantuan finansial berupa biaya kuliah penuh dan tunjangan hidup bulanan sebesar Rp 2.000.000. Program ini bertujuan untuk mendukung mahasiswa berprestasi agar dapat fokus pada studi dan pengembangan diri tanpa terbebani masalah finansial.',
                'category' => 'beasiswa',
                'author' => 'Admin BEM UNRI',
                'image' => null,
                'views' => 320,
                'tags' => json_encode(['beasiswa', 'prestasi akademik', 'bantuan pendidikan']),
                'is_published' => true,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Juara 2 Kompetisi Business Plan Regional',
                'excerpt' => 'Sarah Wulandari berhasil meraih juara 2 kompetisi business plan tingkat regional dengan ide bisnis inovatif.',
                'content' => 'Sarah Wulandari, mahasiswa Manajemen UNRI, berhasil meraih juara 2 dalam kompetisi business plan tingkat regional dengan ide bisnis inovatif di bidang agribisnis. Proposal bisnis yang diajukan adalah pengembangan aplikasi marketplace untuk petani lokal yang menghubungkan langsung dengan konsumen. Ide ini dinilai memiliki potensi besar untuk membantu petani meningkatkan pendapatan dan mengurangi rantai distribusi yang panjang.',
                'category' => 'prestasi',
                'author' => 'Sarah Wulandari',
                'image' => null,
                'views' => 89,
                'tags' => json_encode(['business plan', 'kompetisi', 'agribisnis', 'regional']),
                'is_published' => true,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Informasi Pendaftaran Kuliah Semester Genap',
                'excerpt' => 'Informasi lengkap mengenai prosedur pendaftaran kuliah semester genap 2025 untuk mahasiswa baru dan lama.',
                'content' => 'Pendaftaran kuliah semester genap 2025 akan dibuka mulai tanggal 15 Januari 2025. Mahasiswa diwajibkan untuk melakukan registrasi online melalui portal akademik UNRI. Dokumen yang diperlukan meliputi KHS semester sebelumnya, bukti pembayaran UKT, dan formulir rencana studi. Batas akhir pendaftaran adalah tanggal 25 Januari 2025. Mahasiswa yang terlambat mendaftar akan dikenakan denda administrasi.',
                'category' => 'informasi_akademik',
                'author' => 'Bagian Akademik UNRI',
                'image' => null,
                'views' => 500,
                'tags' => json_encode(['pendaftaran', 'semester genap', 'akademik']),
                'is_published' => true,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Beasiswa Bantuan Sosial untuk Mahasiswa Kurang Mampu',
                'excerpt' => 'Program bantuan khusus untuk mahasiswa dari keluarga kurang mampu dengan prestasi akademik yang baik.',
                'content' => 'Program Beasiswa Bantuan Sosial ditujukan untuk membantu mahasiswa dari keluarga kurang mampu yang menunjukkan prestasi akademik yang baik. Beasiswa ini memberikan bantuan finansial sebesar Rp 1.500.000 per bulan selama satu tahun akademik. Selain bantuan finansial, penerima beasiswa juga mendapat akses ke program mentoring dan pengembangan soft skills untuk meningkatkan kemampuan diri.',
                'category' => 'beasiswa',
                'author' => 'Tim Beasiswa UNRI',
                'image' => null,
                'views' => 275,
                'tags' => json_encode(['beasiswa', 'bantuan sosial', 'kurang mampu']),
                'is_published' => true,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        foreach ($studentInfos as $info) {
            StudentInfo::create($info);
        }
    }
}