<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('users')
            ->where('id', 1)
            ->update(['name' => 'Jean Everton']);;
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
