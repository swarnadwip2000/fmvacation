@extends('admin.layouts.master')
@section('title')
    All Callback Details - {{ env('APP_NAME') }}
@endsection
@push('styles')
    <style>
        .dataTables_filter {
            margin-bottom: 10px !important;
        }

        .new-select {
            border-radius: 20px;
            text-align: center;
            color: #0fa195;
            border-color: #8e959b45;
            height: 27px;
        }

        /* loader */

.loading {
    z-index: 20;
    position: absolute;
    top: 0;
    left:-5px;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.4);
}
.loading-content {
    position: absolute;
    border: 16px solid #f3f3f3;
    border-top: 16px solid #3498db;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    top: 40%;
    left:50%;
    animation: spin 2s linear infinite;
    }
      
    @keyframes  spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* end loader */
    </style>
@endpush
@php
    use App\Helpers\Helper;
@endphp
@section('content')
    <section id="loading">
        <div id="loading-content"></div>
    </section>
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Callback Information</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('callback.index') }}">Callback</a></li>
                            <li class="breadcrumb-item active">List</li>
                        </ul>
                    </div>
                    {{-- <div class="col-auto float-end ms-auto">
                        <a href="{{ route('callbacks.create') }}" class="btn add-btn" ><i
                                class="fa fa-plus"></i> Add a Customer</a>
                    </div> --}}
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-0">Callback Details</h4>
                            </div>

                        </div>
                    </div>

                    <hr />
                    <div class="table-responsive">
                        <table id="myTable" class="dd table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Package Type</th>
                                    <th>Package Validity</th>
                                    <th>Package Price</th>
                                    <th> Name</th>
                                    <th> Email</th>
                                    <th> Phone</th>
                                    <th>Booking Date</th>
                                    <th> Booking From</th>
                                    <th>Booking To</th>
                                    <th>How many adults?</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($callbacks as $key => $callback)
                                    <tr>
                                        <td>
                                            {{ Helper::getOrder($callback->voucher_code)->package->package_name }}
                                        </td>
                                        <td>
                                            {{ Helper::getOrder($callback->voucher_code)->package->package_validity }}
                                        </td>
                                        <td>
                                            {{ Helper::getOrder($callback->voucher_code)->package->package_price }}
                                        </td>
                                        <td>
                                            {{ $callback->name }}
                                        </td>
                                        <td>
                                            {{ $callback->email }}
                                        </td>
                                        <td>
                                            {{ $callback->phone }}
                                        </td>
                                        <td>
                                            {{ date('d M,Y', strtotime($callback->booking_date)) }}
                                        </td>
                                        <td>
                                            {{ date('d M,Y', strtotime($callback->booking_from)) }}
                                        </td>
                                        <td>
                                            {{ date('d M,Y', strtotime($callback->booking_to)) }}
                                        </td>
                                        <td>
                                            {{ $callback->adults }}
                                        </td>
                                        <td>
                                            {{ $callback->location }}
                                        </td>
                                        <td>
                                            <select name="status" id="status" class="new-select status"
                                                data-id="{{ $callback['id'] }}">
                                                <option value="Process"
                                                    {{ $callback['status'] == 'Process' ? 'selected' : '' }}>
                                                    Process</option>
                                                <option value="Accept"
                                                    {{ $callback['status'] == 'Accept' ? 'selected' : '' }}>
                                                    Accept
                                                </option>
                                                <option value="Hold"
                                                    {{ $callback['status'] == 'Hold' ? 'selected' : '' }}>Hold
                                                </option>
                                                <option value="Cancelled"
                                                    {{ $callback['status'] == 'Cancelled' ? 'selected' : '' }}>Cancelled
                                                </option>
                                            </select>
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
                        "targets": [3, 4]
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
                    text: "To delete this callback.",
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
    <script>
        $(document).ready(function() {
            $('.status').change(function() {
                var id = $(this).data('id');
                var status = $(this).val();
                $('#loading').addClass('loading');
                $('#loading-content').addClass('loading-content');
                $.ajax({
                    url: "{{ route('callback.status') }}",
                    type: "POST",
                    data: {
                        id: id,
                        status: status,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                        if (data.status == 'success') {
                            swal({
                                title: "Success",
                                text: "Order status updated successfully",
                                type: "success",
                                confirmButtonText: "Ok",
                                showCancelButton: false
                            })
                        }
                    }
                })
            })
        })
    </script>
@endpush
