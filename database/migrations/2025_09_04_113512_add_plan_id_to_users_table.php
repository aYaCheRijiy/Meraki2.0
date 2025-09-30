<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Добавляем поля, если их нет
            if (!Schema::hasColumn('users', 'avatar')) {
                $table->string('avatar')->nullable();
            }
            if (!Schema::hasColumn('users', 'username')) {
                $table->string('username')->nullable()->unique();
            }
            if (!Schema::hasColumn('users', 'role')) {
                $table->string('role')->default('user');
            }

            // Добавляем связь с тарифным планом
            $table->foreignId('plan_id')->nullable()->constrained()->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['plan_id']);
            $table->dropColumn('plan_id');

            // Опционально: удаляем добавленные поля
            $table->dropColumn(['avatar', 'username', 'role']);
        });
    }
};
