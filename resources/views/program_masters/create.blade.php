@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- PAGE HEADER -->
    <div class="page-header">
        <h1 class="page-title">Assign Fees to Program</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Assign Program</li>
        </ol>
    </div>
    <!-- PAGE HEADER END -->

    <!-- FORM CARD -->
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card custom-card">
                <div class="card-header">
                    <h3 class="card-title">Program Information</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ url('program-masters') }}" method="POST">
                        @csrf
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="center_id" class="form-label">Center Name <span class="text-danger">*</span></label>
                                <select id="center" name="center_id" class="form-control" required>
                                    <option value="">Select Center</option>
                                    @foreach($centers as $center)
                                        <option value="{{ $center->center_id }}">{{ $center->center_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Program Dropdown -->
                            <div class="col-md-6 mb-3">
                                <label for="program" class="form-label">Program Name <span class="text-danger">*</span></label>
                                <select id="program" class="form-control" required>
                                    <option value="">Select Program</option>
                                </select>
                                <!-- Hidden Inputs to Store Selected Program Data -->
                                <input type="hidden" name="create_id" id="create_id">
                                <input type="hidden" name="program_name" id="program_name">
                            </div>

                            <div class="col-md-6 mb-3">
                                    <label for="number_of_days" name="number_of_days" class="form-label">Number of Days
                                        <span class="text-danger">*</span></label>
                                    <select id="number_of_days" name="number_of_days" class="form-control" required>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="Program_Fees" class="form-label">Program Fees <span class="text-danger">*</span></label>
                                <input type="number" name="Program_Fees" class="form-control" placeholder="Enter total program fees" >
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="CCFRI" class="form-label">CCFRI <span class="text-danger">*</span></label>
                                <input type="number" name="CCFRI" class="form-control" placeholder="Enter CCFRI value" >
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="ACCB" class="form-label">ACCB</label>
                                <input type="number" name="ACCB" class="form-control" placeholder="Enter ACCB value">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="Parent_Fees" class="form-label">Parent Fees <span class="text-danger">*</span></label>
                                <input type="number" name="Parent_Fees" class="form-control" placeholder="Enter parent fee" >
                            </div>

                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Create Program</button>
                            <a href="{{ url('program-masters') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>

                    <!-- JQuery and AJAX -->
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                        $('#center').change(function () {
                            var centerId = $(this).val();

                            if (centerId) {
                                $.ajax({
                                    url: '{{ url("/get-programs") }}/' + centerId,
                                    type: 'GET',
                                    success: function (data) {
                                        $('#program').empty();
                                        $('#program').append('<option value="">Select Program</option>');
                                        $.each(data, function (key, value) {
                                            $('#program').append('<option value="' + key + '">' + value + '</option>');
                                        });
                                    }
                                });
                            } else {
                                $('#program').empty().append('<option value="">Select Program</option>');
                            }
                        });

                        $('#program').change(function () {
                            var selectedProgramId = $(this).val();
                            var selectedProgramName = $("#program option:selected").text();

                            $('#create_id').val(selectedProgramId);
                            $('#program_name').val(selectedProgramName);
                        });
                    </script>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
