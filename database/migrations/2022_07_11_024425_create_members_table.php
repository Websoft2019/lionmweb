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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('club_id');
            $table->string('club_membership_id')->unique();
            $table->string('name');
            $table->string('designation_id');
            $table->string('photo')->nullable();
            $table->string('dob')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->text('address');
            $table->string('sponsor_id')->nullable();
            $table->string('occupation_id');
            $table->string('spouse_name')->nullable();
            $table->enum('member_type', ['Regular Member', 'Leo Lion Member'])->default('Regular Member');
            $table->string('home_contact_number')->nullable();
            $table->string('office_contact_number')->nullable();
            $table->string('personal_contact_number')->unique();
            $table->string('email')->nullable();
            $table->enum('status', ['Active', 'Drop', 'Deleted'])->default('Active');
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
        Schema::dropIfExists('members');
    }
};
