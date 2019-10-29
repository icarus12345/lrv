<?php // Code within app\Helpers\Helper.php

namespace App;

use Illuminate\Http\Request;

class Helpers
{
    public static function getLocale()
    {
        $raw_locale = request()->session()->get('locale');
        
        
        if (in_array($raw_locale, \Config::get('app.locales'))) {
            $locale = $raw_locale;
        } else {
            $locale = \Config::get('app.locale');
        }
        return $locale;
    }
}