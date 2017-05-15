<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('org_type');
            $table->string('org_name')->nullable();;
            //$table->string('icon_name');
            $table->string('license_id')->unique();
            $table->string('website')->nullable();
            $table->text('description')->nullable();
            $table->string('contact_person');
            $table->string('email')->unique();
            $table->string('telephone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('address');
            $table->string('suburb');
            $table->string('postcode');
            $table->string('state');
            $table->string('password');
            $table->double('latitude')->nullable();
            $table->double('longitud')->nullable();
            $table->integer('coverage_area')->nullable();
            $table->boolean('work_on_holidays')->nullable();
            $table->boolean('accept_terms')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
