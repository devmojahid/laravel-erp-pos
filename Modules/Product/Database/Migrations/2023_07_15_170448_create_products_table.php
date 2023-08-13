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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("slug")->unique();
            $table->text("description")->nullable();
            $table->text("short_description")->nullable();
            $table->string("sku")->nullable();
            $table->string("barcode")->nullable();
            $table->string("gallery")->nullable();
            $table->string("thumbnail")->nullable();
            $table->string("video")->nullable();
            $table->decimal("price")->default(0);
            $table->decimal("sale_price")->nullable();
            $table->integer("stock")->nullable();
            $table->enum("status", ["active", "inactive"])->default("active");
            $table->enum("featured", ["yes", "no"])->default("no");
            $table->enum("type", ["simple", "variable"])->default("simple");
            $table->unsignedBigInteger("category_id")->nullable();
            $table->foreign("category_id")->references("id")->on("categories")->onDelete("cascade");
            $table->unsignedBigInteger("brand_id")->nullable();
            $table->foreign("brand_id")->references("id")->on("brands")->onDelete("cascade");
            $table->unsignedBigInteger("user_id")->nullable();
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
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
        Schema::dropIfExists('products');
    }
};
