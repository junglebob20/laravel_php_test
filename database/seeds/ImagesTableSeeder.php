<?php

use Illuminate\Database\Seeder;
use App\Image;
class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->delete();
        Image::create(array(
            'name' => 'Image_Name',
            'tag' => 'tag1',
            'path' => 'storage/images/',
            'ext' => 'jpeg',
        ));
    }
}
