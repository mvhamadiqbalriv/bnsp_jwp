<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BNSP - Junior Web Programmer @yield('title') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="https://upload.wikimedia.org/wikipedia/commons/a/ab/Apple-logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @yield('styles')

    <style>
      .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: black;
        color: white;
        text-align: center;
      }
      </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">
          <img src="https://upload.wikimedia.org/wikipedia/commons/a/ab/Apple-logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
          Junior Web Programmer</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }} " aria-current="page" href="{{url('/')}}">Peserta</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ (request()->is('create')) ? 'active' : '' }}" href="{{url('create')}}">Pendaftaran</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ (request()->is('sertifikasi')) ? 'active' : '' }}" href="{{url('sertifikasi')}}">Sertifikasi</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      @yield('content')
    </div>
    <div class="footer text-center text-white mt-5">
      <p>By Muhamad Iqbal Rivaldi</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    @yield('scripts')
  </body>
</html>
