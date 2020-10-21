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
            $table->id();
            $table->bigInteger('booking_no');
            $table->foreignId('client_id')->nullable()->constrained('clients');
            $table->integer('operator_id')->nullable();
            $table->longText('address')->nullable();
            $table->double('address_latitude')->nullable();
            $table->double('address_longitude')->nullable();
            $table->dateTime('book_datetime')->nullable();
            $table->foreignId('product_id')->nullable()->constrained('products');
            $table->decimal('quantity',8,2);
            $table->longText('description')->nullable();
            $table->tinyInteger('status')->nullable()->comment('1:Approve,2:Reject');
            $table->bigInteger('order_no')->nullable();
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
