<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_detail', function (Blueprint $table) {
            $table->increments('id')->primary();
            $table->foreign('checktype_id')->references('id')->on('check_type');
            $table->string('name')
            $table->string('kategori');
            $table->string('level');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('check_detail');
    }
}
