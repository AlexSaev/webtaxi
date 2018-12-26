@extends('layouts.admin')

@section('navbar')
    <h1>RABOTAI POZHALUISTA!</h1>
    <h1>Passengers</h1>
    <table class="table table-hover text-center table-dark" id="table" data-height="100" data-show-columns="true" data-toggle="table" data-search="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-toolbar="#toolbar" data-page-size="50" data-show-columns="true">
        <thead>
        <tr>
            <th scope="col">Phone number</th>
            <th scope="col">Surname</th>
            <th scope="col">Name</th>
            <th scope="col">Patronymic</th>
            <th scope="col">Password</th>
        </tr>
        </thead>
        <tbody>
        {{--@if($weathers != NULL)--}}
        {{--@foreach($weathers as $weather)--}}
        {{--<tr>--}}
        {{--<td>{{$weather->api}}</td>--}}
        {{--<td>{{$weather->city}}</td>--}}
        {{--<td>{{$weather->weather_type}}</td>--}}
        {{--<td>{{$weather->temperature}}</td>--}}
        {{--<td>{{$weather->wind_speed}}</td>--}}
        {{--<td>{{$weather->date}}</td>--}}
        {{--</tr>--}}
        {{--@endforeach--}}
        {{--@endif--}}
        </tbody>
    </table>
@endsection