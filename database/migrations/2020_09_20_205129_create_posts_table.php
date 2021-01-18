<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 191);
            $table->string('slug', 191);
            $table->string('posted_by', 191);
            $table->text('deskripsi');
            $table->string('link_video', 191);
            $table->string('link_download', 191);
            $table->string('link_gambar', 191);
            $table->string('genre', 191);
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
        Schema::dropIfExists('posts');
    }
}
