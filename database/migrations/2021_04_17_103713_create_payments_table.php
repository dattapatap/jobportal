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
            $table->string('payment_id', 100); // razorpay payment id
            $table->string('payment_tax_id',20);
            $table->decimal('payment_amount',9,2);
            $table->decimal('payment_actual_amount', 9,2);
            $table->unsignedBigInteger('package_id');
            $table->foreign('package_id')->references('id')->on('packages');
            $table->unsignedBigInteger('rec_id');
            $table->foreign('rec_id')->references('id')->on('recruiters');
            $table->string('status');
            $table->datetime('payment_date');
            $table->string('payment_method');
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
        Schema::dropIfExists('payments');
    }
}
