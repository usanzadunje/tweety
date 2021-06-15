<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateLikeDislikeProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE PROCEDURE like_dislike(IN user_id INTEGER, IN tweet_id INTEGER, IN choice BOOLEAN)
            BEGIN
                INSERT INTO likes (user_id, tweet_id, liked, created_at) 
                VALUES(user_id, tweet_id, choice, CURRENT_TIMESTAMP()) 
                ON DUPLICATE KEY UPDATE liked=choice, updated_at=CURRENT_TIMESTAMP();
            END 
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS like_dislike');
    }
}
