<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('parties', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'master_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->json('tags')->nullable();
            $table->dateTime('datetime');
            $table->integer('duration');
            $table->string('address', 255);
            $table->integer('price');
            $table->integer('spots');
            $table->text('description');
            $table->string('short_description', 100);
            $table->boolean('is_completed')->default(false);
            $table->boolean('is_hidden')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('parties');
    }
};
