<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Faker as Faker;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 10;

        if(DB::table('articles')->get()->count() == 0) {

            for ($i = 0; $i < $limit; $i++) {
                Article::create([
                    'author' => $faker->name,
                    'title' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                    'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eleifend ligula in nulla vulputate pharetra. Proin condimentum, libero quis feugiat pharetra, ante arcu faucibus felis, vel elementum magna felis in libero. Aliquam id ultricies purus. Etiam at ullamcorper enim. Cras vel elit ac lorem condimentum dignissim. Ut rhoncus neque finibus erat congue, id tempus lacus hendrerit. Curabitur non faucibus diam. Sed id ante id dolor euismod varius eu vel velit. 
                    Maecenas id ligula quis enim blandit gravida a et lorem. Vivamus eu turpis eu leo malesuada dictum non ac tortor. Pellentesque volutpat mollis leo tincidunt sollicitudin. Suspendisse porta imperdiet sapien nec euismod. Quisque ac dictum sem. Cras in porttitor lacus, vitae convallis elit. Maecenas in fermentum erat, a rutrum nulla.
                    Mauris quis dolor sit amet metus mollis tempor eu quis turpis. Vestibulum vel eleifend magna, eget tempor nulla. Donec bibendum mauris aliquam elit vulputate, id vestibulum lorem sodales. Nullam eget erat mauris. Etiam sit amet sollicitudin magna. Ut tortor nisi, mollis viverra tempus consequat, interdum non mi. Quisque bibendum, lacus sit amet rhoncus malesuada.',
                    'image' => 'image'.$i.'.jpg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }

        }

    }
}
