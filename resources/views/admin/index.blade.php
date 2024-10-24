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
        html,
        body {
            height: 100%;
        }

        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 48px 0 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
            width: 250px;
        }

        .main-content {
            margin-left: 250px;
            width: calc(100% - 250px);
            padding: 20px;
        }

        .dashboard-header {
            padding: 20px 0;
            background-color: #f8f9fa;
            margin-bottom: 20px;
        }

        @media (max-width: 767.98px) {
            .sidebar {
                position: static;
                width: 100%;
                padding-top: 0;
            }

            .main-content {
                margin-left: 0;
                width: 100%;
            }
        }
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
                        <img src="{{ asset('storage/profile/' . auth()->user()->profile_picture) }}"
                            alt="Profile Picture" class="profil-pic rounded-circle bg-white">
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
                                href="/setting">Settings</a>
                        </li>
                    </ul>

                    <div class="mt-auto">
                        <a class="nav-link text-white p-2 mb-3" href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </div>

                    <!-- Link hanya terlihat jika role adalah super_admin -->
                    @if (Auth::user()->role == 'super_admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.staff.create') }}">Tambah Staff</a>
                        </li>
                    @endif

                    <!-- Form Logout -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </nav>

            <!-- Main content area -->
            <main class="col-md-9 ms-sm-auto col-lg-10 main-content">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard Overview</h1>
                </div>
                <div class="mb-4">
                    <div class="input-group">
                        <input type="text" id="nikInput" class="form-control" placeholder="Masukkan NIK untuk cek"
                            required>
                        <button id="cekNikButton" class="btn btn-outline-primary ms-0">Cek NIK</button>
                    </div>
                    <div id="resultMessage" class="mt-2"></div>
                </div>
                <div class="row border-bottom mb-4">
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card">
                            <div class="card-header bg-primary text-white">People</div>
                            <div class="card-body">
                                <h5 class="card-title">50 People</h5>
                                <p class="card-text">Total everyone person have been scanned.</p>
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
                            <div class="card-header bg-warning text-white">Total Not DPO</div>
                            <div class="card-body">
                                <h5 class="card-title">40 People</h5>
                                <p class="card-text">Total number of people are not on the DPO list.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card">
                            <div class="card-header bg-danger text-white">Total DPO</div>
                            <div class="card-body">
                                <h5 class="card-title">10 People</h5>
                                <p class="card-text">Total number of people on the DPO list.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="data-table">
                    {{-- Rencana buat kalau tidak DPO dia bg-success dan untuk DPO dia bg-danger! --}}
                    <table class="table table-success table-hover table-bordered border-secondary">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 5%;">No.</th>
                                <th scope="col" style="width: 45%;">Name</th>
                                <th scope="col" style="width: 35%;">NIK</th>
                                <th scope="col" style="width: 25%;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>User 1</td>
                                <td>12345678910</td>
                                <td>No DPO</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>User 2</td>
                                <td>12345678911</td>
                                <td>DPO</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>User 3</td>
                                <td>12345678912</td>
                                <td>No DPO</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-end">
                        <ul class="pagination border-secondary">
                            <li class="page-item">
                                <a class="page-link text-dark" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link text-dark" href="#">1</a></li>
                            <li class="page-item"><a class="page-link text-dark" href="#">2</a></li>
                            <li class="page-item"><a class="page-link text-dark" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link text-dark" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
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

    <script>
        document.getElementById('cekNikButton').addEventListener('click', function() {
            const nik = document.getElementById('nikInput').value;

            // Mengirim permintaan POST ke API
            fetch('/api/check-dpo', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}', // Tambahkan CSRF token jika perlu
                    },
                    body: JSON.stringify({
                        nik: nik
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    // Tampilkan hasil
                    const resultMessage = document.getElementById('resultMessage');
                    if (data.status === 'dpo') {
                        resultMessage.innerHTML = '<div class="alert alert-danger">' + data.message + '</div>';
                    } else {
                        resultMessage.innerHTML = '<div class="alert alert-success">' + data.message + '</div>';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>

</body>

</html>
