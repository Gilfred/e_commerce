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
        Schema::create('achats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clients_id');
            $table->foreign('clients_id')->references('id')->on('clients');
            $table->unsignedBigInteger('articles_id');
            $table->foreign('articles_id')->references('id')->on('articles');
            $table->decimal('montant',8,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achats');
    }
};
