<?php

namespace App\Http\Controllers\Api\Report;

use App\Http\Controllers\Controller;
use App\Models\ResourceLocation;
use App\Models\ResourceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function indexBooking(Request $request)
    {
        // dd($request->all());
        $data = [];
        $from = $request->all('from')['from']??date('Y') . '-01-01';
        $to = $request->all('to')['to']??date('Y-m-d');
        $ProviderID = 1;
        $type = ( $request->all('resourceTypes')['resourceTypes'] ) ? " AND resource.resourceType = " . $request->all('resourceTypes')['resourceTypes'] : "";
        $location = ( $request->all('locations')['locations'] ) ? " AND resource.resourceLocation = " . $request->all('locations')['locations'] : "";


    $sql = "SELECT
        bookings.FromTime AS `from`,
        bookings.ToTime AS `to`,
        resource.`Name` AS resource,
        subresource.`Name` AS subresource,
        bookings.BookedFor AS `for`,
        users.`Name` AS bookedBy,
        bookings.Purpose AS additionalInfo,
        resource.Description AS custBookingInfo
    FROM bookings
        INNER JOIN resource
        ON bookings.FacID = resource.ID
        LEFT JOIN subresource
        ON bookings.SubID = subresource.ID
        INNER JOIN users
        ON bookings.BookedBy = users.id
        INNER JOIN resourcetype
        ON resource.resourceType = resourcetype.id
        INNER JOIN resourcelocation
        ON resource.resourceLocation = resourcelocation.id
    WHERE
        resource.ProviderID = ?
        AND
        DATE_FORMAT( bookings.FromTime, '%Y%m%d' ) >= DATE_FORMAT( ?, '%Y%m%d' )
        AND
        DATE_FORMAT( bookings.ToTime, '%Y%m%d' ) <= DATE_FORMAT( ?,'%Y%m%d' ) {$type}  {$location} ";

        $resources = DB::select($sql, [$ProviderID, $from, $to]);
        $resourceTypes = ResourceType::all(['id', 'Name'])->toArray();
        $ResourceLocations = ResourceLocation::all(['id', 'Name'])->toArray();
        $resourceTypes = [0=>'All Resource Types']+array_combine(array_column($resourceTypes, 'id'), array_column($resourceTypes, 'Name') );
        $ResourceLocations = [0=>'All Locations']+array_combine(array_column($ResourceLocations, 'id'), array_column($ResourceLocations, 'Name') );

        $data['resources'] = $resources;
        $data['resourceTypes'] = $resourceTypes;
        $data['ResourceLocations'] = $ResourceLocations;
        $data['sql'] = $sql;
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

    public function indexUtilization(Request $request)
    {
        $data = [];
        // dd("utilization");
        // $from = '2023-08-01 00:30:00';
        // $to = '2023-08-30 12:30:00';
        // $resources = Resource::with(['Bookings' => function ($query) use ($from, $to) {
        //     // $query->whereBetween();
        // }])->get();
        // dd($resources);
        //

        // $resources = DB::table('bookings')
        //     ->selectRaw(" bookings.*,
        // resource.`Name` AS resource,
        // subresource.`Name` AS subresource,
        //     users.`Name` AS `user`,
        //     resourcelocation.`Name` AS resourcelocation,
        //     resourcetype.`Name` AS resourcetype,
        //     CONCAT(sum(TIMESTAMPDIFF(HOUR, bookings.FromTime, bookings.ToTime)),'.',(sum(TIMESTAMPDIFF(MINUTE, bookings.FromTime, bookings.ToTime)) % 60)) AS Capacity
        //     ")
        //     ->join('resource', 'bookings.FacID', '=', 'resource.ID')
        //     ->join('users', 'bookings.BookedBy', '=', 'users.id')
        //     ->join('subresource', 'bookings.SubID', '=', 'subresource.ID', 'left')
        //     ->join('resourcetype', 'resource.resourceType', '=', 'resourcetype.id', 'left')
        //     ->join('resourcelocation', 'resource.resourceLocation', '=', 'resourcelocation.id', 'left')
        //     ->whereRaw("DATE_FORMAT( ?, '%Y%m%d' ) <= DATE_FORMAT( bookings.FromTime, '%Y%m%d' )", $from)
        //     ->whereRaw("DATE_FORMAT( ?, '%Y%m%d' ) >= DATE_FORMAT( bookings.ToTime, '%Y%m%d' )", $to)
        //     ->groupBy('bookings.SubID', 'bookings.FacID')
        //     ->get()->toArray();


        // dd($resources);
        $data = [];
        // $from = '2023-08-01 00:30:00';
        // $to = '2023-08-30 12:30:00';
        $from = $request->all('from')['from']??date('Y') . '-01-01';
        $to = $request->all('to')['to']??date('Y-m-d');
        $ProviderID = 1;
        $sql = " SELECT NAME, factype,
                ROUND( t.capacity, 2 ) AS capacity,
                ROUND(( t1.time ), 2 ) AS inuse,
                ROUND( t.capacity -( t1.time ), 2 ) AS notinuse,
                ROUND(( t1.time )* 100 / t.capacity, 2 ) AS utilizationper
            FROM (SELECT fac.ID, fac.NAME AS NAME, factyp.NAME AS factype,
                IF ( SUM( TIMESTAMPDIFF( HOUR, CONVERT ( OpenTime, time ), CONVERT ( CloseTime, time )))= 0,
                        ROUND(24 * 7 *(DATEDIFF( ?, ? ))),
                        ROUND(SUM(TIMESTAMPDIFF(HOUR, CONVERT ( OpenTime, time ),CONVERT ( CloseTime, time ))*( DATEDIFF( ?, ? )))))/ 7 AS capacity
                FROM resource fac
                    LEFT OUTER JOIN operationhours oph ON fac.ID = oph.resource
                    LEFT OUTER JOIN resourcetype factyp ON fac.resourcetype = factyp.ID
                WHERE fac.ProviderID = ?
                GROUP BY fac.ID
                ) AS t
                LEFT OUTER JOIN (
                SELECT resource.ID,
                    SUM( ROUND(( TIMESTAMPDIFF( MINUTE, bookings.FromTime, bookings.ToTime ))/ 60, 2 )) AS time
                FROM bookings
                    LEFT OUTER JOIN resource ON resource.ID = bookings.FacID
                WHERE
                    bookings.FromTime >= ?
                    AND bookings.FromTime < ?
                GROUP BY
                FacID
                ) AS t1 ON t1.ID = t.ID
         ";
        $resources = DB::select($sql, [$to, $from, $to, $from, $ProviderID, $from, $to]);
        $data['resources'] = $resources;
        // dd($resources);
        // return view('pages.reports.utilization-report', compact('resources'));
        // $resources = Resource::all();
        // foreach ($resources as $key => $resource) {
        //     $operationhours = array_column($resource->operationhours->toArray(), 'DayofWeek');
        //     $Bookings = array_combine(array_column($resource->Bookings->toArray(), 'FromTime'), array_column($resource->Bookings->toArray(), 'ToTime'));

        //     if (!empty($Bookings)) {
        //         $times = array_map(function ($key, $val) {
        //             $start = strtotime($key);
        //             $end = strtotime($val);
        //             // $start = strtotime('00:00:00');
        //             // $end = strtotime('00:00:00');
        //             if ($end < $start || $end == $start) {
        //                 $end += 24 * 60 * 60;
        //             }
        //             $t['m'] = (($end - $start) / 60) % 60;
        //             $t['h'] = ((($end - $start) - ($t['m'] * 60)) / 60) / 60;
        //             $t['t'] = "{$t['h']}.{$t['m']}";
        //             return $t;
        //         }, array_keys($Bookings), array_values($Bookings));
        //         // dd($resource);
        //         $m = array_sum(array_column($times, 'm'));
        //         $h = array_sum(array_column($times, 'h'));
        //         $workinghours = $h + intdiv($m, 60);
        //         // $workingdays = intdiv($periods, count($times)) + ($periods % count($times));
        //         // $workinghours = $workingdays * $weekhours;
        //         $inUse = $workinghours . "." . $m % 60;
        //         $data['inUse'][$resource->ID] = $inUse;
        //         $data['times'][$resource->ID] = $times;
        //     }
        //     if (!empty($operationhours)) {
        //         $periods = Carbon::parse($from)->daysUntil($to, 1)
        //             ->filter(static fn (Carbon $date) => in_array($date->dayOfWeek, array_map('intval', $operationhours), true))->count();

        //         $times = array_map(function ($key, $val) {
        //             $start = strtotime($key);
        //             $end = strtotime($val);
        //             // $start = strtotime('00:00:00');
        //             // $end = strtotime('00:00:00');
        //             if ($end < $start || $end == $start) {
        //                 $end += 24 * 60 * 60;
        //             }
        //             $t['m'] = (($end - $start) / 60) % 60;
        //             $t['h'] = ((($end - $start) - ($t['m'] * 60)) / 60) / 60;
        //             $t['t'] = "{$t['h']}.{$t['m']}";
        //             return $t;
        //         }, array_column($resource->operationhours->toArray(), 'OpenTime'), array_column($resource->operationhours->toArray(), 'CloseTime'));

        //         $m = array_sum(array_column($times, 'm'));
        //         $h = array_sum(array_column($times, 'h'));
        //         $weekhours = $h + intdiv($m, 60);
        //         $workingdays = intdiv($periods, count($times)) + ($periods % count($times));
        //         $workinghours = $workingdays * $weekhours;
        //         $capacity = $workinghours . "." . $m % 60;


        //         // $data['days'][$resource->ID] = $periods ;
        //         // $data['times'][$resource->ID] = $times;
        //         // $data['weekhours'][$resource->ID] = $weekhours;
        //         // $data['workingdays'][$resource->ID] = $workingdays;
        //         // $data['workinghours'][$resource->ID] = $workinghours;
        //         $data['capacity'][$resource->ID] = $capacity;

        //         // dd($times, $period, $resource->operationhours, $resource->operationhours->toArray(), $resource->Bookings->toArray());
        //     }
        // }
        // dd($data);
        // return view('pages.reports.utilization-report', compact('resources', 'data', 'from', 'to', 'periods'));


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

    public function report() {

    }

    /**
     * END::CLASS
     */
}
