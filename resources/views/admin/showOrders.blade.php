@extends('layouts.admin')

@section('navbar')
    <h1>RABOTAI POZHALUISTA!</h1>
    <h1>Orders</h1>
    <table class="table table-hover text-center table-dark" id="table" data-height="100" data-show-columns="true" data-toggle="table" data-search="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-toolbar="#toolbar" data-page-size="50" data-show-columns="true">
        <thead>
        <tr>
            <th scope="col">Order number</th>
            <th scope="col">Point of arrival</th>
            <th scope="col">Departure point</th>
            <th scope="col">Payment for travel</th>
            <th scope="col">Date of the travel</th>
            <th scope="col">Phone number</th>
            <th scope="col">License number</th>
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