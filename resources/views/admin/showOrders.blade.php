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
        @if($orders != NULL)
        @foreach($orders as $order)
        <tr>
            <td>{{$order->order_number}}</td>
            <td>{{$order->point_of_arrival}}</td>
            <td>{{$order->departure_point}}</td>
            <td>{{$order->tpayment_for_travel}}</td>
            <td>{{$order->date_of_the_travel}}</td>
            <td>{{$order->phone_number}}</td>
            <td>{{$order->license_number}}</td>
        </tr>
        @endforeach
        @endif
        </tbody>
    </table>
@endsection