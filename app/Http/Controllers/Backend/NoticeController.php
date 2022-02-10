<?php

namespace App\Http\Controllers\Backend;

use App\Models\Notices;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Image;

class NoticeController extends Controller
{
    public function index(){
        $notices_data = Notices::orderBy('id','desc')->paginate(8);

        return view('backend.notice')->with('notices', $notices_data);
    }

     public function create(Request $request){

      $request->validate([
          'title' => ['required', 'string', 'max:400'],
          'description' => ['required', 'string'],
          'notice_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

       
        $notice = new Notices;
        $notice->title = $request->title;
        $notice->description = $request->description;
        $notice->admin_name = $request->admin_name;       
        $notice->status = 1;

        if ($request->hasFile('notice_file')) {
            //insert that image
            $image = $request->file('notice_file');
            $img = time().'.'.$image->extension();
            $location = public_path('images/notices/'.$img);
            Image::make($image)->save($location);

            $notice->notice_file = $img;
         }

        $notice->save();

        if ($notice) {
            return back()->with('success','Notice has been Successfuly Added to Database!');
        } else{
            return back()->with('error','Somthing went wrong, try again later');
        }
        
        
    }

     public function edit($id){

        $notice_data = Notices::find($id);

        return view('backend.notice_edit')->with('notice', $notice_data); 
    }

    public function update(Request $request, $id){

      $request->validate([
          'title' => ['required', 'string', 'max:400'],
          'description' => ['required', 'string'],
      ]);

        $notice = Notices::find($id);

        $notice->title = $request->title;
        $notice->description = $request->description;
        $notice->admin_name = $request->admin_name;        

        if ($request->hasFile('notice_file')) {
            //insert that image
            $image = $request->file('notice_file');
            $img = time().'.'.$image->extension();
            $location = public_path('images/notices/'.$img);
            Image::make($image)->save($location);

            $notice->notice_file = $img;
         }

        $notice->save();

        if ($notice) {
            return back()->with('success','Notice has been Successfuly Updated!');
        } else{
            return back()->with('error','Somthing went wrong, try again later');
        }  
    }

    public function delete($id){
     $notice = Notices::find($id);

     if (!is_null($notice)) {

        if (file_exists(public_path().'/images/notices/'.$notice->notice_file)) {

          unlink("images/notices/".$notice->notice_file);  
        }        

       $delete = $notice->delete();

       if ($delete) {
            return back()->with('success_dl','Notice has been Successfuly Delete to Database!');
        } else{
            return back()->with('error_dl','Somthing went wrong, try again later');
        } 
         
     }  else{
            return back()->with('error_dl','Somthing went wrong, try again later');
        } 
   }

}
