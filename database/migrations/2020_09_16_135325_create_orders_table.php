<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->unsignedInteger('id')->unsigned()->unique();
            $table->primary(['id']);
            $table->unsignedBigInteger('service_id');
            $table->text('article_category')->nullable();
            $table->longText('extras');
            $table->integer('quantity');
            $table->longText('links');
            $table->longText('keywords');
            $table->double('price');
            $table->text('notes')->nullable();
            $table->foreign('service_id')
                ->references('id')
                ->on('services')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('orders');
    }
}
