@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <h1 class="page-title">Edit Center Management</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('center-managements') }}">Centers</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Center</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card custom-card">
                <div class="card-header">
                    <h3 class="card-title">Edit Center Information</h3>
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

                    <form action="{{ url('center-managements/' . $center->center_id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="center_name" class="form-label">Center Name <span class="text-danger">*</span></label>
                            <input type="text" name="center_name" class="form-control" value="{{ $center->center_name }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="center_address" class="form-label">Center Address <span class="text-danger">*</span></label>
                            <input type="text" name="center_address" class="form-control" value="{{ $center->center_address }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="center_email" class="form-label">Center Email <span class="text-danger">*</span></label>
                            <input type="email" name="center_email" class="form-control" value="{{ $center->center_email }}" required>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Update Center</button>
                            <a href="{{ url('center-managements') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
