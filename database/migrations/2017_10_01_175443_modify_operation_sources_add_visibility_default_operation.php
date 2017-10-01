<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyOperationSourcesAddVisibilityDefaultOperation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('operation_sources', function (Blueprint $table) {
            $table->enum('visibility', ['private', 'public'])->default('private');
            $table->unsignedInteger('default_operation_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('operation_sources', function (Blueprint $table) {
            $table->dropColumn(['visibility', 'default_operation_type']);
        });
    }
}
