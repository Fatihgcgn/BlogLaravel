<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=['Eglence','Bilisim','Gezi','Teknoloji','Sağlik','Spor','Gunluk Yasam'];
        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name'=>$category,
                'slug'=>str::singular($category),
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }
    }
}
