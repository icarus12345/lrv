<?php // Code within app\Helpers\Helper.php

namespace App;

use Illuminate\Http\Request;
use App\Models\Category;

class Helpers
{
    public static function formatPrice($number){
		
		if ($number < 1000) {
			// Anything less than a thousrand
			$format = number_format($number);
		} else if ($number < 1000000) {
			// Anything less than a million
			$format = (float)number_format($number / 1000) . 'K';
		} else if ($number < 1000000000) {
			// Anything less than a billion
			$format = (float)number_format($number / 1000000, 2) . 'M';
		} else {
			// At least a billion
			$format = (float)number_format($number / 1000000000, 2) . 'B';
		}
		$locale = \App::getLocale();
		if($locale == 'vi'){
			return $format . '<sup>₫</sup>';
		} elseif($locale == 'en'){
			return "$".$format;
		} else {
			return $format;
		}
		return $format;
	}

	public static function getFlatRate(){
		return \App\Models\Setting::getByName('flat_rate')->value;
	}

	public static function getTax(){
		return \App\Models\Setting::getByName('tax')->value;
	}
	public static function getCategories(){
		$rows = Category::where('type', 'gid')->get();
        return Category::buildNested($rows);
	}
}