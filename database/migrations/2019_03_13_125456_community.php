<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Community extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        //
        Schema::create('communities', function (Blueprint $table) {

            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';

            $table->increments('id');

            $table->string('community_name')
                ->index()
                ->comment('社团名称');

            $table->unsignedInteger('school_id')
                ->index()
                ->comment('高校id');

            $table->unsignedTinyInteger('level')
                ->default(0)
                ->comment('社团等级：0 自发，1院级，2 校级');

            $table->unsignedTinyInteger('vip')
                ->default(0)
                ->comment('是否会员制：1会员制，0不是会员制');

            $table->text('description')
                ->nullable()
                ->comment('社团的简单描述');

            $table->unsignedInteger('user_id')
                ->index()
                ->comment('创建者id');

            $table->string('community_logo')
                ->nullable()
                ->comment('社团的logo');

            $table->unsignedInteger('member_number')
                ->default(1)
                ->comment('成员数量');

            $table->unsignedInteger('attention_number')
                ->default(1)
                ->comment('关注数量');
            $table->unsignedTinyInteger('star')
                ->default(4)
                ->comment('社团活跃星级');

            $table->unsignedTinyInteger('status')
                ->default(1)
                ->comment('状态:0禁用；1新建；2审核通过:3驳回');

            $table->string('deal_reason')
                ->nullable()
                ->comment('审核的原因');

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
        Schema::dropIfExists('communities');
    }
}
