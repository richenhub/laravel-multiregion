<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $cities = City::all();
        $currentCity = session('current_city');
        return view('index', compact('cities', 'currentCity'));
    }

    public function about()
    {return view('about');
    }

    public function news()
    {
        return view('news' );
    }

    public function setCity($slug)
    {
        $city = City::where('slug', $slug)->firstOrFail();
        session(['current_city' => $city]);

        return redirect()->route('index');
    }

    public function setCityNews($slug)
    {
        $city = City::where('slug', $slug)->firstOrFail();
        session(['current_city' => $city]);

        return redirect()->route('news', ['city' => $city->slug]);
    }

    public function setCityAbout($slug)
    {
        $city = City::where('slug', $slug)->firstOrFail();
        session(['current_city' => $city]);

        return redirect()->route('about', ['city' => $city->slug]);
    }
}
