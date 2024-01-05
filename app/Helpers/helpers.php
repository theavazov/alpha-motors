<?php

use App\Models\Language;

function filter_formdata_by_key($array, $key)
{
    $result = [];
    foreach ($array as $arrayKey => $value) {
        if (strpos($arrayKey, $key) === 0) {
            $langCode = substr($arrayKey, strlen($key) + 1);
            $result[$key][$langCode] = $value;
        }
    }
    return $result[$key];
}

function get_locale()
{
    return Language::where(['is_default' => true])->first();
}

function db_json_decoder($json)
{
    return (array) json_decode($json);
}
