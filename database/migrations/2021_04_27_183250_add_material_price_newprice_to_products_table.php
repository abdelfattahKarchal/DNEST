<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMaterialPriceNewpriceToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->double('price_silver')->after('new_price')->nullable();
            $table->double('new_price_silver')->after('price_silver')->nullable();
            $table->string('material')->after('new_price_silver')->nullable();
            //$table->renameColumn('unit_price', 'price');
            $table->renameColumn('unit_price', 'price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['price_silver', 'new_price_silver', 'material']);
            $table->renameColumn('price','unit_price');
        });
    }
}
