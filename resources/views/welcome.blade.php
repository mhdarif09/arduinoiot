<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IoT Palang Bandara 3D - Animasi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/style.css')}}"> <!-- Link to External CSS -->
</head>
<body>

  <!-- Header -->
  <header class="bg-dark text-white">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">IoT Palang Bandara 3D</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="#features">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#how-it-works">How It Works</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>            
          </ul>
        </div>
      </div>
    </nav>
  </header>
  

  <!-- Hero Section with Animation -->
  <section class="hero">
    <div class="container">
      <h1 class="display-3">Intelligent IoT Barrier System</h1>
      <p class="lead">Experience advanced 3D technology with IoT-powered control.</p>
      <div class="barrier"></div>
      <a href="#features" class="btn btn-primary btn-lg mt-4">Explore Features</a>
    </div>
  </section>

  <!-- Features Section with Animated Icons -->
  <section id="features" class="py-5">
    <div class="container text-center">
      <h2 class="mb-4">Key Features</h2>
      <div class="row">
        <div class="col-md-4">
          <div class="feature-icon mb-3">🚧</div>
          <h4>Real-Time Monitoring</h4>
          <p>Monitor and control the barrier remotely in real time.</p>
        </div>
        <div class="col-md-4">
          <div class="feature-icon mb-3">🔒</div>
          <h4>Enhanced Security</h4>
          <p>Automatic access control with advanced IoT integration.</p>
        </div>
        <div class="col-md-4">
          <div class="feature-icon mb-3">🌐</div>
          <h4>Cloud Control</h4>
          <p>Manage barriers via cloud-based platforms from anywhere.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- How It Works Section with Animation -->
  <section id="how-it-works" class="bg-light py-5">
    <div class="container text-center">
      <h2 class="mb-4">How It Works</h2>
      <p class="lead">Our IoT-based barrier system integrates real-time monitoring and advanced automation.</p>
      <div class="row">
        <div class="col md-4">
            <div class="feature-icon mb-3">🌐</div>
            <h4>Cloud</h4>
            <p>Sangat membantu bandara untuk memantau orang keluar dan masuk</p>
        </div>
      </div>
  </section>

  <!-- Call to Action Section -->
  <section class="bg-dark text-white py-5">
    <div class="container text-center">
      <h2>Ready to Enhance Your Airport Security?</h2>
      <p>Contact us today to get started with our IoT Palang Bandara solution!</p>
      <a href="#contact" class="btn btn-light btn-lg">Contact Us</a>
    </div>
    <p>&copy; 2024 IoT Palang Bandara 3D | All rights reserved</p>
    <p>Contact us: <a href="mailto:info@iotbandara.com" class="text-white">info@iotbandara.com</a></p>
    <div>
      <a href="#" class="text-white me-3">Facebook</a>
      <a href="#" class="text-white">LinkedIn</a>
    </div>
  </section>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
