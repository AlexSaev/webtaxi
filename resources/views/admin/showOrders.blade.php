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
            <td>{{$order->payment_for_travel}}</td>
            <td>{{$order->date_of_the_travel}}</td>
            <td>{{$order->phone_number}}</td>
            <td>{{$order->license_number}}</td>
        </tr>
        @endforeach
        @endif
        </tbody>
    </table>


    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteLable" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form method="post" action="{{route('delete.order')}}">
                            <div class="form-check">
                                <div class="form-group">
                                    <lable for="delete">Order number</lable>
                                    <input type="text" class="form-control" id="InputID" aria-descripbdby="phoneHelp"
                                           placeholder="1" name="orderNumber">
                                    <small id="orderNumber" class="form-text text-muted">Enter order number</small>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Confirm</button>
                                </div>
                                {{csrf_field()}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="create">Create</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form method="post" action="{{route('create.order')}}">
                            <div class="form-group">
                                <lable for="create">Point of arrival</lable>
                                <input type="text" class="form-control" id="InputID" aria-descripbdby="phoneHelp"
                                       placeholder="Севастополь, ул.Университетская 33" name="pointOfArrival">
                                <small id="pointOfArrival" class="form-text text-muted">Enter point of arrival</small>
                            </div>

                            <div class="form-group">
                                <lable for="create">Departure point</lable>
                                <input type="text" class="form-control" id="InputID" aria-descripbdby="phoneHelp"
                                       placeholder="Джанкой, ул.Интернациональная 177" name="departurePoint">
                                <small id="departurePoint" class="form-text text-muted">Enter departure point</small>
                            </div>

                            <div class="form-group">
                                <lable for="create">Payment for travel</lable>
                                <input type="text" class="form-control" id="InputID" aria-descripbdby="phoneHelp"
                                       placeholder="200" name="paymentForTravel">
                                <small id="paymentForTravel" class="form-text text-muted">Enter travel payment</small>
                            </div>

                            <div class="form-group">
                                <lable for="create">Date of the travel</lable>
                                <input type="text" class="form-control" id="InputID" aria-descripbdby="phoneHelp"
                                       placeholder="2018-12-19" name="dateOfTheTravel">
                                <small id="dateOfTheTravel" class="form-text text-muted">Enter date of the travel</small>
                            </div>

                            <div class="form-group">
                                <lable for="create">Phone number</lable>
                                <input type="text" class="form-control" id="InputID" aria-descripbdby="phoneHelp"
                                       placeholder="88005553535" name="phoneNumber">
                                <small id="phoneNumber" class="form-text text-muted">Enter phone number</small>
                            </div>

                            <div class="form-group">
                                <lable for="create">License number</lable>
                                <input type="text" class="form-control" id="InputID" aria-descripbdby="phoneHelp"
                                       placeholder="1122334455" name="licenseNumber">
                                <small id="licenseNumber" class="form-text text-muted">Enter license number</small>
                            </div>
                            <div class="form-check">
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Confirm</button>
                                </div>
                                {{csrf_field()}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="deleteLable" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="update">Update</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form method="post" action="{{route('update.order')}}">
                            <div class="form-group">
                                <lable for="update">Order number</lable>
                                <input type="text" class="form-control" id="InputID" aria-descripbdby="phoneHelp"
                                       placeholder="1" name="orderNumber">
                                <small id="orderNumber" class="form-text text-muted">Enter order number</small>
                            </div>
                            <div class="form-check">
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Confirm</button>
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