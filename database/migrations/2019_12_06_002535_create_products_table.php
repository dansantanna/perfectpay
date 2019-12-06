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
            $table->string('name', 100);
            $table->text('description');
            $table->double('price', 8, 2);
            $table->timestamps();
        });

        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->string('identification_type', 5);
            $table->string('identification_number');
            $table->string('email', 100);
            $table->timestamps();
        });

        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantity');
            $table->double('sale_amount', 8, 2);
            $table->double('discount', 3, 2);
            $table->string('status', 100);
            
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');
            
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('sales');
    }
}
