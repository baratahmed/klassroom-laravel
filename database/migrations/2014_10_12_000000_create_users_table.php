<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_number')->unique();
            $table->string('photo')->default('user.jpg');
            $table->text('address')->nullable();
            $table->string('role')->default('user');
            $table->tinyInteger('email_verified')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('email_verification_token');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
