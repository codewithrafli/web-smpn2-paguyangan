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
        Schema::table('graduations', function (Blueprint $table) {
            $table->string('photo')->nullable()->after('status');
            $table->string('skl_file')->nullable()->after('photo');
            $table->string('skn_file')->nullable()->after('skl_file');
        });
    }

    public function down(): void
    {
        Schema::table('graduations', function (Blueprint $table) {
            $table->dropColumn(['photo', 'skl_file', 'skn_file']);
        });
    }
};
