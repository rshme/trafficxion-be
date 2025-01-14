<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('parkings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_id')
                ->constrained('locations')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->enum('type', ['car', 'motorcycle']);
            $table->string('name');
            $table->string('cover_url')->nullable();
            $table->smallInteger('booked_count')->unsigned();
            $table->smallInteger('total_space')->unsigned();
            $table->json('images')->nullable();
            $table->string('maps_url');
            $table->time('open_time');
            $table->time('close_time');
            $table->tinyInteger('is_24hour');
            $table->integer('price_per_hour');
            $table->json('public_transport_nearby')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parkings');
    }
};
