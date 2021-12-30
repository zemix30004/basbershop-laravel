<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $this->call(LaratrustSeeder::class);
        // DB::table('locations')->insert([
        //     ['name' => 'DEDAN KIMATHI, NYERI',],
        //     ['name' => 'KAMAKWA, NYERI',],
        //     ['name' => 'NYERI TOWN, NYERI',],
        // ]);
        $this->call(LaratrustSeeder::class);
        DB::table('locations')->insert([
            ['name' => 'PASTEUR, BANDUNG',],
            ['name' => 'SUKAJADI, BANDUNG',],
            ['name' => 'CICENDO, BANDUNG',],
        ]);

        DB::table('categories')->insert([
            ['name' => 'PAKET NORMAL',],
            ['name' => 'PAKET MEMBERSHIP',],
            ['name' => 'PAKET PERSONAL',],
        ]);

        DB::table('services')->insert([
            [
                'category_id' => 1,
                'name' => 'FAST HAIRCUT',
                'duration' => 1,
                'time' => 'Hr',
                'price' => 500,
            ],
            [
                'category_id' => 1,
                'name' => 'BASIC HAIRCUT',
                'duration' => 20,
                'time' => 'mins',
                'price' => 200,
            ], [
                'category_id' => 1,
                'name' => 'SIGNATURE HAIRCUT',
                'duration' => 30,
                'time' => 'mins',
                'price' => 400,
            ],
            [
                'category_id' => 2,
                'name' => 'FATHER & SON',
                'duration' => 1,
                'time' => 'Hr',
                'price' => 500,
            ],
            [
                'category_id' => 2,
                'name' => 'STUDENT SERVICE',
                'duration' => 20,
                'time' => 'mins',
                'price' => 200,
            ], [
                'category_id' => 3,
                'name' => 'CUKURAN DI RUMAH',
                'duration' => 30,
                'time' => 'mins',
                'price' => 400,
            ],
        ]);

        DB::table('payments')->insert([
            [
                'bank' => 'BRI',
                'cabang' => 'Bandung',
                'an' => 'Boy',
                'norek' => '123456789',
            ],
            [
                'bank' => 'BNI',
                'cabang' => 'Cimahi',
                'an' => 'Bro',
                'norek' => '987654321',
            ], [
                'bank' => 'Mandiri',
                'cabang' => 'Kab. Bandung',
                'an' => 'Bam',
                'norek' => '735327357234',
            ],
        ]);
    }
}
