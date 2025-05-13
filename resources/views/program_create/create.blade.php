@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- PAGE HEADER -->
    <div class="page-header">
        <h1 class="page-title">Create Program</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Program</li>
        </ol>
    </div>
    <!-- PAGE HEADER END -->

    <!-- FORM CARD -->
    <div class="row">
        <div class="col-md-8 mx-auto">
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

                    <form action="{{ url('program-create') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Center Dropdown -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Select Center <span class="text-danger">*</span></label>
                                <select name="center_id" class="form-control" required>
                                    <option value="">Select Center</option>
                                    @foreach($centers as $center)
                                        <option value="{{ $center->center_id }}">{{ $center->center_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Program Name -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Program Name <span class="text-danger">*</span></label>
                                <input type="text" name="Program_name" class="form-control" placeholder="Enter program name" required>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Create Program</button>
                            <a href="{{ url('program-create') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- FORM CARD END -->

</div>
@endsection
