<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\User;
use App\Models\Listing;
use App\Models\MultiImage;
use App\Models\Facility;
use App\Models\Amenities;
use App\Models\Status;
use App\Helper\Helper;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Haruncpi\LaravelIdGenerator\IdGenerator;




class PropertyController extends Controller
{

    public function property_types()
    {
        return $this->hasOne(PropertyTypeController::class);
    }
    public function user()
    {
        return $this->hasOne(UserController::class);
    }
    public function AllListing()
    {
        $listing = Listing::latest()->get();
//        $property_types = PropertyType::latest()->get();

        return view('backend.property.all_listing', compact('listing'));
    }// End Method


    public function AddListing()
    {
        $type = PropertyType::latest()->get();
        $status = Status::latest()->get();
        $active_agent = User::where('status','active')->where('role','agent')->latest()->get();
        $amenity = Amenities::latest()->get();
        return view('backend.property.add_listing', compact('status','amenity','type','active_agent'));
    }// End Method

    public function StoreListing(Request $request)
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

    public function EditListing($id)
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

    public function UpdateListing(Request $request)
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

    public function UpdateThumbnail(Request $request){
        $pro_id = $request->id;
        $oldImage = $request->old_img;

        // Delete Old Image
        if(file_exists($oldImage)){
            unlink($oldImage);
        }

        // Add New Image
        if($request->file('property_thumbnail')){

            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request->file('property_thumbnail')->getClientOriginalExtension();
            $img = $manager->read($request->file('property_thumbnail'));
            $img = $img->resize(370,250);

            $img->toJpeg(80)->save(base_path('public/upload/listing/thumbnail/'.$name_gen));
            $save_url = 'upload/listing/thumbnail/'.$name_gen;

            Listing::findOrFail($pro_id)->update([
                'property_thumbnail' => $save_url,
                'updated_at'  => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Property Listing Thumbnail Updated!',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }

    } // End Method

    public function UpdateImages(Request $request){
        $manager = new ImageManager(new Driver());
        $imgs = $request->multi_img;

        foreach($imgs as $id => $img){
            // Delete Old Image
            $imgDel = MultiImage::findOrFail($id);
                unlink($imgDel->photo_name);

            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            $make_img = $manager->read($img);
            $make_img = $make_img->resize(770,520);

            $make_img->toJpeg(80)->save(base_path('public/upload/listing/multi-image/'.$make_name));
            $uploadPath = 'upload/listing/multi-image/'.$make_name;

            MultiImage::where('id',$id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'Property Listing Images Updated!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method

    public function DeleteImages($id)
    {
        $oldImg = MultiImage::findOrFail($id);
        unlink($oldImg->photo_name);

        MultiImage::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Property Successfully Images Deleted!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }// End Method

    public function StoreNewImages(Request $request){
        $manager = new ImageManager(new Driver());
        $new_multi = $request->image_id;
        $image = $request->file('multi_img');

        $make_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $make_img = $manager->read($image);
        $make_img = $make_img->resize(770,520);

        $make_img->toJpeg(80)->save(base_path('public/upload/listing/multi-image/'.$make_name));
        $uploadPath = 'upload/listing/multi-image/'.$make_name;

        MultiImage::insert([
            'property_id' => $new_multi,
            'photo_name' => $uploadPath,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Property Listing Image Added!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method

    public function UpdateFacility(Request $request){
        $pid = $request->id;

        $facilities= Count($request->facility_name);

        if($request->facility_name == NULL) {
            return redirect()->back();
        }else{
            Facility::where('property_id',$pid)->delete();

            for ($i = 0; $i < $facilities; $i++) {
                $fcount = new Facility();
                $fcount->property_id = $pid;
                $fcount->facility_name = $request->facility_name[$i];
                $fcount->distance = $request->distance[$i];
                $fcount->save();

            }
        }


            $notification = array(
                'message' => 'Property Listing Facilities Updated!',
                'alert-type' => 'success');


            return redirect()->back()->with($notification);

    } // End Method

    public function DeleteListing($id)
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

    public function DetailsListing($id)
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
    public function DeactivateListing(Request $request)
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
    public function ActivateListing(Request $request)
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

} // End Method


