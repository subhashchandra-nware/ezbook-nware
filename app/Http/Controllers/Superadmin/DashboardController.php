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
        $data['sites'] = User::with('FacProviders')->whereHas('FacProviders')->count();

        $data['Active'] = User::with(['FacProviders' => function($query){
            $query->where('Active', 1);
        },])->whereHas('FacProviders', function($query){
            $query->where('Active', 1);
        })->count();

        $data['Inactive'] = User::with(['FacProviders' => function($query){
            $query->where('Active', 0);
        },])->whereHas('FacProviders', function($query){
            $query->where('Active', 0);
        })->count();

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


