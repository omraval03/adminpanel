@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit About Us Section</h2>

    <form action="{{ route('about-us.update', $section->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $section->title }}" required>
        </div>

        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="5" required>{{ $section->content }}</textarea>
        </div>

        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            @if($section->image)
                <img src="{{ asset('storage/' . $section->image) }}" class="img-fluid mt-2" width="200">
            @endif
        </div>

        <div class="mb-3">
            <label>Order</label>
            <input type="number" name="order" class="form-control" value="{{ $section->order }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
