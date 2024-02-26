<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function is_exist($value, $data_temp): string {
        $data = "";
        foreach ($value as $feat) {
            $data = implode(" ", $feat->feat);
            if (str_contains($data, $data_temp)) {
                return $data;
            }

            return null;
        }

        return $data;
    }
}
