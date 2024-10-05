<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityApiController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:cities,slug',
        ]);

        $city = City::create([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
        ]);

        return response()->json($city, 201);
    }

    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();

        return response()->json(['message' => 'Город удален']);
    }
}