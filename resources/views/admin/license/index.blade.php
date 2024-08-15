@extends('layouts.admin')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">License Management</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">License</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" onclick="addNewLicense()"><i class="fa fa-plus"></i> Add</a>
                    </div>
                </div>
            </div>
			<!-- /Page Header -->
            {{-- message --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!! Toastr::message() !!}
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table datatable">
                            <thead>
                                <tr>
                                    <th>Key</th>
                                    <th>Time Period</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key=>$value )
                                <tr>
                                    <td class="Key">{{ $value->key }}</td>
                                    <td class="time_period">{{ $value->valid_day }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
        <div class="modal" id="addNewLicenseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mt-1">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <strong class="valid_day">Time Period<em class="text-danger">*</em></strong>
                                    <select name="valid_day" id="valid_day">
                                        <option value="">Please select plan</option>
                                        <option value="28">1 Month (28 days)</option>
                                        <option value="84">3 Month (84 days)</option>
                                        <option value="180">6 Month (180 days)</option>
                                        <option value="365">1 Year (365 days)</option>
                                    </select>
                                    <div class="text-danger" id="valid_day_error"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn_tile" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn_tile" onclick="submit()">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    @section('script')
    <script>
        function addNewLicense(){
            $('#addNewLicenseModal').modal('show');
        }

        function submit(){
            $('#valid_day_error').html('');
            if($('#valid_day').val() == "") {
                $('#valid_day_error').html('Please select plan');
            } else {
                $.ajax({
                    url: "{{ route('admin.license.store') }}",
                    type:'POST',
                    data:{
                            '_token' : "{{ csrf_token() }}",
                            valid_day:$('#valid_day').val(),
                    },
                    success:function(data) {
                        location.reload();
                    }
                });
            }
        }
    </script>
    @endsection

@endsection
