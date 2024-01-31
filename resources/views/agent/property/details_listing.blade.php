@extends('agent.agent_dashboard')
@section('page-title','View Listing')

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

@section('agent')



    <div class="page-content">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Property Details</h6>

                        <div class="table-responsive">
                            <table class="table table-striped">

                                <tbody>
                                <tr>
                                    <td>Property Name</td>
                                    <td><code>{{$listing->property_name}}</code></td>
                                </tr>
                                <tr>
                                    <td>Property Status</td>
                                    <td><code>{{$listing->property_status}}</code></td>
                                </tr>
                                <tr>
                                    <td>Lowest Price</td>
                                    <td><code> {{$listing->lowest_price}} <span>$</span></code></td>
                                </tr>
                                <tr>
                                    <td>Maximum Price</td>
                                    <td><code>{{$listing->max_price}} <span>$</span></code></td>
                                </tr>
                                <tr>
                                    <td>Bedrooms</td>
                                    <td><code>{{$listing->bedrooms}}</code></td>
                                </tr>
                                <tr>
                                    <td>Bathrooms</td>
                                    <td><code>{{$listing->bathrooms}}</code></td>
                                </tr>
                                <tr>
                                    <td>Garage</td>
                                    <td><code>{{$listing->garage}}</code></td>
                                </tr>
                                <tr>
                                    <td>Garage Size</td>
                                    <td><code>{{$listing->garage_size}} <span>Sqft</span></code></td>
                                </tr>

                                <tr>
                                    <td>Address</td>
                                    <td><code>{{$listing->address}}</code></td>
                                </tr>
                                @if(isset($listing->address2))
                                    <tr>
                                        <td>Address 2</td>
                                        <td><code>{{$listing->address2}}</code></td>
                                    </tr>
                                @endif
                                <tr>
                                    <td>City</td>
                                    <td><code>{{$listing->city}}</code></td>
                                </tr>
                                <tr>
                                    <td>State</td>
                                    <td><code>{{$listing->state}}</code></td>
                                </tr>
                                <tr>
                                    <td>ZipCode</td>
                                    <td><code>{{$listing->zip}}</code></td>
                                </tr>
                                <tr>
                                    <td>Thumbnail</td>
                                    <td>
                                        <img style="height: 70px; width: 100px;" class="rounded-0" src="{{ asset($listing->property_thumbnail) }}" alt="thumbnail">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>{!! $listing->status == 1 ? '<span class="badge rounded-pill bg-success">Active</span>' : '<span class="badge rounded-pill bg-danger">Inactive</span>' !!}</td>
                                </tr>






                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">


                        <div class="table-responsive">
                            <table class="table table-striped">

                                <tbody>
                                <tr>
                                    <td>Property Code</td>
                                    <td><code>{{$listing->property_code}}</code></td>
                                </tr>
                                <tr>
                                    <td>Property Size</td>
                                    <td><code>{{$listing->property_size}} <span>Sqft</span></code></td>
                                </tr>
                                <tr>
                                    <td>Property Video</td>
                                    <td><code>{{$listing->property_video}}</code></td>
                                </tr>
                                <tr>
                                    <td>Neighborhood</td>
                                    <td><code>{{$listing->neighborhood}}</code></td>
                                </tr>
                                <tr>
                                    <td>Latitude</td>
                                    <td><code>{{$listing->latitude}}</code></td>
                                </tr>
                                <tr>
                                    <td>Longitude</td>
                                    <td><code>{{$listing->longitude}}</code></td>
                                </tr>
                                <tr>
                                    <td>Property Type</td>
                                    <td><code>{{$listing['property_type']['type_name']}}</code></td>
                                </tr>
                                <tr>
                                    <td>Property Amenities</td>
                                    <td> <select name="amenities_id[]" class="js-example-basic-multiple form-select " multiple="multiple" data-width="100%" data-select2-id="4" tabindex="-1" aria-hidden="true">
                                            @foreach($amenity as $key)
                                                <option value="{{$key->id}}" {{(in_array($key->id,$amenities)) ? 'selected' : ''}} data-select2-id="{{$key->id}}">{{$key->amenities_name}}</option>
                                            @endforeach


                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Agent</td>
                                    <td>
                                        <code>
                                            {!! $listing->agent_id == NULL ? 'Admin' : $listing['user']['name'] !!}
                                        </code>
                                    <td/>
                                </tr>


                                <tr>
                                    <td>Created</td>
                                    <td><code>{{$listing->created_at}}</code></td>
                                </tr>
                                <tr>
                                    <td>Updated</td>
                                    <td><code>{{$listing->updated_at}}</code></td>
                                </tr>


                                </tbody>
                            </table>
                            <br><br>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
