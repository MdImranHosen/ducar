<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->

@if(Session::get('success'))
    <div class="alert alert-success">
      {{ Session::get('success') }}
    </div>
 @endif

 @if(Session::has('error'))
 <p class="text-danger">{{ session('error') }}</p>
 @endif