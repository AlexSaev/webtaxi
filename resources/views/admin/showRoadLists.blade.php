@extends('layouts.admin')

@section('navbar')
    <h1>RABOTAI POZHALUISTA!</h1>
    <h1>Road Lists</h1>
    <table class="table table-hover text-center table-dark" id="table" data-height="100" data-show-columns="true" data-toggle="table" data-search="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-toolbar="#toolbar" data-page-size="50" data-show-columns="true">
        <thead>
        <tr>
            <th scope="col">List number</th>
            <th scope="col">Valid from</th>
            <th scope="col">Valid untill</th>
            <th scope="col">Car number</th>
            <th scope="col">License number</th>
        </tr>
        </thead>
        <tbody>
        @if($roadLists != NULL)
            @foreach($roadLists as $roadList)
                <tr>
                    <td>{{$roadList->list_number}}</td>
                    <td>{{$roadList->valid_from}}</td>
                    <td>{{$roadList->valid_untill}}</td>
                    <td>{{$roadList->car_number}}</td>
                    <td>{{$roadList->license_number}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

    <div class="modal fade" id="exampleModalAddCity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Delete">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form method="post" action="{{route('delete.passenger')}}">
                            <div class="form-group">
                                <lable for="exampleInputCity">City</lable>
                                <input type="text" class="form-control" id="exampleInputCity" aria-descripbdby="cityHelp"
                                       placeholder="City" name="cityName" value="">
                                <small id="cityHelp" class="form-text text-muted">Enter city name</small>
                            </div>
                            <div class="form-group">
                                <lable for="exampleInputLat">Latitude</lable>
                                <input type="text" class="form-control" id="exampleInputLat" placeholder="Latitude" name="lat" value="">
                                <small id="latHelp" class="form-text text-muted">Enter latitude</small>
                            </div>
                            <div class="form-group">
                                <lable for="exampleInputLon">Longitude</lable>
                                <input type="text" class="form-control" id="exampleInputLon" placeholder="Longitude" name="lon" value="">
                                <small id="lonHelp" class="form-text text-muted">Enter longitude</small>
                            </div>
                            <div class="form-check">
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                                {{csrf_field()}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection