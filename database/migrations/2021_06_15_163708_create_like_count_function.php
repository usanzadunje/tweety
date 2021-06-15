<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateLikeCountFunction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE FUNCTION like_count(id INTEGER)
            RETURNS INTEGER
            BEGIN
                DECLARE likeCount INTEGER;
                SET likeCount = 0;
                SELECT SUM(liked) INTO likeCount
                FROM likes
                WHERE tweet_id = id;
                RETURN likeCount;
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
        DB::unprepared('DROP FUNCTION IF EXISTS like_count');
    }
}
