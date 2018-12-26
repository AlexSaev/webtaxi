@extends('layouts.admin')

@section('navbar')
    <h1>PPP</h1>
    <form method="post" action="{{route('enter.automobile.info')}}">
        <div class="form-group">
            <lable for="create">Car number</lable>
            <input type="text" class="form-control" id="InputID" aria-descripbdby="phoneHelp"
                   placeholder="а950ку777" name="carNumber">
            <small id="carNumber" class="form-text text-muted">Enter car number</small>
        </div>

        <div class="form-group">
            <lable for="create">Car brand</lable>
            <input type="text" class="form-control" id="InputID" aria-descripbdby="phoneHelp"
                   placeholder="Mersedes-benz" name="carBrand">
            <small id="carBrand" class="form-text text-muted">Enter car brand</small>
        </div>

        <div class="form-group">
            <lable for="create">Model</lable>
            <input type="text" class="form-control" id="InputID" aria-descripbdby="phoneHelp"
                   placeholder="C-class" name="model">
            <small id="licenseNumber" class="form-text text-muted">Enter car model</small>
        </div>

        <div class="form-group">
            <lable for="create">Color</lable>
            <input type="text" class="form-control" id="InputID" aria-descripbdby="phoneHelp"
                   placeholder="black" name="color">
            <small id="licenseNumber" class="form-text text-muted">Enter car color</small>
        </div>

        <div>
            <input type="hidden" value="{{$oldCarNumber}}" name="oldCarNumber">
        </div>

        <div class="form-check">
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
            {{csrf_field()}}
        </div>
    </form>
@endsection