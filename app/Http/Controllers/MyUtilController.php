<?php

namespace gotham\Http\Controllers;

use Illuminate\Http\Request;

class MyUtilController extends Controller
{
    //
    public function firstlettertoupper($string)
    {
        $string = strtolower($string);
        $string[0] = strtoupper($string[0]);
        return $string;
    }
}
