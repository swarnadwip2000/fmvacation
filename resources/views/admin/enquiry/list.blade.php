@extends('admin.layouts.master')
@section('title')
    All Enquiry Details - {{env('APP_NAME')}}
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
                        <h3 class="page-title">Enquiry Information</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('enquiry.index') }}">Enquiry</a></li>
                            <li class="breadcrumb-item active">List</li>
                        </ul>
                    </div>
                    {{-- <div class="col-auto float-end ms-auto">
                        <a href="{{ route('enquiries.create') }}" class="btn add-btn" ><i
                                class="fa fa-plus"></i> Add a Customer</a>
                    </div> --}}
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-0">Enquiry Details</h4>
                            </div>

                        </div>
                    </div>

                    <hr />
                    <div class="table-responsive">
                        <table id="myTable" class="dd table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>  Name</th>
                                    <th>  Email</th>
                                    <th> Phone</th>
                                    <th>Booking Date</th>
                                    <th> Booking From</th>
                                    <th>Booking To</th>
                                    <th>How many adults?</th>
                                    <th>Location</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($enquiries as $key => $enquiry)
                                    <tr>
                                        <td>
                                            {{ $enquiry->name }}
                                        </td>
                                        <td>
                                            {{ $enquiry->email }}
                                        </td>
                                        <td>
                                            {{ $enquiry->phone }}
                                        </td>
                                        <td>
                                            {{ date('d M,Y', strtotime($enquiry->booking_date)) }}
                                        </td>
                                        <td>
                                            {{ date('d M,Y', strtotime($enquiry->booking_from)) }}
                                        </td>
                                        <td>
                                            {{ date('d M,Y', strtotime($enquiry->booking_to)) }}
                                        </td>
                                        <td>
                                            {{ $enquiry->adults }}
                                        </td>
                                        <td>
                                            {{ $enquiry->location }}
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
                    text: "To delete this enquiry.",
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
