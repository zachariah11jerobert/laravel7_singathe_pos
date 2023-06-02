@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h4 style="fload:left">Add Products</h4>
                            <a href="#" style="float: right" class="btn btn-dark" data-toggle=""
                                data-target="#addProduct">
                                <i class="fa fa plus"></i>Add New Products </a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-left">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>phone</th>
                                        <th>Role</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Products as $key => $Product)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $Product->product_name }}</td>
                                            <td>{{ $Product->brand }}</td>
                                            <td>
                                                @if ($Product->is_admin == 1)
                                                    Admin
                                                @else
                                                    Cashire
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="#" data-toggle="modal" data-target="#editproduct"><i
                                                            class="fa fa-dit">
                                                        </i>Edit</a>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="deleteproduct {{ $Product->id }} "
                                                        class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i>
                                                        Del</a>
                                                </div>
                                            </td>
                                        </tr>

                                        {{-- Modal of Edit user Detail --}}

                                        <!-- Modl -->
                                        <div class="modal right fade" id="edituser{{ $user->id }}"
                                            data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby=""
                                            aria-hidden="trur">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="staticBackdropLabel">Edit user</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('product.update', $user->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('put')
                                                            <div class="form-group">
                                                                <label for="">Name</label>
                                                                <input type="text" name="name" id=""
                                                                    value="{{ $user->name }}" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Email</label>
                                                                <input type="email" name="email" id=""
                                                                    value="{{ $user->email }}" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">phone</label>
                                                                <input type="text" name="phone" id=""
                                                                    value="{{ $user->phone }}" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Password</label>
                                                                <input type="Password" name="Password" readonly
                                                                    value="{{ $user->password }}" id=""
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Confirm Password</label>
                                                                <input type="Password" name="Confirm Password"
                                                                    id="" class="form-control"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Role</label>
                                                                <select name="is_ddmin" id="" class="form-control">
                                                                    <option value="1"
                                                                        @if ($user->is_admin == 1) selected @endif>
                                                                        Admin
                                                                    </option>
                                                                    <option value="2"
                                                                        @if ($user->is_admin == 2) selected @endif>
                                                                        Cashire
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-warning btn-block">Updata
                                                                    product</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Modal of Edit Products Detail --}}

                                        <!-- Modl -->
                                        <div class="modal right fade" id="deleteproduct{{ $Products->id }}"
                                            data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby=""
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="staticBackdropLabel">Edit Products</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('product.destroy', $user->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <p>Are you user you want to delete this {{ Products->name }}
                                                            </p>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-default" data-dismiss="modal">
                                                                    Cancel</button>

                                                                <button class="btn btn-danger">
                                                                    delete</button>
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
                            <h4>Search Products</h4>
                        </div>
                        <div class="card-body">
                            ---------------
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal of adding new Products-- --}}

    <!-- Model -->
    <div class="modal right fade" id="adduer" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="staticBackdropLabel">Add Products</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.updata') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="Products_name" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">phone</label>
                            <input type="text" name="phone" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="Password" name="Password" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="Password" name="Confirm Password" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Role</label>
                            <select name="is_ddmin" id="" class="form-control">
                                <option value="1">Admin</option>
                                <option value="2">Cashire</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-praimry btn-block">Save User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal of Edit Products Detail-- --}}

    <!-- Modl -->
    <div class="modal right fade" id="edituser" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="staticBackdropLabel">Edit user</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.updata', 1) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">phone</label>
                            <input type="text" name="phone" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="Password" name="Password" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="Password" name="Confirm Password" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Role</label>
                            <select name="is_ddmin" id="" class="form-control">
                                <option value="1">Admin</option>
                                <option value="2">Cashire</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-praimry btn-block">Save User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <style>
        .modal.right .moda-dialog {
            /* position: absolute; */
            top: 0;
            right: 0;
            margin-right: 20vh;
        }

        .modal.fade:not(.in).right .modal-dialog {
            -webkit-transform: translate3d(25%, 0, 0);
            transform: translate3d(25%, 0, 0);
        }
    </style>
@endsection
