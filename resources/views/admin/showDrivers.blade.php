@extends('layouts.admin')

@section('navbar')
    <h1>RABOTAI POZHALUISTA!</h1>
    <h1>Drivers</h1>
    <table class="table table-hover text-center table-dark" id="table" data-height="100" data-show-columns="true" data-toggle="table" data-search="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-toolbar="#toolbar" data-page-size="50" data-show-columns="true">
        <thead>
        <tr>
            <th scope="col">License number</th>
            <th scope="col">Surname</th>
            <th scope="col">Name</th>
            <th scope="col">Patronymic</th>
            <th scope="col">Password</th>
        </tr>
        </thead>
        <tbody>
        @if($drivers != NULL)
        @foreach($drivers as $driver)
        <tr>
            <td>{{$driver->license_number}}</td>
            <td>{{$driver->surname}}</td>
            <td>{{$driver->name}}</td>
            <td>{{$driver->patronymic}}</td>
            <td>{{$driver->password}}</td>
        </tr>
        @endforeach
        @endif
        </tbody>
    </table>
@endsection