<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYorumlarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yorumlars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ad_soyad');
            $table->text('email');
            $table->longText('yorum');
            $table->integer('like')->default('0');
            $table->integer('dislike')->default('0');
            $table->integer('kimyo')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yorumlars');
    }
}
