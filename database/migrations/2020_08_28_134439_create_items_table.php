<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('condition_id');
            $table->unsignedBigInteger('category_id');
            $table->string('code', 128);
            $table->string('item_name', 128);
            $table->string('price', 128);
            $table->string('fromWhere', 128);
            $table->string('photo', 128);
            $table->string('fault_items');
            $table->timestamps();

            $table->foreign('condition_id')
                ->references('id')
                ->on('conditions')
                ->onDelete('cascade');

            $table->foreign('category_id')
                ->references('id')
                ->on('conditions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
