<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>InvisiByte</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('img/favicon.png') }}" rel="icon">
  <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Selecao
  * Template URL: https://bootstrapmade.com/selecao-bootstrap-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center">
        <h1 class="sitename" style="font-size: 20px;">InvisiByte</h1>
      </a>
      <nav id="navmenu" class="navmenu">
        {{-- <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#team">Team</a></li>
          <li><a href="blog.html">Blog</a></li>
          <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li>
          <li><a href="#contact">Contact</a></li>
        </ul>--}}
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i> 
      </nav>
    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section" style="background-image: url('{{ asset('img/hero.png') }}'); background-size: cover; background-position: center;">

      <div id="hero-carousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">
        <div class="carousel-item active">
          <div class="carousel-container">
        <h1 style="color: #E6B9A6; font-size:100px;">INVISIBYTE</h1>
          </div>
        </div>
      </div>

      <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
        <defs>
          <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
        </defs>
        <g class="wave1">
          <use xlink:href="#wave-path" x="50" y="3"></use>
        </g>
        <g class="wave2">
          <use xlink:href="#wave-path" x="50" y="0"></use>
        </g>
        <g class="wave3">
          <use xlink:href="#wave-path" x="50" y="9"></use>
        </g>
      </svg>
    </section>

    <!-- Services Section -->
    <section id="services" class="services section" style="background-color: #444444;">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up" style="background-color: #444444;">
        <p style="text-align: center;">Hide Your Secrets in Plain Sight</p>
      </div>

      <div class="container" style="background-color: #444444;">
        <div class="row gy-4">
          <div class="col-lg-6 col-md-6 mx-auto" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item position-relative p-4 rounded" style="background-color: #E6B9A6;">
              {{-- FORM ENCODE --}}
              <form id="encodeForm" enctype="multipart/form-data" class="mb-3">
                @csrf
                <div class="mb-2">
                    <label for="encodeImage" class="form-label">Choose your image:</label>
                    <input type="file" id="encodeImage" name="image" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label for="message" class="form-label">Your message:</label>
                    <input type="text" id="message" name="message" class="form-control" placeholder="Secret Message.." required>
                </div>
                <div class="mb-2">
                  <label for="encodePassword" class="form-label">Enter Password:</label>
                  <input type="password" id="encodePassword" name="password" class="form-control" placeholder="Enter encryption password" required>
              </div>              
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn w-50" style="background-color: #444444; color: white;">Encode</button>
                </div>
            </form>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
          <hr>
              {{-- FORM DECODE --}}
              <form id="decodeForm" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-2">
                      <label for="decodeImage" class="form-label">Choose your image:</label>
                      <input type="file" id="decodeImage" name="image" class="form-control" required>
                  </div>
                  <div class="mb-2">
                    <label for="decodePassword" class="form-label">Enter Password:</label>
                    <input type="password" id="decodePassword" name="password" class="form-control" placeholder="Enter decryption password" required>
                </div>                
                  <div class="d-flex justify-content-center">
                      <button type="submit" class="btn w-50" style="background-color: #444444; color: white;">Decode</button>
                  </div>
              </form>
              <div id="decodedMessage" class="mt-3 text-center" style="font-weight: bold;"></div>
            </div>
        </div>
      </div>
    </div>

    </section><!-- /Services Section -->

    

  </main>

  <footer id="footer" class="footer dark-background">
    <div class="container">
      <h3 class="sitename" style="color: #E6B9A6;">InvisiByte</h3>
      <p>Your use of this website is at your own risk. We are not responsible for any loss or damage resulting from the use of this site.</p>
      <div class="social-links d-flex justify-content-center">
        {{-- <a href="#"><i class="bi bi-twitter-x"></i></a> --}}
        {{-- <a href="#"><i class="bi bi-facebook"></i></a> --}}
        {{-- <a href="#"><i class="bi bi-instagram"></i></a> --}}
        {{-- <a href="#"><i class="bi bi-skype"></i></a> --}}
        <a href="https://linkedin.com/in/shelinna-puspita-ali" target="blank"><i class="bi bi-linkedin"></i></a>
        <a href="https://github.com/selinapuspita" target="blank"><i class="bi bi-github"></i></a>
      </div>
      <div class="container">
        <div class="copyright">
            <span>Copyright</span> <strong class="px-1 sitename">InvisiByte</strong> <span>&copy; {{ date('Y') }} All Rights Reserved</span>
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you've purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
          {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
        </div>
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  {{--  SCRIPT UNTUK MENAMPILKAN PESAN SUCCESS dan DECODE --}}
  <script>
      document.getElementById('encodeForm').addEventListener('submit', function (e) {
      e.preventDefault(); // Mencegah reload halaman

      let password = document.getElementById("encodePassword").value.trim();
      if (!password) {
          alert("Password harus diisi!");
          return;
      }

      let formData = new FormData(this);

      // console.log("Password yang dikirim untuk encoding:", password);

      formData.append("password", password); // Tambahkan password

      fetch('/encode', {
          method: 'POST',
          body: formData,
          headers: {
              'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
          }
      })
      .then(response => response.json())
      .then(data => {
          if (data.success) {
              let a = document.createElement('a');
              a.href = data.downloadUrl;
              a.download = ''; // Biarkan nama file dari server tetap
              document.body.appendChild(a);
              a.click();
              document.body.removeChild(a);

              setTimeout(() => {
                  window.location.href = '/';
              }, 1000);
          } else {
              alert(data.error || "Terjadi kesalahan saat encoding.");
          }
      })
      .catch(error => {
          console.error('Error:', error);
          alert("Terjadi kesalahan saat berkomunikasi dengan server.");
      });
  });

  document.getElementById('decodeForm').addEventListener('submit', function(event) {
      event.preventDefault();

      let password = document.getElementById("decodePassword").value.trim();
      if (!password) {
          alert("Password harus diisi!");
          return;
      }

      let formData = new FormData(this);

      // console.log("Password yang dikirim:", password);

      formData.append("password", password); // Tambahkan password

      fetch('/decode', {
          method: 'POST',
          body: formData,
          headers: {
              'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
          }
      })
      .then(response => response.json())
      .then(data => {
          if (data.success) {
              document.getElementById('decodedMessage').innerHTML = "Pesan Rahasia: " + data.message;
          } else {
              alert(data.error || "Password salah atau terjadi kesalahan saat decoding.");
          }
      })
      .catch(error => {
          console.error('Error:', error);
          alert("Terjadi kesalahan saat berkomunikasi dengan server.");
      });

  });

  </script>

  <!-- Vendor JS Files -->
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>