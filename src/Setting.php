<?php

namespace Akromjon\Settings;

use Illuminate\Database\Eloquent\Model;


class Setting extends Model{

    protected $fillable = ['key', 'value'];

    protected $table="settings";

    public static function add(string $key, string $value):object{

        $settings = self::findByKey($key);

        if(!empty($settings)) {
            throw new \Exception("Key already exists");
        }

        $settings = new static;
        $settings->key = $key;
        $settings->value = $value;
        $settings->save();
        return $settings;
    }

    public static function edit($key, $value):void{

        $settings = self::findByKey($key);

        if(!empty($settings)) {
            throw new \Exception("Key does not exist");
        }

        $settings->value = $value;
        $settings->save();
    }

    public static function remove($key):void{
        $settings=static::findByKey($key);
        $settings->delete();
    }

    public static function get($key){
        $settings = static::findByKey($key)->first();
        return $settings->value;
    }

    public static function findByKey(string $key){
        return static::where('key', $key)->first();
    }
}
