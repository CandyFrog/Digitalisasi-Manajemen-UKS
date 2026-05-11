<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin User
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@uks.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        // Petugas User
        User::create([
            'name' => 'Petugas PMR',
            'email' => 'petugas@uks.com',
            'password' => bcrypt('password'),
            'role' => 'petugas'
        ]);

        // Classes
        $classes = ['X RPL 1', 'X RPL 2', 'XI TKJ 1', 'XI TKJ 2', 'XII RPL 1'];
        foreach ($classes as $kelas) {
            \App\Models\SchoolClass::create(['nama_kelas' => $kelas]);
        }

        // Medicines
        \App\Models\Medicine::create([
            'nama_obat' => 'Paracetamol',
            'satuan' => 'Tablet',
            'stok' => 100
        ]);
        \App\Models\Medicine::create([
            'nama_obat' => 'Promag',
            'satuan' => 'Tablet',
            'stok' => 50
        ]);
        \App\Models\Medicine::create([
            'nama_obat' => 'Betadine',
            'satuan' => 'Botol',
            'stok' => 20
        ]);
        \App\Models\Medicine::create([
            'nama_obat' => 'Kayu Putih',
            'satuan' => 'Botol',
            'stok' => 30
        ]);

        // Generate 50 Students
        \App\Models\Student::factory(50)->create();

        // Generate 30 Treatments
        \App\Models\Treatment::factory(30)->create()->each(function ($treatment) {
            // Attach random medicines to each treatment
            $medicines = \App\Models\Medicine::inRandomOrder()->take(rand(0, 2))->get();
            foreach ($medicines as $medicine) {
                $jumlah = rand(1, 2);
                $treatment->medicines()->attach($medicine->id, ['jumlah_obat' => $jumlah]);
                // Kurangi stok seperti di controller
                $medicine->decrement('stok', $jumlah);
            }
        });
    }
}
