<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('renter_id');
            $table->string('service_provider_id');
            $table->string('product_id');
            $table->string('quantity');
            $table->string('package');
            $table->string('delivery_type');
            $table->string('expiry_date');
            $table->string('purchase_date');
            $table->string('return_date')->nullable();
            $table->string('total_price');
            $table->enum('status', ['active' => 'Active', 'closed' => 'Closed']);
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
        Schema::dropIfExists('bookings');
    }
}
