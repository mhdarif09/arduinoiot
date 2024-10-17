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

    <style>
        /* Custom styles to center the form and add image styling */
        .profile-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .profile-form {
            width: 100%;
            max-width: 500px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .profile-pic {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }

        .profile-pic-container {
            text-align: center;
        }



    </style>
</head>

<body>
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

    <!-- Profile Edit Form -->
    <div class="container profile-container">
        <div class="profile-form">
            <h1 class="text-center mb-4">Edit Profile</h1>

            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Profile Picture Section -->
            <div class="profile-pic-container mb-4">
                <img src="{{ asset('storage/profile/' . $user->profile_picture) }}" alt="Profile Picture" class="profile-pic">
                <h4 class="mt-3">{{ $user->name }}</h4>
            </div>

            <!-- Form to Update Profile -->
            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3 text-center">
                    <label for="profile_picture" class="form-label">Upload New Profile Picture</label>
                    <input type="file" name="profile_picture" id="profile_picture" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">New Password (optional)</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
