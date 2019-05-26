<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CommunityUserSign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('community_user_signs', function (Blueprint $table) {
            $table->bigIncrements('id');


            $table->unsignedBigInteger('user_id')
                ->index()
                ->comment('用户的id');

            $table->unsignedInteger('community_id')
                ->index()
                ->comment('社团id');
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
        Schema::dropIfExists('community_user_signs');
    }
}
