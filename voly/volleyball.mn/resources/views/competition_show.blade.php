@extends('master')
@section('content')
      <!-- Section Title -->
      <div
        class="section-title single-result"
        style="background: url({{asset('app/'.$comp->background_image)}}); margin-top: 40px"
      >
        <div class="container">
          <div class="row">
            <!-- Result Location -->
            <div class="col-lg-12">
              <div class="result-location">
                <ul>
                  <li>{{$comp->create_date}}</li>

                  <li>
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    {{$comp->address}}
                  </li>
                  <li>Үзэгчид: {{$comp->uzegch_count}}</li>
                </ul>
              </div>
            </div>
          </div>
          <!-- End Result Location -->

          <!-- Result -->
          <div class="row">
            <div class="col-md-5 col-lg-5">
              <div class="team">
                <img src="{{asset('app/'.$comp->mainTeamLogo())}}" alt="club-logo" />
                <a href="#">{{$comp->main_team_name}}</a>
                <ul>
                  <li>MVP: {{$comp->mvp_main}}</li>
                  @php
                   $mvp_main_info = unserialize($comp->mvp_main_info);
                   $mvp_second_info = unserialize($comp->mvp_second_info);
                  @endphp
                    @foreach($mvp_main_info as $point_key => $mvp)

                        @if($mvp_second_info[$point_key] <= $mvp)
                        <i class="fas fa-volleyball-ball"></i>
                        @endif
                        <li> {{$point_key}} : {{$mvp}} </li>

                    @endforeach
                </ul>
              </div>
            </div>

            <div class="col-md-2 col-lg-2">
              <div class="result-match">{{$comp->score_main}} : {{$comp->score_second}} </div>

              <div class="live-on">
                <a href="#">
                  Live on
                  <img src="img/img-theme/espn.gif" alt="" />
                </a>
              </div>
            </div>

            <div class="col-md-5 col-lg-5">
              <div class="team right">
                <a href="#">{{$comp->second_team_name}}</a>
                <img src="{{asset('app/'.$comp->secondTeamLogo())}}" alt="club-logo" />
                <ul>
                  <li>MVP: {{$comp->mvp_second}}</li>
                  @foreach($mvp_second_info as $point_key => $mvp)

                        @if($mvp_main_info[$point_key] <= $mvp)
                        <i class="fas fa-volleyball-ball"></i>
                        @endif
                        <li> {{$point_key}} : {{$mvp}} </li>

                    @endforeach
                </ul>
              </div>
            </div>
          </div>
          <!-- End Result -->

          <div class="row">
            <div class="col-lg-12">
              <div class="timeline-result">
                <div class="team-timeline">
                  <img src="{{asset('app/'.$comp->mainTeamLogo())}}" alt="club-logo" />
                  <a href="#">{{$comp->main_team_name}}</a>
                </div>


                @php
                    $sets = unserialize($comp->sets);
                    // dd($sets);
                @endphp


                <ul class="timeline">
                    @foreach($sets['main'] as $key => $set)
                    <li
                        class="@if($sets['second'][$key] > $set) card-result bottom goal @else card-result top goal  @endif"
                        style="left: {{(100/$comp->set_count)*$key}}%"
                        data-placement="@if($sets['second'][$key] > $set) top @else bottom  @endif"
                        data-trigger="hover"
                        data-toggle="popover"
                        title="{{$comp->main_team_name}}: {{$set}}"
                        data-content="{{$comp->second_team_name}}: {{$sets['second'][$key]}}"
                    >
                        {{$key}}-р сэт
                    </li>
                    @endforeach

                </ul>
                <div class="team-timeline">
                  <img src="{{asset('app/'.$comp->secondTeamLogo())}}" alt="club-logo" />
                  <a href="#">{{$comp->second_team_name}}</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Section Title -->

      <!-- Section Area - Content Central -->
      <section class="content-info">
        <!-- Single Team Tabs -->
        <div class="single-team-tabs">
          <div class="container">
            <div class="row">
              <!-- Left Content - Tabs and Carousel -->
              <div class="col-xl-12 col-md-12">
                <!-- Nav Tabs -->
                <ul class="nav nav-tabs" id="myTab">
                  <li class="active">
                    <a href="#summary" data-toggle="tab">Тойм</a>
                  </li>
                  <li><a href="#stats" data-toggle="tab">Статистик</a></li>
                </ul>
                <!-- End Nav Tabs -->
              </div>

              <div class="col-lg-12">
                <!-- Content Tabs -->
                <div class="tab-content">
                  <!-- Tab One - Sumary -->
                  <div class="tab-pane active" id="summary">
                    <div class="panel-box padding-b">
                      <div class="titles">
                        <h4>Тоглолтын тойм</h4>
                      </div>
                      <div class="row">
                        <div class="col-lg-12 col-xl-4">
                          <img src="{{asset('app/'.$comp->image)}}" alt="" />
                        </div>

                        <div class="col-lg-12 col-xl-8">
                         {!! $comp->details !!}
                        </div>
                      </div>
                    </div>
                    <!--Items Club video -->
                    <div class="row no-line-height">
                      <div class="col-md-12">
                        <h3 class="clear-title">Тоглолтын бичлэг</h3>
                      </div>

                      <!--Item Club News -->
                      <div class="col-lg-6 col-xl-4">
                        <!-- Widget Text-->
                        <div class="panel-box">
                          <div class="titles no-margin">
                            <h4>
                              <a href="#"
                                >Yuji Tsushima - гийн онцлох тоглолт</a
                              >
                            </h4>
                          </div>
                          <iframe
                            width="560"
                            height="315"
                            src="https://www.youtube.com/embed/y2ELmZLW5tY"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen
                          ></iframe>
                        </div>
                        <!-- End Widget Text-->
                      </div>
                      <!--End Item Club News -->

                      <!--Item Club News -->
                      <div class="col-lg-6 col-xl-4">
                        <!-- Widget Text-->
                        <div class="panel-box">
                          <div class="titles no-margin">
                            <h4>
                              <a href="#">Колумбын багын дараалалсан 7н оноо</a>
                            </h4>
                          </div>
                          <iframe
                            width="560"
                            height="315"
                            src="https://www.youtube.com/embed/l5wx531jGtQ"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen
                          ></iframe>
                        </div>
                        <!-- End Widget Text-->
                      </div>
                      <!--End Item Club News -->

                      <!--Item Club News -->
                      <div class="col-lg-6 col-xl-4">
                        <!-- Widget Text-->
                        <div class="panel-box">
                          <div class="titles no-margin">
                            <h4><a href="#">Японы эсрэг колумб</a></h4>
                          </div>
                          <iframe
                            width="560"
                            height="315"
                            src="https://www.youtube.com/embed/sGOdXgP7Lb0"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen
                          ></iframe>
                        </div>
                        <!-- End Widget Text-->
                      </div>
                      <!--End Item Club News -->
                    </div>
                    <!--End Items Club video -->

                    <!--Items Club News -->
                    <div class="row home-slider">
                      <div class="col-md-12">
                        <h3 class="clear-title">Тоглолтын мэдээ</h3>
                      </div>

                      <!--Item Club News -->
                      <div class="col-lg-6 col-xl-3">
                        <!-- Widget Text-->
                        <div class="card-wrapper">
                          <article class="card" role="article">
                            <a href="#">
                              <div class="card-text">
                                <div class="card-meta"><i class="fa fa-calendar"></i> Гурван сарын 9, 2019  </i></div>
                                <h2 class="card-title">
                                  Колумб Японыг буулган авлаа
                                </h2>
                              </div>
                              <img class="card-image" src="img/blog/1.jpg" />
                            </a>
                          </article>
                        </div>
                        <!-- End Widget Text-->
                      </div>
                      <!--End Item Club News -->

                      <!--Item Club News -->
                      <div class="col-lg-6 col-xl-3">
                        <!-- Widget Text-->
                        <div class="card-wrapper">
                          <article class="card" role="article">
                            <a href="#">
                              <div class="card-text">
                                <div class="card-meta"><i class="fa fa-calendar"></i> Гурван сарын 9, 2019  </i></div>
                                <h2 class="card-title">
                                  Япон улс дэлхийн аваргаас хасагдлаа.
                                </h2>
                              </div>
                              <img class="card-image" src="img/blog/2.jpg" />
                            </a>
                          </article>
                        </div>
                        <!-- End Widget Text-->
                      </div>
                      <!--End Item Club News -->

                      <!--Item Club News -->
                      <div class="col-lg-6 col-xl-3">
                        <!-- Widget Text-->
                        <div class="card-wrapper">
                          <article class="card" role="article">
                            <a href="#">
                              <div class="card-text">
                                <div class="card-meta"><i class="fa fa-calendar"></i> Гурван сарын 9, 2019  </i></div>
                                <h2 class="card-title">
                                  Шилдэг тоглогч колумб улсын Jamez Rodriguez
                                </h2>
                              </div>
                              <img class="card-image" src="img/blog/3.jpg" />
                            </a>
                          </article>
                        </div>
                        <!-- End Widget Text-->
                      </div>
                      <!--End Item Club News -->

                      <!--Item Club News -->
                      <div class="col-lg-6 col-xl-3">
                        <!-- Widget Text-->
                        <div class="card-wrapper">
                          <article class="card" role="article">
                            <a href="#">
                              <div class="card-text">
                                <div class="card-meta"><i class="fa fa-calendar"></i> Гурван сарын 9, 2019  </i></div>
                                <h2 class="card-title">
                                  Колумб улс ялалт байгууллаа.
                                </h2>
                              </div>
                              <img class="card-image" src="img/blog/4.jpg" />
                            </a>
                          </article>
                        </div>
                        <!-- End Widget Text-->
                      </div>
                      <!--End Item Club News -->
                    </div>
                    <!--End Items Club News -->
                  </div>
                  <!-- Tab One - Sumary -->

                  <!-- Tab Two - stats -->
                  <div class="tab-pane" id="stats">
                    <!-- Result -->
                    <div class="row match-stats">
                      <div class="col-lg-5">
                        <div class="team">
                          <img
                            src="{{asset('app/'.$comp->mainTeamLogo())}}"
                            alt="club-logo"
                          />
                          <a href="#">{{$comp->main_team_name}}</a>
                        </div>
                      </div>

                      <div class="col-lg-2">
                        <div class="result-match">VS</div>
                      </div>

                      <div class="col-lg-5">
                        <div class="team right">
                          <a href="#">{{$comp->second_team_name}}</a>
                          <img
                            src="{{asset('app/'.$comp->secondTeamLogo())}}"
                            alt="club-logo"
                          />
                        </div>
                      </div>

                      <div class="col-lg-12">
                        <ul>
                            @php
                                $match_status =  unserialize($comp->match_status);
                            @endphp

                            @foreach ($match_status['main'] as $key => $item)


                            <li>
                                <span class="left">{{$item}}</span>
                                <span class="center">{{$key}}</span>
                                <span class="right">{{$match_status['second'][$key]}}</span>
                            </li>



                             @endforeach

                        </ul>
                      </div>
                    </div>
                    <!-- End Result -->
                  </div>
                  <!-- End Tab Two - stats -->
                </div>
                <!-- Content Tabs -->
              </div>
            </div>
          </div>
        </div>
        <!-- Single Team Tabs -->
      </section>
      <!-- End Section Area -  Content Central -->
      @endsection
