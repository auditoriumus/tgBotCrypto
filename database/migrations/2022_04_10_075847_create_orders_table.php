<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->unsignedBigInteger('chat_id');
            $table->foreign('chat_id')
                ->on('chats')
                ->references('id');
            $table->unsignedBigInteger('lot_id')->nullable();
            $table->foreign('lot_id')
                ->on('lots')
                ->references('id');
            $table->unsignedBigInteger('file_id')->nullable();
            $table->foreign('file_id')
                ->on('files')
                ->references('id');
            $table->boolean('is_payed')->default(false);
            $table->softDeletes();
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
        Schema::dropIfExists('orders');
    }
};
