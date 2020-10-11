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
            //$table->engine = 'InnoDB';
            $table->id();
            $table->string('name');
            $table->foreignId('sub_category_id')
                  ->constrained()
                  ->onDelete('cascade');
            $table->double('unit_price');
            $table->double('new_price');
            $table->double('quantity');
            $table->string('path_small_1');
            $table->string('path_small_2');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
