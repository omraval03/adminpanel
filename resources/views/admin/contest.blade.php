@extends('layouts.admin') <!-- Extend your admin layout -->

@section('content')
<div class="container">
    <h2>Contests</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Create New Contest Form -->
    <div class="card p-4 mb-4">
        <h4>Create New Contest</h4>
        <form action="{{ route('admin.contest.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date:</label>
                <input type="datetime-local" name="start_date" id="start_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="deadline" class="form-label">Deadline:</label>
                <input type="datetime-local" name="deadline" id="deadline" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Contest</button>
        </form>
    </div>

    <!-- List of Contests -->
    <h4>All Contests</h4>
    @foreach($contests as $contest)
        <div class="contest-item card p-3 mb-3">
            <h5>{{ $contest->title }}</h5>
            <p>{{ $contest->description }}</p>
            <p><strong>Start Date:</strong> {{ $contest->start_date }}</p>
            <p><strong>Deadline:</strong> {{ $contest->deadline }}</p>

            <!-- Check if contest is open or closed -->
            @if(\Carbon\Carbon::now()->lessThanOrEqualTo($contest->deadline))
                <button class="btn btn-danger" >Disable </button>
            @endif
        </div>
    @endforeach
</div>
@endsection
