<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_subscriptions', function (Blueprint $table) {
             $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('book_id');
            $table->timestamps();
            $table->unique(['user_id', 'book_id']);
            $table->foreign('book_id')
                ->references('id')
                ->on('books')
                ->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_subscriptions');
    }
}
