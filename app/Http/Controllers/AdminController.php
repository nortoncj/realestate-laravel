<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AdminController extends Controller
{
    public function AdminDashboard(){
        return view('admin.index');
    } // End Method

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => "Logout Successful!",
            'alert-type' => 'success'
        );

        return redirect('/admin/login')->with($notification);
    } // End Method

    public function AdminLogin (){


        return view('admin.admin_login');
    }// End Method

    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view', compact('profileData'));
    }// End Method

    public function AdminProfileStore(Request $request)
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
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => "Admin Profile Updated Successfully!",
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }// End Method

    public function AdminChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password', compact('profileData'));
    }// End Method

    public function AdminUpdatePassword(Request $request)
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

    /***************** Agent Controller ***************************************/
    public function AllAgent(){
        $all_agent = User::where('role','agent')->get();

        return view('backend.agent_user.all_agents', compact('all_agent'));
    } // End Method
    public function AddAgent(){


        return view('backend.agent_user.add_agents');
    } // End Method

    public function DeleteAgent($id)
    {
        $user = User::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Agent Deleted!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }// End Method

    public function DetailsAgent($id)
    {
        $facilities = Facility::where('property_id',$id)->get();
        $listing = Listing::findOrFail($id);
        $type = PropertyType::latest()->get();
        $status = Status::latest()->get();
        $active_agent = User::where('status','active')->where('role','agent')->latest()->get();

        $multiImage = MultiImage::where('property_id',$id)->get();

        $amenity = Amenities::latest()->get();
        $amenity_type = $listing->amenities_id;
        $amenities = explode(',', $amenity_type);
        return view('backend.property.details_listing', compact('listing','type','status','active_agent','amenity','amenities','multiImage','facilities'));


    }// End Method

    public function StoreAgent(Request $request)
    {


                User::insert([
                    'name' =>$request->name ,
                    'email'=>$request->email,
                    'phone'=>$request->phone,
                    'address'=>$request->address,
                    'role'=>'agent',
                    'password'=> Hash::make($request->password),
                    'created_at' => Carbon::now(),
                    'status'=>'active',
                ]);





        $notification = array(
            'message' => 'Agent Saved!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.agent')->with($notification);

    }// End Method

    public function EditAgent($id)
    {

        $agent = User::findOrFail($id);


        return view('backend.agent_user.edit_agents', compact('agent'));

    }// End Method

    public function UpdateAgent(Request $request)
    {
        $user_id = $request->id;

        User::findOrFail($user_id)->update([
            'name' =>$request->name ,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'role'=>'agent',
            'password'=> Hash::make($request->password),
            'created_at' => Carbon::now(),
            'status'=>'active',
        ]);





        $notification = array(
            'message' => 'Agent Updated!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.agent')->with($notification);
    }// End Method
    public function ChangeStatus(Request $request)
    {
       $user = User::find($request->user_id);
       $user->status = $request->status;
       $user->save();



        return response()->json(['success'=>'Status Changed']);


    }// End Method

}
