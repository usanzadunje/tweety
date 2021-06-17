<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateMostTweetsByUserProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE PROCEDURE most_tweets_by_user()
            BEGIN
                SELECT *
                FROM users
                WHERE id = (SELECT user_id 
                            FROM tweets 
                            GROUP BY user_id 
                            ORDER BY COUNT(*) DESC 
                            LIMIT 1);
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
        DB::unprepared("DROP PROCEDURE IF EXISTS most_tweets_by_user");
    }
}
