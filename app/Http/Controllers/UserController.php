<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    //
    public function showChangePasswordForm()
    {
        return view('myprofil.changepassword'); 
    }
    public function changePassword(Request $request){
        if (!(Hash::check($request->get('current-password'), 
        Auth::user()->password))) {
        // The passwords matches
        return redirect()->back()->with("error","Your current password does 
        not matches with the password you provided. Please try again.");
        }
 if(strcmp($request->get('current-password'), 
 $request->get('new-password')) == 0){
 //Current password and new password are same
 return redirect()->back()->with("error","New Password cannot be 
 same as your current password. Please choose a different 
 password.");
 }
 if(!(strcmp($request->get('new-password'), 
 $request->get('new-password_confirmation')))==0){
 //New password and confirm password are not same
 return redirect()->back()->with("error","New Password should be 
same as your confirmed password. Please retype new password.");
 }
 //Change Password
 $user = Auth::user();
 $user->password = bcrypt($request->get('new-password'));
 $user->save();
 return redirect()->back()->with("success","Password changed 
successfully !");
 }
       
    Public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login');
    }
}
