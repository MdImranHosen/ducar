<div class="col-lg-8">
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">

        <?php $i = 0 ?>

      @foreach ($sliderImage as $sliderimg)

        <button type="button" data-bs-target="#carouselExampleIndicators" aria-label="{{ $sliderimg->title }}" data-bs-slide-to="{{ $i }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="{{ $loop->first ? 'true' : '' }}"></button>
        
        <?php $i++ ?>
      @endforeach
      </div>
      <div class="carousel-inner">

      @foreach ($sliderImage as $sliderimg)

        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
          <img src="{{ asset('slider/'.$sliderimg->image_name) }}" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
          <h5>{{ $sliderimg->title }}</h5>
          <p>{{ $sliderimg->description }}</p>
        </div>
        </div>
      @endforeach      


      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
</div>