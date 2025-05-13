@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <h1 class="page-title">Edit Fees Master</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('fees-masters') }}">Fees List</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Fee</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card custom-card">
                <div class="card-header">
                    <h3 class="card-title">Edit Fees Information</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ url('fees-masters/' . $fee->Fees_id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="center_id">Center</label>
                                <select id="center" name="center_id" class="form-control" required>
                                    <option value="">Select Center</option>
                                    @foreach ($centers as $center)
                                        <option value="{{ $center->center_id }}" {{ $fee->center_id == $center->center_id ? 'selected' : '' }}>
                                            {{ $center->center_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-3" id="program_field">
                                <label for="Program_id" class="form-label">Program Name</label>  
                                <select name="Program_id" id="Program_id" class="form-control" required>
                                        <option value="">Select Program</option>
                                        @foreach($programs as $program)
                                        <option value="{{ $program->Program_id }}" {{ $fee->Program_id == $program->Program_id ? 'selected' : '' }}>
                                        {{ $program->program_name }}
                                        </option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="CHild_First_Name" class="form-label">Child First Name</label>
                                <input type="text" name="CHild_First_Name" class="form-control" value="{{ $fee->child?->CHild_First_Name }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="Child_Last_Name" class="form-label">Child Last Name</label>
                                <input type="text" name="Child_Last_Name" class="form-control" value="{{ $fee->child?->Child_Last_Name }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="PArent_First_Name" class="form-label">Parent First Name</label>
                                <input type="text" name="PArent_First_Name" class="form-control" value="{{ $fee->child?->PArent_First_Name }}" required>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="Parent_Last_Name" class="form-label">Parent Last Name</label>
                                <input type="text" name="Parent_Last_Name" class="form-control" value="{{ $fee->child?->Parent_Last_Name }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="child_dob" class="form-label">Child DOB</label>
                                <input type="date" name="child_dob" class="form-control" value="{{ $fee->child?->child_dob }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="number_of_days" class="form-label">Number of days</label>
                                <input type="number" name="number_of_days" class="form-control" value="{{ $fee->number_of_days }}" required>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="total_fees" class="form-label">Total Fees</label>
                                <input type="number" name="total_fees" class="form-control" value="{{ $fee->total_fees }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="CCFRI">CCFRI</label>
                                <input type="number" name="CCFRI" class="form-control" value="{{ $fee->CCFRI }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="parent_fees">Parent Fees</label>
                                <input type="text" name="parent_fees" class="form-control" value="{{ $fee->parent_fees }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="institution_number" class="form-label">Institution Number</label>
                                <input type="text" name="institution_number" class="form-control" value="{{ $fee->institution_number }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="transit_number" class="form-label">Bank Transit Number</label>
                                <input type="text" name="transit_number" class="form-control" value="{{ $fee->transit_number }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="account_number" class="form-label">Account Number</label>
                                <input type="text" name="account_number" class="form-control" value="{{ $fee->account_number }}" required>
                            </div>

                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-success">Update Fee</button>
                            <a href="{{ url('fees-masters') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                    <script>
    $(document).ready(function () {
        var fetchedData = {};

        function fetchAndPopulatePrograms(centerId, selectedProgramId = null) {
            if (centerId) {
                if (!fetchedData[centerId]) {
                    $.ajax({
                        url: '/get-fees-programs/' + centerId,
                        type: 'GET',
                        success: function (data) {
                            fetchedData[centerId] = data;
                            populateProgramDropdown(data, selectedProgramId);
                        }
                    });
                } else {
                    populateProgramDropdown(fetchedData[centerId], selectedProgramId);
                }
            } else {
                $('#Program_id').empty().append('<option value="">Select Program</option>');
            }
        }

        function populateProgramDropdown(data, selectedProgramId) {
            var $programSelect = $('#Program_id');

            $programSelect.prop('disabled', true).empty().append('<option value="">Loading...</option>');

            var uniquePrograms = new Map();
            $.each(data, function (key, value) {
                if (!uniquePrograms.has(value)) {
                    uniquePrograms.set(value, key);
                }
            });

            $programSelect.empty().append('<option value="">Select Program</option>');
            uniquePrograms.forEach((programId, programName) => {
                $programSelect.append(
                    '<option value="' + programId + '"' + 
                    (selectedProgramId == programId ? ' selected' : '') + 
                    '>' + programName + '</option>'
                );
            });

            $programSelect.prop('disabled', false);
        }

        // On center change
        $('#center').change(function () {
            var centerId = $(this).val();
            fetchAndPopulatePrograms(centerId);
        });

        // ✅ On page load (for already selected center & program)
        var initialCenterId = $('#center').val();
        var selectedProgramId = '{{ $fee->Program_id ?? '' }}';
        if (initialCenterId) {
            fetchAndPopulatePrograms(initialCenterId, selectedProgramId);
        }

    });
</script>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
