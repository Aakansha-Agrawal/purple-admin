<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('service_provider_id')->unsigned();
            $table->string('rent_cost');
            $table->string('stocks');
            $table->string('reason')->nullable();

            $table->string('manual_pdf');
            $table->string('model');
            $table->string('brand');
            $table->string('pickup_address');
            $table->string('shipping_cost');
            $table->string('description');
            $table->string('terms_conditions');
            $table->string('per_day_price');
            $table->string('per_hour_price');
            $table->string('two_day_price');
            $table->string('weekly_price');
            $table->string('weekend_price');
            $table->string('package_1');
            $table->string('package_2');
            $table->enum('status', ['accept' => 'Accept', 'reject' => 'Reject']);
            $table->integer('category_id');

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
        Schema::dropIfExists('products');
    }
}
