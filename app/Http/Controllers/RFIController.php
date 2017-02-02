<?php

namespace gotham\Http\Controllers;

use gotham\RFI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RFIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('RFI')->get();

        return json_encode($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \gotham\RFI  $rFI
     * @return \Illuminate\Http\Response
     */
    public function show(RFI $rFI)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \gotham\RFI  $rFI
     * @return \Illuminate\Http\Response
     */
    public function edit(RFI $rFI)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \gotham\RFI  $rFI
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RFI $rFI)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \gotham\RFI  $rFI
     * @return \Illuminate\Http\Response
     */
    public function destroy(RFI $rFI)
    {
        //
    }
}
