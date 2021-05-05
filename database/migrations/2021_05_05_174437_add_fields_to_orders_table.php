<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('fname')->nullable()->after('status_id');
            $table->string('lname')->nullable()->after('fname');
            $table->string('email')->nullable()->after('lname');
            $table->string('phone')->nullable()->after('email');
            $table->text('shipping_address_2')->nullable()->after('shipping_address');
            $table->string('city')->nullable()->after('shipping_address_2');
            $table->string('postcode')->nullable()->after('city');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['fname', 'lname', 'email', 'phone', 'shipping_address_2', 'city', 'postcode']);
        });
    }
}
