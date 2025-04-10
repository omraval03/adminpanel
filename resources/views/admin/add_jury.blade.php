@extends('layouts.admin')

@section('content')

<form action="{{ route('admin.jury.store') }}" method="POST" enctype="multipart/form-data" class="container mt-4">
    @csrf

    <div class="mb-3">
        <label for="first_name" class="form-label">First Name</label>
        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required>
    </div>

    <div class="mb-3">
        <label for="last_name" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Phone Number</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" required>
    </div>

    <div class="mb-3">
        <label for="specialization" class="form-label">Specialization</label>
        <select class="form-select" id="specialization" name="specialization" required>
            <option value="">Select Specialization</option>
            <option value="Professional Wedding Photographer">Professional Wedding Photographer</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
    </div>

    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
    </div>

    <div class="mb-3">
        <label for="profile_picture" class="form-label">Profile Picture</label>
        <input type="file" class="form-control" id="profile_picture" name="profile_picture" accept="image/*">
    </div>

    <button type="submit" class="btn btn-primary">Add Jury</button>
</form>

@endsection