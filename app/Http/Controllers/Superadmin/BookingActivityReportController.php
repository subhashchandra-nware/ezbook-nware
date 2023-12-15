<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\FacProvider;
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
        $providers = FacProvider::with([
            // 'Resources.Bookings',
            'Resources' => function($query) use ($from, $to){
                return $query->withoutGlobalScopes()
                ->with(['Bookings' => function($query) use ($from, $to){
                    return $query->where(DB::raw("DATE_FORMAT(FromTime,'%Y%m%d')"), '>=', date('Ymd', strtotime($from)))
                    ->where(DB::raw("DATE_FORMAT(ToTime,'%Y%m%d')"), '<=', date('Ymd', strtotime($to)))
                    ->orderBy('FromTime', 'DESC');
                },])
                ->whereHas('Bookings', function($query) use ($from, $to){
                    return $query->where(DB::raw("DATE_FORMAT(FromTime,'%Y%m%d')"), '>=', date('Ymd', strtotime($from)))
                    ->where(DB::raw("DATE_FORMAT(ToTime,'%Y%m%d')"), '<=', date('Ymd', strtotime($to)))
                    ->orderBy('FromTime', 'DESC');
                });
            },
        ])
        ->whereHas('Resources', function($query) use ($from, $to){
            return $query->withoutGlobalScopes()->with(['Bookings' => function($query) use ($from, $to){
                return $query->where(DB::raw("DATE_FORMAT(FromTime,'%Y%m%d')"), '>=', date('Ymd', strtotime($from)))
                ->where(DB::raw("DATE_FORMAT(ToTime,'%Y%m%d')"), '<=', date('Ymd', strtotime($to)))
                ->orderBy('FromTime', 'DESC');
            },])
            ->whereHas('Bookings', function($query) use ($from, $to){
                return $query->where(DB::raw("DATE_FORMAT(FromTime,'%Y%m%d')"), '>=', date('Ymd', strtotime($from)))
                ->where(DB::raw("DATE_FORMAT(ToTime,'%Y%m%d')"), '<=', date('Ymd', strtotime($to)))
                ->orderBy('FromTime', 'DESC');
            });
        });


        $data['providers'] = $providers->get();
        return view('pages.superadmin.booking-activity-report.index');
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
