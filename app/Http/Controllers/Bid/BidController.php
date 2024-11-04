<?php

namespace App\Http\Controllers\Bid;

use App\Http\Controllers\Controller;
use App\Models\Bid;
use Illuminate\Http\Request;
use App\Models\Mobile;

class BidController extends Controller
{
    public function index()
    {
        // get all new mobiles
        $mobiles = Mobile::where('is_for_bid', true)->get();
        return response()->json([
            'success' => true,
            'message' => 'List of all bid mobiles',
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
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        
    }

    public function placeBid(Request $request, string $id)
    {
        $bid = new Bid();
        $bid->mobile_id = $id;
        $bid->phone = $request->phone;
        $bid->email = $request->email;
        $bid->bid_price = $request->bid_price;
        $bid->save();
        
        return response()->json([
            'success' => true,
            'message' => 'Bid placed successfully',
            'data' => $bid
        ]);
    }

    public function destroy(string $id)
    {
        //
    }
}
