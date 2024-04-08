<?php

namespace App\Http\Controllers;

use App\Models\Commend;
use Illuminate\Http\Request;

class CommendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $commends = Commend::all() ;
        $response = [
            'status' => 'success',
            'message' => 'data load success',
            'data' => $commends,
        ];
        return response()->json($response, 200);
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
    public function show(Commend $commend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commend $commend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commend $commend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commend $commend)
    {
        //
    }
}
