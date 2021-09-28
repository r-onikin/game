<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoftwaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sofrwares', function (Blueprint $table) {
          $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->unsignedBigInteger('developer_id');
            $table->unsignedBigInteger('distributor_id');
            $table->unsignedBigInteger('platform_id');
            $table->date('released_day');
            $table->date('played_day');
            $table->timestamps();
            
            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('developer_id')->references('id')->on('developers');
            $table->foreign('distributor_id')->references('id')->on('distributors');
            $table->foreign('platform_id')->references('id')->on('platforms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sofrwares');
    }
}
