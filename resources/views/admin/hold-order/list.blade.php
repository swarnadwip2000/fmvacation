@extends('admin.layouts.master')
@section('title')
    All Holded Order Details - {{env('APP_NAME')}}
@endsection
@push('styles')
<style>
    .dataTables_filter{
        margin-bottom: 10px !important;
    }
</style>
@endpush

@section('content')

    <section id="loading">
        <div id="loading-content"></div>
    </section>
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Holded Order Information</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">Holded Order</a></li>
                            <li class="breadcrumb-item active">List</li>
                        </ul>
                    </div>
                    {{-- <div class="col-auto float-end ms-auto">
                        <a href="{{ route('orders.create') }}" class="btn add-btn" ><i
                                class="fa fa-plus"></i> Add a Customer</a>
                    </div> --}}
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-0">Holded Order Details</h4>
                            </div>

                        </div>
                    </div>

                    <hr />
                    <div class="table-responsive">
                        <table id="myTable" class="dd table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th> Order Number</th>
                                    <th> Package Name</th>
                                    <th>Package Validity</th>
                                    <th> Send To</th>
                                    <th>Send From</th>
                                    <th>Deliver Method</th>
                                    <th>Payment Amount($)</th>
                                    <th>Order Date</th>
                                    <th>Order Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key => $order)
                                    <tr>
                                        <td>
                                            {{ $order->order_number }}
                                        </td>
                                        <td>
                                            {{ $order->package->package_name }}
                                        </td>
                                        <td>
                                            {{ $order->package->package_validity }}
                                        </td>
                                        <td>
                                            {{ $order->send_to }}
                                        </td>
                                        <td>
                                            {{ $order->send_from }}
                                        </td>
                                        <td>
                                            {{ $order->delivery_method }}
                                        </td>
                                        <td>
                                            {{ $order->grand_total }}
                                        </td>
                                        <td>
                                            {{ date('d-m-Y', strtotime($order->created_at)) }}
                                        </td>
                                        <td>
                                           <a href="{{ route('orders.active.order', $order->id) }}"> <button class="btn  btn-action"> Active </button></a>
                                        </td>
                                        <td>
                                            <a href="{{ route('orders.edit', $order->id) }}"> <button class="btn btn-action"> <i class="fas fa-edit"></i> Edit </button></a>
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
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            //Default data table
            $('#myTable').DataTable({
                "aaSorting": [],
                "columnDefs": [{
                        "orderable": false,
                        "targets": [3,4]
                    },
                    {
                        "orderable": true,
                        "targets": [0, 1, 2]
                    }
                ]
            });

        });
    </script>
    <script>
        $(document).on('click', '#delete', function(e) {
            swal({
                    title: "Are you sure?",
                    text: "To delete this order.",
                    type: "warning",
                    confirmButtonText: "Yes",
                    showCancelButton: true
                })
                .then((result) => {
                    if (result.value) {
                        window.location = $(this).data('route');
                    } else if (result.dismiss === 'cancel') {
                        swal(
                            'Cancelled',
                            'Your stay here :)',
                            'error'
                        )
                    }
                })
        });
    </script>
   
@endpush
