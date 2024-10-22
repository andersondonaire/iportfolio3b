<?php


class Helpers
{

    public static function getSettings($setting_key)
    {
        $set = connect::select("SELECT setting_value FROM settings WHERE setting_key = '{$setting_key}'");
        return $set;
    }

    public static function setSettings($setting_key, $settting_value) {

    }
}
