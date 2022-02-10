<?php

namespace App\Http\Controllers\Backend;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{

    
    public function login(){
        return view('backend.login');
    }

     public function index(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];

        return view('backend.index', $data);
    }

    public function admin_list(){
        $data = Admin::orderBy('id', 'desc')->get();

        return view('backend.admin_list')->with('admindata', $data);
    }

    protected function validator(array $data){
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:6'],
        ]);
    }

    public function store(Request $request){

       $this->validator($request->all())->validate();
        $admin = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
           ]);

        /*$admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = $request->password;
        $admin->save();*/

        if ($admin) {
            return back()->with('success','New user has been Successfuly Added to Database!');
        } else{
            return back()->with('error','Somthing went wrong, try again later');
        }
        
       // return redirect()->intended('admin/admin_list');

    }

    public function edit($id){

        $admin_data = Admin::find($id);

        return view('backend.admin_edit')->with('admin_d', $admin_data); 
    }

    public function update(Request $request, $id){

      $request->validate([
           'name'  =>'required|max:255',
           'email' =>'required|email'           
        ]);

        $admin = Admin::find($id);

        $admin->name = $request->name;
        $admin->email = $request->email; 
        $admin->save();

        if ($admin) {
            return back()->with('success','Admin Update has been Successfuly!');
        } else{
            return back()->with('error','Somthing went wrong, try again later');
        }  
    }

  public function delete($id) {

     $admin = Admin::find($id);

     if (!is_null($admin)) {

       $delete = $admin->delete();

       if ($delete) {
            return back()->with('success_dl','Admin has been Successfuly Delete to Database!');
        } else{
            return back()->with('error_dl','Somthing went wrong, try again later');
        } 
         
     }  else{
            return back()->with('error_dl','Somthing went wrong, try again later');
        } 
   }

    public function admin_login(Request $request){

       // return $request->input();
        $request->validate([
           'email'=>'required|email',
           'password'=>'required|min:6|max:32'
        ]);

        $userInfo = Admin::where('email','=',$request->email)->first();

        if (!$userInfo) {
             return back()->with('error','We do not Recogize your email Address');
        } else{
           if (Hash::check($request->password, $userInfo->password)) {
               $request->session()->put('LoggedUser', $userInfo->id);
               $request->session()->put('user_name', $userInfo->name);
               return redirect('admin');
           } else{
            return back()->with('error','Incorrect password');
           }
        }   
    }

    public function logout(){
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');

            return redirect('/admin/login');
        }
    }

   /* 
    Relationship
    
   public function parent(){
        return $this->belongsTo(Admin::class, 'parent_id');
    }*/

   
}
