<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYazilarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yazilars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori_id'); // sayı alacak fakat negatıf olmaması ıcın bunu kullandık

            $table->string('title');
            $table->string('title_slug');
            $table->longText('content');
            
            $table->string('image');
            $table->integer('hit')->default(0);
            $table->integer('like')->default(0);

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('kategori_id')  // ıkı tablonun arasında id ler baglantısı yapıldı
                  ->references('id')
                  ->on('menus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yazilars');
    }
}
