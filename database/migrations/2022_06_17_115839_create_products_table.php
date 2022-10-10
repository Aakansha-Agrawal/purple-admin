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
            $table->string('manual_pdf')->nullable();
            $table->string('one_day_price')->nullable();
            $table->string('inventory')->nullable();
            $table->string('delivery')->nullable();
            $table->string('shipping_cost')->nullable();
            $table->longText('more_info')->nullable();
            $table->longText('terms_conditions')->nullable();
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
