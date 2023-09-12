<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $socialMedia = [
            [
                'Whatsapp',
                'واتساب',
                ''
            ],
            [
                'Instagram',
                'انستجرام',
                ''
            ],
            [
                'Snapchat',
                'سناب شات',
                '',
            ],
            [
                'Twitter',
                'تويتر',
                ''
            ],
            [
                'Facebook',
                'فيسبوك',
                ''
            ],
            [
                'Tiktok',
                'تيك توك',
                ''
            ],
        ];
    }
}
