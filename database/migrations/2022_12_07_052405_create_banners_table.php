<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('titleEnglish');
            $table->string('titleUrdu');
            $table->string('titleHindi');
            $table->string('titleArbic');
            $table->mediumText('descriptionEnglish');
            $table->mediumText('descriptionUrdu');
            $table->mediumText('descriptionHindi');
            $table->mediumText('descriptionArbic');
            $table->string('image');
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
        Schema::dropIfExists('banners');
    }
}
