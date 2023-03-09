<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('mother_last_name', 50);
            $table->string('last_name', 50);
            $table->foreignId('gener_id')->constrained('genders');
            $table->string('age', 3);
            $table->foreignId('marital_status_id')->constrained('marital_statuses');
            $table->string('email', 50)->unique();
            $table->foreignId('education_level_id')->constrained('educational_levels');
            $table->string('career_id', 11)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 150);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
