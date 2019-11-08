<?php

use Illuminate\Database\Seeder;
use Encore\Admin\Auth\Database\AdminTablesSeeder;
use Illuminate\Support\Facades\DB;
use \App\Models\Product;
use \App\Models\Category;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(SettingTableSeeder::class);
        $this->call(AdminTablesSeeder::class);

        DB::unprepared(file_get_contents(database_path('seeds/category.sql')));
        DB::unprepared(file_get_contents(database_path('seeds/banners.sql')));
        DB::unprepared(file_get_contents(database_path('seeds/size-color.sql')));
        DB::unprepared(file_get_contents(database_path('seeds/content.sql')));

        factory(App\Models\Product::class, 20)->create();
        factory(App\Models\Post::class, 20)->create();

		/*
        Schema::disableForeignKeyConstraints();
        Product::truncate();
        Schema::enableForeignKeyConstraints();
        
        $fakervi = Faker\Factory::create('vi_VN');
        $fakeren = Faker\Factory::create('en_EN');

        $limit = 20;
 
        for ($i = 0; $i < $limit; $i++) {
            Product::create([
                'category_id' => Category::inRandomOrder()->first()->id, 
                'name_vi' => $fakervi->name, 
                'name_en' => $fakeren->name,
                'desc_vi' => $fakervi->text,
                'desc_en' => $fakeren->text,
                'price' => $fakeren->randomFloat(2),
                'content_en' => $fakeren->paragraphs(),
                'content_vi' => $fakervi->paragraphs(),
                'type' => 'gid',
            ]);
        }
		*/
    }
}
