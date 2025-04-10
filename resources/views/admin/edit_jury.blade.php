@extends('layouts.admin') 

@section('content')
<div class="container mt-4">
    <h2>Edit Jury</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.jury.update', $jury->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') 

        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" name="first_name" value="{{ old('first_name', $jury->first_name) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" name="last_name" value="{{ old('last_name', $jury->last_name) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email (cannot be changed)</label>
            <input type="email" value="{{ $jury->email }}" class="form-control" disabled>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" value="{{ old('phone', $jury->phone) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="specialization" class="form-label">Specialization</label>
            <select name="specialization" class="form-select" required>
                <option value="Professional Wedding Photographer" {{ $jury->specialization == 'Professional Wedding Photographer' ? 'selected' : '' }}>Professional Wedding Photographer</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="profile_picture" class="form-label">Profile Picture</label><br>
            @if($jury->profile_picture)
                <img src="{{ asset('storage/' . $jury->profile_picture) }}" width="100" class="mb-2"><br>
            @endif
            <input type="file" name="profile_picture" class="form-control">
            <small class="text-muted">Upload only if you want to change it.</small>
        </div>

        <button type="submit" class="btn btn-primary">Update Jury</button>
        <a href="{{ route('admin.jury_list') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
