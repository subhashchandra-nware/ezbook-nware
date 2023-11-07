<?php

namespace App\Http\Controllers\Api\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Booking;
use App\Models\BookingRecurrence;
use App\Models\Resource;
use App\Models\ResourceLocation;
use App\Models\ResourceType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BookApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(int $locationId = null)
    {
        $data = [];
        $data['ResourceLocation'] = ResourceLocation::all()->toArray();
        if (!is_null($locationId) && $locationId != 0) {
            $data['ResourceTypes'] = ResourceType::with(['resources.SubResources', 'resources' => function ($query) use ($locationId) {
                $query->where('resourceLocation', '=', $locationId)->providerID();
            }])->whereHas('resources', function ($query) use ($locationId) {
                $query->where('resourceLocation', '=', $locationId)->providerID();
            })->get()->toArray();
        } else {
            // $data['ResourceTypes'] = ResourceType::with('resources.SubResources')->get()->toArray();
            $data['ResourceTypes'] = ResourceType::with(['resources.SubResources', 'resources' => function ($query) use ($locationId) {
                $query->providerID();
            }])->whereHas('resources', function ($query) use ($locationId) {
                $query->providerID();
            })->get()->toArray();
        }
        // $data['ResourceTypes'] = ResourceType::with('resources.SubResources')->whereHas('resources', function(Builder $query) use ($locationId){
        //     if(! is_null($locationId) ){$query->where('resourceLocation', '=', $locationId);}
        // })->get()->toArray();

        // dd('index', $data);
        if ($data != null) {
            return response()->json([
                "message" => "Reource Location and Type Found Successfully",
                "status" => "success",
                "data" => $data,
            ], 200);
        } else {
            return response()->json([
                "message" => "No Resource Location and Type found",
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
        $data = null;
        $dates = [];
        $requestData = $request->all();

        // $request->request->add(['ProviderID' => session()->get('siteId')]);
        $request->request->add(['BookedBy' => session()->get('loginUserId')]);

        $validator = Validator::make($request->all(), [
            // 'BookedFor' => 'required',
            // 'Purpose' => 'required',
            // 'SubID' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }
        // CARBON::DATING START
        if ($request->BookingType) {
            if ($request->daysOfWeek != null) {
                $requestData['daysOfWeek'] = implode(",", $request->daysOfWeek);
            }
            // $requestData['daysOfWeek'] = ($request->daysOfWeek != null) ? implode(",", $request->daysOfWeek) : "";
            $requestData['userid'] = $request->BookedBy;

            // for Day intervals
            if ($request->recurrenceType == 1) {
                $period = Carbon::parse($request->FromTime)->daysUntil($request->untilDate, $request->recurrenceInterval);
                foreach ($period->toArray() as $key => $value) {
                    // $dates[] = ['date' => $value->toDate()->format('D, Y-m-d H:i:s')];
                    $dates['FromTime'][] = $value->toDate()->format('Y-m-d H:i:s');
                    $dates['ToTime'][] = $value->toDate()->format('Y-m-d') . " " . date('H:i:s', strtotime($request->ToTime));
                }
            }
            // for Week intervals
            elseif ($request->recurrenceType == 2) {
                $period = Carbon::parse($request->FromTime)->daysUntil($request->untilDate, 1)
                    ->filter(static fn (Carbon $date) => in_array($date->dayOfWeek, array_map('intval', $request->daysOfWeek), true));
                foreach ($period->toArray() as $key => $value) {
                    if ($request->recurrenceInterval > 1 && $request->recurrenceInterval == $value->weekOfMonth) {
                        // $dates['weeksInMonth'][] = $value->weekOfMonth;
                        $dates['FromTime'][] = $value->toDate()->format('Y-m-d H:i:s');
                        $dates['ToTime'][] = $value->toDate()->format('Y-m-d') . " " . date('H:i:s', strtotime($request->ToTime));
                    } elseif ($request->recurrenceInterval == 1) {
                        $dates['FromTime'][] = $value->toDate()->format('Y-m-d H:i:s');
                        $dates['ToTime'][] = $value->toDate()->format('Y-m-d') . " " . date('H:i:s', strtotime($request->ToTime));
                    }
                }
            }
            // for Month intervals
            elseif ($request->recurrenceType == 3) {
                if ($request->monthIntervalsType == 1) {
                    $period = Carbon::parse($request->FromTime)->monthsUntil($request->untilDate, $request->recurrenceInterval);
                    foreach ($period->toArray() as $key => $value) {
                        if( is_null( $request->MonthIntervalDay ) ){
                            $dates['FromTime'][] = $value->toDate()->format('Y-m-d H:i:s');
                            $dates['ToTime'][] = $value->toDate()->format('Y-m-d') . " " . date('H:i:s', strtotime($request->ToTime));
                        }else{
                            $dates['FromTime'][] = $value->toDate()->format('Y-m-') . sprintf("%02d", $request->MonthIntervalDay) . " " . date('H:i:s', strtotime($request->FromTime));
                            $dates['ToTime'][] = $value->toDate()->format('Y-m-') . sprintf("%02d", $request->MonthIntervalDay) . " " . date('H:i:s', strtotime($request->ToTime));
                        }
                    }
                } elseif ($request->monthIntervalsType == 2) {
                    $period = Carbon::parse($request->FromTime)->daysUntil($request->untilDate, 1)
                    ->filter(static fn (Carbon $date) => in_array($date->dayOfWeek, array_map('intval', $request->daysOfWeek), true));
                    $months = [];
                foreach ($period->toArray() as $key => $value) {
                    $MonthIntervalDateSelection = $request->MonthIntervalDateSelection + 1;
                    $dt = collect($value->monthsUntil( $request->untilDate, $request->recurrenceInterval )->toArray())->get($key);

                    if( !is_null($dt) ){
                        $months[] = $dt->month;
                    }
                    // $dates['month'][] =  ( !is_null($dt) ) ? "$MonthIntervalDateSelection == $value->weekOfMonth=".$dt->month . "=".$value->month."=" .$value->toDate()->format('D, Y-m-d H:i:s') : "n";
                    if ( in_array($value->month, $months)  && $MonthIntervalDateSelection == $value->weekOfMonth) {
                        $dates['FromTime'][] = $value->toDate()->format('Y-m-d H:i:s');
                        $dates['ToTime'][] = $value->toDate()->format('Y-m-d') . " " . date('H:i:s', strtotime($request->ToTime));
                    }
                }
                }
            }
            unset($requestData['FromTime'], $requestData['ToTime']);
            $BookingInterval = $this->columnDataArr($dates, null, $requestData);
        }
        // CARBON::DATING END
        DB::beginTransaction();
        try {
            if ($request->BookingType) {
                $BookingRecurrence = BookingRecurrence::create($requestData);
                $BookingRecurrence->Bookings()->createMany($BookingInterval);

                $data = $BookingRecurrence;
            } else {
                $booking = Booking::create($request->all());
                $data = $booking;
            }
            // dd( $data, $request->all() );
            DB::commit();
            return response()->json([
                "message" => "Resource Booked Successfully.",
                "status" => "success",
                "data" => $data,
            ], 200);
        } catch (\Exception $exc) {
            DB::rollBack();
            // echo "<pre>";print_r($exc->getMessage());echo "</pre>";
            return response()->json([
                "message" => "Resource not Booked.",
                "status" => "error",
                'data' => $exc->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $resourceId, string $locationId = '0')
    public function show(string $locationId, string $resourceId = '0')
    {
        $data = [];
        $data['ResourceLocation'] = ResourceLocation::all()->toArray();
        // $data['ResourceTypes'] = ResourceType::with('resource')->get()->toArray();

        if (!is_null($locationId) && $locationId != 0) {
            $data['ResourceTypes'] = ResourceType::with(['resources.SubResources', 'resources' => function ($query) use ($locationId) {
                $query->where('resourceLocation', '=', $locationId)->ProviderID();
            }])->whereHas('resources', function ($query) use ($locationId) {
                $query->where('resourceLocation', '=', $locationId)->ProviderID();
            })->get()->toArray();

            // $data['ResourceTypes'] = ResourceType::with(['resources.SubResources', 'resources' => function ( $query) use ($locationId) {
            //     $query->where('resourceLocation', '=', $locationId);
            // }])->whereHas('resources', function ( $query) use ($locationId) {
            //     $query->where('resourceLocation', '=', $locationId);
            // })->get()->toArray();

            // $data['ResourceTypes'] = ResourceType::with('resources.SubResources')->whereHas('resources', function ( $query) use ($locationId) {
            //     $query->where('resourceLocation', '=', $locationId);
            //     // $query->only()
            // })->get()->toArray();

        } else {
            $data['ResourceTypes'] = ResourceType::with(['resources.SubResources', 'resources' => function ($query) {
                $query->ProviderID();
            }])->whereHas('resources', function ($query)  {
                $query->ProviderID();
            })->get()->toArray();
        }
        if ($resourceId != 0)
            $data['Resources'] = Resource::with('SubResources', 'Bookings')->providerID()->where('ID', '=', $resourceId)->get()->toArray();


        // $data['Bookings'] = Resource::with('Booking')->where('ID', '=', $id)->get()->toArray();
        // $data['ALL'] = Resource::with('SubResource','Booking')->where('ID', '=', $id)->get()->toArray();

        // dd($locationId, $resourceId, $data);
        if ($data != null) {
            return response()->json([
                "message" => "Reource Location and Type Found Successfully",
                "status" => "success",
                "data" => $data,
            ], 200);
        } else {
            return response()->json([
                "message" => "No Resource Location and Type found",
                "status" => "failed",
            ], 200);
        }
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
        if (request()->ajax()) {
            $validator = Validator::make($request->all(), [
                'BookedFor' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->messages(), 400);
            }

            $book = Book::find($request->ID);
            // echo "<pre>ajax:";print_r($book->all()->toJson());echo "</pre>";
            $book->fill($request->all());
            DB::beginTransaction();
            try {
                $book->save();
                DB::commit();
                return response()->json([
                    "message" => "Resource Update Successfully.",
                    "status" => "success",
                    "data" => $book,
                ], 200);
            } catch (\Exception $exc) {
                DB::rollBack();
                // echo "<pre>error:"; print_r($exc->getMessage()); echo "</pre>";
                // echo "<pre>error:";print_r($book->all()->toJson());echo "</pre>";
                return response()->json([
                    "message" => "Resource not Create.",
                    "status" => "error",
                ], 500);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
        $book = Book::find($id);
        $book->delete();
        DB::commit();
        return response()->json(['status' =>'success', 'message' => 'Booking is deleted.'], 200);
        } catch (\Exception $exc) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'message'=> $exc->getMessage()], 500);
        }
    }

    public function accept(Request $request, string $id){
        DB::beginTransaction();
        try {
            $book = Book::find($id);
            $book->fill($request->all());
            $book->save();

            DB::commit();
            return response()->json(['status'=> 'success','message'=> 'Booking is Accepted.'], 200);
        }
        catch (\Exception $exc) {
            DB::rollBack();
            return response()->json(['status'=> 'error','message'=> $exc->getMessage()], 500);
        }
    }
    public function reject(Request $request, string $id){
        DB::beginTransaction();
        try {
            $book = Book::find($id);
            $book->fill($request->all());
            $book->save();
            $book->delete();
            DB::commit();
            return response()->json(['status'=> 'success','message'=> 'Booking is Rejected.'], 200);
        } catch (\Exception $exc) {
            DB::rollBack();
            return response()->json(['status'=> 'error','message'=> $exc->getMessage()], 500);
        }
    }

    public function getBooking(string $bookingID, string $SubID = '0')
    {
        $data = [];
        $data = Book::findOrFail($bookingID)->toArray();
        // $data = Book::findOrFail($bookingID );
        if ($data != null) {
            return response()->json([
                "message" => "Reource Booking Found Successfully",
                "status" => "success",
                "data" => $data,
            ], 200);
        } else {
            return response()->json([
                "message" => "No Booking found",
                "status" => "failed",
            ], 200);
        }
    }
    public function getBookingBySubID(string $SubID)
    {
        $data = [];
        // $events = [];
        // $data = Book::where('SubID', '=', $SubID)->get()->toArray();

        $tmp = Resource::with(['SubResources' => function ($query) use ($SubID) {
            $query->where('ID', '=', $SubID);
        }, 'Bookings' => function ($query) use ($SubID) {
            $query->where('SubID', '=', $SubID);
        }])->whereHas('Bookings', function ($query) use ($SubID) {
            $query->where('SubID', '=', $SubID);
        })->get()->toArray();
        // $data['Resources'] = Resource::select(['ID', 'Name', 'Description', 'Name as Resource'])->with(['SubResources' => function ($query) use ($SubID) {
        //     $query->select(['ID', 'resource', 'Name', 'Name as SubResource'])->where('ID', '=', $SubID);
        // }, 'Bookings' => function ($query) use ($SubID) {
        //     $query->select(['ID', 'ID as id', 'BookedBy', 'SubID', 'FacID', 'BookedFor', 'FromTime as start', 'ToTime as end'])->where('SubID', '=', $SubID);
        // }])->whereHas('Bookings', function ($query) use ($SubID) {
        //     $query->where('SubID', '=', $SubID);
        // })->get()->toArray();
        $tmp = (isset($tmp) && count($tmp) == 1 && isset($tmp[0])) ? $tmp[0] : $tmp;
        extract($tmp);
        if (isset($bookings) && count($bookings)) {
            foreach ($bookings as $key => $booking) {
                $booking = (object) $booking;
                $events[] = [
                    'id' => $booking->ID,
                    'title' => $Name,
                    'start' => $booking->FromTime,
                    'description' => "[{$booking->FromTime} - {$booking->ToTime} : {$Name} (Booked by {$booking->BookedBy})]",
                    'end' => $booking->ToTime,
                    'className' => 'fc-event-success',
                ];
            }
        }


        // $data = $tmp;
        // echo "<pre>";print_r($events);echo "</pre>";return;
        $data = $events;
        if ($data != null) {
            return response()->json([
                "message" => "Reource Booking Found Successfully",
                "status" => "success",
                "data" => $data,
            ], 200);
        } else {
            return response()->json([
                "message" => "No Booking found",
                "status" => "failed",
            ], 200);
        }
    }

    public function getLocationResource(string $locationId, string $resourceId)
    {
    }
    public function getResource(Request $request, Resource $resource)
    {
        $data = [];
        $data = Resource::with('SubResource')->where("ID", "=", $resource->ID)->get()->toArray();
        if ($data != null) {
            return response()->json([
                "message" => "Reource Location and Type Found Successfully",
                "status" => "success",
                "data" => $data,
            ], 200);
        } else {
            return response()->json([
                "message" => "No Resource Location and Type found",
                "status" => "failed",
            ], 200);
        }
    }


    public function getBookedResource(Book $book)
    {
        dd($book->toArray());
        $data = [];
        $data = Book::where("FacID", "=", $book->ID)->get()->toArray();
        if ($data != null) {
            return response()->json([
                "message" => "Reource Location and Type Found Successfully",
                "status" => "success",
                "data" => $data,
            ], 200);
        } else {
            return response()->json([
                "message" => "No Resource Location and Type found",
                "status" => "failed",
            ], 200);
        }
    }


    /**
     * END::CLASS
     */
}
