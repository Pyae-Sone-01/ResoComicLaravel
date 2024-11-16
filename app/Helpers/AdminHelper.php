<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;


class AdminHelper
{
    public static function tableLength($data)
    {
        $html = "<span class='text-gray-600 fw-bold'>" . __('backend.filter.display_item') . $data->currentPage() . " " . __('backend.filter.to') . $data->perPage() . " " . __('backend.filter.of_total') . $data->total() . __('backend.filter.items') . "</span>";

        echo $html; 
    }

    public static function storageFileExist($file_path)
    {
        $file_dir = null;
        if ($file_path) {
            $path_arr = preg_split("/\/storage/", $file_path);
            $path = (count($path_arr) > 1) ? "storage" . end($path_arr) : end($path_arr);

            if (File::exists(public_path($path))) {
                $file_dir = $path;
            }
        }
        return $file_dir;
    }


}
