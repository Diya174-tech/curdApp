@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- PAGE HEADER -->
    <div class="page-header">
        <h1 class="page-title">Create Center Managment</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Center</li>
        </ol>
    </div>
    <!-- PAGE HEADER END -->

    <!-- FORM CARD -->
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card custom-card">
                <div class="card-header">
                    <h3 class="card-title">Center Information</h3>
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

                    <form action="{{ url('center-managements') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="center_name" class="form-label">Center Name <span class="text-danger">*</span></label>
                            <input type="text" name="center_name" class="form-control" placeholder="Enter center name" required>
                        </div>
                        @error('center_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <div class="form-group mb-3">
                            <label for="center_address" class="form-label">Center Address <span class="text-danger">*</span></label>
                            <input type="text" name="center_address" class="form-control" placeholder="Enter center address" required>
                        </div>
                        @error('center_address')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <div class="form-group mb-3">
                            <label for="center_email" class="form-label">Center Email <span class="text-danger">*</span></label>
                            <input type="email" name="center_email" class="form-control" placeholder="Enter center email" required>
                        </div>
                        @error('center_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Create Center</button>
                            <a href="{{ url('center-managements') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- FORM CARD END -->

</div>
@endsection
