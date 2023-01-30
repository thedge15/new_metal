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
        Schema::create('materials', function (Blueprint $table) {
            $table->id();

            $table->integer('number');
            $table->foreignId('project_id')->index()->constrained('projects');
            $table->string('element')->nullable();
            $table->string('title');
            $table->string('measure_unit');
            $table->float('quantity', 13, 3);
            $table->string('paint')->nullable();
            $table->string('concrete')->nullable();

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
        Schema::dropIfExists('materials');
    }
};
