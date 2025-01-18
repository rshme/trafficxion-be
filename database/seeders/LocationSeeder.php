<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            'Mampang Prapatan', 'Kuningan', 'Cawang', 'Cilandak', 'Kemang',
            'Jakarta Pusat', 'Jakarta Selatan', 'Jakarta Utara', 'Jakarta Timur', 'Gambir',
            'Menteng', 'Tebet', 'Palmerah', 'Pondok Indah', 'Sudirman',
            'Tanah Abang', 'Kebayoran Baru', 'Senayan', 'Taman Sari', 'Cengkareng',
            'Kota Tua', 'Jatinegara', 'Cempaka Putih', 'Batu Ceper', 'Kampung Melayu',
            'Cikini', 'Merdeka', 'Glodok', 'Pluit', 'Pondok Pinang',
            'Cipete', 'Tomang', 'Rawamangun', 'Serpong', 'Depok',
            'Bekasi', 'Tangerang', 'Bojong Indah', 'Rawa Belong', 'Rambutan',
            'Kelapa Gading', 'Serdang', 'Mangga Dua', 'Slipi', 'Jatiwaringin',
            'Kebon Jeruk', 'Limo', 'Pademangan', 'Pasar Minggu', 'Setiabudi',
            'Sawah Besar', 'Kebon Nanas', 'Senen', 'Sawangan'
        ];

        foreach ($locations as $index => $city) {
            DB::table('locations')->insert([
                'slug' => Str::slug($city),
                'name' => $city,
            ]);
        }
    }
}
