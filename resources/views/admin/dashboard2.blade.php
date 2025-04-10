@extends('layouts.admin')

@section('content')

<main class="col-md-9 col-lg-10 main-content">
            <h2><i class="fas fa-trophy"></i> Manage Contests</h2>
            <button class="btn btn-success my-3"><i class="fas fa-plus"></i> Add New Contest</button>

            <!-- Contest Table -->
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Contest Name</th>
                        <th>Category</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Wedding Photography 2025</td>
                        <td>Photography</td>
                        <td>2025-05-01</td>
                        <td>2025-06-01</td>
                        <td>
                            <button class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</button>
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                            <button class="btn btn-info btn-sm"><i class="fas fa-eye"></i> View</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Wedding Photography 2024</td>
                        <td>Photography</td>
                        <td>2024-05-01</td>
                        <td>2024-06-01</td>
                        <td>
                            <button class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</button>
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                            <button class="btn btn-info btn-sm"><i class="fas fa-eye"></i> View</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>




@endsection