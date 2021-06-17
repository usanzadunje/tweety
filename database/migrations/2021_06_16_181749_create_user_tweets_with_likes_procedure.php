<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUserTweetsWithLikesProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE PROCEDURE user_tweets_with_likes(IN param_user_id INTEGER, IN sort_by_likes BIT)
            BEGIN
                IF sort_by_likes = 1 THEN
                    SELECT tweets.id, tweets.user_id, tweets.body, tweets.created_at, SUM(liked) likes, SUM(!liked) dislikes
                    FROM tweets
                    LEFT JOIN likes
                    ON tweets.id = likes.tweet_id
                    GROUP BY tweets.id
                    HAVING tweets.user_id = param_user_id
                    ORDER BY likes DESC
                    LIMIT 1;
                ELSE
                    SELECT tweets.id, tweets.user_id, tweets.body, tweets.created_at, SUM(liked) likes, SUM(!liked) dislikes
                    FROM tweets
                    LEFT JOIN likes
                    ON tweets.id = likes.tweet_id
                    GROUP BY tweets.id
                    HAVING tweets.user_id = param_user_id
                    ORDER BY dislikes DESC
                    LIMIT 1;
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
        DB::unprepared("DROP PROCEDURE IF EXISTS user_tweets_with_likes");
    }
}
