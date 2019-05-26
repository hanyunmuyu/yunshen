<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CommunityUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('community_users', function (Blueprint $table) {
            $table->bigIncrements('id');


            $table->unsignedBigInteger('user_id')
                ->index()
                ->comment('用户的id');

            $table->unsignedInteger('community_id')
                ->index()
                ->comment('社团id');

            $table->unsignedTinyInteger('level')
                ->default(0)
                ->comment('用户等级：0:关注，1：成员，2：管理员');
            $table->unique(['user_id', 'community_id'], 'community_user');
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
        Schema::dropIfExists('community_users');
    }
}
