<?php

namespace App\Http\Controllers\Comparison;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mobile;

class ComparisonController extends Controller
{

    public function index()
    {
        //only mobile name and id
        $mobiles = Mobile::select('id', 'name')->get();

        return response()->json([
            'success' => true,
            'message' => 'List of all mobiles',
            'data' => $mobiles
        ]);
        
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $mobile = Mobile::find($id);

        return response()->json([
            'success' => true,
            'message' => 'Mobile details',
            'data' => $mobile
        ]);
    }


    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
