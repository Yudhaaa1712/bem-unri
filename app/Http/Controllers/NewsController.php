<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        // Dummy data untuk sekarang - nanti bisa diganti dengan data dari database
        $news = [
            [
                'id' => 1,
                'title' => 'Workshop Pengembangan Organisasi Mahasiswa',
                'excerpt' => 'BEM UNRI mengadakan workshop pengembangan organisasi mahasiswa yang diikuti oleh seluruh pengurus organisasi di lingkungan Universitas Riau. Workshop ini bertujuan untuk meningkatkan kapasitas organisasi.',
                'content' => '<p>BEM UNRI dengan bangga mengumumkan pelaksanaan Workshop Pengembangan Organisasi Mahasiswa yang telah berlangsung dengan sukses pada tanggal 15 Maret 2025. Workshop ini diikuti oleh lebih dari 150 pengurus organisasi dari berbagai fakultas di Universitas Riau.</p><p>Acara yang berlangsung selama dua hari ini menghadirkan narasumber kompeten dalam bidang organisasi dan manajemen, termasuk Prof. Dr. Ahmad Suharto selaku Dekan Fakultas Ekonomi dan Dr. Sarah Wulandari, M.Si sebagai praktisi organisasi berpengalaman.</p><p>Materi workshop meliputi strategi pengembangan organisasi yang efektif, manajemen konflik dalam organisasi, kepemimpinan transformasional, komunikasi efektif antar anggota, dan perencanaan program kerja yang berkelanjutan.</p>',
                'category' => 'kemendagri',
                'author' => 'Admin BEM',
                'image' => null,
                'created_at' => '2025-03-15',
                'views' => 245,
                'tags' => ['workshop', 'organisasi', 'pengembangan'],
                'is_published' => true
            ],
            [
                'id' => 2,
                'title' => 'Kerjasama Internasional dengan Universitas Malaysia',
                'excerpt' => 'BEM UNRI menjalin kerjasama dengan organisasi mahasiswa dari Universitas Malaysia dalam program pertukaran budaya dan akademik yang akan dilaksanakan tahun ini.',
                'content' => '<p>Dalam upaya memperluas jaringan internasional dan meningkatkan kualitas pendidikan, BEM UNRI telah menandatangani Memorandum of Understanding (MoU) dengan Student Council Universitas Malaya, Malaysia.</p><p>Program kerjasama ini akan meliputi pertukaran mahasiswa, pertukaran budaya, seminar bersama, dan kolaborasi dalam berbagai kegiatan kemahasiswaan. Diharapkan kerjasama ini dapat membuka wawasan mahasiswa UNRI terhadap budaya dan sistem pendidikan di Malaysia.</p><p>Penandatanganan MoU dilakukan secara virtual dan dihadiri oleh perwakilan dari kedua universitas. Implementasi program akan dimulai pada semester genap tahun akademik 2025/2026.</p>',
                'category' => 'kemlu',
                'author' => 'Admin BEM',
                'image' => null,
                'created_at' => '2025-03-10',
                'views' => 189,
                'tags' => ['internasional', 'kerjasama', 'malaysia'],
                'is_published' => true
            ],
            [
                'id' => 3,
                'title' => 'Bakti Sosial di Desa Sungai Pinang',
                'excerpt' => 'Kegiatan bakti sosial yang melibatkan 100 mahasiswa untuk membantu renovasi sekolah dan memberikan bantuan pendidikan kepada anak-anak desa.',
                'content' => '<p>BEM UNRI Kabinet Biru Langit kembali menggelar program bakti sosial di Desa Sungai Pinang, Kabupaten Kampar. Kegiatan yang berlangsung selama tiga hari ini melibatkan 100 mahasiswa dari berbagai fakultas.</p><p>Program bakti sosial kali ini fokus pada renovasi Sekolah Dasar Negeri 001 Sungai Pinang dan pemberian bantuan alat tulis serta buku-buku pelajaran untuk anak-anak. Selain itu, mahasiswa juga memberikan les tambahan untuk mata pelajaran Matematika dan Bahasa Indonesia.</p><p>Kepala Desa Sungai Pinang, Bapak Rusli, menyambut baik kegiatan ini dan berharap kerjasama dengan BEM UNRI dapat terus berlanjut untuk membantu meningkatkan kualitas pendidikan di desa.</p>',
                'category' => 'sosmas',
                'author' => 'Admin BEM',
                'image' => null,
                'created_at' => '2025-03-05',
                'views' => 156,
                'tags' => ['baksos', 'pendidikan', 'desa'],
                'is_published' => true
            ],
            [
                'id' => 4,
                'title' => 'Seminar Nasional Teknologi dan Inovasi',
                'excerpt' => 'BEM UNRI menyelenggarakan seminar nasional dengan tema "Teknologi dan Inovasi untuk Masa Depan Indonesia" yang dihadiri oleh pakar teknologi terkemuka.',
                'content' => '<p>Seminar Nasional Teknologi dan Inovasi telah sukses diselenggarakan di Auditorium Utama Universitas Riau dengan menghadirkan pembicara dari berbagai kalangan akademisi dan praktisi.</p><p>Acara yang mengangkat tema "Teknologi dan Inovasi untuk Masa Depan Indonesia" ini dihadiri oleh lebih dari 500 peserta dari seluruh Indonesia. Pembicara utama adalah Dr. Ir. Bambang Permadi dari Institut Teknologi Bandung dan CEO startup teknologi terkemuka, Sarah Technology.</p><p>Seminar ini membahas perkembangan teknologi artificial intelligence, blockchain, dan Internet of Things yang dapat dimanfaatkan untuk memajukan Indonesia di era digital.</p>',
                'category' => 'kemendagri',
                'author' => 'Admin BEM',
                'image' => null,
                'created_at' => '2025-02-28',
                'views' => 312,
                'tags' => ['seminar', 'teknologi', 'inovasi'],
                'is_published' => true
            ],
            [
                'id' => 5,
                'title' => 'Program Beasiswa untuk Mahasiswa Berprestasi',
                'excerpt' => 'Peluncuran program beasiswa baru untuk mahasiswa berprestasi dengan total dana hibah mencapai 2 miliar rupiah dari berbagai sponsor.',
                'content' => '<p>BEM UNRI dengan bangga mengumumkan peluncuran program beasiswa baru yang ditujukan untuk mahasiswa berprestasi di Universitas Riau. Program ini merupakan hasil kerjasama dengan berbagai pihak sponsor.</p><p>Total dana beasiswa yang tersedia mencapai 2 miliar rupiah dan akan diberikan kepada 200 mahasiswa terpilih. Kriteria penerima beasiswa meliputi prestasi akademik dengan IPK minimal 3.5, aktif dalam kegiatan organisasi, dan memiliki prestasi non-akademik.</p><p>Pendaftaran beasiswa dibuka mulai 1 April 2025 dan ditutup pada 30 April 2025. Informasi lengkap dan formulir pendaftaran dapat diakses melalui website resmi BEM UNRI.</p>',
                'category' => 'kemendagri',
                'author' => 'Admin BEM',
                'image' => null,
                'created_at' => '2025-02-25',
                'views' => 425,
                'tags' => ['beasiswa', 'prestasi', 'mahasiswa'],
                'is_published' => true
            ],
            [
                'id' => 6,
                'title' => 'Festival Budaya Nusantara 2025',
                'excerpt' => 'Festival budaya tahunan yang menampilkan keragaman budaya Indonesia dengan partisipasi mahasiswa dari seluruh nusantara.',
                'content' => '<p>Festival Budaya Nusantara 2025 telah sukses digelar dengan meriah di Lapangan Utama Universitas Riau. Acara ini menampilkan berbagai pertunjukan budaya dari seluruh Indonesia.</p><p>Festival yang berlangsung selama dua hari ini menampilkan tarian tradisional, musik daerah, pameran kerajinan, dan kuliner khas dari 34 provinsi di Indonesia. Peserta festival terdiri dari mahasiswa UNRI yang berasal dari berbagai daerah.</p><p>Acara puncak festival adalah parade kostum tradisional yang diikuti oleh 500 mahasiswa dengan mengenakan pakaian adat dari daerah masing-masing. Festival ini juga menjadi ajang untuk mempererat persaudaraan antar mahasiswa dari berbagai suku dan budaya.</p>',
                'category' => 'sosmas',
                'author' => 'Admin BEM',
                'image' => null,
                'created_at' => '2025-02-20',
                'views' => 298,
                'tags' => ['festival', 'budaya', 'nusantara'],
                'is_published' => true
            ],
            [
                'id' => 7,
                'title' => 'Launching Aplikasi Mobile BEM UNRI',
                'excerpt' => 'BEM UNRI meluncurkan aplikasi mobile untuk memudahkan mahasiswa mengakses informasi dan layanan kampus secara digital.',
                'content' => '<p>BEM UNRI resmi meluncurkan aplikasi mobile "BEM UNRI Connect" yang dapat diunduh gratis di Google Play Store dan App Store. Aplikasi ini dirancang untuk memudahkan mahasiswa dalam mengakses berbagai informasi dan layanan kampus.</p><p>Fitur-fitur yang tersedia dalam aplikasi meliputi: informasi berita terkini, jadwal kegiatan, pendaftaran event, layanan aspirasi mahasiswa, direktori organisasi, dan notifikasi penting dari BEM UNRI.</p><p>Pengembangan aplikasi ini merupakan bagian dari program digitalisasi BEM UNRI untuk memberikan pelayanan yang lebih baik kepada mahasiswa. Dalam minggu pertama peluncuran, aplikasi telah diunduh oleh lebih dari 1000 mahasiswa.</p>',
                'category' => 'kemendagri',
                'author' => 'Admin BEM',
                'image' => null,
                'created_at' => '2025-02-15',
                'views' => 387,
                'tags' => ['aplikasi', 'digital', 'teknologi'],
                'is_published' => true
            ],
            [
                'id' => 8,
                'title' => 'Diskusi Panel Isu Lingkungan Hidup',
                'excerpt' => 'BEM UNRI mengadakan diskusi panel tentang isu lingkungan hidup dengan menghadirkan aktivis lingkungan dan akademisi.',
                'content' => '<p>Diskusi panel bertema "Peran Generasi Muda dalam Pelestarian Lingkungan Hidup" telah diselenggarakan di Gedung Rektorat Universitas Riau. Acara ini menghadirkan narasumber dari berbagai kalangan.</p><p>Para narasumber yang hadir antara lain Dr. Eko Prasetyo (pakar lingkungan UNRI), Siti Nurhaliza (aktivis WWF Indonesia), dan Agus Salim (Direktur KLHK Provinsi Riau). Diskusi membahas isu-isu lingkungan terkini seperti deforestasi, polusi udara, dan perubahan iklim.</p><p>Peserta diskusi terdiri dari mahasiswa, dosen, dan masyarakat umum yang peduli terhadap isu lingkungan. Acara ini menghasilkan beberapa rekomendasi aksi nyata yang akan dilaksanakan oleh BEM UNRI bersama komunitas lingkungan.</p>',
                'category' => 'sosmas',
                'author' => 'Admin BEM',
                'image' => null,
                'created_at' => '2025-02-10',
                'views' => 167,
                'tags' => ['lingkungan', 'diskusi', 'panel'],
                'is_published' => true
            ],
            [
                'id' => 9,
                'title' => 'Student Exchange Program ke Jepang',
                'excerpt' => 'Pembukaan program pertukaran mahasiswa ke Jepang untuk semester genap dengan beasiswa penuh dari pemerintah Jepang.',
                'content' => '<p>BEM UNRI mengumumkan pembukaan program pertukaran mahasiswa ke Jepang untuk semester genap tahun akademik 2025/2026. Program ini bekerja sama dengan Japan Foundation dan Kedutaan Besar Jepang di Indonesia.</p><p>Sebanyak 10 mahasiswa terpilih akan mendapat kesempatan untuk belajar di universitas-universitas ternama di Jepang selama satu semester dengan beasiswa penuh. Beasiswa mencakup biaya kuliah, akomodasi, dan tunjangan hidup bulanan.</p><p>Persyaratan pendaftaran meliputi IPK minimal 3.5, kemampuan bahasa Jepang level N3, surat rekomendasi dari dosen, dan essay motivasi. Pendaftaran dibuka hingga 31 Maret 2025 melalui website resmi BEM UNRI.</p>',
                'category' => 'kemlu',
                'author' => 'Admin BEM',
                'image' => null,
                'created_at' => '2025-02-05',
                'views' => 234,
                'tags' => ['jepang', 'pertukaran', 'beasiswa'],
                'is_published' => true
            ],
            [
                'id' => 10,
                'title' => 'Pelatihan Kepemimpinan untuk Mahasiswa Baru',
                'excerpt' => 'Program pelatihan kepemimpinan khusus untuk mahasiswa baru agar dapat berperan aktif dalam kegiatan kemahasiswaan.',
                'content' => '<p>BEM UNRI menyelenggarakan Program Pelatihan Kepemimpinan (Leadership Training Program) khusus untuk mahasiswa baru angkatan 2024. Program ini bertujuan untuk membentuk karakter kepemimpinan sejak dini.</p><p>Pelatihan berlangsung selama tiga hari dengan materi yang meliputi: konsep dasar kepemimpinan, komunikasi efektif, teamwork, problem solving, dan public speaking. Peserta juga akan mengikuti outbound dan simulasi kepemimpinan.</p><p>Instruktur pelatihan terdiri dari dosen, praktisi, dan senior mahasiswa yang berpengalaman. Program ini diikuti oleh 200 mahasiswa baru dari berbagai fakultas dan diharapkan dapat melahirkan pemimpin-pemimpin muda yang berkualitas.</p>',
                'category' => 'kemendagri',
                'author' => 'Admin BEM',
                'image' => null,
                'created_at' => '2025-01-30',
                'views' => 198,
                'tags' => ['kepemimpinan', 'mahasiswa baru', 'pelatihan'],
                'is_published' => true
            ]
        ];
        
        return response()->json($news);
    }

    public function byCategory($category)
    {
        // Ambil semua berita
        $response = $this->index();
        $allNews = $response->getData();
        
        // Filter berdasarkan kategori
        $filteredNews = array_filter($allNews, function($news) use ($category) {
            return $news->category === $category;
        });
        
        return response()->json(array_values($filteredNews));
    }

    public function show($id)
    {
        // Ambil semua berita
        $response = $this->index();
        $allNews = $response->getData();
        
        // Cari berita berdasarkan ID
        $news = collect($allNews)->firstWhere('id', (int)$id);
        
        if (!$news) {
            return response()->json(['message' => 'Berita tidak ditemukan'], 404);
        }
        
        return response()->json($news);
    }

    public function search(Request $request)
    {
        $query = $request->get('q', '');
        $category = $request->get('category', 'all');
        
        // Ambil semua berita
        $response = $this->index();
        $allNews = $response->getData();
        
        $filteredNews = collect($allNews)->filter(function($news) use ($query, $category) {
            // Filter kategori
            if ($category !== 'all' && $news->category !== $category) {
                return false;
            }
            
            // Filter berdasarkan query pencarian
            if (!empty($query)) {
                $searchIn = strtolower($news->title . ' ' . $news->excerpt . ' ' . $news->author);
                return str_contains($searchIn, strtolower($query));
            }
            
            return true;
        });
        
        return response()->json($filteredNews->values());
    }
}