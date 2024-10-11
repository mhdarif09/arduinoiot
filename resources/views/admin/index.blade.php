<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegant Admin Dashboard</title>
    
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS for elegant styling -->
    <link rel="stylesheet" href="{{ asset('css/styleadmin.css') }}"> <!-- Fixed 'rel="stylesheet"' typo -->
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Elegant Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.profile.edit')}}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Settings</a>
                    </li>

                         <!-- Link hanya terlihat jika role adalah super_admin -->
                @if (Auth::user()->role == 'super_admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.staff.create') }}">Tambah Staff</a>
                </li>
            @endif
            
                    <!-- Form Logout -->
                    <li class="nav-item">
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                      <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          Logout
                      </a>
                  </li>
                </ul>
            </div>
        </div>
    </nav>

            <!-- Main content area -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard Overview</h1>
                </div>

                <!-- Dashboard Cards -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white">Orders</div>
                            <div class="card-body">
                                <h5 class="card-title">150 Orders</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card mb-4">
                            <div class="card-header bg-success text-white">Revenue</div>
                            <div class="card-body">
                                <h5 class="card-title">$13,000</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card mb-4">
                            <div class="card-header bg-warning text-white">Users</div>
                            <div class="card-body">
                                <h5 class="card-title">450 Users</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card mb-4">
                            <div class="card-header bg-danger text-white">Issues</div>
                            <div class="card-body">
                                <h5 class="card-title">10 Issues</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <!-- Bootstrap JS and Feather Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace()
    </script>

</body>

</html>
