@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <!-- PAGE HEADER -->
        <div class="page-header">
            <h1 class="page-title">Create Child Master</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Child</li>
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

                        <form action="{{ url('child-masters') }}" method="POST">
                            @csrf

                            <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="center" class="form-label">Center Name <span class="text-danger">*</span></label>
                                    <select id="center" name="center_id" class="form-control">
                                        <option value="">Select Center</option>
                                        @foreach($centers as $center)
                                        <option value="{{ $center->center_id }}">{{ $center->center_name }}</option>
                                        @endforeach
                                    </select>
                            </div>
                            
                                <div class="col-md-6 mb-3" id="program_field">
                                    <label for="Program_id" class="form-label">Program Name <span class="text-danger">*</span></label>
                                        <select id="Program_id" name="Program_id" class="form-control">
                                            <option value="">Select Program</option>
                                        </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="CHild_First_Name" class="form-label">Child First Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="CHild_First_Name" class="form-control"
                                        placeholder="Enter child's first name" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="Child_Last_Name" class="form-label">Child Last Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="Child_Last_Name" class="form-control"
                                        placeholder="Enter child's last name" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="PArent_First_Name" class="form-label">Parent First Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="PArent_First_Name" class="form-control"
                                        placeholder="Enter parent's first name" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="Parent_Last_Name" class="form-label">Parent Last Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="Parent_Last_Name" class="form-control"
                                        placeholder="Enter parent's last name" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="Child_parent_mobno" class="form-label">Parent Mobile Number <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="Child_parent_mobno" class="form-control"
                                        placeholder="Enter parent mobile number" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="Child_parent_email" class="form-label">Parent Email <span
                                            class="text-danger">*</span></label>
                                    <input type="email" name="Child_parent_email" class="form-control"
                                        placeholder="Enter parent email" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="child_dob" class="form-label">Child DOB <span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="child_dob" class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="Child_Institution_number" class="form-label">Institution Number <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="Child_Institution_number" class="form-control"
                                        placeholder="Enter institution number" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="child_transit_number" class="form-label">Bank Transit Number <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="child_transit_number" class="form-control"
                                        placeholder="Enter transit number" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="child_account_number" class="form-label">Account Number <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="child_account_number" class="form-control"
                                        placeholder="Enter account number" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="Child_Emergency_Contact_Name" class="form-label">Emergency Contact
                                        Name</label>
                                    <input type="text" name="Child_Emergency_Contact_Name" class="form-control"
                                        placeholder="Enter emergency contact name">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="Child_Emergency_Contact_Number" class="form-label">Emergency Contact
                                        Number</label>
                                    <input type="text" name="Child_Emergency_Contact_Number" class="form-control"
                                        placeholder="Enter emergency contact number">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="adminition_date" class="form-label">Admission Date <span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="adminition_date" class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="end_date" class="form-label">End Date <span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="end_date" class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="Registration_Fees_Paid" class="form-label">Registration Fees Paid <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="Registration_Fees_Paid" class="form-control"
                                        placeholder="Enter registration fees" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="active_status" class="form-label">Active Status <span
                                            class="text-danger">*</span></label>
                                    <select name="active_status" class="form-control" required>
                                        <option value="">Select Status</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
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
                                    <label for="Special_Notes" class="form-label">Special Notes</label>
                                    <textarea name="Special_Notes" class="form-control" rows="3"
                                        placeholder="Enter any special notes"></textarea>
                                </div>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Create Child</button>
                                <a href="{{ url('child-masters') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Declare a global object to store already fetched data
        var fetchedData = {};

        $('#center').change(function () {
            var centerId = $(this).val();

            // Check if the selected center already has its programs fetched
            if (centerId) {
                if (!fetchedData[centerId]) {
                    // If programs are not fetched, do the AJAX request
                    $.ajax({
                        url: '/get-child-programs/' + centerId,
                        type: 'GET',
                        success: function (data) {
                            console.log(data);

                            // Save the fetched data into the global object
                            fetchedData[centerId] = data;

                            // Show the program field
                            if ($('#program_field').is(':hidden')) {
                                $('#program_field').show();
                            }

                            // Populate the program dropdown with unique programs
                            $('#Program_id').empty();
                            $('#Program_id').append('<option value="">Select Program</option>');

                            // Using a Set to keep track of program keys (unique)
                            var uniquePrograms = new Set();

                            $.each(data, function (key, value) {
                                // Only add the program to dropdown if it is not already in the Set
                                if (!uniquePrograms.has(value)) {
                                    $('#Program_id').append('<option value="' + key + '">' + value + '</option>');
                                    uniquePrograms.add(value); // Add the program to the Set to avoid duplicates
                                }
                            });
                        }
                    });
                } else {
                    // If programs are already fetched, use the stored data
                    var data = fetchedData[centerId];

                    // Show the program field
                    if ($('#program_field').is(':hidden')) {
                        $('#program_field').show();
                    }

                    // Populate the program dropdown with unique programs
                    $('#Program_id').empty();
                    $('#Program_id').append('<option value="">Select Program</option>');

                    // Using a Set to keep track of unique programs
                    var uniquePrograms = new Set();

                    $.each(data, function (key, value) {
                        // Only add the program if it is not already in the dropdown
                        if (!uniquePrograms.has(value)) {
                            $('#Program_id').append('<option value="' + key + '">' + value + '</option>');
                            uniquePrograms.add(value); // Add to Set to prevent duplication
                        }
                    });
                }
            } else {
                // If no center is selected, hide the program field and reset dropdown
                $('#Program_id').empty().append('<option value="">Select Program</option>');
                $('#program_field').hide();
            }
        });
    });
</script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection