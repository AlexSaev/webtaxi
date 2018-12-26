@extends('layouts.admin')

@section('navbar')
    <h1>RABOTAI POZHALUISTA!</h1>
    <h1>Passengers</h1>
    <table class="table table-hover text-center table-dark" id="table" data-height="100" data-show-columns="true" data-toggle="table" data-search="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-toolbar="#toolbar" data-page-size="50" data-show-columns="true">
        <thead>
        <tr>
            <th scope="col">Phone number</th>
            <th scope="col">Surname</th>
            <th scope="col">Name</th>
            <th scope="col">Patronymic</th>
            <th scope="col">Password</th>
        </tr>
        </thead>
        <tbody>
        @if($passengers != NULL)
        @foreach($passengers as $passenger)
        <tr>
            <td>{{$passenger->phone_number}}</td>
            <td>{{$passenger->surname}}</td>
            <td>{{$passenger->name}}</td>
            <td>{{$passenger->patronymic}}</td>
            <td>{{$passenger->password}}</td>
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
                        <form method="post" action="{{route('delete.passenger')}}">
                            <div class="form-group">
                                <lable for="delete">PhoneNumber</lable>
                                <input type="text" class="form-control" id="InputID" aria-descripbdby="phoneHelp"
                                       placeholder="88005553535" name="phoneNumber">
                                <small id="phoneNumber" class="form-text text-muted">Enter passenger phone number</small>
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

    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="createLable" aria-hidden="true">
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
                        <form method="post" action="{{route('create.passenger')}}">
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

    <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="updateLable" aria-hidden="true">
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
                        <form method="post" action="{{route('update.passenger')}}">
                            <div class="form-group">
                                <lable for="update">PhoneNumber</lable>
                                <input type="text" class="form-control" id="InputID" aria-descripbdby="phoneHelp"
                                       placeholder="88005553535" name="phoneNumber">
                                <small id="phoneNumber" class="form-text text-muted">Enter passenger phone number</small>
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