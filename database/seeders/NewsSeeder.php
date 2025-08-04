<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    public function run()
    {
        $newsData = [
            [
                'title' => 'Workshop Pengembangan Organisasi Mahasiswa',
                'excerpt' => 'BEM UNRI mengadakan workshop pengembangan organisasi mahasiswa yang diikuti oleh seluruh pengurus organisasi di lingkungan Universitas Riau.',
                'content' => '<p>BEM UNRI dengan bangga mengumumkan pelaksanaan Workshop Pengembangan Organisasi Mahasiswa yang telah berlangsung dengan sukses pada tanggal 15 Maret 2025. Workshop ini diikuti oleh lebih dari 150 pengurus organisasi dari berbagai fakultas di Universitas Riau.</p><p>Acara yang berlangsung selama dua hari ini menghadirkan narasumber kompeten dalam bidang organisasi dan manajemen, termasuk Prof. Dr. Ahmad Suharto selaku Dekan Fakultas Ekonomi dan Dr. Sarah Wulandari, M.Si sebagai praktisi organisasi berpengalaman.</p><p>Materi workshop meliputi strategi pengembangan organisasi yang efektif, manajemen konflik dalam organisasi, kepemimpinan transformasional, komunikasi efektif antar anggota, dan perencanaan program kerja yang berkelanjutan.</p>',
                'category' => 'kemendagri',
                'author' => 'Admin BEM',
                'tags' => ['workshop', 'organisasi', 'pengembangan'],
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(5),
                'views' => 245
            ],
            [
                'title' => 'Kerjasama Internasional dengan Universitas Malaysia',
                'excerpt' => 'BEM UNRI menjalin kerjasama dengan organisasi mahasiswa dari Universitas Malaysia dalam program pertukaran budaya dan akademik.',
                'content' => '<p>Dalam upaya memperluas jaringan internasional dan meningkatkan kualitas pendidikan, BEM UNRI telah menandatangani Memorandum of Understanding (MoU) dengan Student Council Universitas Malaya, Malaysia.</p><p>Program kerjasama ini akan meliputi pertukaran mahasiswa, pertukaran budaya, seminar bersama, dan kolaborasi dalam berbagai kegiatan kemahasiswaan. Diharapkan kerjasama ini dapat membuka wawasan mahasiswa UNRI terhadap budaya dan sistem pendidikan di Malaysia.</p><p>Penandatanganan MoU dilakukan secara virtual dan dihadiri oleh perwakilan dari kedua universitas. Implementasi program akan dimulai pada semester genap tahun akademik 2025/2026.</p>',
                'category' => 'kemlu',
                'author' => 'Admin BEM',
                'tags' => ['internasional', 'kerjasama', 'malaysia'],
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(10),
                'views' => 189
            ],
            [
                'title' => 'Bakti Sosial di Desa Sungai Pinang',
                'excerpt' => 'Kegiatan bakti sosial yang melibatkan 100 mahasiswa untuk membantu renovasi sekolah dan memberikan bantuan pendidikan.',
                'content' => '<p>BEM UNRI Kabinet Biru Langit kembali menggelar program bakti sosial di Desa Sungai Pinang, Kabupaten Kampar. Kegiatan yang berlangsung selama tiga hari ini melibatkan 100 mahasiswa dari berbagai fakultas.</p><p>Program bakti sosial kali ini fokus pada renovasi Sekolah Dasar Negeri 001 Sungai Pinang dan pemberian bantuan alat tulis serta buku-buku pelajaran untuk anak-anak. Selain itu, mahasiswa juga memberikan les tambahan untuk mata pelajaran Matematika dan Bahasa Indonesia.</p><p>Kepala Desa Sungai Pinang, Bapak Rusli, menyambut baik kegiatan ini dan berharap kerjasama dengan BEM UNRI dapat terus berlanjut untuk membantu meningkatkan kualitas pendidikan di desa.</p>',
                'category' => 'sosmas',
                'author' => 'Admin BEM',
                'tags' => ['baksos', 'pendidikan', 'desa'],
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(15),
                'views' => 156
            ],
            [
                'title' => 'Seminar Nasional Teknologi dan Inovasi',
                'excerpt' => 'BEM UNRI menyelenggarakan seminar nasional dengan tema "Teknologi dan Inovasi untuk Masa Depan Indonesia".',
                'content' => '<p>Seminar Nasional Teknologi dan Inovasi telah sukses diselenggarakan di Auditorium Utama Universitas Riau dengan menghadirkan pembicara dari berbagai kalangan akademisi dan praktisi.</p><p>Acara yang mengangkat tema "Teknologi dan Inovasi untuk Masa Depan Indonesia" ini dihadiri oleh lebih dari 500 peserta dari seluruh Indonesia. Pembicara utama adalah Dr. Ir. Bambang Permadi dari Institut Teknologi Bandung dan CEO startup teknologi terkemuka, Sarah Technology.</p><p>Seminar ini membahas perkembangan teknologi artificial intelligence, blockchain, dan Internet of Things yang dapat dimanfaatkan untuk memajukan Indonesia di era digital.</p>',
                'category' => 'kemendagri',
                'author' => 'Admin BEM',
                'tags' => ['seminar', 'teknologi', 'inovasi'],
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(20),
                'views' => 312
            ],
            [
                'title' => 'Program Beasiswa untuk Mahasiswa Berprestasi',
                'excerpt' => 'Peluncuran program beasiswa baru untuk mahasiswa berprestasi dengan total dana hibah mencapai 2 miliar rupiah.',
                'content' => '<p>BEM UNRI dengan bangga mengumumkan peluncuran program beasiswa baru yang ditujukan untuk mahasiswa berprestasi di Universitas Riau. Program ini merupakan hasil kerjasama dengan berbagai pihak sponsor.</p><p>Total dana beasiswa yang tersedia mencapai 2 miliar rupiah dan akan diberikan kepada 200 mahasiswa terpilih. Kriteria penerima beasiswa meliputi prestasi akademik dengan IPK minimal 3.5, aktif dalam kegiatan organisasi, dan memiliki prestasi non-akademik.</p><p>Pendaftaran beasiswa dibuka mulai 1 April 2025 dan ditutup pada 30 April 2025. Informasi lengkap dan formulir pendaftaran dapat diakses melalui website resmi BEM UNRI.</p>',
                'category' => 'kemendagri',
                'author' => 'Admin BEM',
                'tags' => ['beasiswa', 'prestasi', 'mahasiswa'],
                'is_published' => false, // ini draft
                'published_at' => null,
                'views' => 0
            ]
        ];

        foreach ($newsData as $data) {
            News::create($data);
        }
    }
}