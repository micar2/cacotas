<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_Articles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('articleId');
            $table->foreign('articleId')->references('id')->on('articles');
            $table->unsignedInteger('orderId');
            $table->foreign('orderId')->references('id')->on('orders')->onDelete('cascade');
            $table->string('number');
            $table->boolean('prepare')->default(false);
            $table->softDeletes();
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
        //
    }
}
