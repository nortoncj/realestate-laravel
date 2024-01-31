@extends('agent.agent_dashboard')
@section('page-title', 'Listings')
@section('agent')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{route('agent.add.listing')}}" class="btn btn-primary"> Add Listing</a>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Show All Listings</h6>

                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Listing Name</th>
                                    <th>Property Type</th>
                                    <th>Sale Type</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Thumbnail</th>
                                    <th>Code</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($listing as $key => $item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{$item->property_name}}</td>
                                        <td>{{ $item['property_type']['type_name']}}</td>
                                        <td>For {{$item->property_status}}</td>
                                        <td>{{$item->city}}</td>
                                        <td>{{$item->state}}</td>
                                        <td> <img style="width:70px; height: 40px; border-radius:0;" src="{{asset($item->property_thumbnail)}}" > </td>
                                        <td>{{$item->property_code}}</td>
                                        <td>

                                            {!! $item->status == 1 ? '<span class="badge rounded-pill bg-success">Active</span>' : '<span class="badge rounded-pill bg-danger">Inactive</span>' !!}

                                        </td>
                                        <td>

                                            <a href="{{ route('agent.view.listing', $item->id) }}" class="btn btn-info" title='View'><i data-feather="eye"></i></a>
                                            <a href="{{ route('agent.edit.listing', $item->id) }}" class="btn btn-warning" title='Edit'><i data-feather="edit"></i></a>
                                            <a href="{{ route('agent.delete.listing', $item->id) }}" id="delete" class="btn btn-danger" title='Delete'><i data-feather="trash-2"></i></a>
                                        </td>

                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
