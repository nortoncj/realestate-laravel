<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    public function AgentDashboard()
    {
        return view('agent.index');
    } // End Method

    public function AgentLogin(){
        return view('agent.agent_login');
    } // End Method

    public function AgentLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => "Logout Successful!",
            'alert-type' => 'success'
        );

        return redirect('/agent/login')->with($notification);
    } // End Method
    public function AgentRegister(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => 'agent',
            'status' => 'inactive',
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::AGENT);
    } // End Method

    public function AgentProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('agent.agent_profile_view', compact('profileData'));
    }// End Method

    public function AgentProfileStore(Request $request)
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
            @unlink(public_path('upload/agent_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/agent_images'),$filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => "Agent Profile Updated Successfully!",
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }// End Method

    public function AgentChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('agent.agent_change_password', compact('profileData'));
    }// End Method

    public function AgentUpdatePassword(Request $request)
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
