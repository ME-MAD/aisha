<!DOCTYPE html>
<html lang="en">

<head>
      <title>Document</title>

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
            integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

      <link rel="stylesheet" href="{{ asset('fonts/heebo/heebo.css') }}">

      <link rel="stylesheet" href="{{ asset('css/site/main.css') }}">
      <link rel="stylesheet" href="{{ asset('css/site/nav.css') }}">
      <link rel="stylesheet" href="{{ asset('css/site/about.css') }}">
      <link rel="stylesheet" href="{{ asset('css/site/courses.css') }}">
      <link rel="stylesheet" href="{{ asset('css/site/footer.css') }}">

      @stack('css')
</head>

<body>
      <div class="main-top">
            <nav>
                  <div>
                        <img src="{{ asset('images/site/logo.png') }}" alt="">
                  </div>

                  <ul>
                        <li>
                              <a href="{{ route('home.index') }}">Home</a>
                        </li>
                        <li>
                              <a href="./courses.html">Courses</a>
                        </li>
                        <li>
                              <a href="{{ route('about.index') }}">About</a>
                        </li>
                        <li>
                              <a href="./Course Details.html">Course Detials</a>
                        </li>
                        <li>
                              <a href="./pricing.html">Pricing</a>
                        </li>
                        <li>
                              <a href="./404.html">Pages</a>
                        </li>
                        <li>
                              <a href="#">Contact</a>
                        </li>

                        <div class="close-btn">
                              <i class="fa-solid fa-xmark"></i>
                        </div>
                  </ul>

                  <div class="burger">
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                  </div>
                  <div class="nav-blanket"></div>
            </nav>


            @yield('header')


      </div>


      @yield('content')


      <footer>
            <div class="top text-center">
                  <h2>Newsletter</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt ut labore et</p>
                  <form action="">
                        <div>
                              <input type="text" class="input" placeholder="your email">
                        </div>
                        <div class="buttons">
                              <button class="btn-blue">
                                    send email
                              </button>
                        </div>
                  </form>
            </div>
            <div class="bot main-top">
                  <div class="logo">
                        <img src="{{ asset('images/site/logo.png') }}" alt="">
                  </div>
                  <div class="copyright">
                        Copyright © E-MAD
                  </div>
                  <div class="social text-center">
                        <div class="icon">
                              <i class="fa-brands fa-facebook-f"></i>
                        </div>
                        <div class="icon">
                              <i class="fa-brands fa-twitter"></i>
                        </div>
                        <div class="icon">
                              <i class="fa-brands fa-youtube"></i>
                        </div>
                        <div class="icon">
                              <i class="fa-brands fa-instagram"></i>
                        </div>
                  </div>
            </div>
      </footer>


      <script src="{{ asset('js/site/shared/nav.js') }}"></script>
      <script src="{{ asset('js/site/index/index.js') }}"></script>
</body>

</html>
