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
            $table->increments('id');
            $table->integer('booking_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('renter_id')->unsigned();
            $table->integer('service_provider_id')->unsigned();
            $table->string('total_amount');
            $table->string('admin_amount');
            $table->string('service_provider_amount');
            $table->string('payment_mode');
            $table->enum('end_user_status', ['pending' => 'Pending', 'completed' => 'Completed']);
            $table->enum('service_provider_status', ['pending' => 'Pending', 'completed' => 'Completed']);
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
