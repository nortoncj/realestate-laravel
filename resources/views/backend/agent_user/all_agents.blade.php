@extends('admin.admin_dashboard')
@section('page-title', 'Listings')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{route('add.agent')}}" class="btn btn-primary"> Add Agent</a>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Show All Agent</h6>

                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Change</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($all_agent as $key => $item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td> <img style="width:70px; height: 70px; border-radius:0;" src="{{ (!empty($item->photo)) ? url('upload/agent_images/'.$item->photo) : url('upload/no_image.jpg') }}" > </td>
                                        <td>{{$item->name}}</td>
                                        <td>{{ $item->role}}</td>
                                        <td>

                                            {!! $item->status == 'active' ? '<span class="badge rounded-pill bg-success">Active</span>' : '<span class="badge rounded-pill bg-danger">Inactive</span>' !!}

                                        </td>
                                        <td>
                                            <input data-id="{{ $item->id }}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger"  data-toggle="toggle" data-on="Active" data-off="Inactive" {{ $item->status ? 'checked' : '' }} >
                                        </td>
                                        <td>
{{--                                            <a href="{{ route('view.agent', $item->id) }}" class="btn btn-info" title='View'><i data-feather="eye"></i></a>--}}
                                            <a href="{{ route('edit.agent', $item->id) }}" class="btn btn-warning" title='Edit'><i data-feather="edit"></i></a>

                                            <a href="{{ route('delete.agent', $item->id) }}" id="delete" class="btn btn-danger" title='Delete'><i data-feather="trash-2"></i></a>
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
    <script type="text/javascript">
        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var user_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/changeStatus',
                    data: {'status': status, 'user_id': user_id},
                    success: function(data){
                        // console.log(data.success)

                        // Start Message

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                title: data.success,
                            })

                        }else{

                            Toast.fire({
                                type: 'error',
                                title: data.error,
                            })
                        }

                        // End Message


                    }
                });
            })
        })
    </script>
@endsection
