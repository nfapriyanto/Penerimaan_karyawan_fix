<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Disable foreign key constraints during seeding
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate tables to allow clean seeding
        DB::table('users')->truncate();
        DB::table('kriterias')->truncate();
        DB::table('pelamars')->truncate();
        DB::table('penilaians')->truncate();
        DB::table('hasil_topsis')->truncate();
        DB::table('bobot_ahp')->truncate();
        DB::table('bobot_kriterias')->truncate();

        // Re-enable foreign key constraints
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Insert Users
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$12$tG2SaZfOt940pwuNJHo7fe8iECVCOXvG82f.UyOkEblpmh0jutu0W',
                'remember_token' => null,
                'created_at' => '2026-06-11 01:27:19',
                'updated_at' => '2026-06-11 01:27:19',
                'role' => 'admin'
            ],
            [
                'id' => 2,
                'name' => 'hrd',
                'email' => 'hrd@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$12$/BOFHYj2MAxXWyR2rOR8JOWDctFumffOe9WwxJyW.B9BODxyF71Jy',
                'remember_token' => null,
                'created_at' => '2026-06-11 01:33:51',
                'updated_at' => '2026-06-11 01:33:51',
                'role' => 'hrd'
            ],
            [
                'id' => 3,
                'name' => 'pimpinan',
                'email' => 'pimpinan@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$12$BIQ023KegAkvPN4ejkQpjOzMBmYuj06TmOfZl0RxCwxgop7iVMk9i',
                'remember_token' => null,
                'created_at' => '2026-06-11 01:35:02',
                'updated_at' => '2026-06-11 01:35:02',
                'role' => 'pimpinan'
            ]
        ]);

        // Insert Kriterias
        DB::table('kriterias')->insert([
            [
                'id' => 1,
                'kode' => 'C1',
                'nama' => 'Skill',
                'created_at' => '2026-06-11 02:41:59',
                'updated_at' => '2026-06-11 02:41:59'
            ],
            [
                'id' => 2,
                'kode' => 'C2',
                'nama' => 'Pengalaman',
                'created_at' => '2026-06-11 02:42:15',
                'updated_at' => '2026-06-11 02:42:15'
            ],
            [
                'id' => 3,
                'kode' => 'C3',
                'nama' => 'Pendidikan',
                'created_at' => '2026-06-11 02:42:25',
                'updated_at' => '2026-06-11 02:42:25'
            ],
            [
                'id' => 4,
                'kode' => 'C4',
                'nama' => 'Interview',
                'created_at' => '2026-06-11 02:42:38',
                'updated_at' => '2026-06-11 02:42:38'
            ]
        ]);

        // Insert Pelamars
        DB::table('pelamars')->insert([
            [
                'id' => 9,
                'nama' => 'Yoga',
                'jenis_kelamin' => 'Laki-laki',
                'pendidikan' => 'SMA',
                'telepon' => '08123434343',
                'alamat' => 'Jakarta',
                'created_at' => '2026-06-11 06:34:00',
                'updated_at' => '2026-06-11 06:34:00'
            ],
            [
                'id' => 10,
                'nama' => 'Andi',
                'jenis_kelamin' => 'Laki-laki',
                'pendidikan' => 'S1',
                'telepon' => '08123134124',
                'alamat' => 'Jakarta',
                'created_at' => '2026-06-11 06:34:17',
                'updated_at' => '2026-06-11 06:34:17'
            ]
        ]);

        // Insert Penilaians
        DB::table('penilaians')->insert([
            [
                'id' => 10,
                'pelamar_id' => 9,
                'skill' => 3,
                'pengalaman' => 2,
                'pendidikan' => 1,
                'interview' => 2,
                'created_at' => '2026-06-11 06:34:46',
                'updated_at' => '2026-06-11 06:34:46'
            ],
            [
                'id' => 11,
                'pelamar_id' => 10,
                'skill' => 2,
                'pengalaman' => 1,
                'pendidikan' => 3,
                'interview' => 3,
                'created_at' => '2026-06-11 06:34:59',
                'updated_at' => '2026-06-11 06:34:59'
            ]
        ]);

        // Insert Hasil Topsis
        DB::table('hasil_topsis')->insert([
            [
                'id' => 1,
                'nama' => 'Yoga',
                'nilai' => 0.57344676333294,
                'rank' => 1,
                'created_at' => '2026-06-13 04:05:40',
                'updated_at' => '2026-06-13 04:05:40'
            ],
            [
                'id' => 2,
                'nama' => 'Andi',
                'nilai' => 0.42655323666706,
                'rank' => 2,
                'created_at' => '2026-06-13 04:05:40',
                'updated_at' => '2026-06-13 04:05:40'
            ]
        ]);
    }
}
