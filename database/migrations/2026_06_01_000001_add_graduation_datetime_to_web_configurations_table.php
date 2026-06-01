<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('web_configurations', function (Blueprint $table) {
            $table->datetime('graduation_datetime')->nullable()->after('organization_structure');
        });
    }

    public function down(): void
    {
        Schema::table('web_configurations', function (Blueprint $table) {
            $table->dropColumn('graduation_datetime');
        });
    }
};
