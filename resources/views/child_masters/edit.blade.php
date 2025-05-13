@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- PAGE HEADER -->
    <div class="page-header">
        <h1 class="page-title">Edit Child Master</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Child</li>
        </ol>
    </div>
    <!-- PAGE HEADER END -->

    <!-- FORM CARD -->
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card custom-card">
                <div class="card-header">
                    <h3 class="card-title">Child Information</h3>
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

                    <form action="{{ url('child-masters/' . $child->child_id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                        <div class="col-md-6 mb-3">
                                <label for="center_id">Center</label>
                                <select id="center" name="center_id" class="form-control" required>
                                    <option value="">Select Center</option>
                                    @foreach ($centers as $center)
                                        <option value="{{ $center->center_id }}" {{ $child->center_id == $center->center_id ? 'selected' : '' }}>
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
                                        <option value="{{ $program->Program_id }}" {{ $child->Program_id == $program->Program_id ? 'selected' : '' }}>
                                        {{ $program->program_name }}
                                        </option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="CHild_First_Name" class="form-label">Child First Name</label>
                                <input type="text" name="CHild_First_Name" class="form-control" value="{{ $child->CHild_First_Name }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="Child_Last_Name" class="form-label">Child Last Name</label>
                                <input type="text" name="Child_Last_Name" class="form-control" value="{{ $child->Child_Last_Name }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="PArent_First_Name" class="form-label">Parent First Name</label>
                                <input type="text" name="PArent_First_Name" class="form-control" value="{{ $child->PArent_First_Name }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="Parent_Last_Name" class="form-label">Parent Last Name</label>
                                <input type="text" name="Parent_Last_Name" class="form-control" value="{{ $child->Parent_Last_Name }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="Child_parent_mobno" class="form-label">Parent Mobile Number</label>
                                <input type="text" name="Child_parent_mobno" class="form-control" value="{{ $child->Child_parent_mobno }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="Child_parent_email" class="form-label">Parent Email</label>
                                <input type="email" name="Child_parent_email" class="form-control" value="{{ $child->Child_parent_email }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="child_dob" class="form-label">Child DOB</label>
                                <input type="date" name="child_dob" class="form-control" value="{{ $child->child_dob }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="Child_Institution_number" class="form-label">Institution Number</label>
                                <input type="text" name="Child_Institution_number" class="form-control" value="{{ $child->Child_Institution_number }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="child_transit_number" class="form-label">Bank Transit Number</label>
                                <input type="text" name="child_transit_number" class="form-control" value="{{ $child->child_transit_number }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="child_account_number" class="form-label">Account Number</label>
                                <input type="text" name="child_account_number" class="form-control" value="{{ $child->child_account_number }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="Child_Emergency_Contact_Name" class="form-label">Emergency Contact Name</label>
                                <input type="text" name="Child_Emergency_Contact_Name" class="form-control" value="{{ $child->Child_Emergency_Contact_Name }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="Child_Emergency_Contact_Number" class="form-label">Emergency Contact Number</label>
                                <input type="text" name="Child_Emergency_Contact_Number" class="form-control" value="{{ $child->Child_Emergency_Contact_Number }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="adminition_date" class="form-label">Admission Date</label>
                                <input type="date" name="adminition_date" class="form-control" value="{{ $child->adminition_date }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="end_date" class="form-label">End Date</label>
                                <input type="date" name="end_date" class="form-control" value="{{ $child->end_date }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="Registration_Fees_Paid" class="form-label">Registration Fees Paid</label>
                                <input type="number" name="Registration_Fees_Paid" class="form-control" value="{{ $child->Registration_Fees_Paid }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="active_status" class="form-label">Active Status</label>
                                <select name="active_status" class="form-control" required>
                                    <option value="">Select Status</option>
                                    <option value="Active" {{ $child->active_status == 'Active' ? 'selected' : '' }}>Active</option>
                                    <option value="Inactive" {{ $child->active_status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                    <label for="number_of_days" name="number_of_days" class="form-label">Number of Days
                                        <span class="text-danger">*</span></label>
                                    <select id="number_of_days" name="number_of_days" class="form-control" required>
                                        <option value="1" {{ $child->number_of_days == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ $child->number_of_days == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ $child->number_of_days == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ $child->number_of_days == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ $child->number_of_days == '5' ? 'selected' : '' }}>5</option>
                                        <option value="6" {{ $child->number_of_days == '6' ? 'selected' : '' }}>6</option>
                                        <option value="7" {{ $child->number_of_days == '7' ? 'selected' : '' }}>7</option>
                                    </select>
                                </div>

                            <div class="col-md-6 mb-3">
                                <label for="Special_Notes" class="form-label">Special Notes</label>
                                <textarea name="Special_Notes" class="form-control" rows="3">{{ $child->Special_Notes }}</textarea>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Update Child</button>
                            <a href="{{ url('child-masters') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                    <script>
    $(document).ready(function () {
        var fetchedData = {};

        function fetchAndPopulatePrograms(centerId, selectedProgramId = null) {
            if (centerId) {
                if (!fetchedData[centerId]) {
                    $.ajax({
                        url: '/get-child-programs/' + centerId,
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
        var selectedProgramId = '{{ $child->Program_id ?? '' }}';
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