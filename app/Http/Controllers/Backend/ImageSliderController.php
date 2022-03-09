<?php

namespace App\Http\Controllers\Backend;
use App\Models\ImageSlider;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;

class ImageSliderController extends Controller
{   
     protected function validator(array $data){
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ]);
    }

    public function index(){
        return view('backend.image_slider');
    }

    public function create(Request $request){

      $request->validate([
          'title' => ['required', 'string', 'max:255'],
          'description' => ['required', 'string'],
          'image_name' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

        /*$ImageSlider = ImageSlider::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'image_name' => $request['image_name'],
        ]);*/

        $imageSlider = new ImageSlider;
        $imageSlider->title = $request->title;
        $imageSlider->description = $request->description;        

        if ($request->hasFile('image_name')) {
            //insert that image
            $image = $request->file('image_name');
            $img = time().'.'.$image->extension();
            $location = public_path('slider/'.$img);
            Image::make($image)->save($location);

            $imageSlider->image_name = $img;
         }

        $imageSlider->save();

        if ($imageSlider) {
            return back()->with('success','New user has been Successfuly Added to Database!');
        } else{
            return back()->with('error','Somthing went wrong, try again later');
        }
        
        //return redirect()->intended('admin/image-slider');
    }

    public function showdata(){
        $slider_data = ImageSlider::orderBy('id','desc')->get();

        return view('backend.image_slider')->with('sliderImage', $slider_data);
    }

    public function edit($id){

        $slider_data = ImageSlider::find($id);

        return view('backend.image_slider_edit')->with('simge_data', $slider_data); 
    }

    public function update(Request $request, $id){

      $this->validator($request->all())->validate();

        $imageSlider = ImageSlider::find($id);

        $imageSlider->title = $request->title;
        $imageSlider->description = $request->description;        

        if ($request->hasFile('image_name')) {
            //insert that image
            $image = $request->file('image_name');
            $img = time().'.'.$image->extension();
            $location = public_path('slider/'.$img);
            Image::make($image)->save($location);

            $imageSlider->image_name = $img;
         }

        $imageSlider->save();

        if ($imageSlider) {
            return back()->with('success','Slide has been Successfuly Added to Database!');
        } else{
            return back()->with('error','Somthing went wrong, try again later');
        }  
    }
   
   public function delete($id){
     $ImageSlider = ImageSlider::find($id);

     if (!is_null($ImageSlider)) {

        /*if (File::exists(public_path('slider/'.$ImageSlider->image_name))) {
            File::delete(public_path('slider/'.$ImageSlider->image_name));
        }*/

        if (file_exists(public_path().'/slider/'.$ImageSlider->image_name)) {

          unlink("slider/".$ImageSlider->image_name);  
        }

        

       $delete = $ImageSlider->delete();

       if ($delete) {
            return back()->with('success_dl','Slider has been Successfuly Delete to Database!');
        } else{
            return back()->with('error_dl','Somthing went wrong, try again later');
        } 
         
     }  else{
            return back()->with('error_dl','Somthing went wrong, try again later');
        } 
   }

}
