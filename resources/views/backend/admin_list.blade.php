@extends('backend.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> <i class="fa fa-users"></i> Admin List </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="fa fa-home"></i>Home</a></li>
              <li class="breadcrumb-item active"> <i class="fa fa-users"></i> Admin List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
        <div class="col-lg-6">
           <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> <i class="fa fa-list"></i> Admin List</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  @if(Session::get('success_dl'))
                        <div class="alert alert-success">
                          {{ Session::get('success_dl') }}
                        </div>
                     @endif

                     @if(Session::has('error_dl'))
                     <p class="text-danger">{{ session('error_dl') }}</p>
                     @endif

                  <table class="table table-bordered table-striped table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($admindata as $adata)
                        <tr>
                          <td>{{ $adata->id }}</td>
                          <td>{{ $adata->name }}</td>
                          <td>{{ $adata->email }}</td>
                          <td> 
                            <a href="{{ route('admin.edit', $adata->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            <a href="#deleteModelAdmin{{ $adata->id }}" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash"></i></a>

                            <!-- Modal -->
                              <div class="modal fade" id="deleteModelAdmin{{ $adata->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete?</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form method="post" action="{{ route('admin.delete', $adata->id) }}">
                                        @csrf
                                       <button type="submit" class="btn btn-danger">Permanent Delete</button>
                                      </form>                                      
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancel </button>
                                    </div>
                                  </div>
                                </div>
                              </div>

                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                </div>
            </div>
            <!-- /.card -->
        </div>
        <div class="col-lg-6">
           <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> <i class="fa fa-plus"></i> Admin Add</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('admin.admin_store') }}">

                @include('backend.inc.messages')

                @csrf

                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{ old('name') }}">
                    @error('name') <span class="text-danger"> {{ $message }}  </span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="{{ old('email') }}">
                    @error('email') <span class="text-danger"> {{ $message }}  </span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control" name="password" id="Password" placeholder="Password">
                    @error('password') <span class="text-danger"> {{ $message }}  </span> @enderror
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
        </div><!-- /.row (main row) -->
 </div><!-- /.container-fluid -->
 </section>

@endsection