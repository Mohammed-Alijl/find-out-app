<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new Admin();
        $admin->name = "Mohammed Elajel";
        $admin->username = "Mohammed_Aj";
        $admin->email = "admin@admin.com";
        $admin->mobile_number = "123456789";
        $admin->password = bcrypt('123456789');
        $admin->save();
    }
}
