<?php

namespace gotham\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class MyUtilController extends Controller
{
    //
    
    
    public function firstlettertoupper($string)
    {
        if (isset($string)){
            $string = strtolower($string);
            $string[0] = strtoupper($string[0]);
            return $string;
        }
    }
    
    /**
     * Paginate a laravel colletion or array of items.
     *
     * @param  array|Illuminate\Support\Collection $items   array to paginate
     * @param  int $perPage number of pages
     * @return Illuminate\Pagination\LengthAwarePaginator    new LengthAwarePaginator instance 
     */
    function paginate($items, $perPage)
    {
        if(is_array($items)){
            $items = collect($items);
        }
    
        return new LengthAwarePaginator(
            $items->forPage( Paginator::resolveCurrentPage() , $perPage),
            $items->count(), $perPage, Paginator::resolveCurrentPage(),
            ['path' => Paginator::resolveCurrentPath()]
        );
    }
}
