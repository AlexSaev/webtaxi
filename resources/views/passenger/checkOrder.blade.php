@extends('layouts.passenger')

@section('navbar')
    <h1 class="text-center">Last order info</h1>
    @if($message)
        <h2 class="text-center">{{$message}}</h2>
    @endif
    @if($order)
        <h2 class="text-center">Below you can see information about car, that will coming soon</h2>
    <table class="table table-hover text-center table-dark" id="table" data-height="100" data-show-columns="true" data-toggle="table" data-search="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-toolbar="#toolbar" data-page-size="50" data-show-columns="true">
        <thead>
        <tr>
            <th scope="col">Car number</th>
            <th scope="col">Car brand</th>
            <th scope="col">Car model</th>
            <th scope="col">Car color</th>
        </tr>
        </thead>
        <tbody>
                    <tr>
                        <td>{{$order->car_number}}</td>
                        <td>{{$order->car_brand}}</td>
                        <td>{{$order->model}}</td>
                        <td>{{$order->color}}</td>
                    </tr>
        </tbody>
    </table>
    @endif
@endsection