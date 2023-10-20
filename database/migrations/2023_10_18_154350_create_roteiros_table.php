<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('roteiros', function (Blueprint $table) {
            $table->id();

            $table->json('pontos');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('relatorios');
    }
};
