
@extends('layouts.master')
@section('content')

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
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

            <div class="row">
                <div class="col-md-6">
                    <div class="card punch-status">
                        <div class="card-body">
                            <h5 class="card-title">Timesheet <small class="text-muted">11 Mar 2019</small></h5>
                            <div class="punch-det">
                                <h6>Punch In at</h6>
                                @if (isset($firstIn) && $firstIn)
                                    <p>{{ $firstIn->created_at->format('D, jS M Y h.i A') }}</p>
                                @else
                                    <p>Start Your work</p>
                                @endif
                            </div>
                            <div class="punch-info">
                                <div class="punch-hours">
                                    <span id="hours_diff">0.00 hrs</span>
                                </div>
                            </div>
                            @if (isset($currentStatus) && $currentStatus->status == 'in')
                                <div class="punch-btn-section">
                                    <a href="{{ route('attendance/puch_out') }}" class="btn btn-primary punch-btn">Punch Out</a>
                                </div>
                            @else
                                <div class="punch-btn-section">
                                    <a href="{{ route('attendance/puch_in') }}" class="btn btn-primary punch-btn">Punch In</a>
                                </div>
                            @endif
                            <div class="statistics">
                                <div class="row">
                                    <div class="col-md-6 col-6 text-center">
                                        <div class="stats-box">
                                            <p>Break</p>
                                            <h6>{{ $todayTotalBreakTime }} hrs</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-6 text-center">
                                        <div class="stats-box">
                                            <p>Overtime</p>
                                            <h6>{{ $todayOvertime }} hrs</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--  <div class="col-md-4">
                    <div class="card att-statistics">
                        <div class="card-body">
                            <h5 class="card-title">Statistics</h5>
                            <div class="stats-list">
                                <div class="stats-info">
                                    <p>Today <strong>3.45 <small>/ 8 hrs</small></strong></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="stats-info">
                                    <p>This Week <strong>28 <small>/ 40 hrs</small></strong></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="stats-info">
                                    <p>This Month <strong>90 <small>/ 160 hrs</small></strong></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="stats-info">
                                    <p>Remaining <strong>90 <small>/ 160 hrs</small></strong></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="stats-info">
                                    <p>Overtime <strong>4</strong></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  --}}
                <div class="col-md-6">
                    <div class="card recent-activity">
                        <div class="card-body">
                            <h5 class="card-title">Today Activity</h5>
                            <ul class="res-activity-list">
                                @if ($todaysActivity)
                                    @foreach ($todaysActivity as $value)
                                        <li>
                                            @if ($value->status == "in")
                                                <p class="mb-0">Punch In at</p>
                                                @elseif($value->status == "out")
                                                <p class="mb-0">Punch Out at</p>
                                            @endif
                                            <p class="res-activity-time">
                                                <i class="fa fa-clock-o"></i>
                                                {{ \Carbon\Carbon::parse($value->created_at)->format('h:i A') }}.
                                            </p>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search Filter -->
            <div class="row filter-row">
                <div class="col-sm-3">
                    <div class="form-group form-focus">
                        <div class="cal-icon">
                            <input type="text" class="form-control floating datetimepicker">
                        </div>
                        <label class="focus-label">Date</label>
                    </div>
                </div>
                <div class="col-sm-3">
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
                <div class="col-sm-3">
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
                <div class="col-sm-3">
                    <a href="#" class="btn btn-success btn-block"> Search </a>
                </div>
            </div>
            <!-- /Search Filter -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table datatable">
                            <thead>
                                <tr>
                                    <th>Date </th>
                                    <th>Punch In</th>
                                    <th>Punch Out</th>
                                    <th>Production</th>
                                    <th>Break</th>
                                    <th>Overtime</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($dailySummaries)
                                    @foreach ($dailySummaries as $value)
                                        <tr>
                                            <td>{{ $value['date'] }}</td>
                                            <td>{{ $value['firstPunchInTime'] }}</td>
                                            <td>{{ $value['lastPunchOutTime'] }}</td>
                                            <td>{{ $value['totalWorkTime'] }} hrs</td>
                                            <td>{{ $value['totalBreakTime'] }} hrs</td>
                                            <td>{{ $value['overtime'] }} hrs</td>
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

        </div>
        <!-- /Page Content -->


    </div>
    <!-- /Page Wrapper -->
    @section('script')
        <script>
            $(document).ready(function() {
                function updateHoursDiff() {
                    // Get the created_at date from the element
                    var createdAt = "{{ isset($firstIn) && $firstIn->created_at ? $firstIn->created_at : '' }}";

                    if(createdAt){
                        var createdDate = new Date(createdAt);
                        console.log(createdDate);
                        // Get the current date/time
                        var now = new Date();
                        console.log(now);

                        // Calculate the difference in milliseconds
                        var diff = now - createdDate;

                        // Convert the difference to hours and minutes
                        var diffInMinutes = Math.floor(diff / 60000);
                        var hours = Math.floor(diffInMinutes / 60);
                        var minutes = diffInMinutes % 60;

                        // Update the hours_diff element with the calculated difference
                        $('#hours_diff').text(hours+'.'+minutes+'hrs');
                    } else {
                        $('#hours_diff').text(0.00);
                    }
                }

                // Initial call to set the difference
                updateHoursDiff();

                // Update the hours difference every minute
                setInterval(updateHoursDiff, 60000); // 60000 milliseconds = 1 minute
            });
        </script>
    @endsection
@endsection
