@extends('layouts.app') @section('content')

<div class="container">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float: left">Add User</h4>
                        <a href="#" style="float: right" class="btn btn-dark" data-toggle="modal" data-target="#addUser">
                            <i class="fa fa-plus"></i> Add New Users</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-left">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if ($user->is_admin == 1)
                                        Admin
                                        @else
                                        Cashire
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editUser {{ $user->id }}"><i class="fa fa-edit"> </i>Edit</a>
                                            <a href="#" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
                                                Delete</a>
                                        </div>
                                    </td>
                                </tr>

                                {{ -- Modal of Edit User Detail--}}

                                <!-- Modal -->
                                <div class="modal left fade" id="editUser{{ $user->id }} " data-backdrop="static" data-keyboard="" aria-labelledby="staticBackdoropLable" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="staticBackdropLabel">
                                                    Edit User
                                                </h4>
                                                <button>
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                {{ $user->id }}
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ router('users.update',{{ $user->id }} ) }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="form-group">
                                                        <label>
                                                            >Name</label>
                                                        <input type="text" name="name" id="" value="{{ $user->name }}" class="form-control" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            >Email</label>
                                                        <input type="email" name="email" id="" value="{{ $user->email }}" class="form-control" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            phone</label>
                                                        <input type="text" name="phone" id="" value="{{ $user->phone }}" class="form-control" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            Password</label>
                                                        <input type="password" name="password" id="" readonly value="{{ $user->password }}" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Confirm Password
                                                        </label>
                                                        <input type="password" name="confirm_password" id="" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            Role</label>
                                                        <select name="is_admin" id="" class="Form-control">
                                                            <option value="1" @if ($user->
                                                                is_admin == 1)
                                                                selected
                                                                @endif>Admin
                                                            </option>
                                                            <option value="2" @if ($user->
                                                                is_admin == 1)
                                                                @endif>Cashire
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="modal-Footer">
                                                        <button class="btn btn-warning btn-block">
                                                            Update User
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{ -- Modal of Edit User Detail--}}

                                <!-- Modal -->
                                <div class="modal left fade" id="editUser{{ $user->id }} " data-backdrop="static" data-keyboard="" aria-labelledby="staticBackdoropLable" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="staticBackdropLabel">
                                                    Delete User
                                                </h4>
                                                <button>
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                {{ $user->id }}
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ router('users.destroy', $user->id) }}" method="post">
                                                    @csrf @method('delete')
                                                    <p>
                                                        Are you sure you want to
                                                        delete this {{
                                                        $user->name}} ?
                                                    </p>
                                                    <div class="modal-Footer">
                                                        <button class="btn btn-default" data-dismiss="modal">
                                                            Cancel
                                                        </button>

                                                        <button type="submit" class="btn btn-default">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Search user</h4>
                    </div>
                    <div class="card-body">-------</div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--- Modal of adding new user --}}

<!-- Modal -->
<div class="modal right fade" id="addUser" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdoropLable" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Add User</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ router('users.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" id="" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" id="" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" id="" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="confirm_password" id="" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="is_admin" id="" class="form-control">
                            <option value="1">Admin</option>
                            <option value="2">Cashire</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-block">
                            Save User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .modal.right .modal-dialog {
        /*position: absolute;*/
        top: 0;
        right: 0;
        margin-right: 19vh;
    }

    .modal.fade:not(.in).right .modal-dialog {
        -webkit-transform: translate3d(25%, 0, 0);
        transform: translate3d(25%, 0, 0);
    }
</style>

@endsection