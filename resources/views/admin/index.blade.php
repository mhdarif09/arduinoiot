<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegant Admin Dashboard</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom CSS for elegant styling -->
    <link rel="stylesheet" href="{{ asset('css/styleadmin.css') }}">

    <!-- Custom CSS -->
    <style>
        body {
            height: 100%; /* Mengatur tinggi penuh untuk body dan html */
            margin: 0; /* Menghilangkan margin default */
        }

        .sidebar {
            height: 100vh; /* Membuat sidebar mengisi tinggi layar */
            position: sticky; /* Memastikan sidebar tetap di tempat saat scrolling */
            top: 0; /* Memastikan sidebar selalu berada di atas */
        }

        /* .main-content {
            min-height: 100vh; /* Memastikan konten utama mengisi tinggi layar */
            padding: 20px; /* Menambah padding pada konten utama */
        }

        @media (max-width: 768px) {
            .sidebar {
                height: auto; /* Mengatur tinggi sidebar menjadi otomatis di perangkat kecil */
                position: relative; /* Mengubah posisi sidebar menjadi relatif di perangkat kecil */
            }
        } */
    </style>
</head>

<body>

    <!-- Navbar -->
    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
                <div class="position-sticky pt-3 text-center">
                    <h5 class="text-white mb-4">Elegant Admin</h5>

                    <div class="mb-4">
                        <img src="{{ asset('storage/profile/' . auth()->user()->profile_picture) }}" alt="Profile Picture" class="profil-pic rounded-circle bg-white">
                        <h6 class="text-white mt-2">{{ auth()->user()->name }}</h6>
                    </div>

                    <!-- Navigation Links -->
                    <ul class="nav flex-column mb-auto">
                        <li class="nav-item mb-2">
                            <a class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                               href="{{ route('admin.dashboard') }}">Home</a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link text-white {{ request()->routeIs('admin.profile.edit') ? 'active' : '' }}"
                               href="{{ route('admin.profile.edit') }}">Profile</a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link text-white {{ request()->is('admin/settings') ? 'active' : '' }}"
                               href="#">Settings</a>
                        </li>
                    </ul>

                    <div class="mt-auto">
                        <a class="nav-link text-white p-2 mb-3" href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </div>

                    <!-- Form Logout -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </nav>

            <!-- Main content area -->
            <main class="col-md-9 ms-sm-auto col-lg-10 main-content">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard Overview</h1>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card">
                            <div class="card-header bg-primary text-white">Orders</div>
                            <div class="card-body">
                                <h5 class="card-title">150 Orders</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card">
                            <div class="card-header bg-success text-white">Revenue</div>
                            <div class="card-body">
                                <h5 class="card-title">$13,000</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card">
                            <div class="card-header bg-warning text-white">Users</div>
                            <div class="card-body">
                                <h5 class="card-title">450 Users</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card">
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
