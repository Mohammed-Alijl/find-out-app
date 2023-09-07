<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $country = new Country();
        $country->setTranslation('name','ar','المملكة العربية السعودية');
        $country->setTranslation('name','en','Saudi Arabia');
        $country->save();
    }
}
