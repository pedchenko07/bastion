<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try{
            $setting = new \App\Models\Setting();
            $setting->id = 1;
            $setting->img = 'logo.png';
            $setting->name_shop = 'bastion';
            $setting->email = 'admin@admin.com';
            $setting->phone1 = '0';
            $setting->phone2 = '0';
            $setting->phone3 = '0';
            $setting->work = 'logo.png';
            $setting->adress = 'logo.png';
            $setting->unp = '0';
            $setting->reestr = '0';
            $setting->title = 'test';
            $setting->description = 'test';
            $setting->keywords = 'test';
            $setting->adsense = '123';
            $setting->money = 'руб.';
            $setting->save();
        } catch (\Exception $e) {
            \App\Models\Setting::find(1)->delete();
            $setting->save();
        }
        echo "Настройки заполнены успешно" . PHP_EOL;
    }
}
