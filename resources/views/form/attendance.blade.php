
@extends('layouts.master')
@section('content')

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Attendance</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Attendance</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Search Filter -->
            <div class="row filter-row">
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating">
                        <label class="focus-label">Employee Name</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus select-focus">
                        <select class="select floating">
                            <option>-</option>
                            <option>Jan</option>
                            <option>Feb</option>
                            <option>Mar</option>
                            <option>Apr</option>
                            <option>May</option>
                            <option>Jun</option>
                            <option>Jul</option>
                            <option>Aug</option>
                            <option>Sep</option>
                            <option>Oct</option>
                            <option>Nov</option>
                            <option>Dec</option>
                        </select>
                        <label class="focus-label">Select Month</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus select-focus">
                        <select class="select floating">
                            <option>-</option>
                            <option>2019</option>
                            <option>2018</option>
                            <option>2017</option>
                            <option>2016</option>
                            <option>2015</option>
                        </select>
                        <label class="focus-label">Select Year</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <a href="#" class="btn btn-success btn-block"> Search </a>
                </div>
            </div>
            <!-- /Search Filter -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table table-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    @foreach ($dates as $date)
                                        <th>{{ date('d',strtotime($date)) }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($monthlySummaries) && $monthlySummaries)
                                    @foreach ($monthlySummaries as $summary)
                                        <tr>
                                            <td>{{ $summary['employee_name'] }}</td>
                                            @foreach ($dates as $date)
                                                @if($date <= date('Y-m-d'))
                                                    <td class="{{ $summary['attendance'][$date] == 'Present' ? 'present' : 'absent' }}">
                                                        @if ($summary['attendance'][$date] == 'Present')
                                                        <a href="javascript:void(0);" onclick="dayWishReport(`{{ $summary['employee_id'] }}`,`{{ $date }}`)">✔️</a>
                                                        @else
                                                        <span>❌</span>
                                                        @endif
                                                    </td>
                                                @else
                                                    <td>

                                                    </td>
                                                @endif
                                            @endforeach
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

        <!-- Attendance Modal -->
        <div class="modal custom-modal fade" id="attendance_info" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Attendance Info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card punch-status">
                                    <div class="card-body">
                                        <h5 class="card-title">Timesheet <small class="text-muted" id="date">11 Mar 2019</small></h5>
                                        <div class="punch-det">
                                            <h6>Punch In at</h6>
                                            <p id="punch_in">Wed, 11th Mar 2019 10.00 AM</p>
                                        </div>
                                        <div class="punch-info">
                                            <div class="punch-hours">
                                                <span id="total_hours">3.45 hrs</span>
                                            </div>
                                        </div>
                                        <div class="punch-det">
                                            <h6>Punch Out at</h6>
                                            <p id="punch_out">Wed, 20th Feb 2019 9.00 PM</p>
                                        </div>
                                        <div class="statistics">
                                            <div class="row">
                                                <div class="col-md-6 col-6 text-center">
                                                    <div class="stats-box">
                                                        <p>Break</p>
                                                        <h6 id="break_hours">1.21 hrs</h6>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-6 text-center">
                                                    <div class="stats-box">
                                                        <p>Overtime</p>
                                                        <h6 id="overtime_hourse">3 hrs</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card recent-activity">
                                    <div class="card-body">
                                        <h5 class="card-title">Activity</h5>
                                        <ul class="res-activity-list" id="today_activity">
                                            <li>
                                                <p class="mb-0">Punch In at</p>
                                                <p class="res-activity-time">
                                                    <i class="fa fa-clock-o"></i>
                                                    10.00 AM.
                                                </p>
                                            </li>
                                            <li>
                                                <p class="mb-0">Punch Out at</p>
                                                <p class="res-activity-time">
                                                    <i class="fa fa-clock-o"></i>
                                                    11.00 AM.
                                                </p>
                                            </li>
                                            <li>
                                                <p class="mb-0">Punch In at</p>
                                                <p class="res-activity-time">
                                                    <i class="fa fa-clock-o"></i>
                                                    11.15 AM.
                                                </p>
                                            </li>
                                            <li>
                                                <p class="mb-0">Punch Out at</p>
                                                <p class="res-activity-time">
                                                    <i class="fa fa-clock-o"></i>
                                                    1.30 PM.
                                                </p>
                                            </li>
                                            <li>
                                                <p class="mb-0">Punch In at</p>
                                                <p class="res-activity-time">
                                                    <i class="fa fa-clock-o"></i>
                                                    2.00 PM.
                                                </p>
                                            </li>
                                            <li>
                                                <p class="mb-0">Punch Out at</p>
                                                <p class="res-activity-time">
                                                    <i class="fa fa-clock-o"></i>
                                                    7.30 PM.
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Attendance Modal -->

    </div>
    <!-- Page Wrapper -->
    @section('script')
        <script>
            function dayWishReport(id,date){
                $.ajax({
                    url: "{{ route('employee_report') }}",
                    type:'POST',
                    data:{
                            '_token' : "{{ csrf_token() }}",
                            id:id,
                            date:date
                    },
                    success:function(data) {
                        $('#date').html(data.date)
                        $('#punch_in').html(data.firstIn);
                        $('#punch_out').html(data.outTime);
                        $('#total_hours').html(data.todayTotalWorkTime);
                        $('#break_hours').html(data.todayTotalBreakTime);
                        $('#overtime_hourse').html(data.todayOvertime);
                        var html = ``;
                        if(data.todaysActivity){
                            $.each(data.todaysActivity,function(key,value){
                                html+=`<li>`;
                                    if(value.status == "in"){
                                        html+=      `<p class="mb-0">Punch In at</p>`;
                                    } else if(value.status == "out"){
                                        html+=      `<p class="mb-0">Punch Out at</p>`;
                                    }
                                html+=      `<p class="res-activity-time">
                                                <i class="fa fa-clock-o"></i>
                                                `+value.time+`
                                            </p>
                                        </li>`
                            })
                        }
                        $('#today_activity').html(html);
                        $('#attendance_info').modal('show');
                    }
                });
            }
        </script>
    @endsection
@endsection
