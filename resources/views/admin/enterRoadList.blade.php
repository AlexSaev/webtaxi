@extends('layouts.admin')

@section('navbar')
    <h1>PPP</h1>
    <form method="post" action="{{route('enter.roadList.info')}}">
        <div class="form-group">
            <lable for="create">Valid from</lable>
            <input type="text" class="form-control" id="InputID" aria-descripbdby="phoneHelp"
                   placeholder="2018-01-19" name="validFrom">
            <small id="carNumber" class="form-text text-muted">Enter road list starting date</small>
        </div>

        <div class="form-group">
            <lable for="create">Valid untill</lable>
            <input type="text" class="form-control" id="InputID" aria-descripbdby="phoneHelp"
                   placeholder="2018-01-29" name="validUntill">
            <small id="carBrand" class="form-text text-muted">Enter road list ending date</small>
        </div>

        <div class="form-group">
            <lable for="create">Car number</lable>
            <input type="text" class="form-control" id="InputID" aria-descripbdby="phoneHelp"
                   placeholder="а777аа777" name="carNumber">
            <small id="licenseNumber" class="form-text text-muted">Enter car number</small>
        </div>

        <div class="form-group">
            <lable for="create">License number</lable>
            <input type="text" class="form-control" id="InputID" aria-descripbdby="phoneHelp"
                   placeholder="1122334455" name="licenseNumber">
            <small id="licenseNumber" class="form-text text-muted">Enter license number</small>
        </div>

        <div>
            <input type="hidden" value="{{$oldListNumber}}" name="oldListNumber">
        </div>

        <div class="form-check">
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
            {{csrf_field()}}
        </div>
    </form>
@endsection