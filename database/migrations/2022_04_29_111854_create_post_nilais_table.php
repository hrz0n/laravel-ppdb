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
        Schema::create('post_nilai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->foreignId('nilai_id')
                ->constrained('nilai')
                ->onDelete('cascade');
            $table->float('score_s1')->default(0);
            $table->float('score_s2')->default(0);
            $table->float('score_s3')->default(0);
            $table->float('score_s4')->default(0);
            $table->float('score_s5')->default(0);
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
        Schema::dropIfExists('post_nilais');
    }
};
