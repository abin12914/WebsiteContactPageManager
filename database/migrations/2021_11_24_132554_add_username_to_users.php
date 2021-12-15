<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsernameToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void 
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username', 100)->unique()->after('name');
            $table->string('phone', 15)->unique()->after('email');
            $table->date('dob')->nullable()->after('phone')->comment('date of birth');
            $table->string('country',20)->nullable()->after('dob');
            $table->tinyInteger('status')->default('0')->after('remember_token')->comment('0 Pending, 1 Active, 2 Deactive');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username','phone','dob','country','status']);
        });
    }
}
