<?php

namespace App\Http\Controllers;

use App\Http\Resources\LocationResourceAPI;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locationName = request()->query('name');
        $locationSlug = Str::slug($locationName);

        $location = Location::whereSlug($locationSlug)->select(['id', 'slug', 'name'])->first();
        if(!$location) {
            $location = Location::create([
                'name' => $locationName,
                'slug' => $locationSlug
            ]);
        }

        return response()->json([
            'code_status' => Response::HTTP_OK,
            'msg_status' => 'Location has been loaded',
            'data' => $location
        ]);
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
    public function show(string $slug)
    {
        $location = Location::whereSlug($slug)->select(['id', 'slug', 'name'])->first();
        if(!$location) {
            // TODO: Create a location
        }

        return response()->json([
            'code_status' => Response::HTTP_OK,
            'msg_status' => 'OK',
            'data' => $location
        ]);
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
