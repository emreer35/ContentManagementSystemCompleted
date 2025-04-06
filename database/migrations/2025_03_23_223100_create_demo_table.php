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
        // sayfalar tablosu
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // home , about , contact
            $table->json('components')->nullable(); // json formatinda sablon icerigi -- bilesenler
            $table->timestamps();
        });
        // components tablosu
        Schema::create('components', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // header, footer, team
            $table->string('path');
            $table->timestamps();
        });
        //  settings tabous
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->json('web_setting');
            $table->json('seo');
            $table->json('navbar_content');
            $table->json('footer_content');
            $table->json('social_medias');
            $table->timestamps();
        });
        // menu tablous
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // header, footer
            $table->timestamps();
        });
        //menu ogeelri
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id');
            $table->unsignedBigInteger('page_id');
            $table->string('label'); // meny ogesinin basligi
            $table->string('slug')->nullable();;
            $table->unsignedBigInteger('parent_id')->nullable(); // alt menu ogesi icin 

            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('menu_items')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
        Schema::dropIfExists('components');
        Schema::dropIfExists('settings');
        Schema::dropIfExists('menus');
        Schema::dropIfExists('menu_items');
    }
};
