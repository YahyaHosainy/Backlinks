<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->string('payment_id');
            $table->string('payer_id')->nullable();
            $table->float('amount', 10, 2);
            $table->string('currency');
            $table->string('card_type')->nullable();
            $table->string('last4')->nullable();
            $table->string("payment_method");
            $table->string('payment_status');
            $table->string('receipt_url')->nullable();
            $table->string('paypal_email')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('payments');
    }
}
