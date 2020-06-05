<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname')->after('name');
            $table->integer('age');
            $table->string('gender');
            $table->string('phone')->unique()->nullable();
            $table->boolean('is_active')->default(false);
            $table->string('type')->index();
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
            $table->dropColumn('surname');
            $table->dropColumn('age');
            $table->dropColumn('gender');
            $table->dropColumn('phone');
            $table->dropColumn('is_active');
            $table->dropColumn('type');
        });
    }
}
