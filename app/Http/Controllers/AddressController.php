<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Http\Resources\AddressResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class AddressController extends Controller
{

    public function index()
    {
        $addresses = Auth::user()->addresses()->latest()->get();
        return AddressResource::collection($addresses);
    }


    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'latitude'  => ['required','numeric','between:-90,90'],
                'longitude' => ['required','numeric','between:-180,180'],
            ]);

            $address = Auth::user()->addresses()->create($data);


            return (new AddressResource($address))
                ->response()
                ->setStatusCode(201);
        } catch (Exception $e) {
            return response($e->getMessage(), 400);
        }
    }



    public function show(Address $address)
    {

        if (Auth::id() !== $address->user_id) {
            return response()->json(['message' => 'Access denied.'], 505);
        }

        return new AddressResource($address);
    }


    public function update(UpdateAddressRequest $request, $id)
    {
        $address = Address::find($id);
        if (!$address) {
            return response()->json(['message' => 'Address not found.'], 404);
        }

        $address->update($request->validated());
        return new AddressResource($address);
    }


    public function destroy(Address $address)
    {
        $this->authorize('delete', $address);
        $address->delete();
        return response()->json(['message' => 'Address deleted.']);

    }
}
