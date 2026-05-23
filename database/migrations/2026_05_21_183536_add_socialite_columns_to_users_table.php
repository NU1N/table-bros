<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('socialite_provider')->nullable()->after('password');
            $table->string('socialite_provider_id')->nullable()->after('socialite_provider');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['socialite_provider', 'socialite_provider_id']);
        });
    }
};
