<?php

namespace App\Http\Controllers\Api\Countries;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Countries;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CountriesApiController extends Controller
{
    public function getAllCountryName(){
        $allCountries = Countries::all();
        return response()->json([
            'status' => 'success',
            'countries' => $allCountries
        ],200);
    }
}
