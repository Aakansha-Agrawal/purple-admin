<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $model = Category::class;

    public function run()
    {
        DB::table('categories')->insert([
            'cat_name' => 'Audio',
        ]);
        DB::table('categories')->insert([
            'cat_name' => 'Video',
        ]);
        DB::table('categories')->insert([
            'cat_name' => 'Lighting',
        ]);
        DB::table('categories')->insert([
            'cat_name' => 'Stage',
        ]);
        DB::table('categories')->insert([
            'cat_name' => 'Network',
        ]);
        DB::table('categories')->insert([
            'cat_name' => 'Instruments',
        ]);
        DB::table('categories')->insert([
            'cat_name' => 'Production',
        ]);
        DB::table('categories')->insert([
            'cat_name' => 'Crew',
        ]);
        DB::table('categories')->insert([
            'cat_name' => 'Other',
        ]);
    }
}
