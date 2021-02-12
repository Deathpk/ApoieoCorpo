<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postsdata', function (Blueprint $table) {
            
                $table->increments('ID');
                $table->string('UserID');
                $table->string('Ramo');
                $table->string('Nome');
                $table->text('Descricao');
                $table->bigInteger('Contato');
                $table->text('Instagram')->nullable();
                $table->text('Facebook')->nullable();
                $table->text('WhatsApp')->nullable();
                $table->string('Estado');
                $table->string('Cidade');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postsdata');
    }
}
