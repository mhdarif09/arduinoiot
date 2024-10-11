<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff List</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Staff List</h2>

    <!-- Menampilkan pesan sukses jika ada -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Location</th>
            <th>Flight Number</th>
            <th>Role</th>
        </tr>
        </thead>
        <tbody>
        @foreach($staff as $st)
            <tr>
                <td>{{ $st->name }}</td>
                <td>{{ $st->email }}</td>
                <td>{{ $st->location }}</td>
                <td>{{ $st->flight_number }}</td>
                <td>{{ $st->user->name }}</td> <!-- Mengakses role melalui relasi user -->
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<!-- Bootstrap JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
