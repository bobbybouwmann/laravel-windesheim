<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Table::class, 32)
            ->create()
            ->each(function (\App\Table $table) {
                factory(\App\User::class, 4)->create([
                    'table_id' => $table->id,
                ]);
            });
    }
}
