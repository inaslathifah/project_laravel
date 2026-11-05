<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // general
            [
                'key' => 'site_name',
                'value' => 'PPKD Sticker',
                'label' => 'Nama Lembaga / Website',
                'group' => 'general',
                'type' => 'text',
            ],
            [

                'key' => 'site_logo',
                'value' => null,
                'label' => 'Logo Utama Web',
                'group' => 'general',
                'type' => 'image',
            ],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
