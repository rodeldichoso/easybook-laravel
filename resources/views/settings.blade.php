@extends('layouts.app')

@section('title', 'Settings')

@section('content')
<div class="container">
    <h2 class="fw-bold mb-4 border-bottom pb-2">Account Settings</h2>

    {{-- Profile Section --}}
    <div class="card shadow-sm border-0 mb-5 p-4 col-lg-8 mx-auto">
        <div class="card-header bg-white fw-bold border-0 px-0 mb-3">Update Profile</div>
        <div class="card-body px-0">
            <form method="POST" action="" enctype="multipart/form-data">
                @csrf
                <div class="row align-items-center g-4 mb-4">
                    <div class="col-md-3 text-center">
                        <img src="{{ auth()->user()->profile_picture ?? 'https://picsum.photos/seed/barber/100/100' }}"
                            alt="Current Profile Picture"
                            class="rounded-circle shadow-sm border"
                            width="100"
                            height="100">
                        <input type="file" name="profile_picture" class="form-control form-control-sm mt-2">
                    </div>
                    <div class="col-md-9">
                        <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" name="first_name" class="form-control" value="{{ old('first_name', auth()->user()->first_name) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="{{ old('last_name', auth()->user()->last_name) }}" required>
                        </div>
                        @roles(['admin'])
                        <div class="mb-3">
                            <label class="form-label">Admin Note</label>
                            <input type="text" name="admin_note" class="form-control" value="{{ old('admin_note', auth()->user()->admin_note ?? '') }}">
                        </div>
                        @endroles
                    </div>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-success">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Password Section --}}
    <div class="card shadow-sm border-0 mb-5 p-4 col-lg-8 mx-auto">
        <div class="card-header bg-white fw-bold border-0 px-0 mb-3">Change Password</div>
        <div class="card-body px-0">
            <form method="POST" action="">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Current Password</label>
                    <input type="password" name="current_password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">New Password</label>
                    <input type="password" name="new_password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirm New Password</label>
                    <input type="password" name="new_password_confirmation" class="form-control" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Admin Preferences --}}
    @roles(['admin'])
    <div class="card shadow-sm border-0 p-4 col-lg-8 mx-auto">
        <div class="card-header bg-white fw-bold border-0 px-0 mb-3">Admin Preferences</div>
        <div class="card-body px-0">
            <form method="POST" action="">
                @csrf
                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label">Admin Email Notifications</label>
                        <select class="form-select" name="email_notifications">
                            <option value="enabled" {{ old('email_notifications', auth()->user()->email_notifications ?? '') === 'enabled' ? 'selected' : '' }}>Enabled</option>
                            <option value="disabled" {{ old('email_notifications', auth()->user()->email_notifications ?? '') === 'disabled' ? 'selected' : '' }}>Disabled</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Admin Theme</label>
                        <select class="form-select" name="theme">
                            <option value="default" {{ old('theme', auth()->user()->theme ?? '') === 'default' ? 'selected' : '' }}>Default</option>
                            <option value="dark" {{ old('theme', auth()->user()->theme ?? '') === 'dark' ? 'selected' : '' }}>Dark Mode</option>
                            <option value="minimal" {{ old('theme', auth()->user()->theme ?? '') === 'minimal' ? 'selected' : '' }}>Minimal</option>
                        </select>
                    </div>
                </div>

                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-dark">Update Admin Settings</button>
                </div>
            </form>
        </div>
    </div>
    @endroles
</div>
@endsection