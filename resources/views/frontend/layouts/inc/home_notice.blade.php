<div class="col-lg-4">
<div class="card">
  <div class="card-header text-center bg-imran text-white imran_title">
     <span> <i class="fa fa-newspaper-o"></i> Notice </span> 
    </div>
  <ul class="list-group list-group-flush imran_notice">
      @foreach ($notices as $notice)

      <li class="list-group-item"><a href="#"> <i class="fa fa-chevron-right"></i> {{ $notice->title }} </a></li>
      @endforeach
  </ul>
  <div class="card-footer">
    {{ $notices->links('vendor.pagination.bootstrap-4') }}

  </div>
</div>  
</div>