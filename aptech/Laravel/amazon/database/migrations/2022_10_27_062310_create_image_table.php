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
        // Schema::table('product', function (Blueprint $table) {
        //     $table->dropColumn('image');
        // });

        // Schema::create('image', function (Blueprint $table) {
        //     $table->id();
        //     $table->integer('product_id');
        //     $table->string('url');
        //     $table->boolean('thumbnail');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->string('image')->after('price');
        });    

        Schema::dropIfExists('image');
    }
};
