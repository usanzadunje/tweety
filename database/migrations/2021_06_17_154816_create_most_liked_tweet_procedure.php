<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateMostLikedTweetProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE PROCEDURE most_liked_tweet(IN param_user_id INTEGER)
            BEGIN
                IF param_user_id IS NULL THEN
                    SELECT *
                    FROM tweets
                    WHERE id = (SELECT tweet_id 
                                FROM likes 
                                GROUP BY tweet_id, liked 
                                ORDER BY SUM(liked) DESC 
                                LIMIT 1);
                ELSE
                    SELECT *
                    FROM tweets
                    WHERE id = (SELECT tweet_id 
                                FROM likes 
                                GROUP BY tweet_id, liked
                                HAVING tweet_id IN (SELECT id FROM tweets WHERE user_id = param_user_id)
                                ORDER BY SUM(liked) DESC 
                                LIMIT 1);
                END IF;
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
        DB::unprepared('DROP PROCEDURE IF EXISTS most_liked_tweet');
    }
}
