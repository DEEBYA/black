<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('channel_id');
            $table->unsignedInteger('visits')->default(0);
            $table->string('title');
            $table->string('book_img')->default('default.jpg');
            $table->string('pdf')->default('default.pdf');
            $table->string('aurthors');
            $table->string('genres');
            $table->string('ages');
            $table->mediumText('body');
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
        Schema::dropIfExists('books');
    }
}
