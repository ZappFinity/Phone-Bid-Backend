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
        
        \Log::error($request->all());
        try {
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
            $mobile->image = $request->imageUrl ?? 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKAAAACUCAMAAAAj+tKkAAAAY1BMVEX///8AAADf399tbW2hoaFqamr5+fmWlpa2trbw8PDr6+vc3Nxzc3P29vb8/Pzz8/Ohopxzc22MjIw7OzvKysp/f3+vr69cXFzAwMAqKioUFBQ1NTXR0dFVVVUeHh7l5eVFRUVhR57QAAACaUlEQVR4nO3c23KiQBSFYbY2Z2hmkIOoUd//KQfUycQMM4ZeNOmi1n/hTdxVX0nbEBPxPMYYY+wb0smpCcOwrMOX1WX/0JwSvaQvj7ZHmdTRj/LlfGktsstC9eXC7U6kThfztbJrimkzRXOUdiFhnMkumT6W7CSL59f8XaDkauDrhVdRwdyakS6t7M0m99Je5rWMFsnVdPQq0XyOfxaKMh1VEs4pGU9ncjKdPUlmf7vWW9mYzm5kS6AX+wjQt78T5hjQ/gnZ+UNMINragXNSxgOB9q/8MWAWWt8IQaAicO3Axvq5bu3bDDdqFBi7vlE7/y62D/Qg4M8ftoFB5DgwVpnbwGLlQPtvktUDp34yOzkUaP2SHwTaPxejQNtHeP1r0PV3sfMbNc/FXrB3HOj89aD7V9RrB6bW/5y49t+Lnf9kgUAC4QhEIxCNQDQC0QhEIxCNQDQC0QhEIxCNQDQC0QhEIxCNQDQC0QhEIxCNQDQC0QhEIxCNQDQC0QhEIxDNeaDz39B2/hUkEI1AuFoq09FK6gWAofkdRYDRCe3Pnelodza8U82kEl8as8lGfKNb/UxLe9GhS72ntaSDsfSnf/hNu0OzyM238lKebzmj4/GKJ056kNL6113uJZkcyokH61IeJFvgAN9LVCdybP0v1/bP75R9n9b31ZbHVfl2nnJntfNbWcV53i/MW3PDfi/7fFhZyb20iqKoUdHLVNM/VOljbFiaAzS4Wefh6ccLl/cVRfFOTC6PNpt0rE3f7efJewOv980M/Aj9Qx2sN+6HV/VT8f3Hw9NuEw+VlYP8X/PLFtIwxhj7jn4BJy8vI31MspEAAAAASUVORK5CYII=';
            $mobile->name = $request->name ?? 'nill';
            $mobile->price = 'Rs. ' . $request->price ?? 0;
            $mobile->release_date = $request->release_date ?? 'nill';
            $mobile->sim_support = $request->sim_support ?? 'nill';
            $mobile->operating_system = $request->operating_system ?? 'nill';
            $mobile->phone_weight = $request->phone_weight . 'g' ?? 'nill';
            $mobile->phone_dimensions = $request->phone_dimensions ?? 'nill';
            $mobile->screen_size = $request->screen_size ?? 'nill';
            $mobile->screen_resolution = $request->screen_resolution ?? 'nill';
            $mobile->screen_type = $request->screen_type ?? 'nill';
            $mobile->screen_protection = $request->screen_protection ?? 'nill';
            $mobile->internal_memory = $request->internal_memory ?? 'nill';
            $mobile->ram = $request->ram ?? 'nill';
            $mobile->card_slot = $request->card_slot ?? 'nill';
            $mobile->processor = $request->processor ?? 'nill';
            $mobile->gpu = $request->gpu ?? 'nill';
            $mobile->battery = 'Li-Po ' . $request->battery . ' mAh, non-removable';
            $mobile->front_camera = $request->front_camera ?? 'nill';
            $mobile->front_flash = $request->front_flash ?? 'nill';
            $mobile->front_video_recording = $request->front_video_recording ?? 'nill';
            $mobile->back_camera = $request->back_camera ?? 'nill';
            $mobile->back_flash = $request->back_flash ?? 'nill';
            $mobile->back_video_recording = $request->back_video_recording ?? 'nill';
            $mobile->bluetooth = $request->bluetooth ?? 'nill';
            $mobile->{'3G'} = $request->threeg ?? 'nill';
            $mobile->{'4G/LTE'} = $request->fourG ?? 'nill';
            $mobile->{'5G'} = $request->FiveG ?? 'nill';
            $mobile->radio = $request->radio ?? 'nill';
            $mobile->wifi = $request->wifi ?? 'nill';
            $mobile->nfc = $request->nfc ?? 'nill';
            $mobile->is_new = $request->is_new ?? false;
            $mobile->lat = $request->lat;
            $mobile->lng = $request->lng;
            $mobile->is_for_bid = $request->is_for_bid ?? false;
            $mobile->bid_starting_price = 'Rs. ' . $request->bid_starting_price ?? 0;
            $mobile->save();

            return response()->json([
                'success' => true,
                'message' => 'Mobile added successfully',
                'data' => $mobile
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'data' => $request->all()
            ]);
        }
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
