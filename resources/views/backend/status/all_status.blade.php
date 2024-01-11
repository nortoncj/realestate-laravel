@extends('admin.admin_dashboard')
@section('page-title','Status')
@section('admin')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{route('add.status')}}" class="btn btn-primary"> Add Property Status</a>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Property Status All</h6>

                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Status Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($status as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{$item->status_name}}</td>
                                    <td>
                                        <a href="{{ route('edit.status', $item->id) }}" class="btn btn-warning">Edit</a>
                                        <a href="{{ route('delete.status', $item->id) }}" id="delete" class="btn btn-danger">Delete</a>
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
