<?php

namespace App\Http\Controllers\Frontend;
use App\Models\ImageSlider;
use App\Models\Notices;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $notices_data = Notices::orderBy('id','desc')->paginate(6);

        $slider_data = ImageSlider::orderBy('id','desc')->get();

        return view('frontend.index')->with('notices', $notices_data)->with('sliderImage', $slider_data);
    }
    
}


