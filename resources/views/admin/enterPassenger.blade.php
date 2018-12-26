@extends('layouts.admin')

@section('navbar')
{{--<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="createLable" aria-hidden="true">--}}
        {{--<div class="modal-dialog" role="document">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<h5 class="modal-title" id="create">Create</h5>--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                        {{--<span aria-hidden="true">&times;</span>--}}
                    {{--</button>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--<div class="container-fluid">--}}
<h1>PPP</h1>
                        <form method="post" action="{{route('enter.passenger.info')}}">
                            <div class="form-group">
                                <lable for="create">PhoneNumber</lable>
                                <input type="text" class="form-control" id="InputID" aria-descripbdby="phoneHelp"
                                       placeholder="88005553535" name="phoneNumber">
                                <small id="phoneNumber" class="form-text text-muted">Enter pasenger phone number</small>
                            </div>
                            <div class="form-group">
                                <lable for="create">Surname</lable>
                                <input type="text" class="form-control" id="InputID" aria-descripbdby="phoneHelp"
                                       placeholder="Ivanov" name="surname">
                                <small id="surname" class="form-text text-muted">Enter passenger surname</small>
                            </div>
                            <div class="form-group">
                                <lable for="create">Name</lable>
                                <input type="text" class="form-control" id="InputID" aria-descripbdby="phoneHelp"
                                       placeholder="Ivan" name="name">
                                <small id="name" class="form-text text-muted">Enter passenger name</small>
                            </div>
                            <div class="form-group">
                                <lable for="create">Patronymic</lable>
                                <input type="text" class="form-control" id="InputID" aria-descripbdby="phoneHelp"
                                       placeholder="Ivanovich" name="patronymic">
                                <small id="patronymic" class="form-text text-muted">Enter passenger patronymic</small>
                            </div>
                            <div class="form-group">
                                <lable for="create">Password</lable>
                                <input type="text" class="form-control" id="InputID" aria-descripbdby="phoneHelp"
                                       placeholder="Password" name="password">
                                <small id="password" class="form-text text-muted">Enter passenger password</small>
                            </div>
                            <div>
                                <input type="hidden" value="{{$oldPhoneNumber}}" name="oldPhoneNumber">
                            </div>
                            <div class="form-check">
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Confirm</button>
                                </div>
                            {{csrf_field()}}
                            </div>
                        </form>
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
    @endsection