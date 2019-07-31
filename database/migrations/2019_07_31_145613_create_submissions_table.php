<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger( 'user_id' );
            $table->string( 'title' );
            $table->string( 'category' );
            $table->string( 'image' );
            $table->string( 'caption' );
            $table->text( 'content' );
            $table->boolean( 'verified' )->default( false );
            $table->bigInteger( 'views' )->default( 0 );
            $table->bigInteger( 'likes' )->default( 0 );
            $table->timestamps();

            $table->index( 'user_id' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submissions');
    }
}
