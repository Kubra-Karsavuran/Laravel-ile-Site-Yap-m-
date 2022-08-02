<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Str;   // slug kutuphanesı bu
use Illuminate\Support\Facades\DB; // verı tabanı baglantısı


class menu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deger=['Eğlence','Bilişim','Gezi','Teknoloji'];
        
        foreach ($deger as $value) {
           DB::table('menus')->insert([ 
              'menu_ad'=>$value,
              'slug'=>Str::slug($value),
              'created_at'=>now(),
              'updated_at'=>now()
          ]);
       }



   }
}
