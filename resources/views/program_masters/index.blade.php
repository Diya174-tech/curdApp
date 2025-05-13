@extends('layouts.app')

@section('content')
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .icon-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        height: 34px;
        border-radius: 50%;
        border: none;
        background-color: transparent;
        color: #6c757d;
        transition: 0.3s ease;
        font-size: 14px;
        border: 2px solid black;
    }

    .icon-btn:hover {
        background-color: #f0f0f0;
        color: #fff;
    }

    .edit-icon:hover {
        background-color: #28a745;
        color: white;
        border: 2px solid #28a745;
    }

    .delete-icon:hover {
        background-color: #dc3545;
        color: white;
        border: 2px solid #dc3545;
    }

    .icon-btn i {
        pointer-events: none;
    }
</style>
</head>

<div class="container-fluid">

    <!-- PAGE HEADER -->
    <div class="page-header">
        <h1 class="page-title">Program Master</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Program List</li>
        </ol>
    </div>
    <!-- PAGE HEADER END -->

    <!-- PROGRAM LIST CARD -->
    <div class="row">
        <div class="col-md-12">
            <div class="card custom-card shadow-sm border-0">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">All Programs</h3>
                    <a href="{{ url('program-create/create') }}" class="btn btn-primary btn-sm">+ Create New Program</a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if ( $programs->isEmpty())
                        <div class="alert alert-info">No program records found. <a href="{{ url('program-create/create') }}">Create one</a>.</div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Center Name</th>
                                        <th>Program Name</th>
                                        <th>Number of days</th>
                                        <th>Fees</th>
                                        <th>CCFRI</th>
                                        <th>ACCB</th>
                                        <th>Parent Fees</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $programs as $program )
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $program->centers->center_name ?? 'N/A' }}</td>
                                            <td>{{ $program->progs->program_name ?? 'N/A' }}</td>
                                            <td>{{ $program->number_of_days	 }}</td>
                                            <td>${{ number_format($program->Program_Fees, 2) }}</td>
                                            <td>${{ number_format($program->CCFRI, 2) }}</td>
                                            <td>${{ number_format($program->ACCB, 2) }}</td>
                                            <td>${{ number_format($program->Parent_Fees, 2) }}</td>
                                            <td class="text-center">
                                                <!-- Edit Icon -->
                                                <a href="{{ url('program-masters/' . $program->Program_id . '/edit') }}" class="icon-btn edit-icon" title="Edit">
                                                    <i class="fa-solid fa-pen"></i>
                                                </a>

                                                <!-- Delete Form with Icon -->
                                                <form action="{{ url('program-masters/' . $program->Program_id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="icon-btn delete-icon" title="Delete" onclick="return confirm('Are you sure?')">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
