<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\User;
use App\Models\Listing;
use App\Models\MultiImage;
use App\Models\Facility;
use App\Models\Amenities;
use App\Models\Status;
use App\Helper\Helper;



class PropertyController extends Controller
{

    public function property_types()
    {
        return $this->hasOne(PropertyTypeController::class);
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
//        Validation
        $request->validate([
            'property_name' => 'required|unique:listings|max:200',
            'address' => 'required|unique:listings|max:200',
            'sale_type'=>"required",
            'city' =>'required',
            'state'=>'required',
            'zip_code'=>'required',
            'bedrooms'=>'required',
            'bathrooms'=>'required',
            'property_types'=>'required',
            'property_size'=>'required'
        ]);

        $listing = new Listing();
        $listing->property_name = $request->get('property_name');
        $listing->sale_type = $request->get('sale_type');
        $listing->address = $request->get('address');
        $listing->address2 = $request->get('address2');
        $listing->city = $request->get('city');
        $listing->state = $request->get('state');
        $listing->zip_code = $request->get('zip_code');
        $listing->property_types = $request->get('property_types');
        $listing->bedrooms = $request->get('bedrooms');
        $listing->bathrooms = $request->get('bathrooms');
        $listing->property_size = $request->get('property_size');
//        create new slug address
        $listing->property_slug = Helper::slugify("{$request->property_name}-{$request->address}-{$request->address2}-{$request->city}-{$request->state}-{$request->zip_code}");

        $listing->save();

        $notification = array(
            'message' => 'Property Listing Saved!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.listing')->with($notification);

    }// End Method

    public function EditListing($id)
    {
        $listing = Listing::findOrFail($id);
        $type = PropertyType::latest()->get();
        $status = Status::latest()->get();
        $agent = User::latest()->get();
        $amenity = Amenities::latest()->get();
        return view('backend.property.edit_listing', compact('listing','type','status','agent','amenity'));

    }// End Method

    public function UpdateListing(Request $request)
    {
        $pid = $request->id;

        PropertyType::findOrFail($pid)->update([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon,
        ]);

        $notification = array(
            'message' => 'Property Listing Updated!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.listing')->with($notification);
    }// End Method

    public function DeleteListing($id)
    {
        PropertyType::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Property Listing Deleted!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }// End Method

}

//        foreach($request->inputs as $key => $value){
//            Listing::create($value);
//        }
//        Listing::insert([
////            'inputs.*.facilities' => $request->facilities,
////            'inputs.*.distance' => $request->distance,
//
//
//        ]);
