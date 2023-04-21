@extends('admin.layouts.master')
@section('title')
    Dashboard - {{ env('APP_NAME') }} admin
@endsection
@push('styles')
@endpush

@section('content')
    @php
        use App\Helpers\Helper;
    @endphp
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome Admin!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                    <a href="{{ route('orders.hold') }}" style="color: black">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="la la-shopping-bag"></i></span>
                                <div class="dash-widget-info">
                                    <h3>{{ $count['hold_order'] }}</h3>
                                    <span>Total hold order</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                    <a href="{{ route('orders.index') }}" style="color: black">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="la la-shopping-cart"></i></span>
                                <div class="dash-widget-info">
                                    <h3>{{ $count['order'] }}</h3>
                                    <span>Total order</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                    <a href="#" style="color: black">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="la la-shopping-cart"></i></span>
                                <div class="dash-widget-info">
                                    <h3>{{ $count['order_this_month'] }}</h3>
                                    <span>Total order this month</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                    <a href="{{ route('customers.index') }}" style="color: black">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                                <div class="dash-widget-info">
                                    <h3>{{ $count['user'] }}</h3>
                                    <span>Total user</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                    <a href="{{ route('customers.index') }}" style="color: black">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="la la-reply"></i></span>
                                <div class="dash-widget-info">
                                    <h3>{{ $count['call_back'] }}</h3>
                                    <span>Total call back </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                    <a href="{{ route('newsletter') }}" style="color: black">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="la la-envelope"></i></span>
                                <div class="dash-widget-info">
                                    <h3>{{ $count['newsletter'] }}</h3>
                                    <span>Total newsletter</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="mb-0">Total call back</h4>

                                    </div>
                                </div>
                            </div>
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

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                {{-- <div class="col-md-12 col-lg-12 col-xl-4 d-flex">
                    <div class="card flex-fill dash-statistics">
                        <div class="card-body">
                            <h5 class="card-title">Statistics</h5>
                            <div class="stats-list">
                                <div class="stats-info">
                                    <p>Today Leave <strong>4 <small>/ 65</small></strong></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 31%"
                                            aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="stats-info">
                                    <p>Pending Invoice <strong>15 <small>/ 92</small></strong></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 31%"
                                            aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="stats-info">
                                    <p>Completed Projects <strong>85 <small>/ 112</small></strong></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 62%"
                                            aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="stats-info">
                                    <p>Open Tickets <strong>190 <small>/ 212</small></strong></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 62%"
                                            aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="stats-info">
                                    <p>Closed Tickets <strong>22 <small>/ 212</small></strong></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 22%"
                                            aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-4 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <h4 class="card-title">Task Statistics</h4>
                            <div class="statistics">
                                <div class="row">
                                    <div class="col-md-6 col-6 text-center">
                                        <div class="stats-box mb-4">
                                            <p>Total Tasks</p>
                                            <h3>385</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-6 text-center">
                                        <div class="stats-box mb-4">
                                            <p>Overdue Tasks</p>
                                            <h3>19</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-purple" role="progressbar" style="width: 30%" aria-valuenow="30"
                                    aria-valuemin="0" aria-valuemax="100">30%</div>
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 22%"
                                    aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">22%</div>
                                <div class="progress-bar bg-success" role="progressbar" style="width: 24%"
                                    aria-valuenow="12" aria-valuemin="0" aria-valuemax="100">24%</div>
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 26%"
                                    aria-valuenow="14" aria-valuemin="0" aria-valuemax="100">21%</div>
                                <div class="progress-bar bg-info" role="progressbar" style="width: 10%"
                                    aria-valuenow="14" aria-valuemin="0" aria-valuemax="100">10%</div>
                            </div>
                            <div>
                                <p><i class="fa fa-dot-circle-o text-purple me-2"></i>Completed Tasks <span
                                        class="float-end">166</span></p>
                                <p><i class="fa fa-dot-circle-o text-warning me-2"></i>Inprogress Tasks <span
                                        class="float-end">115</span></p>
                                <p><i class="fa fa-dot-circle-o text-success me-2"></i>On Hold Tasks <span
                                        class="float-end">31</span></p>
                                <p><i class="fa fa-dot-circle-o text-danger me-2"></i>Pending Tasks <span
                                        class="float-end">47</span></p>
                                <p class="mb-0"><i class="fa fa-dot-circle-o text-info me-2"></i>Review Tasks <span
                                        class="float-end">5</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-4 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <h4 class="card-title">Today Absent <span class="badge bg-inverse-danger ms-2">5</span></h4>
                            <div class="leave-info-box">
                                <div class="media d-flex align-items-center">
                                    <a href="profile.html" class="avatar"><img alt=""
                                            src="assets/img/user.jpg"></a>
                                    <div class="media-body flex-grow-1">
                                        <div class="text-sm my-0">Martin Lewis</div>
                                    </div>
                                </div>
                                <div class="row align-items-center mt-3">
                                    <div class="col-6">
                                        <h6 class="mb-0">4 Sep 2019</h6>
                                        <span class="text-sm text-muted">Leave Date</span>
                                    </div>
                                    <div class="col-6 text-end">
                                        <span class="badge bg-inverse-danger">Pending</span>
                                    </div>
                                </div>
                            </div>
                            <div class="leave-info-box">
                                <div class="media d-flex align-items-center">
                                    <a href="profile.html" class="avatar"><img alt=""
                                            src="assets/img/user.jpg"></a>
                                    <div class="media-body flex-grow-1">
                                        <div class="text-sm my-0">Martin Lewis</div>
                                    </div>
                                </div>
                                <div class="row align-items-center mt-3">
                                    <div class="col-6">
                                        <h6 class="mb-0">4 Sep 2019</h6>
                                        <span class="text-sm text-muted">Leave Date</span>
                                    </div>
                                    <div class="col-6 text-end">
                                        <span class="badge bg-inverse-success">Approved</span>
                                    </div>
                                </div>
                            </div>
                            <div class="load-more text-center">
                                <a class="text-dark" href="javascript:void(0);">Load More</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
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
                        "targets": [0, 1, 2, 3, 4]
                    }
                ]
            });

        });
    </script>
@endpush
