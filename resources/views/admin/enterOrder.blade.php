@extends('layouts.admin')

@section('navbar')
    <h1>PPP</h1>
    <form method="post" action="{{route('enter.order.info')}}">
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

        <div>
            <input type="hidden" value="{{$oldOrderNumber}}" name="oldOrderNumber">
        </div>

        <div class="form-check">
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
            {{csrf_field()}}
        </div>
    </form>
@endsection