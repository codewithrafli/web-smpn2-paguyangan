<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('nisn')->nullable()->after('name');
            $table->string('gender')->nullable()->after('nisn');
            $table->string('birthplace')->nullable()->after('gender');
            $table->date('birthdate')->nullable()->after('birthplace');
            $table->string('parent_name')->nullable()->after('birthdate');
            $table->string('nomor_induk')->nullable()->after('parent_name');
        });
    }

    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn(['nisn', 'gender', 'birthplace', 'birthdate', 'parent_name', 'nomor_induk']);
        });
    }
};
