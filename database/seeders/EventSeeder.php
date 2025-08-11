<?php
// database/seeders/EventSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    public function run()
    {
        $events = [
            [
                'title' => 'Rapat Pengurus Harian',
                'description' => 'Rapat rutin pengurus harian BEM FEB UI membahas agenda mingguan',
                'event_date' => Carbon::today()->addDays(2)->format('Y-m-d'),
                'time' => '09:00 - 11:00',
                'location' => 'Ruang BEM FEB UI',
                'is_active' => true
            ],
            [
                'title' => 'Workshop Digital Marketing',
                'description' => 'Pelatihan digital marketing untuk mahasiswa FEB UI',
                'event_date' => Carbon::today()->addDays(4)->format('Y-m-d'),
                'time' => '13:00 - 16:00',
                'location' => 'Auditorium FEB UI',
                'is_active' => true
            ],
            [
                'title' => 'Seminar Entrepreneurship',
                'description' => 'Seminar nasional tentang kewirausahaan dengan pembicara dari industri',
                'event_date' => Carbon::today()->addDays(7)->format('Y-m-d'),
                'time' => '08:00 - 12:00',
                'location' => 'Balai Sidang UI',
                'is_active' => true
            ],
            [
                'title' => 'Bakti Sosial',
                'description' => 'Program pengabdian masyarakat di daerah sekitar kampus',
                'event_date' => Carbon::today()->addDays(10)->format('Y-m-d'),
                'time' => '07:00 - 15:00',
                'location' => 'Kelurahan Pondok Cina',
                'is_active' => true
            ],
            [
                'title' => 'Study Excursie',
                'description' => 'Kunjungan industri ke perusahaan multinasional',
                'event_date' => Carbon::today()->addDays(12)->format('Y-m-d'),
                'time' => '08:00 - 17:00',
                'location' => 'Jakarta',
                'is_active' => true
            ],
            [
                'title' => 'Open Recruitment Staff',
                'description' => 'Rekrutmen terbuka untuk staff BEM FEB UI periode 2025/2026',
                'event_date' => Carbon::today()->addDays(14)->format('Y-m-d'),
                'time' => '09:00 - 16:00',
                'location' => 'Gedung FEB UI',
                'is_active' => true
            ],
            [
                'title' => 'Training Leadership',
                'description' => 'Pelatihan kepemimpinan untuk pengurus BEM FEB UI',
                'event_date' => Carbon::today()->addDays(17)->format('Y-m-d'),
                'time' => '08:00 - 17:00',
                'location' => 'Puncak, Bogor',
                'is_active' => true
            ],
            [
                'title' => 'Forum Diskusi Mahasiswa',
                'description' => 'Diskusi terbuka membahas isu-isu terkini di bidang ekonomi',
                'event_date' => Carbon::today()->addDays(20)->format('Y-m-d'),
                'time' => '19:00 - 21:00',
                'location' => 'Aula FEB UI',
                'is_active' => true
            ]
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}