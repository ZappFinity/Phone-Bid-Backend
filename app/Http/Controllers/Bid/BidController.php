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
        $mobiles = Mobile::with('bids')->where('is_for_bid', true)->get();
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
        $mobile = Mobile::find($id);
        return response()->json([
            'success' => true,
            'message' => 'Bid Mobile details',
            'data' => $mobile
        ]);
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
        $mobile = Mobile::findOrFail($id);
        $mobile->delete();
        return response()->json([
            'success' => true,
            'message' => 'Mobile deleted successfully',
            'data' => $mobile
        ]);
    }


    public function getLoggedInUsersMobilesForBids()
    {
        $user = auth()->user();
        $mobiles = Mobile::with( 'bids')->where('ad_poster_id', $user->id)->get();
        return response()->json([
            'success' => true,
            'message' => 'List of all bid mobiles',
            'data' => $mobiles
        ]);
    }

}
