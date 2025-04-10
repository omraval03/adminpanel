@extends('layouts.admin')

@section('content')
<main class="app-main">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List of Selected Categories</h3>
        </div>

        <div class="card-body">
            <table id="paymentTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Entries</th>
                        <th>Total Price (Rs.)</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->entries }}</td>
                        <td>{{ $category->total_price }}</td>
                        <td>{{ $category->created_at->format('d M Y, H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#paymentTable').DataTable();
        });
    </script>
@endsection
