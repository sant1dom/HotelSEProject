<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();

            $table->timestamp('enteredAt')->nullable();
            $table->timestamp('exitAt')->nullable();

            $table->unsignedBigInteger('guest_id');
            $table->unsignedBigInteger('service_id');
            $table->unique(['guest_id', 'service_id']);
            $table->foreign('guest_id')->references('id')->on('guests')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');

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
        Schema::dropIfExists('reports');
    }
}
