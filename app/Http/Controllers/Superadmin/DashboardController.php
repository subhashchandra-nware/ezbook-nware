<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(User::all()->toArray(), session(), auth(), auth()->user());
        $data = [];
        $from = date('Y') . '-01-01';
        $to = date('Y-m-d');
        // $ProviderID = 1;
        $summaryBookingsSQL = "COUNT(ID) AS totalBooking,
        SUM( if(DATE_FORMAT(FromTime,'%Y%m%d') >= DATE_FORMAT(CURRENT_DATE,'%Y%m%d'), 1, 0 ) ) AS upcomingBooking,
        SUM( if(DATE_FORMAT(FromTime,'%Y%m%d') < DATE_FORMAT(CURRENT_DATE,'%Y%m%d'), 1, 0 ) ) AS completedBooking";

        $numberBookingsSQL = "COUNT(ID) AS bookings, DATE_FORMAT(FromTime,'%m') AS months";


        $data['summaryBookings'] = Book::select(DB::raw($summaryBookingsSQL))
            ->whereHas('resources')
            ->where(DB::raw("DATE_FORMAT(FromTime,'%Y%m%d')"), '>=', date('Ymd', strtotime($from)))
            ->where(DB::raw("DATE_FORMAT(ToTime,'%Y%m%d')"), '<=', date('Ymd', strtotime($to)))
            ->get();
        $numberBookings = Book::select(DB::raw($numberBookingsSQL))
            ->whereHas('resources')
            ->groupBy('months')->orderBy('months', 'ASC')->get()->toArray();
        $data['numberBookings'] = array_column($numberBookings, 'bookings');

        $data['logs'] = Log::all()->sortByDesc("id");
        return view('pages.superadmin.dashboards.index' , compact('data'));
        // return view('admin.pages.dashboards.dashboard' , compact('data'));
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


