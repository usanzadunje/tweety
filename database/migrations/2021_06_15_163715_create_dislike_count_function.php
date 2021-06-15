<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDislikeCountFunction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE FUNCTION dislike_count(id INTEGER)
            RETURNS INTEGER
            BEGIN
                DECLARE dislikeCount INTEGER;
                SET dislikeCount = 0;
                SELECT SUM(!liked) INTO dislikeCount
                FROM likes
                WHERE tweet_id = id;
                RETURN dislikeCount;
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
        DB::unprepared('DROP FUNCTION IF EXISTS dislike_count');
    }
}
