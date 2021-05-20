<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use TCG\Voyager\Traits\Seedable;

class DatabaseSeeder extends Seeder
{
    use Seedable; 
    protected $seedersPath = __DIR__.'/';
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->seedersPath = database_path('seeds').'/';
        $this->seed('VoyagerDatabaseSeeder');
        $this->seed('VoyagerDummyDatabaseSeeder');
        // \App\Models\User::factory(10)->create();
    }
}
