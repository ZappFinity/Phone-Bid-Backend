<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mobile;

class UsedMobileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mobiles = Mobile::where('is_new', false)->get();
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
        $user = request()->user();
        if (!$user) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'release_date' => 'nullable',
            'sim_support' => 'nullable',
            'operating_system' => 'nullable',
            'phone_weight' => 'nullable',
            'phone_dimensions' => 'nullable',
            'screen_size' => 'nullable',
            'screen_resolution' => 'nullable',
            'screen_type' => 'nullable',
            'screen_protection' => 'nullable',
            'internal_memory' => 'nullable',
            'ram' => 'nullable',
            'card_slot' => 'nullable',
            'processor' => 'nullable',
            'gpu' => 'nullable',
            'battery' => 'nullable',
            'front_camera' => 'nullable',
            'front_flash' => 'nullable',
            'front_video_recording' => 'nullable',
            'back_camera' => 'nullable',
            'back_flash' => 'nullable',
            'back_video_recording' => 'nullable',
            'bluetooth' => 'nullable',
            '3G' => 'nullable',
            '4G/LTE' => 'nullable',
            '5G' => 'nullable',
            'radio' => 'nullable',
            'wifi' => 'nullable',
            'nfc' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ]);
        }
        $mobile = new Mobile();
        $mobile->ad_poster_id = $user->id;
        $mobile->image = $request->image;
        $mobile->name = $request->name;
        $mobile->price = $request->price;
        $mobile->release_date = $request->release_date;
        $mobile->sim_support = $request->sim_support;
        $mobile->operating_system = $request->operating_system;
        $mobile->phone_weight = $request->phone_weight;
        $mobile->phone_dimensions = $request->phone_dimensions;
        $mobile->screen_size = $request->screen_size;
        $mobile->screen_resolution = $request->screen_resolution;
        $mobile->screen_type = $request->screen_type;
        $mobile->screen_protection = $request->screen_protection;
        $mobile->internal_memory = $request->internal_memory;
        $mobile->ram = $request->ram;
        $mobile->card_slot = $request->card_slot;
        $mobile->processor = $request->processor;
        $mobile->gpu = $request->gpu;
        $mobile->battery = $request->battery;
        $mobile->front_camera = $request->front_camera;
        $mobile->front_flash = $request->front_flash;
        $mobile->front_video_recording = $request->front_video_recording;
        $mobile->back_camera = $request->back_camera;
        $mobile->back_flash = $request->back_flash;
        $mobile->back_video_recording = $request->back_video_recording;
        $mobile->bluetooth = $request->bluetooth;
        $mobile->{'3G'} = $request->{'3G'};
        $mobile->{'4G/LTE'} = $request->{'4G/LTE'};
        $mobile->{'5G'} = $request->{'5G'};
        $mobile->radio = $request->radio;
        $mobile->wifi = $request->wifi;
        $mobile->nfc = $request->nfc;
        $mobile->is_new = $request->is_new;
        $mobile->save();

        return response()->json([
            'success' => true,
            'message' => 'Mobile added successfully',
            'data' => $mobile
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
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
