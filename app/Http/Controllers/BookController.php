<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\Book\BookApiController;
use App\Models\Book;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Carbon\CarbonInterval;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(int $locationId = null)
    {
        $data = [];
        $apiJSON = (new BookApiController)->index($locationId);
        $original = collect($apiJSON)->get('original');
        $data = collect($original)->get('data');

        // Create a new instance:
        // $period = new CarbonPeriod('2018-04-21', '3 days', '2019-04-27');
        // Use static constructor:
        // $period = CarbonPeriod::create('2018-04-21 03:03:03', '1 week', '2018-05-27');
        // // Use the fluent setters:
        // $period = CarbonPeriod::since('2018-04-21')->days(3)->until('2018-04-27');
        // // Start from a CarbonInterval:
        // $period = CarbonInterval::days(3)->toPeriod('2018-04-21', '2018-04-27');
        // // toPeriod can also be called from a Carbon or CarbonImmutable instance:
        // $period = Carbon::parse('2018-04-21')->toPeriod('2018-04-27', '3 days'); // pass end and interval
        // // interval can be a string, a DateInterval or a CarbonInterval
        // // You also can pass 2 arguments: number an string:
        // $period = Carbon::parse('2018-04-21')->toPeriod('2018-04-27', 3, 'days');
        // // Same as above:
        // $period = Carbon::parse('2018-04-21')->range('2018-04-27', 3, 'days'); // Carbon::range is an alias of Carbon::toPeriod
        // // Still the same:
        // $period = Carbon::parse('2018-04-21')->daysUntil('2019-04-27', 3);
        // // By default daysUntil will use a 1-day interval:
        // $period = Carbon::parse('2018-04-21')->daysUntil('2018-04-27'); // same as CarbonPeriod::create('2018-04-21', '1 day', '2018-04-27')

        $period = Carbon::parse('2023-09-21')->weeksUntil('2024-08-27', 2);
        // print_r($period->toArray());
        foreach ($period->toArray() as $key => $value) {
            // $dat[] = ['date' => $value->toDate()->format('D, M, Y-m-d H:i:s')];
            $dat[$value->year."-".$value->week] = $value->toDate()->format('D, M, Y-m-d H:i:s');

        //    print_r($value->toDate()->format('Y-m-d H:i:s'));
        //    print_r($value->toString());
        }
        // $days = $period->diffin

        $start = '2023-09-21';
        $end = '2024-08-27';
        $d = CarbonImmutable::createFromFormat('Y-m-d', $start)
    ->daysUntil(CarbonImmutable::createFromFormat('Y-m-d', $end))
    ->filter(static fn (CarbonImmutable $date) => in_array($date->dayOfWeek, [0,2], true))->toArray();

    $dt = [];
    $p = Carbon::parse('2023-09-21')->daysUntil('2024-08-27', 1)
    ->filter(static fn (Carbon $date) => in_array($date->dayOfWeek, [0,1], true))->toArray();
    foreach ($p as $key => $v) {
        $dt[$v->year."-".$v->week] = $v->toDate()->format('W, D, M, Y-m-d H:i:s');
    }
        // dd($dat, $p, $dt);




        // dd($apiJSON, $data);
        return view('pages.books.book-index', compact('data'));
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
        // $request->request->add(['ProviderID' => session()->get('siteId')]);
        $request->request->add(['BookedBy' => session()->get('loginUserId')]);

        $validator = Validator::make($request->all(), [
            'BookedFor' => 'required',
            'Purpose' => 'required',
            'SubID' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        $resultArr = (new BookApiController)->store($request);
        // dd(collect( $resultArr)->get('original'));
        $msg = collect($resultArr)->get('original');
        return $msg;
        // return redirect()->route('resource.resource')->with($msg['status'], $msg['message']);

        // dd($request->all(), $SubResources);

    }

    /**
     * Display the specified resource.
     */
    // public function show(string $resourceId, string $locationId = '0')
    public function show(string $locationId, string $resourceId = '0')
    {
        // dd($id);
        $data = [];
        $apiJSON = (new BookApiController)->show($locationId, $resourceId);
        $original = collect($apiJSON)->get('original');
        $data = collect($original)->get('data');



        // dd($apiJSON, $data);
        if ($resourceId != 0)
            return view('pages.books.book-show', compact('data'));
        else
            return view('pages.books.book-index', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
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
     * Remove the specified book from storage.
     */
    public function destroy(Book $book)
    {
        // echo "<pre>ajax:";print_r($book->all()->toJson());echo "</pre>";
        // echo "<pre>";print_r($book->toArray());echo "</pre>";
        DB::beginTransaction();
        try {
            $book->delete();
            DB::commit();
            // dd($userrights, $usergrouprights, $opretionalHours, $custombookinginfos);

            return response()->json([
                "message" => "Resource Deleted Successfully.",
                "status" => "success",
                "data" => $book,
            ], 200);
        } catch (\Exception $exc) {
            DB::rollBack();
            // echo "<pre>";print_r($exc->getMessage());echo "</pre>";
            return response()->json([
                "message" => "Resource not Create.",
                "status" => "error",
            ], 500);
        }
    }
    public function getBooking(string $bookingID, string $SubID = '0')
    {
        // dd($bookingID);
        // return "getBooking";

        $apiJSON = (new BookApiController)->getBooking($bookingID, $SubID);
        $original = collect($apiJSON)->get('original');
        $data = $original;
        $data = collect($original)->get('data');
        $data = (isset($data) && count($data) == 1) ? $data[0] : $data;
        if (request()->ajax()) {
            return response()->json($data);
        } else {
            dd($data, response()->json($data));
        }
    }
    public function getBookingBySubID(string $SubID)
    {
        // return "getBookingBySubID";
        $apiJSON = (new BookApiController)->getBookingBySubID($SubID);
        $original = collect($apiJSON)->get('original');
        $data = $original;
        $data = collect($original)->get('data');
        // $data = (isset($data) && count($data) == 1 && isset($data[0])) ? $data[0] : $data;
        // echo "<pre>";print_r($data);echo "</pre>";return;
        if (request()->ajax()) {
            return response()->json($data);
        } else {
            dd($data, response()->json($data));
        }
    }

    /*
   public function getResource()
    {

        // print_r( $request, $book);
        $data = [];
        // $data['resources'] = (new BookApiController)->getResource();

        // $apiJSON = (new BookApiController)->getResource($request, $resource);
        // $original = collect($apiJSON)->get('original');
        // $data = collect($original)->get('data');
        // $data = (count($data) == 1) ? $data[0] : $data ;

        // if (request()->ajax() )
        if ( true )
         {
            $data =[
                [ // this object will be "parsed" into an Event Object
                'title' => 'The Title1', // a property!
                'start' => '2023-08-23', // a property!
                'end' => '2023-08-25' // a property! ** see important note below about 'end' **
            ],
            [ // this object will be "parsed" into an Event Object
                'title' => 'The Title2', // a property!
                'start' => '2023-08-23 11:55:44', // a property!
                'end' => '2023-08-25 12:12:12' // a property! ** see important note below about 'end' **
            ],
            [
                'id' => 12,
                'title' => 'BCH237',
                'start' => '2023-08-25T10:30:00',
                'end' => '2023-08-27T11:30:00',
                'description'=> 'Lecture'
            ]
            ];
            // dd(response()->json($data));
            return response()->json($data);
        }
        // dd(response()->json($data));
        // return "<pre>" . print_r($data) . print_r($request->all()) . print_r($resource->ID) . "</pre>" ?? "<div>Subhash</div>";
        return view('pages.books.ajax.book-ajax', compact('data'));
    }
    */


    public function getBookedResource(Book $book, string $id)
    {

        dd($id, $book->toArray());
        // print_r( $request, $book);
        $data = [];
        // $data['resources'] = (new BookApiController)->getResource();

        $apiJSON = (new BookApiController)->getBookedResource($book);
        $original = collect($apiJSON)->get('original');
        $data = collect($original)->get('data');
        $data = (isset($data) && count($data) == 1) ? $data[0] : $data;

        dd($data);

        dd(response()->json($data));
        // return "<pre>" . print_r($data) . print_r($request->all()) . print_r($resource->ID) . "</pre>" ?? "<div>Subhash</div>";
        return view('pages.books.ajax.book-ajax', compact('data'));
    }






    /**
     * END::CLASS
     */
}
