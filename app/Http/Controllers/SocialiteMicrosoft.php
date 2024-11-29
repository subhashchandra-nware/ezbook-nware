<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteMicrosoft extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        echo 'socialite_microsoft';
        // $user = Socialite::driver('microsoft');
        $user = Socialite::driver('azure');
$user->redirect();
     $azureLogoutUrl = Socialite::driver('azure')->getLogoutUrl(route('login'));

        // return Socialite::driver('microsoft')->redirect('/dashboard');

        // Auth::guard()->logout();
        // $request->session()->flush();
        // $azureLogoutUrl = Socialite::driver('azure')->getLogoutUrl(route('login'));
        // return redirect($azureLogoutUrl);

        // dd($azureLogoutUrl);
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
