<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string("title",100);
            $table->string("slug",100)->unique();
            $table->string("image",100)->nullable();
            $table->text("description")->nullable();
            $table->unsignedBigInteger("parent_id")->nullable();
            $table->foreign("parent_id")->references("id")->on("categories")->onDelete("cascade");
            $table->enum("status",["active","inactive"])->default("active");
            $table->enum("featured",["yes","no"])->default("no");
            $table->string("meta_title",100)->nullable();
            $table->string("meta_description",100)->nullable();
            $table->string("meta_keywords",100)->nullable();
            $table->string("meta_image",100)->nullable();
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
        Schema::dropIfExists('categories');
    }
};
