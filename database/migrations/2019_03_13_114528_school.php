<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class School extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('schools', function (Blueprint $table) {

            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';

            $table->increments('id');

            $table->string('school_name')
                ->unique()
                ->comment('高校名称');

            $table->string('school_code')
                ->index()
                ->nullable()
                ->comment('学校标识码');

            $table->string('school_department')
                ->nullable()
                ->comment('主管部门');

            $table->unsignedInteger('province')
                ->nullable()
                ->comment('所属省份');

            $table->unsignedInteger('city')
                ->nullable()
                ->comment('所在城市');

            $table->string('level')
                ->nullable()
                ->comment('办学层次');

            $table->string('note')
                ->nullable()
                ->comment('备注');

            $table->string('school_description')
                ->nullable()
                ->comment('高校简介');

            $table->string('school_logo')
                ->nullable()
                ->comment('高校logo');

            $table->unsignedInteger('user_number')
                ->default(1)
                ->comment('人数');

            $table->unsignedInteger('community_number')
                ->default(1)
                ->comment('社团数');

            $table->unsignedInteger('attention_number')
                ->default(1)
                ->comment('关注人数');

            $table->unsignedTinyInteger('star')
                ->default(4)
                ->comment('校园星级');

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
        Schema::dropIfExists('schools');
    }
}
