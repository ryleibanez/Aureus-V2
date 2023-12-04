<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('transactionid');
            $table->string('email');
            $table->bigInteger('product_id');
            $table->longText('pdname');
            $table->longText('pdimage');
            $table->integer('quantity');
            $table->double('price');
            $table->double('totalprice');
            $table->longText('orderstatus');
            $table->longText('address');
            $table->longText('country');
            $table->longText('modeofpayment');
            $table->longText('deliverydate');
            $table->string('deliveryfee', 45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
