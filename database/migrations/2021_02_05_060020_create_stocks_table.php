<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            // $table->foreign('item_id')->references('id')->on('items')
            // ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('item_id');
            $table->enum('type', ['in', 'out']);
            $table->text('detail');
            $table->integer('supplier_id');
            // $table->foreign('supplier_id')->references('id')->on('suppliers')
            // ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('qty');
            $table->integer('user_id');
            // $table->foreign('user_id')->references('id')->on('users')
            // ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('stocks');
    }
}
