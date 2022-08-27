<?php

use App\Models\Asset;
use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     *
     */
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            TeamsTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            
        ]);

        Asset::factory(1000)->create();

    }
}
