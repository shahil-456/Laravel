<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {


        DB::table('product_categories')->insert([
            [ 'name' => 'Electronics'],
            [ 'name' => 'Books'],
            [ 'name' => 'Clothing'],
        ]);



        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'status' => 'yes',
            'last_login' => '2025-05-07 17:24:49',
            'email_verified_at' => null,
            'password' => '$2y$12$/xVtLCF04KtahGcd33YyB.ghuXgnUzF4bDfkOCq9/uCQbldDoQyBC',
            'remember_token' => null,
            'created_at' => '2025-05-16 08:59:24',
            'updated_at' => '2025-05-16 08:59:24',
        ]);


        






    }
}
