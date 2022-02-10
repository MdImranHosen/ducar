@extends('backend.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Edit Image Slider </h1>

            <!-- <ol class="breadcrumb float-sm-left">              
              <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"> <i class="fa fa-home"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.image-slider') }}"> <i class="fa fa-image"></i> Image Slider</a></li>
              <li class="breadcrumb-item active"> <i class="fa fa-edit"></i> Edit</li>
            </ol> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">              
              <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"> <i class="fa fa-home"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.image-slider') }}"> <i class="fa fa-image"></i> Image Slider</a></li>
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
                <h3 class="card-title"> <i class="fa fa-edit"></i> Slider Image</h3>                
              </div>
              <!-- /.card-header -->
               @include('backend.inc.messages')
              <!-- form start -->
              <form method="POST" action="{{ route('admin.slider_image_update', $simge_data->id) }}" enctype="multipart/form-data">

                @csrf

                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" value="{{ $simge_data->title }}">
                    @error('title') <span class="text-danger"> {{ $message }}  </span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="description">Sub Title</label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="Enter Sub Title" value="{{ $simge_data->description }}">
                    @error('description') <span class="text-danger"> {{ $message }}  </span> @enderror
                  </div>
                  <div class="form-group">
                    <img src="{{ asset('slider/'.$simge_data->image_name) }}" style="width:160px;height:auto;border:2px solid #ddd;">
                  </div>
                  <div class="form-group">
                    <label for="image_name">Image</label>
                    <input type="file" class="form-control" name="image_name" id="image_name">
                    @error('image_name') <span class="text-danger"> {{ $message }}  </span> @enderror
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