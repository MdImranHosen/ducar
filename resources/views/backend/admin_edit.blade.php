@extends('backend.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Edit Admin </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">              
              <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"> <i class="fa fa-home"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.admin_list') }}"> <i class="fa fa-image"></i> Admin </a></li>
              <li class="breadcrumb-item active"> <i class="fa fa-edit"></i> Edit</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <hr>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">       

<!-- Slider Image & Title Edit Section  -->
        <div class="col-lg-8">
           <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> <i class="fa fa-edit"></i> Edit Admin</h3>                
              </div>
              <!-- /.card-header -->
               @include('backend.inc.messages')
              <!-- form start -->
              <form method="POST" action="{{ route('admin.update', $admin_d->id) }}">

                @csrf

                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{ $admin_d->name }}">
                    @error('name') <span class="text-danger"> {{ $message }}  </span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" value="{{ $admin_d->email }}">
                     @error('email') <span class="text-danger"> {{ $message }}  </span> @enderror
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"> Update </button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>


        </div><!-- /.row (main row) -->
 </div><!-- /.container-fluid -->
 </section>

@endsection