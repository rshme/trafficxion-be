<?php

namespace App\Http\Controllers;

use App\Http\Resources\NewsResourceAPI;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Validate the incoming request query parameters
        $requests = request()->validate([
            'location_id' => 'required|integer|exists:locations,id',
            'limit' => 'nullable|integer|min:1',
            'offset' => 'nullable|integer|min:0',
        ]);

        // Extract query parameters
        $locationId = $requests['location_id'];
        $limit = $requests['limit'] ?? 10; // Default limit to 10 if not provided
        $offset = $requests['offset'] ?? 0; // Default offset to 0 if not provided

        $query = News::query();
        $query->where('location_id', $locationId);

        $news = $query->offset($offset)->limit($limit)->get();
        $news = NewsResourceAPI::collection($news);

        return response()->json([
            'code_status' => Response::HTTP_OK,
            'msg_status' => 'News has been loaded',
            'data' => $news
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
    public function show(string $id)
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
