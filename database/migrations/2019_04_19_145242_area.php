<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Area extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('areas', function (Blueprint $table) {

            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';

            $table->unsignedInteger('id')
                ->primary()
                ->comment('地区id编号');

            $table->string('name')
                ->index()
                ->comment('地区名称');

            $table->unsignedInteger('pid')
                ->default(0)
                ->comment('父级分类id');

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
        //
        Schema::dropIfExists('areas');
    }
}
