<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\Dashboard\DashboardApiController;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     * EZBAdminUser
     * sheif-peej-bub-byn@$
     */
    public function index(Request $request)
    {
        // dd($this->prefix, request()->session()->get('userSession.AdminLevel'), request()->session());
        $data = [];
        $apiJSON = (new DashboardApiController)->index($request);
        $original = collect($apiJSON)->get('original');
        $data = collect($original)->get('data');

        // dd($this->getUserIP(), $this->get_client_ip(), $_SERVER);

        // TODO :: (SUBHASH) : Add bladeSuffix
        return view('pages.dashboards.dashboard'. $this->bladeSuffix() , compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



    /**
     * END::CLASS
     */
}
