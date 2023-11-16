<?php

use Akromjon\Settings\Setting;
use Monolog\Test\TestCase;

class SettingTest extends TestCase{


    public function createApplication()
    {
        $app = require './bootstrap/app.php';
        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
        return $app;
    }
    public function test_settings_add(){

        $settings= Setting::add('key', 'value');
        $this->assertEquals('key', $settings->key);
    }
}
