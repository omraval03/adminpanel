@extends('layouts.admin')

@section('content')

 <!--begin::App Content-->
 <div class="card mb-4">
  <div class="card-header">
    <h3 class="card-title">User List</h3>
  </div>
  <div class="card-body">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr class="align-middle">
          <td>{{ $loop->iteration }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>
            <span class="badge {{ $user->status ? 'text-bg-success' : 'text-bg-danger' }}">
              {{ $user->status ? 'Active' : 'Inactive' }}
            </span>
          </td>
          <td>
            <form action="{{ route('admin.toggleUserStatus', $user->id) }}" method="POST">
              @csrf
              @method('PATCH')
              <button type="submit" class="btn btn-sm {{ $user->status ? 'btn-danger' : 'btn-success' }}">
                {{ $user->status ? 'Deactivate' : 'Activate' }}
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection