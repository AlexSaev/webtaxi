@extends('layouts.admin')

@section('navbar')
    <h1>PPP</h1>
    <form method="post" action="{{route('enter.driver.info')}}">
        <div class="form-group">
            <lable for="create">LicenseNumber</lable>
            <input type="text" class="form-control" id="InputID" aria-descripbdby="phoneHelp"
                   placeholder="88005553535" name="licenseNumber">
            <small id="licenseNumber" class="form-text text-muted">Enter driver license number</small>
        </div>
        <div class="form-group">
            <lable for="create">Surname</lable>
            <input type="text" class="form-control" id="InputID" aria-descripbdby="phoneHelp"
                   placeholder="Ivanov" name="surname">
            <small id="surname" class="form-text text-muted">Enter driver surname</small>
        </div>
        <div class="form-group">
            <lable for="create">Name</lable>
            <input type="text" class="form-control" id="InputID" aria-descripbdby="phoneHelp"
                   placeholder="Ivan" name="name">
            <small id="name" class="form-text text-muted">Enter driver name</small>
        </div>
        <div class="form-group">
            <lable for="create">Patronymic</lable>
            <input type="text" class="form-control" id="InputID" aria-descripbdby="phoneHelp"
                   placeholder="Ivanovich" name="patronymic">
            <small id="patronymic" class="form-text text-muted">Enter driver patronymic</small>
        </div>
        <div class="form-group">
            <lable for="create">Password</lable>
            <input type="text" class="form-control" id="InputID" aria-descripbdby="phoneHelp"
                   placeholder="Password" name="password">
            <small id="password" class="form-text text-muted">Enter driver password</small>
        </div>
        <div>
            <input type="hidden" value="{{$oldLicenseNumber}}" name="oldLicenseNumber">
        </div>
        <div class="form-check">
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
            {{csrf_field()}}
        </div>
    </form>
@endsection