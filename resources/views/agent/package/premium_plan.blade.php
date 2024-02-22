@extends('agent.agent_dashboard')
@section('page-title', 'Agent')
@section('agent')
    @php
        $id = Auth::user()->id;
        $data = App\Models\User::find($id);
    @endphp
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="page-content">

        <nav class="page-breadcrumb">

        </nav>

        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{route('store.premium.plan')}}">
                    @csrf
                    <div class="card">

                        <div class="card-body">
                            <div class="container-fluid d-flex justify-content-between">
                                <div class="col-lg-3 ps-0">
                                    <a href="#" class="noble-ui-logo logo-light d-block mt-3">Data<span>Door</span></a>
                                    <p class="mt-1 mb-1"><b>DataDoor</b></p>
                                    <p>108,<br> Great Russell St,<br>Rochester, NY</p>
                                    <h5 class="mt-5 mb-2 text-muted">Invoice to :</h5>
                                    <p>{{ $data->name }},<br>{{ $data->email }},<br> {{$data->address}}<br> {{$data->address2}}<br></p>
                                </div>
                                <div class="col-lg-3 pe-0">
                                    <h4 class="fw-bolder text-uppercase text-end mt-4 mb-2">invoice</h4>
                                    <h6 class="text-end mb-5 pb-4"> </h6>
                                    <p class="text-end mb-1">Balance Due</p>
                                    <h4 class="text-end fw-normal">$ 50.00</h4>
                                    <h6 class="mb-0 mt-3 text-end fw-normal mb-2"><span class="text-muted"> </span> </h6>
                                    <h6 class="text-end fw-normal"><span class="text-muted"> </span> </h6>
                                </div>
                            </div>
                            <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                                <div class="table-responsive w-100">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Package</th>
                                            <th class="text-end">Property Qty</th>
                                            <th class="text-end">Unit cost</th>
                                            <th class="text-end">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="text-end">
                                            <td class="text-start">10</td>
                                            <td class="text-start">Premium</td>
                                            <td>10</td>
                                            <td>$20</td>
                                            <td>$20</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="container-fluid mt-5 w-100">
                                <div class="row">
                                    <div class="col-md-6 ms-auto">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <td>Sub Total</td>
                                                    <td class="text-end">$ 50.00</td>
                                                </tr>
                                                {{--                                            <tr>--}}
                                                {{--                                                <td>TAX (12%)</td>--}}
                                                {{--                                                <td class="text-end">$ 1,788.00</td>--}}
                                                {{--                                            </tr>--}}
                                                <tr>
                                                    <td class="text-bold-800">Total</td>
                                                    <td class="text-bold-800 text-end"> $ 50.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Payment Made</td>
                                                    <td class="text-danger text-end">(-) $ 50.00</td>
                                                </tr>
                                                <tr class="bg-light">
                                                    <td class="text-bold-800">Balance Due</td>
                                                    <td class="text-bold-800 text-end">$ 50.00</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid w-100">
                                <button type="submit"  class="btn btn-primary float-end mt-4 ms-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send me-3 icon-md"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>Send Invoice</button>
                                {{--                            <a href="javascript:;" class="btn btn-outline-primary float-end mt-4"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer me-2 icon-md"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>Print</a>--}}
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
