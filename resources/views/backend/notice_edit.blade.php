@extends('backend.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> <i class="fa fa-newspaper"></i> Edit Notice </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">              
              <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"> <i class="fa fa-home"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.notice') }}"> <i class="fa fa-newspaper"></i> Notice </a></li>
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
                <h3 class="card-title"> <i class="fa fa-edit"></i> Notice </h3>                
              </div>
              <!-- /.card-header -->
               @include('backend.inc.messages')
              <!-- form start -->
              <form method="POST" action="{{ route('admin.notice_update', $notice->id) }}" enctype="multipart/form-data">

                @csrf

                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" value="{{ $notice->title }}">
                    @error('title') <span class="text-danger"> {{ $message }}  </span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control textarea" name="description" id="description">
                      {{ $notice->description }}
                    </textarea>
                    @error('description') <span class="text-danger"> {{ $message }}  </span> @enderror
                  </div>
                  <div class="form-group">
                    <img src="{{ asset('images/notices/'.$notice->notice_file) }}" style="width:160px;height:auto;border:2px solid #ddd;">
                  </div>
                  <div class="form-group">
                    <label for="notice_file">Image</label>
                    <input type="file" class="form-control" name="notice_file" id="notice_file">
                    @error('notice_file') <span class="text-danger"> {{ $message }}  </span> @enderror
                  </div>
                  <input type="hidden" name="admin_name" value="{{ Session::get('user_name') }}">
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