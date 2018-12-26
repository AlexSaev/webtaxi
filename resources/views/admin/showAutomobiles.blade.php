@extends('layouts.admin')

@section('navbar')
    <h1>RABOTAI POZHALUISTA!</h1>
    <h1>Automobiles</h1>
    <table class="table table-hover text-center table-dark" id="table" data-height="100" data-show-columns="true" data-toggle="table" data-search="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-toolbar="#toolbar" data-page-size="50" data-show-columns="true">
        <thead>
        <tr>
            <th scope="col">Car number</th>
            <th scope="col">Car brand</th>
            <th scope="col">Model</th>
            <th scope="col">Color</th>
        </tr>
        </thead>
        <tbody>
        @if($automobiles != NULL)
        @foreach($automobiles as $automobile)
        <tr>
            <td>{{$automobile->car_number}}</td>
            <td>{{$automobile->car_brand}}</td>
            <td>{{$automobile->model}}</td>
            <td>{{$automobile->color}}</td>
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
                        <form method="post" action="{{route('delete.automobile')}}">
                            <div class="form-group">
                                <lable for="create">Car number</lable>
                                <input type="text" class="form-control" id="InputID" aria-descripbdby="phoneHelp"
                                       placeholder="а950ку777" name="carNumber">
                                <small id="carNumber" class="form-text text-muted">Enter car number</small>
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
                        <form method="post" action="{{route('create.automobile')}}">
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
                        <form method="post" action="{{route('update.automobile')}}">
                            <div class="form-group">
                                <lable for="create">Car number</lable>
                                <input type="text" class="form-control" id="InputID" aria-descripbdby="phoneHelp"
                                       placeholder="а950ку777" name="carNumber">
                                <small id="carNumber" class="form-text text-muted">Enter car number</small>
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