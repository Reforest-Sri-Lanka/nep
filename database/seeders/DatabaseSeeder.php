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

         //roles
         \DB::table('roles')->insert([
            ['title' => 'Super Admin',
            'status' => 1,],
            ['title' => 'Organization-Admin',
            'status' => 1,],
            ['title' => 'Organization-Head',
            'status' => 1,],
            ['title' => 'Organization-Manager',
            'status' => 1,],
            ['title' => 'Organization-Staff',
            'status' => 1,],
            ['title' => 'Citizen',
            'status' => 1,],
        ]);

        //users
        \DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
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

        //gazettes
        \DB::table('gazettes')->insert([
            ['title' => 'No Gazette',
            'created_at' => now(),
            'gazette_no' => 0,
            'gazzetted_date' => now(),
            'organizations' => 1,
            'content' => '-',
            'created_by_user_id' => 1,
            'status' => 1,
            ],
        ]);

        //provinces
        \DB::table('provinces')->insert([
            ['province' => 'Western Province',
            'created_at' => now(),
            'status' => 1,
            ],
            ['province' => 'Central Province',
            'created_at' => now(),
            'status' => 1,
            ],
            ['province' => 'Sabaragamuwa Province',
            'created_at' => now(),
            'status' => 1,
            ],
            ['province' => 'Southern Province',
            'created_at' => now(),
            'status' => 1,
            ],
            ['province' => 'Eastern Province',
            'created_at' => now(),
            'status' => 1,
            ],
            ['province' => 'Northern Province',
            'created_at' => now(),
            'status' => 1,
            ],
            ['province' => 'North Central Province',
            'created_at' => now(),
            'status' => 1,
            ],
            ['province' => 'North Western Province',
            'created_at' => now(),
            'status' => 1,
            ],
            ['province' => 'Uva Province',
            'created_at' => now(),
            'status' => 1,
            ],
        ]);

    //provinces
    \DB::table('gs_divisions')->insert([
        ['gs_division' => 'Udunuwara',
        'created_at' => now(),
        'status' => 1,
        ],
        ['gs_division' => 'Kandana',
        'created_at' => now(),
        'status' => 1,
        ],
        ['gs_division' => 'Sabaragamuwa 1',
        'created_at' => now(),
        'status' => 1,
        ],
    ]);

    //districts
    \DB::table('districts')->insert([
        ['district' => 'Kandy',
        'created_at' => now(),
        'status' => 1,
        ],
        ['district' => 'Colombo',
        'created_at' => now(),
        'status' => 1,
        ],
        ['district' => 'Kegalle',
        'created_at' => now(),
        'status' => 1,
        ],
        ['district' => 'Galle',
        'created_at' => now(),
        'status' => 1,
        ],
        ['district' => 'Gampaha',
        'created_at' => now(),
        'status' => 1,
        ],
        ['district' => 'Matara',
        'created_at' => now(),
        'status' => 1,
        ],
        ['district' => 'Puttalam',
        'created_at' => now(),
        'status' => 1,
        ],
        ['district' => 'Jaffana',
        'created_at' => now(),
        'status' => 1,
        ],
        ['district' => 'Kilinochchi',
        'created_at' => now(),
        'status' => 1,
        ],
        ['district' => 'Nuwaraeliya',
        'created_at' => now(),
        'status' => 1,
        ],
        ['district' => 'Ampara',
        'created_at' => now(),
        'status' => 1,
        ],
        ['district' => 'Anuradhapura',
        'created_at' => now(),
        'status' => 1,
        ],
        ['district' => 'Badulla',
        'created_at' => now(),
        'status' => 1,
        ],
        ['district' => 'Batticaloa',
        'created_at' => now(),
        'status' => 1,
        ],
        ['district' => 'Hambanthota',
        'created_at' => now(),
        'status' => 1,
        ],
        ['district' => 'Kalutara',
        'created_at' => now(),
        'status' => 1,
        ],
        ['district' => 'Kurunegala',
        'created_at' => now(),
        'status' => 1,
        ],
        ['district' => 'Mannar',
        'created_at' => now(),
        'status' => 1,
        ],
        ['district' => 'Matale',
        'created_at' => now(),
        'status' => 1,
        ],
        ['district' => 'Monaragala',
        'created_at' => now(),
        'status' => 1,
        ],
        ['district' => 'Mullaitivu',
        'created_at' => now(),
        'status' => 1,
        ],
        ['district' => 'Polonnaruwa',
        'created_at' => now(),
        'status' => 1,
        ],
        ['district' => 'Ratnapura',
        'created_at' => now(),
        'status' => 1,
        ],
        ['district' => 'Trincomalee',
        'created_at' => now(),
        'status' => 1,
        ],
        ['district' => 'Vavuniya',
        'created_at' => now(),
        'status' => 1,
        ],
    ]);

    //ecosystem types
    \DB::table('ecosystems_types')->insert([
        ['type' => 'Riverine - Dry Zone',
        'created_at' => now()
        ],
        ['type' => 'Riverine - Wet Zone',
        'created_at' => now()
        ],
        ['type' => 'Montane - Wet Zone',
        'created_at' => now()
        ],
        ['type' => 'Montane - Dry Zone',
        'created_at' => now()
        ],
    ]);

    //species_information
    \DB::table('species_information')->insert([
        [
            'type' => 'Flora',
            'title' => "Mee",
            'habitats' => json_encode(array('Dry Zone', 'Intermediate Zone')),
            'created_at' => now(),
            'taxa' => json_encode(array('')),
            'created_by_user_id' => 1,
            'scientefic_name' => 'Madhuca longifolia',
            'status' => 1,
            'district_id' => 1,
        ],
        [
            'type' => 'Flora',
            'title' => "Kumbuk",
            'habitats' => json_encode(array('Dry Zone', 'Intermediate Zone', 'Riverine')),
            'taxa' => json_encode(array('')),
            'created_at' => now(),
            'created_by_user_id' => 1,
            'scientefic_name' => 'Terminalia arjuna',
            'status' => 1,
            'district_id' => 1,
        ],
    ]);


      //env restoration activities
      \DB::table('environment_restoration_activities')->insert([
        ['title' => 'Reforestation',
        'created_at' => now(),
        'status' => 1,
        'created_by_user_id' => 1,
        ],
        ['title' => 'Seagrass restoration',
        'created_at' => now(),
        'status' => 1,
        'created_by_user_id' => 1,
        ],
        ['title' => 'Coral restoration',
        'created_at' => now(),
        'status' => 1,
        'created_by_user_id' => 1,
        ],
        ['title' => 'Roadside Tree planting',
        'created_at' => now(),
        'status' => 1,
        'created_by_user_id' => 1,
        ],
        ['title' => 'Urban Tree planting',
        'created_at' => now(),
        'status' => 1,
        'created_by_user_id' => 1,
        ],
        ['title' => 'Soil restoration',
        'created_at' => now(),
        'status' => 1,
        'created_by_user_id' => 1,
        ],
    ]);

    //status
    \DB::table('status')->insert([
        ['type' => 'Application made successfully',
        'created_at' => now(),
        'status' => 1
        ],
        ['type' => 'Forwarded to the organization',
        'created_at' => now(),
        'status' => 1
        ],
        ['type' => 'Assigned for approval',
        'created_at' => now(),
        'status' => 1
        ],
        ['type' => 'Reviewing for approval',
        'created_at' => now(),
        'status' => 1
        ],
        ['type' => 'Approved',
        'created_at' => now(),
        'status' => 1
        ],
        ['type' => 'Rejected',
        'created_at' => now(),
        'status' => 1
        ],
        ['type' => 'System Data',
        'created_at' => now(),
        'status' => 1
        ],
        ['type' => 'Cancelled by Requester',
        'created_at' => now(),
        'status' => 1
        ],
        ['type' => 'Forwarded to Organization but with admin review',
        'created_at' => now(),
        'status' => 1
        ],
    ]);

    //form types
    \DB::table('form_types')->insert([
        ['type' => 'Tree Removal',
        'created_at' => now(),
        'status' => 1
        ],
        ['type' => 'Development Project',
        'created_at' => now(),
        'status' => 1
        ],
        ['type' => 'Restoration Project',
        'created_at' => now(),
        'status' => 1
        ],
        ['type' => 'Crime Complaint',
        'created_at' => now(),
        'status' => 1
        ],
        ['type' => 'Land_Parcels',
        'created_at' => now(),
        'status' => 1
        ],
    ]);

    //
    \DB::table('designations')->insert([
        ['type' => 'Director',
        'created_at' => now(),
        'status' => 1
        ],
        ['type' => 'CEO',
        'created_at' => now(),
        'status' => 1
        ],
        ['type' => 'Manager',
        'created_at' => now(),
        'status' => 1
        ],
        ['type' => 'CAA',
        'created_at' => now(),
        'status' => 1
        ],
        ['type' => 'Executive',
        'created_at' => now(),
        'status' => 1
        ],
        ['type' => 'Head',
        'created_at' => now(),
        'status' => 1
        ],
        ['type' => 'Conservator General',
        'created_at' => now(),
        'status' => 1
        ],
        ['type' => 'Conservator',
        'created_at' => now(),
        'status' => 1
        ],
        ['type' => 'Managing Director',
        'created_at' => now(),
        'status' => 1
        ],
    ]);
}
}
