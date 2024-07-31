<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->decimal('weight', 8, 2);
            $table->integer('region');
            $table->json('delivery_hours');
            $table->unsignedBigInteger('courier_id')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();

            // Добавляем внешний ключ для связи с таблицей couriers
            $table->foreign('courier_id')
                  ->references('id')
                  ->on('couriers')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Удаляем внешний ключ и столбцы
            $table->dropForeign(['courier_id']);
            $table->dropColumn(['courier_id', 'status']);
        });

        Schema::dropIfExists('orders');
    }
};
