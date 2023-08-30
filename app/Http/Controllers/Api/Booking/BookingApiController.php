<?php

namespace App\Http\Controllers\Api\Booking;

use App\Http\Controllers\Controller;
use App\Models\Resource;
use App\Models\ResourceLocation;
use App\Models\ResourceType;
use Illuminate\Http\Request;

class BookingApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];
        $data['ResourceLocation'] = ResourceLocation::all()->toArray();
        // $data['ResourceTypes'] = ResourceType::with('resource')->get()->toArray();
        $data['ResourceTypes'] = ResourceType::with('resource.SubResource')->get()->toArray();
        // dd($data);
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
        $data = [];
        $data['ResourceLocation'] = ResourceLocation::all()->toArray();
        // $data['ResourceTypes'] = ResourceType::with('resource')->get()->toArray();
        $data['ResourceTypes'] = ResourceType::with('resource.SubResource')->get()->toArray();
        $data['Resources'] = Resource::with('SubResource')->where('ID', '=', $id)->get()->toArray();

        // dd($data);
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
