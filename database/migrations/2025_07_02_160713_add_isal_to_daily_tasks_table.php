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
        Schema::table('dailytasks', function (Blueprint $table) {
            $table->boolean('isAL')->default(0)->after('PIC'); // ganti 'nama_kolom_terakhir' sesuai kebutuhan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dailytasks', function (Blueprint $table) {
            $table->dropColumn('isAL');
        });
    }
};
