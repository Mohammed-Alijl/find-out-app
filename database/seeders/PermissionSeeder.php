<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [

            //Category Types
            'view_category_type',
            'add_category_type',
            'edit_category_type',
            'delete_category_type',

            //Categories
            'view_category',
            'add_category',
            'edit_category',
            'delete_category',

            //Zones
            'view_zone',
            'add_zone',
            'edit_zone',
            'delete_zone',

            //Cities
            'view_city',
            'add_city',
            'edit_city',
            'delete_city',

            //Services
            'view_service',
            'add_service',
            'edit_service',
            'delete_service',

            //Advertisements
            'view_advertisement',
            'add_advertisement',
            'edit_advertisement',
            'delete_advertisement',

            //Advertisements Requests
            'view_advertisement_request',
            'add_advertisement_request',
            'delete_advertisement_request',

            //Page
            'view_page',
            'add_page',
            'edit_page',
            'delete_page',

            //Social Media
            'view_social',
            'edit_social',

            //Contact Requests
            'view_contact',
            'delete_contact',

            //User
            'view_user',
            'add_user',
            'edit_user',
            'delete_user',

            //Role
            'view_role',
            'add_role',
            'edit_role',
            'delete_role',

            //Customer
            'view_customer',
            'add_customer',
            'edit_customer',
            'delete_customer',


        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'admin']);
        }
    }
}
