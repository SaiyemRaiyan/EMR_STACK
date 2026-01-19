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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('agms_number', 20)->unique();
            $table->date('registration_date');
            $table->enum('registration_type', ['new', 'follow-up'])->default('new');

            $table->string('full_name_en');
            $table->string('preferred_name_en');
            $table->enum('sex', ['male', 'female', 'others']);
            $table->date('date_of_birth');
            $table->string('national_id', 20)->unique();
            $table->enum('marital_status', ['married', 'never-married', 'single', 'widow', 'divorced', 'separated']);
            $table->string('spouse_name_en')->nullable();
            $table->unsignedInteger('number_of_children')->nullable();

            $table->string('upazila');
            $table->string('union_name');
            $table->string('village');
            $table->string('household_number');

            $table->string('email')->nullable();
            $table->enum('phone_type', ['own', 'family', 'both'])->default('own');
            $table->string('own_phone', 15)->nullable();
            $table->string('family_phone', 15)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
