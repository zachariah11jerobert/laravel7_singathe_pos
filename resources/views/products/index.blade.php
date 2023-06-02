@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-9">
                <div class="card">
                    <div class="card-header"> 
                        <h4 style="float: left">Add products</h4>
                         <a href="#" style="float: right" class="btn btn-dark"
                          data-togger="modal" data-treget="#addproduct">
                             <i class="fa fa-blus"></i> Add NEw products</a></div>
                        <div class="caed-body">
                            <table class="table table-borderd table-left">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $product)
                                    <tr>
                                        <td>$key </td>
                                        <td>$product->name</td>
                                        <td>$product->email</td>
                                        <td>@if ($product->is_admin == 1) Admin
                                            @else Cashire
                                        @endif</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-info btnt-sm" data-toggle="modal" 
                                                data-target="#editproduct {{ $product->id }}"><i class="fa fa-edit">
                                                    </i>Edit</a>
                                                    <a href="#" class="btn-danger"> <i class="fa fa-trash"></i> Del</a>
                                            </div>
                                        </td>
                                    </tr>

                                    
                                    {{ -- Modal of Edit product Detail--}}

                                <!-- Modal -->
                                <div class="modal left fade" id="editproduct{{ $product->id }} " data-backdrop="static"data-keyboard="" 
                                    aria-labelledby="staticBackdoropLable" aria-hidden="true">   
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="staticBackdropLabel">Edit product</h4>
                                                <button>
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                {{ $product->id }}
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ router('products.update',{{ $product->id }} ) }}" method="post">
                                                @csrf
                                                @method('put')
                                                <div class="form-group">
                                                    <label for="">Name</label>
                                                    <input type="text" name="name" id="" value="{{ $product->name }}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input type="email" name="email" id="" value="{{ $product->email }}"  class="form-control">
                                                </div>
                                                <di class="form-group">
                                                    <label for="">phone</label>
                                                    <input type="text" name="phone" id="" value="{{ $product->phone }}"  class="form-control">
                                                </di v>
                                                <div class="form-group">
                                                    <label for="">Password</label>
                                                    <input type="password" name="password" id="" readonly value="{{ $product->password }}" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Confirm Password</label>
                                                    <input type="password" name="confirm_password" id="" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Role</label>
                                                    <select name="is_admin" id="" class="Form-control">
                                                        <option value="1" @if ($product->is_admin == 1)
                                                            selected
                                                        @endif>Admin</option>
                                                        <option value="2"  @if ($product->is_admin == 1) 
                                                        @endif>Cashire</option>
                                                    </select>
                                                </div>
                                                <div class="modal-Footer">
                                                    <button class="btn btn-warning btn-block">Update 
                                                        product</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                    
                                {{ -- Modal of Edit product Detail--}}

                            <!-- Modal -->
                            <div class="modal left fade" id="editproduct{{ $product->id }} " data-backdrop="static"data-keyboard="" 
                                aria-labelledby="staticBackdoropLable" aria-hidden="true">   
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="staticBackdropLabel">Delete product</h4>
                                            <button>
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            {{ $product->id }}
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ router('products.destroy', $product->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                    <p>Are you sure you want to delete this {{ $product->name}}  ? </p>
                                                <div class="modal-Footer">
                                                    <button class="btn btn-default " data-dismiss="modal"> 
                                                        Cancel</button>

                                                        <button type="submit" class="btn btn-default " > 
                                                        Cancel</button>
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
                                                <div class="card-header"> <h4>Search product</h4> </div>
                                                    <div class="caed-body">
                                                    -------
                                                    </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--- Modal of adding new product --}}

                                    <!-- Modal -->
                                    <div class="modal left fade" id="addproduct" data-backdrop="static"data-keyboard="" 
                                        aria-labelledby="staticBackdoropLable" aria-hidden="true">   
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="staticBackdropLabel">Add product</h4>
                                                    <button>
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ router('products.store') }}" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="Name"></label>
                                                        <input type="text" name="product_name" id="" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Brand</label>
                                                      <input type="text" name="brand" id="" class="form-control">
                                                    </div>
                                                  
                                                    <div class="form-group">
                                                        <label for="">Price</label>
                                                        <input type="number" name="Price" id="" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Quantity</label>
                                                        <input type="password" name="Quantity" id="" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Stock</label>
                                                        <input type="number" name="stock" id="" class="form-control">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="">Description</label>
                                                        <textarea name="description" id="" cols="30" rows="2" class="form-control"></textarea>
                                                    </div>
                                                   
                                                    <div class="modal-Footer">
                                                        <button class="btn btn-primary btn-block">save product</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


        <style>
            .modal.right .modal-dialog{
                /*position: absolute;*/
                top: 0;
                right: 0;
                margin-right: 19vh;
            }

            .modal-dialog:not(.in).right .modal-dialog{
                -webkit-transform: translate3d(25%, 0, 0);
                transform: translate3d(25%, 0, 0);
            }
        </style>

@extends