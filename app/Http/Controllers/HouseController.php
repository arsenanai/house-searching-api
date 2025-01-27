<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function index(Request $request)
    {
        $query = House::query();

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->has('bedrooms')) {
            $query->where('bedrooms', $request->bedrooms);
        }
        if ($request->has('bathrooms')) {
            $query->where('bathrooms', $request->bathrooms);
        }
        if ($request->has('storeys')) {
            $query->where('storeys', $request->storeys);
        }
        if ($request->has('garages')) {
            $query->where('garages', $request->garages);
        }
        if ($request->has('price_min') && $request->has('price_max')) {
            $query->whereBetween('price', [$request->price_min, $request->price_max]);
        }

        return response()->json($query->get());
    }
}
