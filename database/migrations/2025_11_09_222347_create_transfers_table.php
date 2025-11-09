<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('active_id');
            $table->unsignedBigInteger('from_address_id')->nullable();
            $table->unsignedBigInteger('to_address_id')->nullable();
            $table->dateTime('transferred_at')->nullable();
            $table->timestamps();

            $table->foreign('active_id')
                ->references('id')->on('actives')
                ->onDelete('cascade');

            $table->foreign('from_address_id')
                ->references('id')->on('addresses')
                ->nullOnDelete();

            $table->foreign('to_address_id')
                ->references('id')->on('addresses')
                ->nullOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transfers');
    }
};
