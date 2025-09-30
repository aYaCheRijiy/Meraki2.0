<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->unique()->onDelete('cascade');
            $table->string('title');
            $table->text('bio')->nullable();
            $table->string('template')->default('default');
            $table->string('accent_color')->nullable();
            $table->integer('views')->default(0);
            $table->boolean('is_published')->default(false);

            // Платные функции
            $table->string('custom_domain')->nullable()->unique();
            $table->boolean('hide_branding')->default(false);
            $table->string('promo_text')->nullable();
            $table->boolean('promo_active')->default(false);
            $table->text('custom_css')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pages');
    }
};
