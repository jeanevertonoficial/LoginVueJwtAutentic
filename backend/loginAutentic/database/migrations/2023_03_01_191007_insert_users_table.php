<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up(): void
    {

        DB::insert('insert into users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at  ) values (?, ?, ?, ?, ?, ?, ?, ?)',
            [1, 'Jean', 'jeaneverton@gmail.com', null, 'teste123', null, null, null]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
