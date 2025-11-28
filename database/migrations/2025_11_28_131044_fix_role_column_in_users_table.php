<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // hapus kolom role lama (yang salah tipenya)
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });

        // tambah kolom role baru yang benar
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['pelanggan', 'produsen', 'pelanggan_produsen'])
                  ->default('pelanggan');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};
