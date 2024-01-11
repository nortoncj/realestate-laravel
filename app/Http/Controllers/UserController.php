<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   public function Index()
   {
       return view('user.profile');
   } // End Method

    public function Settings()
    {
        $id = Auth::user()->id;
        $userData = User::find($id);

        return view('user.settings', compact('userData'));
    } // End Method
    public function UserProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('upload/user_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => "Profile Updated Successfully!",
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method

    public function UserLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => "Logout Successful!",
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    } // End Method

    public function UserChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('user.user_change_password', compact('profileData'));
    }// End Method

    public function UserUpdatePassword(Request $request)
    {
//        Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

//        Match the Old Password
        if(!Hash::check($request->old_password, auth::user()->password)){
            $notification = array(
                'message' => "Old Password Does Not Match!",
                'alert-type' => 'error'
            );

            return back()->with($notification);
        }

//        Update the New Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => "Password Changed!",
            'alert-type' => 'success'
        );

        return back()->with($notification);

    }// End Method

}
