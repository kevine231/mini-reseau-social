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
        // Ajout de la colonne 'active' à la table 'users'
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('active')->default(0);  // 0 = inactif, 1 = actif
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Suppression de la colonne 'active' de la table 'users'
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('active');
        });
    }
};
