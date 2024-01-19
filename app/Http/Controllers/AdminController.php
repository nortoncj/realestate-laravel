<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $all_agent = User::where('role','agent')->get();

        return view('backend.agent_user.all_agents', compact('all_agent'));
    } // End Method

    public function DeleteAgent($id)
    {
        $listing = PropertyType::findOrFail($id);
        unlink($listing->property_thumbnail);

        PropertyType::findOrFail($id)->delete();

        $image = MultiImage::where('property_id',$id)->get();

        foreach ($image as $img) {
            unlink($img->photo_name);
            MultiImage::where('property_id',$id)->delete();
        }

        $facilities = Facility::where('property_id',$id)->get();

        foreach ($facilities as $item){
            unlink($item->facility_name);
            MultiImage::where('property_id',$id)->delete();
        }

        $notification = array(
            'message' => 'Property Listing Deleted!',
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

        if($request->file('property_thumbnail')){

            $amen = $request->amenities_id;
            $amenities = implode(",", $amen);

            $pcode = IdGenerator::generate(['table' => 'listings', 'field' => 'property_code','length' =>5, 'prefix' => 'PC']);


            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request->file('property_thumbnail')->getClientOriginalExtension();
            $img = $manager->read($request->file('property_thumbnail'));
            $img = $img->resize(370,250);

            $img->toJpeg(80)->save(base_path('public/upload/listing/thumbnail/'.$name_gen));
            $save_url = 'upload/listing/thumbnail/'.$name_gen;

            $listing_id = Listing::insertGetId([
                'ptype_id' => $request->property_type,
                'amenities_id' => $amenities,
                'property_name' => $request->property_name,
                'property_slug' => Helper::slugify("{$request->property_name}-{$request->address}-{$request->address2}-{$request->city}-{$request->state}-{$request->zip_code}"),
                'property_code' => $pcode,
                'property_status' => $request->property_status,
                'lowest_price' => $request->lowest_price,
                'max_price' => $request->highest_price,
                'property_thumbnail' => $save_url,
                'short_desc' => $request->short_desc,
                'long_desc' => $request->tinymce,
                'bedrooms' => $request->bedrooms,
                'bathrooms' => $request->bathrooms,
                'garage' => $request->garage,
                'garage_size'  => $request->garage_size,
                'property_size'  => $request->property_size,
                'property_video'  => $request->video,
                'address'  => $request->address,
                'address2'  => $request->address2,
                'city'  => $request->city,
                'state'  => $request->state,
                'zip'  => $request->zip,
                'neighborhood'  => $request->neighborhood,
                'latitude'  => $request->latitude,
                'longitude'  => $request->longitude,
                'is_featured'  => $request->is_featured,
                'is_hot'  => $request->is_hot,
                'agent_id'  => $request->agent_id,
                'status'  => 1,
                'created_at'  => Carbon::now(),


            ]);

        }

        // Insert Multiple Images
        if ($request->file('multi_img')) {
            $manager = new ImageManager(new Driver());
            $image = $request->file('multi_img');




            foreach($image as $img) {
                $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                $make_img = $manager->read($img);
                $make_img = $make_img->resize(770,520);

                $make_img->toJpeg(80)->save(base_path('public/upload/listing/multi-image/'.$make_name));
                $uploadPath = 'upload/listing/multi-image/'.$make_name;

                MultiImage::insert([
                    'property_id' => $listing_id,
                    'photo_name' => $uploadPath,
                    'created_at' => Carbon::now(),
                ]);
            } // End Foreach

            // End Multiple Image Upload //

//            Facilities Add

            $facilities= Count($request->facility_name);

            if($facilities != NULL) {
                for($i=0; $i < $facilities; $i++){
                    $fcount = new Facility();
                    $fcount->property_id = $listing_id;
                    $fcount->facility_name = $request->facility_name[$i];
                    $fcount->distance = $request->distance[$i];
                    $fcount->save();
                }
            }

        }

        $notification = array(
            'message' => 'Property Listing Saved!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.listing')->with($notification);

    }// End Method

    public function EditAgent($id)
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
        return view('backend.property.edit_listing', compact('listing','type','status','active_agent','amenity','amenities','multiImage','facilities'));

    }// End Method

    public function UpdateAgent(Request $request)
    {
        $amen = $request->amenities_id;
        $amenities = implode(",", $amen);

        $listing_id = $request->id;

        Listing::findOrFail($listing_id)->update([
            'ptype_id' => $request->property_type,
            'amenities_id' => $amenities,
            'property_name' => $request->property_name,
            'property_slug' => Helper::slugify("{$request->property_name}-{$request->address}-{$request->address2}-{$request->city}-{$request->state}-{$request->zip_code}"),
            'property_status' => $request->property_status,
            'lowest_price' => $request->lowest_price,
            'max_price' => $request->highest_price,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->tinymce,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'garage' => $request->garage,
            'garage_size'  => $request->garage_size,
            'property_size'  => $request->property_size,
            'property_video'  => $request->video,
            'address'  => $request->address,
            'address2'  => $request->address2,
            'city'  => $request->city,
            'state'  => $request->state,
            'zip'  => $request->zip,
            'neighborhood'  => $request->neighborhood,
            'latitude'  => $request->latitude,
            'longitude'  => $request->longitude,
            'is_featured'  => $request->is_featured,
            'is_hot'  => $request->is_hot,
            'agent_id'  => $request->agent_id,
            'updated_at'  => Carbon::now(),
        ]);


        $notification = array(
            'message' => 'Property Listing Updated!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.listing')->with($notification);
    }// End Method
    public function DeactivateAgent(Request $request)
    {
        $pid = $request->id;

        Listing::findOrFail($pid)->update([
            'status' => 0,
        ]);


        $notification = array(
            'message' => 'Property Successfully Deactivated!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.listing')->with($notification);


    }// End Method
    public function ActivateAgent(Request $request)
    {
        $pid = $request->id;

        Listing::findOrFail($pid)->update([
            'status' => 1,
        ]);


        $notification = array(
            'message' => 'Property Successfully Activated!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.listing')->with($notification);

    }// End Method
}
