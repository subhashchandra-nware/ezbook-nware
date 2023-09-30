<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\Report\ReportApiController;
use App\Models\Book;
use App\Models\Resource;
use App\Models\ResourceLocation;
use App\Models\ResourceType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.reports.utilization-report');
    }

    public function indexBooking(Request $request)
    {

        $data = [];
        $apiJSON = (new ReportApiController)->indexBooking($request);
        $original = collect($apiJSON)->get('original');
        $data = collect($original)->get('data');

        // dd($data);

        return view('pages.reports.booking-report', compact('data'));
    }
    public function indexUtilization(Request $request)
    {

        $data = [];
        $apiJSON = (new ReportApiController)->indexUtilization($request);
        $original = collect($apiJSON)->get('original');
        $data = collect($original)->get('data');

        return view('pages.reports.utilization-report', compact('data'));


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
}
