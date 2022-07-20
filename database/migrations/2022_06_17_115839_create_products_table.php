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
            $table->increments('id');
            $table->string('name');
            $table->integer('service_provider_id')->unsigned();
            $table->string('model');
            $table->string('brand');
            $table->string('manual_pdf');
            $table->string('weekend_price');
            $table->string('one_day_price');
            $table->string('two_day_price');
            $table->string('three_day_price');
            $table->string('weekly_price');
            $table->longText('package_1');
            $table->longText('package_2');
            $table->string('package_1_price');
            $table->string('package_2_price');
            $table->string('inventory');
            $table->string('delivery');
            $table->string('shipping_cost');
            $table->longText('more_info');
            $table->longText('terms_conditions');
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
