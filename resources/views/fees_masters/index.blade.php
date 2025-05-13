<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            /* default gray */
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
            /* green */
            color: white;
            border: 2px solid #28a745;
        }

        .delete-icon:hover {
            background-color: #dc3545;
            /* red */
            color: white;
            border: 2px solid #dc3545;
        }

        .icon-btn i {
            pointer-events: none;
            /* prevents double click on icon */
        }
    </style>
</head>
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif -->
    <!-- PAGE HEADER -->
    <div class="page-header">
        <h1 class="page-title">Reports Master</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Reports List</li>
        </ol>
    </div>
    <!-- PAGE HEADER END -->

    <!-- FEES MASTER LIST CARD -->
    <div class="row">
        <div class="col-md-12">
            <div class="card custom-card shadow-sm border-0">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">All Reports Records</h3>
                    <a href="{{ url('fees-masters/create') }}" class="btn btn-primary btn-sm">+ Create New Reports</a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if ($fees->isEmpty())
                    <div class="alert alert-info">No Reports records found. <a
                            href="{{ url('fees-masters/create') }}">Create one</a>.</div>
                    @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Center Name</th>
                                    <th>Program Name</th>
                                    <th>Name of the Child</th>
                                    <th>Name of the Parent</th>
                                    <th>Date of Birth</th>
                                    <th>No. of Days</th>
                                    <th>Total Fees</th>
                                    <th>CCFRI</th>
                                    <th>ACCB Received</th>
                                    <th>Parent Fees </th>
                                    <th>Institution Number</th>
                                    <th>Transit Number</th>
                                    <th>Account Number</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fees as $index => $fee)
                                <tr>
                                    <td>{{ $index + 1 }}</td> <!-- Matching the # column -->
                                    <td>{{ $fee->center->center_name }}</td>
                                    <td>{{ $fee->program?->program_name }}</td>
                                    <td>{{ $fee->child?->CHild_First_Name }} {{ $fee->child?->Child_Last_Name }}</td>
                                    <td>{{ $fee->child?->PArent_First_Name }} {{ $fee->child?->Parent_Last_Name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($fee->child_dob)->format('d-m-Y') }}</td>
                                    <td>{{ $fee->number_of_days }}</td>
                                    <!-- <td>{{ $fee->total_fees }}</td> -->
                                    <td id="total-fees-{{ $fee->Fees_id }}">{{ $fee->total_fees }}</td>

                                    <!-- <td>{{ $fee->accb_received }}</td> -->
                                    <!-- <td>{{ $fee->CCFRI }}</td> -->
                                    
<td id="ccfri-{{ $fee->Fees_id }}">{{ $fee->CCFRI }}</td>

                                    <!-- <td>{{ $fee->accb_received }}</td> -->
                                    <td>
                                        <form class="accb-form-{{ $fee->Fees_id }}"
                                            action="{{ url('fees-masters/update-accb/' . $fee->Fees_id) }}"
                                            method="POST">
                                            @csrf
                                            <span class="accb-value-{{ $fee->Fees_id }}">{{ $fee->accb_received
                                                }}</span>
                                            <input type="number" step="0.01" name="accb_received"
                                                class="form-control d-none accb-input-{{ $fee->Fees_id }}"
                                                value="{{ $fee->accb_received }}"
                                                style="width: 100px; display: inline-block;" />
                                            <input type="hidden" name="Fees_id" value="{{ $fee->Fees_id }}"
                                                class="accb-hidden-{{ $fee->Fees_id }}">
                                            <button type="button" class="btn btn-sm btn-warning"
                                                onclick="editAccb({{ $fee->Fees_id }})">Edit</button>
                                            <button type="button"
                                                class="btn btn-sm btn-success d-none save-btn-{{ $fee->Fees_id }}"
                                                onclick="updateAccb({{ $fee->Fees_id }})">Save</button>
                                        </form>
                                    </td>

                                    <!-- <td>{{ $fee->parent_fees }}</td> -->
                                    <td id="parent-fees-{{ $fee->Fees_id }}">
    {{ number_format($fee->total_fees - ($fee->CCFRI + $fee->accb_received), 2) }}
</td>

                                    <td>{{ $fee->institution_number }}</td>
                                    <td>{{ $fee->transit_number }}</td>
                                    <td>{{ $fee->account_number }}</td>

                                    <td class="text-center">
                                        <!-- Edit Icon -->
                                        <a href="{{ url('fees-masters/' . $fee->Fees_id . '/edit') }}"
                                            class="icon-btn edit-icon" title="Edit">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>


                                        <!-- Delete Form with Icon -->
                                        <form action="{{ url('fees-masters/' . $fee->Fees_id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="icon-btn delete-icon" title="Delete"
                                                onclick="return confirm('Are you sure?')">
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
<script>
    function editAccb(feeId) {
        document.querySelector(`.accb-value-${feeId}`).classList.add('d-none');
        document.querySelector(`.accb-input-${feeId}`).classList.remove('d-none');
        document.querySelector(`.save-btn-${feeId}`).classList.remove('d-none');
    }

    // function updateAccb(feeId) {
    //     const form = document.querySelector(`.accb-form-${feeId}`);
    //     const formData = new FormData(form);

    //     fetch(form.action, {
    //         method: 'POST',
    //         headers: {
    //             'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value
    //         },
    //         body: formData
    //     })
    //         .then(response => response.json())
    //         .then(data => {
    //             if (data.success) {
    //                 alert(data.message);

    //                 const newValue = form.querySelector(`.accb-input-${feeId}`).value;
    //                 document.querySelector(`.accb-value-${feeId}`).innerText = newValue;
    //                 document.querySelector(`.accb-value-${feeId}`).classList.remove('d-none');
    //                 form.querySelector(`.accb-input-${feeId}`).classList.add('d-none');
    //                 form.querySelector(`.save-btn-${feeId}`).classList.add('d-none');
    //             } else {
    //                 alert(data.message || 'Update failed.');
    //             }
    //         })
    //         .catch(error => {
    //             console.error('Error:', error);
    //             alert('Something went wrong.');
    //         });
    // }

    //adding logic of calc

    function updateAccb(feeId) {
        const form = document.querySelector(`.accb-form-${feeId}`);
        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value
            },
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);

                    const newAccb = parseFloat(form.querySelector(`.accb-input-${feeId}`).value) || 0;
                    const ccfri = parseFloat(document.querySelector(`#ccfri-${feeId}`).innerText) || 0;
                    const totalFees = parseFloat(document.querySelector(`#total-fees-${feeId}`).innerText) || 0;

                    const newParentFees = totalFees - (ccfri + newAccb);

                    // Update UI
                    document.querySelector(`.accb-value-${feeId}`).innerText = newAccb.toFixed(2);
                    document.querySelector(`.accb-value-${feeId}`).classList.remove('d-none');
                    form.querySelector(`.accb-input-${feeId}`).classList.add('d-none');
                    form.querySelector(`.save-btn-${feeId}`).classList.add('d-none');

                    // Update parent fees field
                    document.querySelector(`#parent-fees-${feeId}`).innerText = newParentFees.toFixed(2);

                } else {
                    alert(data.message || 'Update failed.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Something went wrong.');
            });
    }
</script>
@endsection