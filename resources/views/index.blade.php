@extends('layout')

@section('content')
    <h1>Список городов</h1>
    <ul>
        @foreach($cities as $city)
            <li>
                <a href="{{ route('set.city', $city->slug) }}" 
                   @if(session('current_city') && session('current_city')->id == $city->id) 
                       style="font-weight: bold;"
                   @endif
                >
                    {{ $city->name }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection