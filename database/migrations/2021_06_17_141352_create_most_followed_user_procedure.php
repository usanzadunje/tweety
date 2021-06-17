<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateMostFollowedUserProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE PROCEDURE most_followed_user()
            BEGIN
                SELECT *
                FROM users
                WHERE id = (SELECT following_user_id 
                            FROM follows 
                            GROUP BY following_user_id 
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
        DB::unprepared("DROP PROCEDURE IF EXISTS most_followed_user");
    }
}
