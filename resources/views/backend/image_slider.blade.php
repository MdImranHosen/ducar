@extends('backend.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> <i class="fa fa-image"></i> Image Slider</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"> <i class="fa fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active"> <i class="fa fa-image"></i> Image Slider</li>
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
        <div class="col-lg-8">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"> <i class="fa fa-list"></i> Slider list</h3>
            </div>
            <div class="card-body">
               @if(Session::get('success_dl'))
                  <div class="alert alert-success">
                    {{ Session::get('success_dl') }}
                  </div>
               @endif

               @if(Session::has('error_dl'))
               <p class="text-danger">{{ session('error_dl') }}</p>
               @endif

              <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Title</th>
                      <th>Sub Title</th>
                      <th> Image </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($sliderImage as $sliderimg)
                    <tr>
                      <td>{{ $sliderimg->id }}</td>
                      <td>{{ $sliderimg->title }}</td>
                      <td>{{ $sliderimg->description }}</td>
                      <td><img src="{{ asset('slider/'.$sliderimg->image_name) }}" style="width:160px;height: auto;"></td>
                      <td> 
                        <a href="{{ route('admin.image-slider-edit', $sliderimg->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        <a href="#deleteModel{{ $sliderimg->id }}" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash"></i></a>

                         <!-- Modal -->
                              <div class="modal fade" id="deleteModel{{ $sliderimg->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete?</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form method="post" action="{{ route('admin.image_slider_delete', $sliderimg->id) }}">
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
          </div>
        </div>

<!-- Slider Image & Title Insert Section  -->
        <div class="col-lg-4">
           <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> <i class="fa fa-plus"></i> Slider Image</h3>
              </div>
              <!-- /.card-header -->
               @include('backend.inc.messages')
              <!-- form start -->
              <form method="POST" action="{{ route('admin.slider_image_store') }}" enctype="multipart/form-data">

                @csrf

                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" value="{{ old('title') }}">
                    @error('title') <span class="text-danger"> {{ $message }}  </span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="description">Sub Title</label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="Enter Sub Title" value="{{ old('description') }}">
                    @error('description') <span class="text-danger"> {{ $message }}  </span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="image_name">Image</label>
                    <input type="file" class="form-control" name="image_name" id="image_name">
                    @error('image_name') <span class="text-danger"> {{ $message }}  </span> @enderror
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