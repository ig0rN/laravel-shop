<?php

use App\Database\Shop;

function getAllBasedOnCurrentShop($part, bool $function = false)
{
    if (!$function) {
        return Shop::find(session()->get('shop_id'))->{$part};
    } else {
        return Shop::find(session()->get('shop_id'))->{$part}();
    }
}

function uploadFileInPublicFolder($file, $input_name, string $path, $counter = null)
{
	$name = $input_name . ($counter == null ? '' : $counter . '_') . time() .  '.' . $file->getClientOriginalExtension();
    $folder = $path;
    $saveFolder = public_path($folder);
    $file->move($saveFolder, $name);
	$dbPath = $folder . $name;
    return $dbPath;
}

// date format for db
function dbFormat($string_date)
{
    return \DateTime::createFromFormat('d/m/Y', $string_date)->format('Y-m-d');
}