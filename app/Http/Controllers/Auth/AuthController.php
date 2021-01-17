<?php
namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller{
  public function showLoginForm(){
    return view('admin.auth.login');
  }

  // public function processLogin(Request $request){
  //   $request->validate([
  //     'email' => 'required | email',
  //     'password' => 'required',
  //   ]);
  //
  //   $user = $request->except(['_token']);
  //
  //   if(auth()->attempt($user)){
  //     return redirect()->route('adminView');
  //   }
  //   session()->flash('error', 'Invalid Email or Password !');
  //
  //   return back()->withInput();
  // }
}
