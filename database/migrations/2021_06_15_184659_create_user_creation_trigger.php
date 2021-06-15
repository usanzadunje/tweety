<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUserCreationTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE TRIGGER after_user_create
                AFTER INSERT ON users
                FOR EACH ROW
            INSERT INTO tweets (user_id, body, created_at)
            VALUES (New.id, 'Welcome to Tweety. This is sample tweet!', CURRENT_TIMESTAMP())
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS after_user_create');
    }
}
