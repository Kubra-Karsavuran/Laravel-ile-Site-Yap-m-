<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str; 

class pageseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $i=0;
        $deger=['Hakkımızda','Yazılan yazılar','Galeri','Soru-Cevap','Yorumlar'];
        
        foreach ($deger as $value) {
            $i++;
           DB::table('pages')->insert([

              'title'=>$value,
              'image'=>"https://serapdogan.files.wordpress.com/2013/10/abbbb.jpg",
              'content'=>"Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960'larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.",

              'title_slug'=>Str::slug($value),

              'order'=>$i,

              'created_at'=>now(),
              'updated_at'=>now()
          ]);
       }



    }
}
