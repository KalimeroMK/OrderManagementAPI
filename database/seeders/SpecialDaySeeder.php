<?php

declare(strict_types=1);

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialDaySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('special_days')->insert([
            ['date' => Carbon::today()->toDateString()],
            ['date' => Carbon::today()->addDays(1)->toDateString()],
            ['date' => Carbon::today()->subDays(1)->toDateString()],
        ]);
    }
}
