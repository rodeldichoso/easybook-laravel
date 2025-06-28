@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white fw-bold d-flex justify-content-between align-items-center">
                    <span><i class="bi bi-person-circle me-2"></i>My Profile</span>
                    <a href="{{ url('/settings') }}" class="btn btn-light btn-sm">
                        <i class="bi bi-pencil-square me-1"></i> Edit in Settings
                    </a>
                </div>

                <div class="card-body bg-light">

                    {{-- Profile Picture aligned like other fields --}}
                    <div class="row mb-4 align-items-center">
                        <label class="col-sm-4 fw-semibold text-end">Profile Picture:</label>
                        <div class="col-sm-8 text-start">
                            <img src="https://picsum.photos/seed/barber/120/120"
                                alt="Profile Picture"
                                class="rounded-circle border shadow"
                                width="64"
                                height="64">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 fw-semibold text-end">First Name:</label>
                        <div class="col-sm-8 text-start">
                            <div class="form-control-plaintext">{{ auth()->user()->first_name }}</div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 fw-semibold text-end">Last Name:</label>
                        <div class="col-sm-8 text-start">
                            <div class="form-control-plaintext">{{ auth()->user()->last_name }}</div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 fw-semibold text-end">Email Address:</label>
                        <div class="col-sm-8 text-start">
                            <div class="form-control-plaintext">{{ auth()->user()->email }}</div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 fw-semibold text-end">Member Since:</label>
                        <div class="col-sm-8 text-start">
                            <div class="form-control-plaintext">{{ auth()->user()->created_at->format('F d, Y') }}</div>
                        </div>
                    </div>

                    @roles(['admin'])
                    <div class="row mb-3">
                        <label class="col-sm-4 fw-semibold text-end">Role:</label>
                        <div class="col-sm-8 text-start">
                            <span class="badge bg-secondary text-capitalize">{{ auth()->user()->role }}</span>
                        </div>
                    </div>
                    @endroles

                </div>
            </div>

        </div>
    </div>
</div>
@endsection