<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use Image;

class UserController extends Controller
{
  // Get User
  public function userView(){
    $getUser = User::get();
    return view('admin.userManager')->with('user', $getUser);
  }

  // Add User
  public function addUser(){
    return view('admin.createUser');
  }

  // User Details
  public function userDetails($requestId){
    $userDetails = User::where('id', $requestId)->first();
    return view('admin.userDetails')->with('userDetails', $userDetails);
  }

  // Edit User
  public function editUseer($requestId){
    $editUser = User::where('id', $requestId)->first();
    return view('admin.editUser')->with('editUser', $editUser);
  }

  // Storing User Info in the Database
  public function storeUser(Request $request){
    //Validation Part
    $request->validate([
      'firstName' => 'required',
      'lastName' => 'required',
      'email' => 'required|email',
      'profilePhoto' => 'required|image',
      'password' => 'required', 'string', 'min:8', 'confirmed',
      'role' => 'not_in:0',
    ]);

    // Image file processing
    $getUserPhoto = $request->file('profilePhoto');
    $photoName = time() . '.' . $getUserPhoto->getClientOriginalExtension();
    $setLocation = public_path('images/userPhoto/' . $photoName);

    Image::make($getUserPhoto)->resize(120, 120)->save($setLocation);

    // User created Object
    $storeUser = new User;

    $storeUser->first_name = $request->firstName;
    $storeUser->last_name = $request->lastName;
    $storeUser->email = $request->email;
    $storeUser->link = $photoName;
    $storeUser->password = Hash::make($request->password);
    $storeUser->role_id = $request->role;

    $storeUser->save();

    // Success message
    session()->flash('success', 'User Added Successfully.');

    return redirect()->route('userView');
  }


  // Updating User in the Database
  public function updatedUser(Request $request, $requestId){
    //Validation Part
    $request->validate([
      'firstName' => 'required',
      'lastName' => 'required',
      'email' => 'required|email',
      'profilePhoto' => 'sometimes|image',
      'password' => 'required', 'string', 'min:8', 'confirmed',
      'role' => 'not_in:0',
    ]);

    $updatedUser = User::where('id', $requestId)->first();

    $updatedUser->first_name = $request->firstName;
    $updatedUser->last_name = $request->lastName;
    $updatedUser->email = $request->email;
    $updatedUser->password = Hash::make($request->password);
    $updatedUser->role_id = $request->role;

    // Add the updated photo
    if($request->file('profilePhoto')){
      // Delete the old photo
      if(file_exists('images/userPhoto/' . $updatedUser->link) AND !empty($updatedUser->link)){
        unlink(public_path('images/userPhoto/' . $updatedUser->link));
      }

      // processing new photo
      $getUserPhoto = $request->file('profilePhoto');
      $photoName = time() . '.' . $getUserPhoto->getClientOriginalExtension();
      $setLocation = public_path('images/userPhoto/' . $photoName);

      Image::make($getUserPhoto)->resize(120, 120)->save($setLocation);

      // Updated the new photo
      $updatedUser->link = $photoName;
    }

    $updatedUser->save();

    // Success message
    session()->flash('success', 'User Updated Successfully.');

    return redirect()->route('userView');
  }

  // Delete the User
  public function deleteUser($requestId){
    $deleteUser = User::where('id', $requestId)->first();

    if(!is_null($deleteUser)){
      if(file_exists('images/userPhoto/' . $deleteUser->link) AND !empty($deleteUser->link)){
        unlink(public_path('images/userPhoto/' . $deleteUser->link));
      }

      $deleteUser->delete();
    }

    return redirect()->route('userView');
  }
}
