@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Manage About Us Sections</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" rows="5" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Order</label>
            <input type="number" name="order" class="form-control" value="0">
        </div>

        <div class="mb-3">
            <label>Image (optional)</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Add Section</button>
    </form>

    <hr>

    <h2 class="mt-5">All Sections</h2>
    <ul class="list-group">
        @foreach ($sections as $sec)
            <li class="list-group-item">
                <strong>{{ $sec->order }}. {{ $sec->title }}</strong>
                <a href="{{ route('about_edit', $sec->id) }}" class="btn btn-warning btn-sm">
            <i class="bi bi-pencil"></i> Edit
        </a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
