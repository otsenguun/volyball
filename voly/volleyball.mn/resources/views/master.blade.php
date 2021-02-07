<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'Монголын волейболын залуучуудын холбоо - Mongolian volleyball youth association') }}</title>
    @php $alt = 'Монголын волейболын залуучуудын холбоо - Mongolian volleyball youth association'; @endphp
    <link href="{{ url('/assets/assets/css/main.css') }}" rel="stylesheet" media="screen" />


    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

    @yield('css')
  </head>

  <body>

    <!-- layout-->
    <div id="layout">
      <!-- Header-->
      <header class="mobile-only-header">
        <!-- End headerbox-->
        <div class="headerbox">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <!-- Logo-->
                    <div class="col">
                      <div class="logo">
                          <a href="{{ url('/') }}" title="Return Home">
                                <img src="{{ url('/assets/images/logo.png') }}" alt="{{ $alt }}" class="logo_img" width="60">
                            </a>
                      </div>
                    </div>
                    <!-- End Logo-->
                    <button class="watch-button" style="margin-right: 1.5em">Live<span class="live-icon"></span></button>

                        <!-- Call Nav Menu-->
                        <a class="mobile-nav" href="#mobile-nav"><i class="fa fa-bars"></i></a>
                        <!-- End Call Nav Menu-->
                    <!-- End Adds Header-->
                </div>
            </div>
        </div>
        <!-- End headerbox-->
      </header>
      <!-- End Header-->
      <!-- mainmenu-->
      <nav class="mainmenu">
        <div class="container">
          <div class="menu-icon">
            <img src="{{ url('/assets/images/logo.png') }}" alt="{{ $alt }}" />
          </div>
          <!-- Menu-->
          <ul class="sf-menu" id="menu">
            <li class="float-right">
              <i class="fa fa-search color-white" style="cursor: pointer"></i>
            </li>

            <li class="float-right">
              <button class="watch-button">Live<span class="live-icon"></span></button>
            </li>
            <li><a href="#">Бидэнтэй холбогдох</a></li>
            <li class="@if($page == 'newslist')current active @endif">
              <a href="{{ url('/news/list') }}">Мэдээ</a>
            </li>
             <li class="current">
              <a href="all-teams.html">Багууд</a>
            </li>
            <li>
              <a href="#">Тэмцээнүүд</a>
              <div class="sf-mega">
                <div class="row">
                  <div class="col-md-3">
                    <h5>
                      <i class="fa fa-trophy" aria-hidden="true"></i>Тэмцээн
                    </h5>
                    <ul>
                      <li><a href="points.html">Оноо заалт</a></li>
                      <li><a href="all-players.html">Тоглогчид</a></li>
                      <li><a href="#">Грүппүүд</a></li>
                      <li><a href="calendar.html">Калэндар</a></li>
                      <li><a href="contact.html">Бидэнтэй холбогдох</a></li>
                    </ul>
                  </div>

                  <div class="col-md-3">
                    <h5>
                      <i class="fa fa-users" aria-hidden="true"></i> Багуудын жагсаалт
                    </h5>
                    <div class="img-hover">
                      <img src="img/blog/1.jpg" alt="" class="img-responsive" />
                      <div class="overlay"><a href="all-teams.html">+</a></div>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <h5>
                      <i class="fa fa-futbol-o" aria-hidden="true"></i> Тоглогчид
                      List
                    </h5>
                    <div class="img-hover">
                      <img src="img/blog/2.jpg" alt="" class="img-responsive" />
                      <div class="overlay"><a href="all-players.html">+</a></div>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <h5>
                      <i class="fa fa-gamepad" aria-hidden="true"></i> Үр дүн
                      Info
                    </h5>
                    <div class="img-hover">
                      <img src="img/blog/3.jpg" alt="" class="img-responsive" />
                      <div class="overlay"><a href="points.html">+</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <a href="#">ВЗХ</a>
              <div class="sf-mega">
                <div class="row">
                  <div class="col-md-4">
                    <h5>
                      Танилцуулга
                    </h5>
                    <ul>
                      <li><a href="points.html">Бидний тухай</a></li>
                      <li><a href="#">Ерөнхийлөгч</a></li>
                      <li><a href="#">Зургын цомог</a></li>
                     
                    </ul>
                  </div>

  
                </div>
              </div>
            </li>
            <li class="current active">
              <a href="http://volleyball.mn/">Нүүр хуудас</a>
            </li>

          </ul>
          <!-- End Menu-->
          <!-- Color Red -->
        </div>
      </nav>
      <!-- End mainmenu-->
      <div id="mobile-nav">
        <!-- Menu-->
        <ul>
            <li>
              <a href="http://volleyball.mn/">Нүүр</a>
              <ul>
                <li>
                  <a href="all-players.html">Бүх Тоглогчид</a>
                </li>
                <li>
                  <a href="single-player.html">Нэг тоглогч</a>
                </li>
                <li>
                  <a href="single-team.html">Нэг баг</a>
                </li>
                <li>
                  <a href="points.html">Оноолт</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="single-team.html">Багууд</a>
              <ul>
                <li>
                  <a href="single-team.html">Бүх багууд</a>
                </li>
              </ul>
            </li>

            <li>
              <a href="#">Тоглогчид</a>
            </li>

            <li>
              <a href="points.html">Оноолтууд</a>
            </li>

            <li>
              <a href="points.html">Тоглолтын хариу</a>
            </li>
          </ul>

            <li class="@if($page == 'home')current active @endif">
              <a href="{{ url('/') }}">Нүүр хуудас</a>
            </li>

          </ul>
          <!-- End Menu-->
          <!-- Color Red -->
        </div>
      </nav>
      <!-- End mainmenu-->
      <div id="mobile-nav">
        <!-- Menu-->
        <ul>
            <li>
              <a href="{{ url('/') }}">Нүүр</a>
            </li>
            <li>
              <a href="{{ url('/news/list') }}">Мэдээ</a>
            </li>
          </ul>
        <!-- End Menu-->
      </div>
      <!-- End -->
      @yield('content')






      <!-- footer-->
      <footer id="footer" class="footer-3">
        <!-- Footer Top-->
        <div class="top-footer">

            <!-- Logo Footer-->
           <div class="col-lg-12">
            <div class="logo-footer">
              <img src="{{ url('/assets/images/logo.png') }}" alt="{{ $alt }}" width="170">
            </div>
           </div>
            <!-- End Logo Footer-->

            <!-- Social Icons-->
            <ul class="social">
                <li>
                    <div>
                        <a href="#" class="facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </div>
                </li>
                <li>
                    <div>
                        <a href="#" class="twitter-icon">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </div>
                </li>
                <li>
                    <div>
                        <a href="#" class="vimeo">
                            <i class="fa fa-vimeo-square"></i>
                        </a>
                    </div>
                </li>
                <li>
                    <div>
                        <a href="#" class="google-plus">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </div>
                </li>
                <li>
                    <div>
                        <a href="#" class="youtube">
                            <i class="fa fa-youtube"></i>
                        </a>
                    </div>
                </li>
            </ul>
            <!-- End Social Icons-->
        </div>
        <!-- End Footer Top-->
        <div class="footer-down">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <p>&copy; 2020 - {{ date("Y") }} . Зохиогчын эрхээр хамгаалагдсан. </p>
                  </div>
              </div>
          </div>
      </div>
    </footer>
    <!-- End footer-->


    </div>
    <!-- SwiperJS CDN -->
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- End SwiperJS CDN -->

    <!-- Initialize swiper -->
    <script>
      var mySwiper = new Swiper('.swiper-container', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,

        // If we need pagination
        pagination: {
          el: '.swiper-pagination',
        },

        // Navigation arrows
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },

        // And if we need scrollbar
        scrollbar: {
          el: '.swiper-scrollbar',
        },
      });
    </script>
    <!-- Initialize swiper end -->

    <script type="text/javascript" src="{{ url('/assets/assets/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ url('/assets/assets/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/assets/assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/assets/assets/js/theme-scripts.js') }}"></script>
    <script type="text/javascript" src="{{ url('/assets/assets/js/theme-main.js') }}"></script>

    <!-- End JQuert and Popup -->
  </body>
</html>
