<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('foto')->nullable(); // path file gambar
            $table->text('visi');
            $table->text('misi');
            $table->enum('type', ['Ketua OSIS', 'Ketua MPK']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
