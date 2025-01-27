<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function index(Request $request)
    {
        $query = House::query();

        if ($request->query('name')) {
            $query->where('name', 'like', '%' . $request->query('name') . '%');
        }
        if ($request->query('bedrooms')) {
            $query->where('bedrooms', $request->query('bedrooms'));
        }
        if ($request->query('bathrooms')) {
            $query->where('bathrooms', $request->query('bathrooms'));
        }
        if ($request->query('storeys')) {
            $query->where('storeys', $request->query('storeys'));
        }
        if ($request->query('garages')) {
            $query->where('garages', $request->query('garages'));
        }
        if ($request->query('price_min') && $request->query('price_max')) {
            $query->whereBetween('price', [$request->query('price_min'), $request->query('price_max')]);
        }

        return response()->json($query->get());
    }
}
