<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReferenceCoutRevientToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('reference_gold')->after('name')->nullable();
            $table->string('reference_silver')->after('reference_gold')->nullable();
            $table->double('cout_revient_gold')->after('new_price')->nullable();
            $table->double('cout_revient_silver')->after('new_price_silver')->nullable();
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
            $table->dropColumn(['reference_gold', 'reference_silver', 'cout_revient_gold', 'cout_revient_silver']);
        });
    }
}
