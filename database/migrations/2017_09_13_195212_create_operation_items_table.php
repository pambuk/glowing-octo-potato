<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operation_items', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('operation_id');
            $table->foreign('operation_id')->references('id')->on('operations')->onDelete('cascade');

            $table->string('description');
            $table->integer('value')->default(0);
            $table->unsignedInteger('quantity')->nullable();
            $table->unsignedInteger('volume')->nullable();
            $table->unsignedInteger('weight')->nullable();

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
        Schema::dropIfExists('operation_items');
    }
}
