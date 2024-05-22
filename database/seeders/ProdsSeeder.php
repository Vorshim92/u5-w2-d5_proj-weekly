<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 30; $i++) {
            DB::table('prods')->insert([
                'name' => 'name ' . $i,
                'description' => 'Product ' . $i . ' description',
                'price' => $i * 100,
                'quantity' => $i * 10,
                'image' => 'https://picsum.photos/640/480',
            ]);
        }
    }
}
