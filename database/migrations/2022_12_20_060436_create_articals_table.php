<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articals', function (Blueprint $table) {
            $table->id();
            $table->string('articaltype');
            $table->string('title_eng');
            $table->string('title_hin');
            $table->string('title_urd');
            $table->string('title_arb');
            $table->mediumText('d_english');
            $table->mediumText('d_hindi');
            $table->mediumText('d_urdu');
            $table->mediumText('d_arbic');
            $table->mediumText('shortd_english');
            $table->mediumText('shortd_hindi');
            $table->mediumText('shortd_urdu');
            $table->mediumText('shortd_arbic');
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
        Schema::dropIfExists('articals');
    }
}
