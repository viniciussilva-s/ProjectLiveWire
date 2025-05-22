<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['aberto', 'em progresso', 'resolvido'])->default('aberto');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable(); // ID do usuário criador
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
