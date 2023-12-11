<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Log;
use App\Models\Resource;
use App\Models\User;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->session();
        // dd($request->session()->all());
        $data = [];
        $from = $request->all('from')['from'] ?? date('Y') . '-01-01';
        $to = $request->all('to')['to'] ?? date('Y-m-d');
        // $ProviderID = 1;
        $summaryBookingsSQL = "COUNT(ID) AS totalBooking,
        SUM( if(DATE_FORMAT(FromTime,'%Y%m%d') >= DATE_FORMAT(CURRENT_DATE,'%Y%m%d'), 1, 0 ) ) AS upcomingBooking,
        SUM( if(DATE_FORMAT(FromTime,'%Y%m%d') < DATE_FORMAT(CURRENT_DATE,'%Y%m%d'), 1, 0 ) ) AS completedBooking";

        $numberBookingsSQL = "COUNT(ID) AS bookings, DATE_FORMAT(FromTime,'%m') AS months";

        $data['upcomingBookings'] = Book::with(['user'])
            ->whereHas('resources')
            ->where(DB::raw("DATE_FORMAT(FromTime,'%Y%m%d')"), '>', date('Ymd'))
            ->orderBy('FromTime')
            // ->toSql();
            ->paginate(5);

        $data['summaryBookings'] = Book::select(DB::raw($summaryBookingsSQL))
            ->whereHas('resources')
            ->where(DB::raw("DATE_FORMAT(FromTime,'%Y%m%d')"), '>=', date('Ymd', strtotime($from)))
            ->where(DB::raw("DATE_FORMAT(ToTime,'%Y%m%d')"), '<=', date('Ymd', strtotime($to)))
            ->get();
        $numberBookings = Book::select(DB::raw($numberBookingsSQL))
            ->whereHas('resources')
            ->groupBy('months')->orderBy('months', 'ASC')->get()->toArray();
        $data['numberBookings'] = array_column($numberBookings, 'bookings');

        $session = $request->session();
        $user = User::with(['FacProviders', 'UserGroups'])
            ->whereHas('FacProviders', function ($q) use ($session) {
                $q->where('facproviders.id', $session->get('siteId'));
            })->first();
            $data['user'] = $user;

        // ->get();
        // ->toArray();
        // $data['ModeratorRequestedBookings'] = Resource::with(['usersRight', 'userGroupsRight', 'Bookings.user'])
        // ->where('ModFeatureEnabled', '=', 1)

        // ->whereHas('usersRight', function ($query) use ($user) {
        //         $query->where('PermissionType', '=', MODERATOR_RIGHTS);
        //         $query->where('UserID', '=', $user->id);
        //     })
            // ->orWhereHas('userGroupsRight', function ($query) use ($user) {
            //     $query->where('PermissionType', '=', MODERATOR_RIGHTS);
            //     $query->where('GroupID', '=', $user->UserGroups->first()->id);
            // })
            // ->get()->toArray();
            // ->toSql();

            $data['ModeratorRequestedBookings'] = User::with(['FacProviders', 'FacProviders.Resources.Bookings.user','FacProviders.Resources' => function ($q) {
                $q->where('ModFeatureEnabled', 1);
            }])
            // $ModeratorRequestedBookings = User::with(['FacProviders', 'FacProviders.Resources.Bookings'])
            ->whereHas('FacProviders.Resources', function ($q) {
                $q->where('ModFeatureEnabled', 1);
            })
            ->where('id', '=', $user->id)
            ->first();
            // ->toSql();
            // ->get();
            // ->toArray();
            // $data['ModeratorRequestedBookings'] = $ModeratorRequestedBookings->FacProviders->each->Resources->each->Bookings->each->BookedFor;

            // $data['ModeratorRequestedBookings'] = Resource::toSql();
            // $tz = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
            // $tzlist = new DateTimeZone( $tz[10] );
            // dd($tzlist);

        // dd($tzlist->getLocation(), $tzlist->getName(), $tzlist->getTransitions());

        // Number-of-Bookings
        $data['logs'] = Log::all()->sortByDesc("id");
        if ($data != null) {
            return response()->json([
                "message" => "Reource Location Successfully",
                "status" => "success",
                "data" => $data,
            ], 200);
        } else {
            return response()->json([
                "message" => "No Resource found",
                "status" => "failed",
            ], 200);
        }
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


    public function upcomingBookings()
    {
    }

    public function summaryBookings()
    {
    }




    /**
     * END::CLASS
     */
}
