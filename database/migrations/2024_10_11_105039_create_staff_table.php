<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('name');            // Nama staff
            $table->string('email')->unique(); // Email staff (unik)
            $table->string('password');        // Password staff
            $table->string('location');        // Lokasi bekerja (bandara)
            $table->string('maskapai');   // maskapai penerbangan
            $table->unsignedBigInteger('user_id'); // Relasi ke tabel users untuk role
            
            // Membuat foreign key ke tabel users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
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
        Schema::dropIfExists('staff');
    }
}
