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
        Schema::create('biodata', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                    ->constrained('users')
                    ->onDelete('cascade');
            $table->string('nama_lengkap', 100);
            $table->string('nik',100)->unique();
            $table->text('tempat_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('jenis_kelamin',2)->default('L')->nullable();
            $table->string('agama',50)->nullable();
            $table->text('alamat_lengkap')->nullable();
            $table->string('img_user')->nullable();
            $table->smallInteger('jalur_tes')->default(1);
            $table->smallInteger('konfirmasi')->default(0);
            $table->smallInteger('status')->default(1);
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
        Schema::dropIfExists('biodata');
    }
};
