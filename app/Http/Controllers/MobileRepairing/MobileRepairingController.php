<?php

namespace App\Http\Controllers\MobileRepairing;

use App\Http\Controllers\Controller;
use App\Models\MobileRepairing;
use Illuminate\Http\Request;

class MobileRepairingController extends Controller
{
    public function index()
    {
        $user = request()->user();
        $mobile_repairing = MobileRepairing::where('user_id', $user->id) -> get();
        return response()->json([
            'success' => true,
            'message' => 'Mobile Repairing List',
            'data' => $mobile_repairing,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user = request()->user();
        \Log::info($user);
            if (!$user) {
                return response()->json(['success' => false,'error' => 'Unauthenticated'], 401);
            }
            $validator = \Validator::make($request->all(), [
                'mobile_name' => 'required',
                'issue' => 'required',
                'phone' => 'required',
                'email' => 'nullable|email',
                'device_type' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()->first(),
                ]);
            }

            $mobile_repairing = new MobileRepairing();
            $mobile_repairing->mobile_name = $request->mobile_name;
            $mobile_repairing->issue = $request->issue;
            $mobile_repairing->user_id = $user->id;
            $mobile_repairing->phone = $request->phone;
            $mobile_repairing->email = $request->email;
            $mobile_repairing->device_type = $request->device_type;
            $mobile_repairing->save();
            return response()->json(['success' => true,'message' => 'Mobile repairing request sent successfully']);
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
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
