<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        DB::table('categories')->insert([
            'id' => 1,
            'name' => 'Makanan'
        ]);

        DB::table('categories')->insert([
            'id' => 2,
            'name' => 'Minuman'
        ]);

        DB::table('products')->insert([
            'id' => 1,
            'name' => 'Indomie',
            'price' => 3000,
            'stock' => 12,
            'category_id' => 1,
        ]);

        DB::table('products')->insert([
            'id' => 2,
            'name' => 'Taro',
            'price' => 8000,
            'stock' => 20,
            'category_id' => 2,
        ]);

        DB::table('customers')->insert([
            'id' => 1,
            'name' => 'John Doe'
        ]);

        DB::table('customers')->insert([
            'id' => 2,
            'name' => 'Jo'
        ]);

        DB::table('transactions')->insert([
            'id' => 1,
            'date' => '2021-11-06 10:18:27',
            'customer_id' => 1
        ]);

        DB::table('items')->insert([
            'id' => 1,
            'qty' => 1,
            'price' => 3000,
            'transaction_id' => 1,
            'product_id' => 1
        ]);

        DB::table('items')->insert([
            'id' => 2,
            'qty' => 2,
            'price' => 16000,
            'transaction_id' => 1,
            'product_id' => 2
        ]);
    }
}
