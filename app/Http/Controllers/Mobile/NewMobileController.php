<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Models\Mobile;
use Illuminate\Http\Request;

class NewMobileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all new mobiles
        $mobiles = Mobile::where('is_new', true)->get();
        return response()->json([
            'success' => true,
            'message' => 'List of all mobiles',
            'data' => $mobiles
        ]);
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
        $mobile = Mobile::find($id);
        return response()->json([
            'success' => true,
            'message' => 'Mobile details',
            'data' => $mobile
        ]);
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
