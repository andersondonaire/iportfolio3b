<?php

include_once __DIR__."./connect.php";

class Helpers
{

    public static function getSettings($setting_key)
    {
        $set = connect::select("SELECT setting_value FROM settings WHERE setting_key = '{$setting_key}'");

        return $set['setting_value'];
    }

    public static function setSettings($setting_key, $setting_value)
    {
        $consulta = Helpers::getSettings($setting_key);



        $dados = [
            "setting_key" => $setting_key,
            "setting_value" => $setting_value
        ];

        if (isset($consulta)) {

            $r = connect::update("settings", $dados, "setting_key = '{$setting_key}'");
        } else {

            $r = connect::insert("settings", $dados);
        }

        return $r;
    }
}
