<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reqs', function (Blueprint $table) {
            $table->id();
            // $table->string('user_name')->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->string('stock_name')->nullable();
            $table->integer('count')->nullable();


            $table->foreignId('department_id')->references('id')->on('departments')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->string('dept_status')->nullable();
            // $table->string('store_manager')->nullable();
            $table->string('store_status')->nullable();
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
        Schema::dropIfExists('reqs');
    }
};
