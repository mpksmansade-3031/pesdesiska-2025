<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('settings')->insert([
            'web_access' => true,
            'mode' => 'Ketua MPK',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
