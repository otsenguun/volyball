@extends('master')
@section('content')

<style>
    .top-player{
        height: 250px;
    }
</style>
<!-- Sponsors-->
<div class="container" style="position: relative">
    <ul class="home-sponsors sponsors-carousel" style="padding: 20px 50px">
        @foreach($cooperationLogos as $logo)
            <li><a href="#"><img src="{{ $logo->logo }}" alt="{{ $logo->company }}" /></a></li>
        @endforeach
    </ul>
</div>
<!-- End Sponsors -->
<!-- section-hero-posts-->
<div class="container" style="position: relative;">
    <div class="home-slider">
      <div class="home-slider-left">
        <!-- Swiper -->
        <div class="swiper-container">
          <div class="swiper-wrapper">
            @foreach($articles as $key => $article)
                    <div class="swiper-slide">
                    <div class="card-wrapper">
                        <article class="card" role="article">
                        <a href="{{ url('/news/'.$article->id.'/'.$article->slug) }}">
                            <div class="card-text">
                            <div class="card-meta">{{ $article->category }}</div>
                            <h2 class="card-title">
                                {{ Str::limit($article->title, 60) }}
                            </h2>
                            </div>
                            <img class="card-image" src="{{ url($article->image) }}" alt="{{ $article->title }}"/>
                        </a>
                        </article>
                    </div>
                    </div>
            @endforeach
          </div>
          <!-- Add Arrows -->
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
        <!-- Bottom part will go here -->
        <!-- <div class="card-container">
          <div class="card-single">
            <img src="img/blog/1.jpg" alt="" />
            <div class="card-container-text">
              <h6 class="color-white">RUGBY</h6>
              <p>Cheetahs can prove they've been the missing link</p>
            </div>
          </div>
          <div class="card-single">
            <img src="img/blog/2.jpg" alt="" />
            <div class="card-container-text">
              <h6 class="color-white">RUGBY</h6>
              <p>Cheetahs can prove they've been the missing link</p>
            </div>
          </div>
        </div> -->
        <!-- End bottom -->

        <div class="card-wrapper">
            @foreach($normal_articles as $key => $article)
                @if($key < 2)
                <article class="card" role="article" style="margin: 10px">
                    <a href="{{ url('/news/'.$article->id.'/'.$article->slug) }}">
                    <div class="card-text">
                        <div class="card-meta">{{ $article->category }}</div>
                        <h2 class="card-title">
                            {{ Str::limit($article->title, 60) }}
                        </h2>
                    </div>
                    <img class="card-image" src="{{ url($article->image) }}" alt="{{ $article->title }}"/>
                    </a>
                </article>
                @endif
            @endforeach
        </div>


      </div>
      <div class="home-slider-right">
        @foreach($normal_articles as $key => $article)
            @if($key >= 2)
                <div class="card-wrapper">
                <article class="card" role="article">
                    <a href="{{ url('/news/'.$article->id.'/'.$article->slug) }}">
                    <div class="card-text">
                        <div class="card-meta">{{ $article->category }}</div>
                        <h2 class="card-title">
                            {{ Str::limit($article->title, 60) }}
                        </h2>
                    </div>
                    <img class="card-image" src="{{ url($article->image) }}" alt="{{ $article->title }}"/>
                    </a>
                </article>
                </div>
            @endif
        @endforeach
      </div>
    </div>
</div>
<!-- End section-hero-posts-->
<div class="white-section paddings">
    <div class="container">

        <div class="row align-items-center">
            <div class="col-lg-12">
                <h3 class="clear-title no-margin">Шилдэг тоглогчид</h3>
            </div>


        </div>


        <div class="row portfolioContainer margin-top">
          @foreach($top_players as $player)
            <!-- Item Gallery -->

                <div class="col-sm-6 col-lg-4 col-xl-4 image" >
                    <a href="{{url('/show_player',$player->id)}}">
                    {{-- <img src="{{asset('app/'.$player->image)}}" alt=""> --}}
                    <div class="top-player" style="background: url('app/{{$player->image}}')">

                    </div>
                    <h5>{{$player->last_name}} {{$player->frist_name}} </h5>
                    </a>
                </div>


            <!-- Item Gallery -->
          @endforeach
        </div>
    </div>
  </div>
<!-- Section Area - Content Central -->
<section class="content-info" style="margin-top: 70px; margin-bottom: 30px;">
    <!-- Dark Home -->
    <div class="dark-home">
      <div class="container">
        <div class="row">
          <!-- Left Content - Tabs and Carousel -->
          <div class="col-xl-9 col-md-12">
            <!-- Nav Tabs -->
            <ul class="nav nav-tabs" id="myTab">
              <li class="active">
                <a href="#statistics" data-toggle="tab">Статистик</a>
              </li>
              <li>
                <a href="#matches" data-toggle="tab">Оноолтууд</a>
              </li>
              <li><a href="#groups" data-toggle="tab">Грүппүүд</a></li>
            </ul>
            <!-- End Nav Tabs -->

            <!-- Content Tabs -->
            <div class="tab-content">
                                <!-- Tab Theree - statistics -->
                                <div class="tab-pane active" id="statistics">
                                  <div class="row">
                                    <!-- Club Ranking -->
                                    <div class="col-lg-4">
                                      <div class="club-ranking">
                                        <h5><a href="#">Клүбүүлын байр</a></h5>
                                        <div class="info-ranking">
                                          <ul>
                                            <li>
                                              <span class="position"> 1 </span>
                                              <a href="single-team.html">
                                                <img src="{{ url('/img/clubs-logos/hos-bar.jpg') }}" alt="" />
                                                ХОС БАР
                                              </a>
                                              <span class="points"> 90 </span>
                                            </li>
                                                 <li>
                                              <span class="position"> 2 </span>
                                              <a href="single-team.html">
                                                <img src="{{ url('/img/clubs-logos/hos-bar.jpg') }}" alt="" />
                                                ХОС БАР
                                              </a>
                                              <span class="points"> 90 </span>
                                            </li>
                                                 <li>
                                              <span class="position"> 3 </span>
                                              <a href="single-team.html">
                                                <img src="{{ url('/img/clubs-logos/hos-bar.jpg') }}" alt="" />
                                                ХОС БАР
                                              </a>
                                              <span class="points"> 90 </span>
                                            </li>
                                                 <li>
                                              <span class="position"> 4 </span>
                                              <a href="single-team.html">
                                                <img src="{{ url('/img/clubs-logos/hos-bar.jpg') }}" alt="" />
                                                ХОС БАР
                                              </a>
                                              <span class="points"> 90 </span>
                                            </li>
                                                 <li>
                                              <span class="position"> 5 </span>
                                              <a href="single-team.html">
                                                <img src="{{ url('/img/clubs-logos/hos-bar.jpg') }}" alt="" />
                                                ХОС БАР
                                              </a>
                                              <span class="points"> 90 </span>
                                            </li>
                                                 <li>
                                              <span class="position"> 6 </span>
                                              <a href="single-team.html">
                                                <img src="{{ url('/img/clubs-logos/hos-bar.jpg') }}" alt="" />
                                                ХОС БАР
                                              </a>
                                              <span class="points"> 90 </span>
                                            </li>
                                                 <li>
                                              <span class="position"> 7 </span>
                                              <a href="single-team.html">
                                                <img src="{{ url('/img/clubs-logos/hos-bar.jpg') }}" alt="" />
                                                ХОС БАР
                                              </a>
                                              <span class="points"> 90 </span>
                                            </li>


                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- End Club Ranking -->

                                    <!-- recent-results -->
                                    <div class="col-lg-4">
                                      <div class="recent-results">
                                        <h5><a href="#">Сүүлийн тоглолтын хариу</h5>
                                        <div class="info-results">
                                          <ul>
                                            <li>
                                              <span class="head">
                                                Ховд Алтайн барс -  Хасумегастарс
                                                <span class="date">27 Дол 2017</span>
                                              </span>

                                              <div class="goals-result">
                                                <a href="#">

                                                 Ховд Алтайн барс
                                                </a>

                                                <span class="goals">
                                                  <b>3</b> - <b>1</b>
                                                </span>

                                                <a href="#">

                                                   Хасумегастарс
                                                </a>
                                              </div>
                                            </li>

                                               <li>
                                              <span class="head">
                                                Ховд Алтайн барс -  Хасумегастарс
                                                <span class="date">27 Дол 2017</span>
                                              </span>

                                              <div class="goals-result">
                                                <a href="#">

                                                 Ховд Алтайн барс
                                                </a>

                                                <span class="goals">
                                                  <b>3</b> - <b>1</b>
                                                </span>

                                                <a href="#">

                                                   Хасумегастарс
                                                </a>
                                              </div>
                                            </li>
                                                <li>
                                              <span class="head">
                                                Ховд Алтайн барс -  Хасумегастарс
                                                <span class="date">27 Дол 2017</span>
                                              </span>

                                              <div class="goals-result">
                                                <a href="#">

                                                 Ховд Алтайн барс
                                                </a>

                                                <span class="goals">
                                                  <b>3</b> - <b>1</b>
                                                </span>

                                                <a href="#">

                                                   Хасумегастарс
                                                </a>
                                              </div>
                                            </li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- end recent-results -->

                                    <!-- Top player -->
                                    <div class="col-lg-4">
                                      <div class="player-ranking">
                                        <h5><a href="#">Шилдэг Тоглогчид</a></h5>
                                        <div class="info-player">
                                          <ul>
                                            <li>
                                              <span class="position"> 1 </span>
                                              <a href="#">
                                                <img src="{{ url('/assets/img/players/1.jpg') }}" alt="" />
                                                Хатанбаатар Ч
                                              </a>
                                              <span class="points"> 90 </span>
                                            </li>

                                            <li>
                                              <span class="position"> 2 </span>
                                              <a href="#">
                                                <img src="{{ url('/assets/img/players/2.jpg') }}" alt="" />

                                                Зоригт И
                                              </a>
                                              <span class="points"> 88 </span>
                                            </li>

                                            <li>
                                              <span class="position"> 3 </span>
                                              <a href="#">
                                                <img src="{{ url('/assets/img/players/3.jpg') }}" alt="" />
                                                Наранбаатар Ө
                                              </a>
                                              <span class="points"> 86 </span>
                                            </li>

                                            <li>
                                              <span class="position"> 4 </span>
                                              <a href="#">
                                                <img src="{{ url('/assets/img/players/4.jpg') }}" alt="" />
                                                Хүслэн А
                                              </a>
                                              <span class="points"> 80 </span>
                                            </li>

                                            <li>
                                              <span class="position"> 5 </span>
                                              <a href="#">
                                                <img src="{{ url('/assets/img/players/5.jpg') }}" alt="" />

                                                Болд Р
                                              </a>
                                              <span class="points"> 76 </span>
                                            </li>

                                            <li>
                                              <span class="position"> 6 </span>
                                              <a href="#">
                                                <img src="{{ url('/assets/img/players/6.jpg') }}" alt="" />

                                                Эрдэнэ Э
                                              </a>
                                              <span class="points"> 74 </span>
                                            </li>

                                            <li>
                                              <span class="position"> 7 </span>
                                              <a href="#">
                                                <img src="{{ url('/assets/img/players/2.jpg') }}" alt="" />

                                                Баярцогт А
                                              </a>
                                              <span class="points"> 70 </span>
                                            </li>

                                            <li>
                                              <span class="position"> 8 </span>
                                              <a href="#">
                                                <img src="{{ url('/assets/img/players/1.jpg') }}" alt="" />
                                                Хурбилэг Н
                                              </a>
                                              <span class="points"> 65 </span>
                                            </li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- End Top player -->
                                  </div>
                                </div>
                                <!-- Tab Theree - statistics -->

              <!-- Tab Two - Destinations -->
              <div class="tab-pane" id="matches">
                <div class="info-general" style="padding: 0">
                  <div class="row">
                    <div class="col-lg-12">
                      <h5><a href="#" style="color: #fff">Тоглолтууд</a></h5>
                      <table
                        class="table-striped table-responsive table-hover"
                      >
                        <thead>
                          <tr>
                            <th>Баг A</th>
                            <th class="text-center">VS</th>
                            <th>Баг B</th>
                            <th>Тайлбар</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <img
                                src="{{ url('/assets/img/clubs-logos/colombia.png') }}"
                                alt="icon"
                              />
                              <strong>Колумб</strong><br />
                              <small class="meta-text">Грүпп H.</small>
                            </td>
                            <td class="text-center">Vs</td>
                            <td>
                              <img
                                src="{{ url('/assets/img/clubs-logos/japan.png') }}"
                                alt="icon1"
                              />
                              <strong>Япон</strong><br />
                              <small class="meta-text">Грүпп H.</small>
                            </td>
                            <td>
                              Зур 19, 07:00<br />
                              <small class="meta-text"
                                >Mordovia Arena,Saransk</small
                              >
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <img
                                src="{{ url('/assets/img/clubs-logos/pol.png') }}"
                                alt="icon1"
                              />
                              <strong>Португал</strong><br />
                              <small class="meta-text">Грүпп H.</small>
                            </td>
                            <td class="text-center">Vs</td>
                            <td>
                              <img
                                src="{{ url('/assets/img/clubs-logos/colombia.png') }}"
                                alt="icon"
                              />
                              <strong>Колумб</strong><br />
                              <small class="meta-text">Грүпп H.</small>
                            </td>
                            <td>
                              Зур 24, 13:00<br />
                              <small class="meta-text"
                                >Kazan Arena,Kazan</small
                              >
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <img
                                src="{{ url('/assets/img/clubs-logos/sen.png') }}"
                                alt="icon1"
                              />
                              <strong>Сэнэгал</strong><br />
                              <small class="meta-text">Грүпп H.</small>
                            </td>
                            <td class="text-center">Vs</td>
                            <td>
                              <img
                                src="{{ url('/assets/img/clubs-logos/colombia.png') }}"
                                alt="icon"
                              />
                              <strong>Колумб</strong><br />
                              <small class="meta-text">Грүпп H.</small>
                            </td>
                            <td>
                              Зур 28, 09:00<br />
                              <small class="meta-text"
                                >Samara Arena,Samara</small
                              >
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <img
                                src="{{ url('/assets/img/clubs-logos/colombia.png') }}"
                                alt="icon"
                              />
                              <strong>Колумб</strong><br />
                              <small class="meta-text">Грүпп H.</small>
                            </td>
                            <td class="text-center">Vs</td>
                            <td>
                              <img
                                src="{{ ('/assets/img/clubs-logos/pol.png') }}l}}"
                                alt="icon1"
                              />
                              <strong>Португал</strong><br />
                              <small class="meta-text">Грүпп H.</small>
                            </td>
                            <td>
                              Зур 24, 13:00<br />
                              <small class="meta-text"
                                >Kazan Arena,Kazan</small
                              >
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Tab Two - Destinations -->


              <!-- Tab One - Groups List -->
              <div class="tab-pane" id="groups">
                <div class="groups-list">
                  <div class="row">
                    <div class="col-lg-3 col-md-6">
                      <h5><a href="#">Грүпп A</a></h5>
                      <div class="item-group">
                        <ul>
                          <li>
                            <a href="#">
                              <img src="{{ url('/assets/img/clubs-logos/rusia.png') }}" alt="" />
                              Орос
                            </a>
                          </li>

                          <li>
                            <a href="#">
                              <img
                                src="{{ url('/assets/img/clubs-logos/arabia.png') }}"
                                alt=""
                              />
                              Араб
                            </a>
                          </li>

                          <li>
                            <a href="#">
                              <img src="{{ url('/assets/img/clubs-logos/egy.png') }}" alt="" />
                              Эгипт
                            </a>
                          </li>

                          <li>
                            <a href="#">
                              <img src="{{ url('/assets/img/clubs-logos/uru.png') }}" alt="" />
                              Уругвай
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                      <h5><a href="#">Грүпп B</a></h5>
                      <div class="item-group">
                        <ul>
                          <li>
                            <a href="#">
                              <img src="{{ url('/assets/img/clubs-logos/por.png') }}" alt="" />
                              Португал
                            </a>
                          </li>

                          <li>
                            <a href="#">
                              <img src="{{ url('/assets/img/clubs-logos/esp.png') }}" alt="" />
                              Спайн
                            </a>
                          </li>

                          <li>
                            <a href="#">
                              <img src="{{ url('/assets/img/clubs-logos/mar.png') }}" alt="" />
                              Морроко
                            </a>
                          </li>

                          <li>
                            <a href="#">
                              <img src="{{ url('/assets/img/clubs-logos/irn.png') }}" alt="" />
                              Иран
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                      <h5><a href="#">Грүпп C</a></h5>
                      <div class="item-group">
                        <ul>
                          <li>
                            <a href="#">
                              <img src="{{ url('/assets/img/clubs-logos/fra.png') }}" alt="" />
                              Франц
                            </a>
                          </li>

                          <li>
                            <a href="#">
                              <img src="{{ url('/assets/img/clubs-logos/aus.png') }}" alt="" />
                              Австрали
                            </a>
                          </li>

                          <li>
                            <a href="#">
                              <img src="{{ url('/assets/img/clubs-logos/per.png') }}" alt="" />
                              Пэрү
                            </a>
                          </li>

                          <li>
                            <a href="#">
                              <img src="{{ url('/assets/img/clubs-logos/den.png') }}" alt="" />
                              Дэнмарк
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                      <h5><a href="#">Грүпп D</a></h5>
                      <div class="item-group">
                        <ul>
                          <li>
                            <a href="#">
                              <img src="{{ url('/assets/img/clubs-logos/arg.png') }}" alt="" />
                              Аргэнтина
                            </a>
                          </li>

                          <li>
                            <a href="#">
                              <img src="{{ url('/assets/img/clubs-logos/isl.png') }}" alt="" />
                              Исланд
                            </a>
                          </li>

                          <li>
                            <a href="#">
                              <img src="{{ url('/assets/img/clubs-logos/cro.png') }}" alt="" />
                              Хроват
                            </a>
                          </li>

                          <li>
                            <a href="#">
                              <img src="assets/img/clubs-logos/nga.png" alt="" />
                              Нигэриа
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-6">
                      <h5><a href="#">Грүпп E</a></h5>
                      <div class="item-group">
                        <ul>
                          <li>
                            <a href="#">
                              <img src="assets/img/clubs-logos/bra.png" alt="" />
                              Бразил
                            </a>
                          </li>

                          <li>
                            <a href="#">
                              <img src="assets/img/clubs-logos/sui.png" alt="" />
                              Шивцарь
                            </a>
                          </li>

                          <li>
                            <a href="#">
                              <img
                                src="assets/img/clubs-logos/costa-rica.png"
                                alt=""
                              />
                              Коста рика
                            </a>
                          </li>

                          <li>
                            <a href="#">
                              <img src="assets/img/clubs-logos/srb.png" alt="" />
                              Сэрб
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                      <h5><a href="#">Грүпп F</a></h5>
                      <div class="item-group">
                        <ul>
                          <li>
                            <a href="#">
                              <img src="assets/img/clubs-logos/ger.png" alt="" />
                              Гэрман
                            </a>
                          </li>

                          <li>
                            <a href="#">
                              <img src="assets/img/clubs-logos/mex.png" alt="" />
                              Мэксик
                            </a>
                          </li>

                          <li>
                            <a href="#">
                              <img src="assets/img/clubs-logos/swe.png" alt="" />
                              Швэд
                            </a>
                          </li>

                          <li>
                            <a href="#">
                              <img src="assets/img/clubs-logos/kor.png" alt="" />
                              Солонгос
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                      <h5><a href="#">Грүпп G</a></h5>
                      <div class="item-group">
                        <ul>
                          <li>
                            <a href="#">
                              <img src="assets/img/clubs-logos/bel.png" alt="" />
                              Бэлги
                            </a>
                          </li>

                          <li>
                            <a href="#">
                              <img src="assets/img/clubs-logos/pan.png" alt="" />
                              Панам
                            </a>
                          </li>

                          <li>
                            <a href="#">
                              <img src="assets/img/clubs-logos/tun.png" alt="" />
                              Тунсиа
                            </a>
                          </li>

                          <li>
                            <a href="#">
                              <img src="assets/img/clubs-logos/eng.png" alt="" />
                              Англи
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                      <h5><a href="#">Грүпп H</a></h5>
                      <div class="item-group">
                        <ul>
                          <li>
                            <a href="#">
                              <img src="assets/img/clubs-logos/pol.png" alt="" />
                              Полши
                            </a>
                          </li>

                          <li>
                            <a href="#">
                              <img src="assets/img/clubs-logos/sen.png" alt="" />
                              Сэнэгал
                            </a>
                          </li>

                          <li>
                            <a href="#">
                              <img
                                src="assets/img/clubs-logos/colombia.png"
                                alt=""
                              />
                              Colombia
                            </a>
                          </li>

                          <li>
                            <a href="#">
                              <img src="assets/img/clubs-logos/japan.png" alt="" />
                              Япон
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Tab One - Groups List -->

            </div>
            <!-- Content Tabs -->
          </div>
          <!-- Left Content - Tabs and Carousel -->

          <!-- Right Content - Content Counter -->
          <div class="col-xl-3 col-md-12">
            <div class="counter-home-wraper">
              <div class="title-color text-center">
                <h4>Тун удахгүй</h4>
              </div>

              <div class="content-counter content-counter-home">
                <p class="text-center">
                  <i class="fa fa-clock-o"></i>
                  Эхлэх тоолуур
                </p>
                <div id="event-one" class="counter"></div>
                <ul class="post-options">
                  <li><i class="fa fa-calendar"></i>14 Зур, 2021</li>
                  <li><i class="fa fa-clock-o"></i>Шууд, 12:00 PM</li>
                </ul>

                <div class="list-groups">
                  <div class="row align-items-center">
                    <div class="col-md-12">
                      <p>Грүпп A, Улаанбаатар, Спортын ордон</p>
                    </div>

                    <div class="col-md-5">
                      <img src="https://i1.wp.com/mva.mn/wp-content/uploads/2020/08/altain-bars-logo-200x160-2.png?w=200&ssl=1" alt="" />
                      <span>Ховд Алтайн барс</span>
                    </div>

                    <div class="col-md-2">
                      <div class="vs">Vs</div>
                    </div>

                    <div class="col-md-5">
                      <img src="https://i1.wp.com/mva.mn/wp-content/uploads/2020/08/khasumegastars-logo-200x160-1.png?w=200&ssl=1" alt="" />
                      <span>Хасумегастарс</span>
                    </div>
                  </div>
                </div>

                <a class="btn btn-primary" href="#">
                  Захиалах
                  <i class="fa fa-trophy"></i>
                </a>
              </div>
            </div>
            <!-- Content Counter -->
          </div>
          <!-- End Right Content - Content Counter -->
        </div>
      </div>
    </div>
    <!-- Dark Home -->
</section>

<!-- Section Area - Content Central -->
<section class="content-info" style="padding-top: 0px !important;">
    @php $checkvalues = 0; @endphp
    @foreach($articles as $key => $artcile)
        @if($key > 4)
            @php $checkvalues += 1; @endphp
        @endif
    @endforeach
    @if($checkvalues == 6)
        <!-- Content Central -->
        <div class="container" style="padding-top: 0px !important;">
        <div class="row">
            <!-- content Column Left -->
            <div class="col-lg-12 col-xl-12">
            <div class="col-lg-4 mb-4">
                <h3 class="clear-title no-margin">Мэдээ</h3>
            </div>
            <div class="home-slider">
                <div class="col-lg-9 col-xl-9">
                    @foreach($articles as $key => $art)
                        @if($key == 5)
                            <div class="card-wrapper">
                                <article class="card" role="article">
                                <a href="{{ url('/news/'.$art->id.'/'.$art->slug) }}">
                                    <div class="card-text">
                                    <div class="card-meta"><i class="fa fa-calendar"></i> {{ $art->updated_at->diffForHumans() }}</i></div>
                                    <h2 class="card-title">
                                        {{ Str::limit($art->title, 60) }}
                                    </h2>
                                    </div>
                                    <img class="card-image" src="{{ url($art->image) }}" alt="{{ $art->title }}"/>
                                </a>
                                </article>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-lg-3 col-xl-3">
                    @foreach($articles as $key => $arti)
                        @if($key == 6)
                            <div class="card-wrapper">
                                <article class="card" role="article">
                                <a href="{{ url('/news/'.$arti->id.'/'.$arti->slug) }}">
                                    <div class="card-text">
                                    <div class="card-meta"><i class="fa fa-calendar"></i> {{ $arti->updated_at->diffForHumans() }}</i></div>
                                    <h2 class="card-title">
                                        {{ Str::limit($arti->title, 60) }}
                                    </h2>
                                    </div>
                                    <img class="card-image" src="{{ url($arti->image) }}" alt="{{ $arti->title }}"/>
                                </a>
                                </article>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="home-slider mb-4">
                @foreach($articles as $key => $artic)
                    @if($key > 6)
                    <div class="col-lg-3 col-xl-3">
                        <div class="card-wrapper">
                            <article class="card" role="article">
                            <a href="{{ url('/news/'.$artic->id.'/'.$artic->slug) }}">
                                <div class="card-text">
                                <div class="card-meta"><i class="fa fa-calendar"></i> {{ $artic->updated_at->diffForHumans() }}</i></div>
                                <h2 class="card-title">
                                    {{ Str::limit($artic->title, 60) }}
                                </h2>
                                </div>
                                <img class="card-image" src="{{ url($artic->image) }}" alt="{{ $artic->title }}"/>
                            </a>
                            </article>
                        </div>
                    </div>
                    @endif
                @endforeach

            </div>
            <!-- End content Left -->
        </div>
        </div>
        <!-- End Content Central -->
    @endif

    @if($galleries != '[]')
    <!-- White Section -->
    <div class="white-section paddings">
      <div class="container">

          <div class="row align-items-center">
              <div class="col-lg-4">
                  <h3 class="clear-title no-margin">Спорт Галлэрэй</h3>
              </div>

              <div class="col-lg-8">
                  <!-- Nav Filters -->
                  <div class="portfolioFilter no-margin no-bg pull-right">
                      <a href="#" data-filter="*" class="current">Бүгд</a>
                      <a href="#" data-filter=".image">Зураг</a>
                  </div>
                  <!-- End Nav Filters -->
              </div>
          </div>


          <div class="row portfolioContainer margin-top">
            @foreach($galleries as $gallery)
              <!-- Item Gallery -->
              <div class="col-sm-6 col-lg-4 col-xl-3 image">
                  <div class="item-gallery">
                      <div class="hover small">
                          <img src="{{ $gallery->image }}" alt="{{ $gallery->title }}" />
                          <a class="swipebox-ligbox"  href="{{ $gallery->image }}">
                              <div class="overlay"><i class="fa fa-plus"></i></div>
                          </a>
                      </div>
                      <div class="info-gallery">
                          <p>{{ $gallery->title }}</p>
                          <i class="fa fa-picture-o"></i>
                      </div>
                  </div>
              </div>
              <!-- Item Gallery -->
            @endforeach
          </div>
      </div>
    </div>
    <!-- End White Section -->
    @endif

</section>
<!-- End White Section -->
<div class="white-section trophy-background">
    <div class="container">
      <div class="col-lg-4">
        <h3 class="clear-title no-margin" style="color: #fff">Зохион байгуулсан тэмцээнүүд</h3>
      </div>
      <div class="col-lg-12 col-lg-offset-2">
        <!-- START Trophy Case -->
        <div class="row" style="margin: auto;width: 80%" align="center">
          <!-- START Row 1 -->
          <div class="col-xs-6 col-md-3" style="z-index: 2;">
            <a aria-expanded="true" data-toggle="tab" href="#tab-trophy1" role="tab"><img src="assets/img/trophies/2.png" class="trophy"></a>
            <div class="trophy-info">
              <h5 class="trophy-title">
                Монголын Волейболын Их Наадам
              </h5>
              <span class="trohpy-date">2014 - 01 - 24</span>
            </div>
          </div>
          <div class="col-xs-12 shelf hidden-md hidden-lg"></div>
          <div class="col-xs-6 col-md-3" style="z-index: 2;">
            <a aria-expanded="true" data-toggle="tab" href="#tab-trophy2" role="tab"><img src="assets/img/trophies/3.png" class="trophy"></a>
            <div class="trophy-info">
              <h5 class="trophy-title">
                Өсвөр насны олимпиад
              </h5>
              <span class="trohpy-date">2019 - 08 - 12</span>
            </div>
          </div>
          <div class="col-xs-12 shelf hidden-md hidden-lg"></div>
          <div class="col-xs-6 col-md-3" style="z-index: 2;">
            <a aria-expanded="true" data-toggle="tab" href="#tab-trophy3" role="tab"><img src="assets/img/trophies/4.png" class="trophy"></a>
            <div class="trophy-info">
              <h5 class="trophy-title">
                Их сургуулиудын шигшээ тэмцээн
              </h5>
              <span class="trohpy-date">2017 - 12 - 02</span>
            </div>
          </div>
          <div class="col-xs-12 shelf hidden-md hidden-lg"></div>
          <div class="col-xs-6 col-md-3" style="z-index: 2;">
            <a aria-expanded="true" data-toggle="tab" href="#tab-trophyTrue" role="tab"><img src="assets/img/trophies/1.png" class="trophy"></a>
            <div class="trophy-info">
              <h5 class="trophy-title">
                2020 оны улсын аварга шалгаруулах тэмцээн
              </h5>
              <span class="trohpy-date">2020 - 03 - 11</span>
            </div>
          </div>
          <div class="col-xs-12 shelf"></div>
          <!-- END Row 1 -->
        </div>
        <!-- END Trophy Case -->
      </div>
    </div>
  </div>
<!-- End Section Area -  Content Central -->
@endsection
