<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\Setting\SettingApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];
        $registrationDate = null;
        $data = [];
        $apiJSON = (new SettingApiController)->index();
        $original = collect($apiJSON)->get('original');
        $data = collect($original)->get('data');
        $registrationDate = $data['registrationDate'];
        $data = $data['FacProvider'];
        // use Illuminate\Support\Facades\Storage;

        // $files = Storage::files();
        // $files = Storage::path('');

        // $files = Storage::allFiles('logos');
        // dd($files);
        // dd(session()->all());

        return view('pages.settings.setting-edit', compact('data', 'registrationDate'));
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

        $data = [];
        $apiJSON = (new SettingApiController)->update($request, $id);
        $original = collect($apiJSON)->get('original');
        $data = collect($original)->get('data');
        // dd($original, $apiJSON);
        return redirect()->route('setting.index')->with($original['status'], $original['message']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * END::CLASS
     */
}
