<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMindmapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('mindmaps', function (Blueprint $table) {
          $table->increments('id');

          $table->integer('key');
          $table->integer('parent')->nullable();
          $table->string('text', 20);
          $table->string('brush', 20)->nullable();
          $table->string('dir', 20)->nullable();
          $table->string('loc', 20);

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
        Schema::drop('mindmaps');
    }
}
