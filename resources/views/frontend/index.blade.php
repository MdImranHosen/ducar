@extends('frontend.layouts.app')

@section('content')

<div class="container border border-imran p-0" style="background-color: #fff;">
  <div class="row">
  <!--  Header secation  -->
    @include('frontend.layouts.inc.header')

 <!--  Menu secation  -->
   @include('frontend.layouts.inc.menu')

  <!--  Image slider and Notice secation  -->
   <div class="col-lg-12">
       <div class="row">
        
        @include('frontend.layouts.inc.marquee')

       <!--  Image slider  -->
          @include('frontend.layouts.inc.image_slider')
          
         <!--  Home Notice Board -->
           @include('frontend.layouts.inc.home_notice')

       </div>
   </div>

 <!--  About and News Event secation  -->
 @include('frontend.layouts.inc.home_about_news_event') 

 <!--  Dir Profile secation  -->

@include('frontend.layouts.inc.dir_profile')

 <!--  Footer Secation  -->
@include('frontend.layouts.inc.footer')

 </div> <!--  top Row end  -->
</div> <!-- Container end -->
@endsection
