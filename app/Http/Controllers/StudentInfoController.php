<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentInfoController extends Controller
{
    public function index()
    {
        // Dummy data untuk prestasi dan beasiswa
        $prestasi = [
            [
                'id' => 1,
                'title' => 'Lomba Karya Tulis Ilmiah Nasional',
                'student_name' => 'Ahmad Rizki',
                'student_major' => 'Teknik Informatika',
                'achievement_level' => 'Juara 1',
                'description' => 'Meraih juara 1 dalam lomba karya tulis ilmiah tingkat nasional dengan tema "Inovasi Teknologi untuk Pembangunan Berkelanjutan"',
                'date' => '2025-03-15',
                'image' => null,
                'is_active' => true
            ],
            [
                'id' => 2,
                'title' => 'Kompetisi Business Plan Regional',
                'student_name' => 'Sarah Wulandari',
                'student_major' => 'Manajemen',
                'achievement_level' => 'Juara 2',
                'description' => 'Berhasil meraih juara 2 kompetisi business plan tingkat regional dengan ide bisnis inovatif di bidang agribisnis',
                'date' => '2025-02-20',
                'image' => null,
                'is_active' => true
            ],
            [
                'id' => 3,
                'title' => 'Olimpiade Matematika Nasional',
                'student_name' => 'Devi Anggraini',
                'student_major' => 'Matematika',
                'achievement_level' => 'Juara 3',
                'description' => 'Meraih medali perunggu dalam Olimpiade Matematika tingkat nasional yang diikuti lebih dari 500 peserta',
                'date' => '2025-01-10',
                'image' => null,
                'is_active' => true
            ]
        ];

        $beasiswa = [
            [
                'id' => 1,
                'title' => 'Beasiswa Prestasi Akademik',
                'description' => 'Beasiswa untuk mahasiswa berprestasi dengan IPK minimal 3.50. Mencakup biaya kuliah penuh dan tunjangan bulanan.',
                'scholarship_amount' => 10000000,
                'deadline' => '2025-06-30',
                'requirements' => 'IPK minimal 3.50, Surat rekomendasi, Essay motivasi',
                'status' => 'active',
                'is_active' => true
            ],
            [
                'id' => 2,
                'title' => 'Beasiswa Bantuan Sosial',
                'description' => 'Program bantuan untuk mahasiswa kurang mampu dengan prestasi akademik yang baik. Bantuan biaya hidup dan pendidikan.',
                'scholarship_amount' => 3000000,
                'deadline' => '2025-07-15',
                'requirements' => 'Surat keterangan tidak mampu, IPK minimal 3.00, Surat rekomendasi',
                'status' => 'active',
                'is_active' => true
            ],
            [
                'id' => 3,
                'title' => 'Beasiswa Penelitian',
                'description' => 'Khusus untuk mahasiswa yang aktif dalam kegiatan penelitian dan publikasi ilmiah. Mendukung riset inovatif.',
                'scholarship_amount' => 15000000,
                'deadline' => '2025-08-31',
                'requirements' => 'Proposal penelitian, Publikasi ilmiah, Surat rekomendasi dosen',
                'status' => 'active',
                'is_active' => true
            ],
            [
                'id' => 4,
                'title' => 'Beasiswa Organisasi',
                'description' => 'Untuk mahasiswa yang aktif dalam organisasi kemahasiswaan dan memiliki kontribusi nyata bagi kampus.',
                'scholarship_amount' => 5000000,
                'deadline' => '2025-09-15',
                'requirements' => 'Sertifikat keaktifan organisasi, Portfolio kegiatan, Essay kontribusi',
                'status' => 'coming_soon',
                'is_active' => true
            ]
        ];

        return response()->json([
            'prestasi' => $prestasi,
            'beasiswa' => $beasiswa
        ]);
    }
}