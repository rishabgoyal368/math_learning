<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
        public function up()
      {
          Schema::table('users', function($table) {
             $table->dropColumn('last_name');
          });
      }

      public function down()
      {
          Schema::table('users', function($table) {
             $table->integer('last_name');
          });
      }
}
