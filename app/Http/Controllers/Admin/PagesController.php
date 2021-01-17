<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller{
  // public function __construct(){
  //   $this->middleware('auth');
  // }

  public function adminView(){
    return view('admin.home');
  }
}
