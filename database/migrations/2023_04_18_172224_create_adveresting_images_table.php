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
        Schema::create('adveresting_images', function (Blueprint $table) {

                $table->id();
                $table->string('url');
                $table->integer('advertising_id');
                $table->timestamps();
        });

        Schema::table('advertisings', function (Blueprint $table) {

            $table->dropColumn('img');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adveresting_images');
    }
};
