<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        SiteSetting::firstOrCreate(
            ['id' => 1],
            [
                'phone_1' => '(+93) 791 53 511',
                'phone_2' => '(+93) 791 53 512',
                'email_1' => 'wahid@gmail.com',
                'email_2' => 'EagleFlyer@gmail.com',
                'address_line_1' => '500 Family,',
                'address_line_2' => 'behind Sultan Hall, Kabul, Afghanistan.',
                'map_iframe_src' => 'https://maps.google.com/maps?q=london&t=&z=13&ie=UTF8&iwloc=&output=embed',
            ]
        );
    }
}
