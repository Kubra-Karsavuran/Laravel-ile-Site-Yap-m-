<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class yazilars_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deger=['kubra','busra','fatma','hayati'];

        foreach ($deger as $value) {

              DB::table('yazilars')->insert([

               'kategori_id'=>rand(1,7),
               'title'=>$value,
               'title_slug'=>Str::slug($value),
               'content'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum",
               'image'=>"https://cdn.pixabay.com/photo/2016/02/10/21/59/landscape-1192669__480.jpg",
               'created_at'=>now(),
               'updated_at'=>now()
               
            ]);
        }

         

           

         
    }
}
