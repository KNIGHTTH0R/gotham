<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRFIPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rfi_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->text('subject');
            $table->text('message');
            $table->text('slug')->nullable();
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            
            $table->integer('rfi_id');
            $table->foreign('rfi_id')->references('id')->on('rfis');
            
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
        Schema::dropIfExists('rfi_posts');
    }
}
