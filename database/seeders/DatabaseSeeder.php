<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Manhole\Infrastructure\Persistence\ManholeFactory;


class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void {
        ManholeFactory::times(10)->create();
    }
}
