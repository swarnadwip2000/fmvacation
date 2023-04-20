@extends('admin.layouts.master')
@section('title')
    All Newsletter Details - {{env('APP_NAME')}}
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
                        <h3 class="page-title">Newsletter Information</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('newsletter.index') }}">Newsletter</a></li>
                            <li class="breadcrumb-item active">List</li>
                        </ul>
                    </div>
                    {{-- <div class="col-auto float-end ms-auto">
                        <a href="{{ route('newsletters.create') }}" class="btn add-btn" ><i
                                class="fa fa-plus"></i> Add a Customer</a>
                    </div> --}}
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-0">Newsletter Details</h4>
                            </div>

                        </div>
                    </div>

                    <hr />
                    <div class="table-responsive">
                        <table id="myTable" class="dd table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>  #Id</th>
                                    <th>  Email</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($newsletters as $key => $newsletter)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>
                                        <td>
                                            {{ $newsletter->email }}
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
                        "targets": []
                    },
                    {
                        "orderable": true,
                        "targets": [0, 1]
                    }
                ]
            });

        });
    </script>
   
   
@endpush
