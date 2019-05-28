<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('comment');
            $table->integer('publication_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->softDeletesTz();
            $table->timestampsTz();

            $table->foreign('publication_id')
                ->references('id')
                ->on('publications')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commentaries', function (Blueprint $table) {
          $table->dropForeign(['publication_id']);
          $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('commentaries');
    }
}
