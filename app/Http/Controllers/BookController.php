<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\Book\BookApiController;
use App\Models\Book;
use App\Models\Booking;
use App\Models\Resource;
use App\Models\ResourceLocation;
use App\Models\ResourceType;
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
        $booking = null;
        // $request->request->add(['ProviderID' => session()->get('siteId')]);
        $request->request->add(['BookedBy' => session()->get('loginUserId')]);

        $validator = Validator::make($request->all(), [
            'BookedFor' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        // dd($request->all(), $SubResources);
        DB::beginTransaction();
        try {
            $booking = Booking::create($request->all());
            DB::commit();
            return response()->json([
                "message" => "Resource Booked Successfully.",
                "status" => "success",
                "data" => $booking,
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
        // dd($id);
        $data = [];
        $apiJSON = (new BookApiController)->show($locationId,$resourceId );
        $original = collect($apiJSON)->get('original');
        $data = collect($original)->get('data');



        // dd($apiJSON, $data);
        if( $resourceId != 0 )
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
    public function getLocationResource(string $locationId, string $resourceId)
    {

    }


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
    public function getBookedResource(Request $request, Resource $resource)
    {

        // print_r( $request, $book);
        $data = [];
        // $data['resources'] = (new BookApiController)->getResource();

        $apiJSON = (new BookApiController)->getResource($request, $resource);
        $original = collect($apiJSON)->get('original');
        $data = collect($original)->get('data');
        $data = (count($data) == 1) ? $data[0] : $data ;


        // dd(response()->json($data));
        // return "<pre>" . print_r($data) . print_r($request->all()) . print_r($resource->ID) . "</pre>" ?? "<div>Subhash</div>";
        return view('pages.books.ajax.book-ajax', compact('data'));
    }
    /**
     * END::CLASS
     */
}
