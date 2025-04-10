@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Manage Jury</h1>
<!-- Button to trigger modal -->
<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#juryModal">
    Add Jury
</button>
    
    <table class="table table-bordered table-striped text-center align-middle">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Specialization</th>
                <th>Profile Picture</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($juries as $jury)
                <tr>
                    <td>{{ $jury->first_name }} {{ $jury->last_name }}</td>
                    <td>{{ $jury->email }}</td>
                    <td>{{ $jury->phone }}</td>
                    <td>{{ $jury->specialization }}</td>
                    <td>
                        @if($jury->profile_picture)
                            <img src="{{ asset('storage/' . $jury->profile_picture) }}" class=" rounded-circle shadow" width="80">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td>
        <a href="{{ route('admin.jury.edit', $jury->id) }}" class="btn btn-warning btn-sm">
            <i class="bi bi-pencil"></i> Edit
        </a>

        <form action="{{ route('admin.jury.destroy', $jury->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this jury?')">
                <i class="bi bi-trash"></i> Delete
            </button>
        </form>
    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>


<div class="modal fade" id="juryModal" tabindex="-1">
    <div class="modal-dialog modal-lg"> <!-- larger modal for more fields -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Jury</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.jury.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">First Name</label>
                            <input type="text" name="first_name" class="form-control" required>
                        </div>
                        <div class="col">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Specialization</label>
                        <select name="specialization" class="form-select" required>
                            <option value="">-- Select --</option>
                            <option value="Professional Wedding Photographer">Professional Wedding Photographer</option>
                        </select>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="col">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Profile Picture</label>
                        <input type="file" name="profile_picture" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-success">Save Jury</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection