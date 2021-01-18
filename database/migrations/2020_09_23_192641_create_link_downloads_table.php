<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkDownloadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('link_downloads', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20);
            $table->string('slug', 191);
            $table->text('link_1');
            $table->text('link_2');
            $table->text('link_3');
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
        Schema::dropIfExists('link_downloads');
    }
}
