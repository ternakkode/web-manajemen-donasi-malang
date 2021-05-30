<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    public function run()
    {
        $settings = [
            [
                "key" => "tata_cara_donasi",
                "value" => "Berikut ini adalah tata cara untuk melakukan donasi"
            ],
            [
                "key" => "campaign_utama",
                "value" => ""
            ],
            [
                "key" => "pengumuman",
                "value" => "Belum ada pengumuman"
            ],
            [
                "key" => "whatsapp",
                "value" => "+6283856901707"
            ],
            [
                "key" => "email",
                "value" => "muhammad.firhan.azmi@gmail.com"
            ]
        ];

        DB::table('settings')->insert($settings);
    }
}
