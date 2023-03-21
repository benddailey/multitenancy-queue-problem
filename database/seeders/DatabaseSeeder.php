<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Multitenancy\Models\Tenant;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        Tenant::checkCurrent()
            ? $this->runTenantSpecificSeeders()
            : $this->runLandlordSpecificSeeders();
    }

    public function runTenantSpecificSeeders()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }

    public function runLandlordSpecificSeeders()
    {
        Tenant::create([
            'name' => 'Tenant 1',
            'domain' => 'tenant1.laravel.test',
            'database' => 'tenant1',
        ]);

        Tenant::create([
            'name' => 'Tenant 2',
            'domain' => 'tenant2.laravel.test',
            'database' => 'tenant2',
        ]);
    }
}
