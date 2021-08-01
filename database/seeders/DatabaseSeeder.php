<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //branch_type
        \DB::table('branch_types')->insert([
            'title' => 'Head Quarters',
            'created_at' => now(),
            'status' => 7,
        ]);

        \DB::table('branch_types')->insert([
            'title' => 'District Office',
            'created_at' => now(),
            'status' => 7,
        ]);

        \DB::table('branch_types')->insert([
            'title' => 'Provincial Office',
            'created_at' => now(),
            'status' => 7,
        ]);

        \DB::table('branch_types')->insert([
            'title' => 'Urban Council',
            'created_at' => now(),
            'status' => 7,
        ]);

        \DB::table('branch_types')->insert([
            'title' => 'Village Council',
            'created_at' => now(),
            'status' => 7,
        ]);

        \DB::table('branch_types')->insert([
            'title' => 'Regional Office',
            'created_at' => now(),
            'status' => 7,
        ]);

        \DB::table('branch_types')->insert([
            'title' => 'Branch',
            'created_at' => now(),
            'status' => 7,
        ]);

        \DB::table('organization_types')->insert([
            'title' => 'Government',
            'created_at' => now(),
            'status' => 1,
        ]);

        \DB::table('organization_types')->insert([
            'title' => 'Government',
            'created_at' => now(),
            'status' => 1,
        ]);

        \DB::table('organization_types')->insert([
            'title' => 'Semi-Government',
            'created_at' => now(),
            'status' => 1,
        ]);

        \DB::table('organization_types')->insert([
            'title' => 'Private',
            'created_at' => now(),
            'status' => 1,
        ]);

        \DB::table('organization_types')->insert([
            'title' => 'Non-government',
            'created_at' => now(),
            'status' => 1,
        ]);

        \DB::table('organization_types')->insert([
            'title' => 'Public-Private-Partnership',
            'created_at' => now(),
            'status' => 1,
        ]);

        \DB::table('organization_types')->insert([
            'title' => 'Other',
            'created_at' => now(),
            'status' => 1,
        ]);


        //organizations
        \DB::table('organizations')->insert([
            'title' => 'Reforest Sri Lanka',
            'city' => 'Colombo',
            'type_id' => 3,
            'description' => 'Sri Lankas largest citizen reforestation movement',
            'related_ministry' => '-',
            'status' => 1,
            'created_at' => now(),
        ]);

        \DB::table('organizations')->insert([
            'title' => 'Department of Wild Life Conservation - Head Quarters',
            'city' => 'Colombo',
            'type_id' => 1,
            'description' => 'Sample Description for this organization',
            'related_ministry' => 'Ministry of Environment',
            'status' => 1,
            'created_at' => now(),
        ]);

        \DB::table('organizations')->insert([
            'title' => 'Department of Forest Conservation - Head Quarters',
            'city' => 'Colombo',
            'type_id' => 1,
            'description' => 'Sample Description for this organization',
            'related_ministry' => 'Ministry of Environment',
            'status' => 1,
            'created_at' => now(),
        ]);

        //users
        \DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'emailed_verified_at' => now(),
            'created_at' => now(),
            'password' => bcrypt('password'),
            'organization_id' => 1,
            'role_id' => 1,
            'status' => 1,
        ]);

        //access
        \DB::table('access')->insert([
            ['access' => 'General Module',
            'created_at' => now(),
            'status' => 7,
            ],
            ['access' => 'Environment Module',
            'created_at' => now(),
            'status' => 7,
            ],
            ['access' => 'Report Module',
            'created_at' => now(),
            'status' => 7,
            ],
        ]);
        
    }
}
