<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FacProvider;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingActivityReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = [];
        $from = $request->all('from')['from'] ?? date('Y') . '-01-01';
        $to = $request->all('to')['to'] ?? date('Y-m-d');
        $providers = FacProvider::with(['Resources.Bookings', 'Resources' => fn($query) => $query->withoutGlobalScopes()])
        ->whereHas('Resources', fn($query) => $query->withoutGlobalScopes() );
        $sql = $providers->toSql();
        $providers = $providers->get();
        $data['providers'] = $providers->toArray();
        // $data['sql'] = $sql;
        dd($data, $from, $to);
        return view('pages.admin.booking-activity-report.index', compact('data'));
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
