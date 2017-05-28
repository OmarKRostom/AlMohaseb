<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCreditColumnToCustomersAndAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->integer('credit')->default(0)->after('phone');
        });

        Schema::table('agents', function (Blueprint $table) {
            $table->integer('credit')->default(0)->after('phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('credit');
        });

        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('credit');
        });
    }
}
