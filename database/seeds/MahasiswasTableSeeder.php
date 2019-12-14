<?php

use Illuminate\Database\Seeder;

class MahasiswasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Mohammad Ferry Maghriza Pasya',
                'username' => '21070117110001',
                'username_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Muhammad Hafidz Al Huda',
                'username' => '21070117110002',
                'username_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pandu Adhyaksa',
                'username' => '21070117110003',
                'username_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Ignatius Jeffry Sabaraya',
                'username' => '21070117110004',
                'username_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Muhammad Arrachman N.A.N',
                'username' => '21070117110005',
                'username_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Rifqi Afiq Taib',
                'username' => '21070117120006',
                'username_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Atheea Annisa Rahma',
                'username' => '21070117120007',
                'username_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Rheza Aulia Ramadhan',
                'username' => '21070117120008',
                'username_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Aradita Anisya Permata',
                'username' => '21070117120009',
                'username_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'MuhammadMutiara Adhilia Purwaningsih',
                'username' => '21070117120010',
                'username_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}