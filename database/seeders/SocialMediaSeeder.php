<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $socialMedias = [
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
        foreach ($socialMedias as $media){
            $socialMedia = new SocialMedia();
            $socialMedia->setTranslation('name','en',$media[0]);
            $socialMedia->setTranslation('name','ar',$media[1]);
            $socialMedia->link = $media[2];
            $socialMedia->save();
        }
    }
}
