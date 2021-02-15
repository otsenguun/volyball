@extends('master')

@section('content')

<div class="section-title-team" style=" margin-top: 40px">
    <div class="container">
        <div class="row">
            <div class="col-xl-7">
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{asset('app/'.$team->logo)}}" alt="">
                    </div>

                    <div class="col-md-9">
                        <h1>{{$team->team_name}}</h1>
                        <ul class="general-info">
                            <li><h6><strong>Үүсгэн байгуудсан он:</strong> {{$team->create_date}}</h6></li>
                            <li><h6><strong>Багийн эзэн:</strong>{{$team->leader_name}}</h6></li>
                            <li><h6><strong>Үүсгэн байгуулагч:</strong> {{$team->creative_name}}</h6></li>
                            <li><h6><strong>Багийн дасгалжуулан тоглогч:</strong> {{$team->coach_name}}</h6></li>
                            <li><h6><strong>Гэрчилгээний дугаар:</strong> {{$team->sert_number}}</h6></li>
                            <li>
                                <h6>
                                    <i class="fa fa-link" aria-hidden="true"></i>
                                    <a href="#" target="_blank">{{$team->sert_number}}</a>
                                </h6>
                            </li>
                        </ul>

                        <ul class="social-teams">
                            <li>
                                <div>
                                    <a href="{{$team->facebook}}" class="facebook">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <a href="{{$team->twiter}}" class="twitter-icon">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <a href="{{$team->youtube}}" class="youtube">
                                        <i class="fa fa-youtube"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-image-team" style="background:url({{asset('app/'.$team->image)}});"></div>
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
                       <li class="active"><a href="#overview" data-toggle="tab">Мэдээлэл</a></li>
                       <li><a href="#squad" data-toggle="tab">Бүрэлдэхүүн</a></li>
                       <li><a href="#fixtures" data-toggle="tab">Учраа</a></li>
                       <li><a href="#results" data-toggle="tab">Үр дүн</a></li>
                       <li><a href="#stats" data-toggle="tab">Оноолт</a></li>
                    </ul>
                    <!-- End Nav Tabs -->
                </div>

                <div class="col-lg-9 padding-top-mini" style="margin-bottom: 200px">
                    <!-- Content Tabs -->
                    <div class="tab-content">
                        <!-- Tab One - overview -->
                        <div class="tab-pane active" id="overview">

                           <div class="panel-box padding-b">
                              <div class="titles">
                                  <h4>{{$team->team_name}}</h4>
                              </div>
                                <div class="row">
                                   <div class="col-lg-12 col-xl-4">
                                       <img src="img/players/hos-bar2.jpg" alt="">
                                   </div>

                                   <div class="col-lg-12 col-xl-8">
                                    {{$team->details}}

                                   </div>
                               </div>
                           </div>

                           <!--Items Club News -->
                           <div class="row">
                              <div class="col-md-12">
                                  <h3 class="clear-title">Сүүлийн үеийн мэдээ</h3>
                              </div>

                              <!--Item Club News -->
                              <div class="col-lg-6 col-xl-4">
                                   <!-- Widget Text-->
                                    <div class="panel-box">
                                        <div class="titles no-margin">
                                            <h4><a href="#">Бразилийн эсрэг</a></h4>
                                        </div>
                                        <a href="#"><img src="img/blog/1.jpg" alt=""></a>
                                        <div class="row">
                                           <div class="info-panel">
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus nostrum officia voluptatibus quo, quia ad!</p>
                                           </div>
                                        </div>
                                    </div>
                                    <!-- End Widget Text-->
                               </div>
                               <!--End Item Club News -->

                               <!--Item Club News -->
                              <div class="col-lg-6 col-xl-4">
                                   <!-- Widget Text-->
                                    <div class="panel-box">
                                        <div class="titles no-margin">
                                            <h4><a href="#">Yuji Nishida 6  эйс</a></h4>
                                        </div>
                                        <a href="#"><img src="img/blog/2.jpg" alt=""></a>
                                        <div class="row">
                                           <div class="info-panel">
                                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate exercitationem odit perferendis eius eveniet ullam?</p>
                                           </div>
                                        </div>
                                    </div>
                                    <!-- End Widget Text-->
                               </div>
                               <!--End Item Club News -->

                               <!--Item Club News -->
                              <div class="col-lg-6 col-xl-4">
                                   <!-- Widget Text-->
                                    <div class="panel-box">
                                        <div class="titles no-margin">
                                            <h4><a href="#">Эмэгтэй багын шигшээ</a></h4>
                                        </div>
                                        <a href="#"><img src="img/blog/3.jpg" alt=""></a>
                                        <div class="row">
                                           <div class="info-panel">
                                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magni eaque inventore quia exercitationem. Deleniti, ratione.</p>
                                           </div>
                                        </div>
                                    </div>
                                    <!-- End Widget Text-->
                               </div>
                               <!--End Item Club News -->
                           </div>
                           <!--End Items Club News -->

                           <!--Sponsors CLub -->
                           <div class="row no-line-height">
                                  <div class="col-md-12">
                                      <h3 class="clear-title">Багын Спонсорууд</h3>
                                  </div>
                            </div>
                            <!--End Sponsors CLub -->

                            <ul class="sponsors-carousel">
                                <li><a href="#"><img src="img/sponsors/1.png" alt=""></a></li>
                                <li><a href="#"><img src="img/sponsors/2.png" alt=""></a></li>
                                <li><a href="#"><img src="img/sponsors/3.png" alt=""></a></li>
                                <li><a href="#"><img src="img/sponsors/4.png" alt=""></a></li>
                                <li><a href="#"><img src="img/sponsors/5.png" alt=""></a></li>
                                <li><a href="#"><img src="img/sponsors/3.png" alt=""></a></li>
                            </ul>

                        </div>
                        <!-- Tab One - overview -->

                        <!-- Tab Two - squad -->
                        <div class="tab-pane" id="squad">
                            <div class="row">

                                <!-- Item Player -->
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="item-player">
                                        <div class="head-player">
                                            <img src="img/players/1.jpg" alt="location-team">
                                            <div class="overlay"><a href="#">+</a></div>
                                        </div>
                                        <div class="info-player">
                                            <span class="number-player">
                                                13
                                            </span>
                                            <h4>
                                                Yuji Nishida
                                                <span>Довтлогч</span>
                                            </h4>
                                            <ul>
                                                <li>
                                                    <strong>Орон</strong> <span><img src="img/clubs-logos/japan.png" alt=""> Япон </span
                                                </li>
                                                <li><strong>Тоглолт:</strong> <span>90</span></li>
                                                <li><strong>Нас:</strong> <span>28</span></li>
                                            </ul>
                                        </div>
                                        <a href="#" class="btn">Тоглогчийг үзэх <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <!-- End Item Player -->

                                <!-- Item Player -->
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="item-player">
                                        <div class="head-player">
                                            <img src="img/players/2.jpg" alt="location-team">
                                            <div class="overlay"><a href="#">+</a></div>
                                        </div>
                                        <div class="info-player">
                                            <span class="number-player">
                                                10
                                            </span>
                                            <h4>
                                                Kageyama Tobio
                                                <span>Холбогч</span>
                                            </h4>
                                            <ul>
                                              <li>
                                                  <strong>Орон</strong> <span><img src="img/clubs-logos/japan.png" alt=""> Япон </span
                                              </li>
                                              <li><strong>Тоглолт:</strong> <span>90</span></li>
                                              <li><strong>Нас:</strong> <span>28</span></li>
                                          </ul>
                                        </div>
                                        <a href="#" class="btn">Тоглогч харах <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <!-- End Item Player -->

                                <!-- Item Player -->
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="item-player">
                                        <div class="head-player">
                                            <img src="img/players/3.jpg" alt="location-team">
                                            <div class="overlay"><a href="#">+</a></div>
                                        </div>
                                        <div class="info-player">
                                            <span class="number-player">
                                                2
                                            </span>
                                            <h4>
                                                Hinata
                                                <span>Довтлогч</span>
                                            </h4>
                                            <ul>
                                              <li>
                                                  <strong>Орон</strong> <span><img src="img/clubs-logos/japan.png" alt=""> Япон </span
                                              </li>
                                              <li><strong>Тоглолт:</strong> <span>90</span></li>
                                              <li><strong>Нас:</strong> <span>28</span></li>
                                          </ul>
                                        </div>
                                        <a href="#" class="btn">Тоглогч харах <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <!-- End Item Player -->

                                <!-- Item Player -->
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="item-player">
                                        <div class="head-player">
                                            <img src="img/players/4.jpg" alt="location-team">
                                            <div class="overlay"><a href="#">+</a></div>
                                        </div>
                                        <div class="info-player">
                                            <span class="number-player">
                                                2
                                            </span>
                                            <h4>
                                                Miya Atsumu
                                                <span>Довтлогч</span>
                                            </h4>
                                            <ul>
                                              <li>
                                                  <strong>Орон</strong> <span><img src="img/clubs-logos/japan.png" alt=""> Япон </span
                                              </li>
                                              <li><strong>Тоглолт:</strong> <span>90</span></li>
                                              <li><strong>Нас:</strong> <span>28</span></li>
                                          </ul>
                                        </div>
                                        <a href="#" class="btn">Тоглогч харах <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <!-- End Item Player -->

                                <!-- Item Player -->
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="item-player">
                                        <div class="head-player">
                                            <img src="img/players/5.jpg" alt="location-team">
                                            <div class="overlay"><a href="#">+</a></div>
                                        </div>
                                        <div class="info-player">
                                            <span class="number-player">
                                                2
                                            </span>
                                            <h4>
                                                Gareth Bale
                                                <span>Довтлогч</span>
                                            </h4>
                                            <ul>
                                              <li>
                                                  <strong>Орон</strong> <span><img src="img/clubs-logos/japan.png" alt=""> Япон </span
                                              </li>
                                              <li><strong>Тоглолт:</strong> <span>90</span></li>
                                              <li><strong>Нас:</strong> <span>28</span></li>
                                          </ul>
                                        </div>
                                        <a href="#" class="btn">Тоглогч харах <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <!-- End Item Player -->

                                <!-- Item Player -->
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="item-player">
                                        <div class="head-player">
                                            <img src="img/players/6.jpg" alt="location-team">
                                            <div class="overlay"><a href="#">+</a></div>
                                        </div>
                                        <div class="info-player">
                                            <span class="number-player">
                                                2
                                            </span>
                                            <h4>
                                                Oikawa
                                                <span>Довтлогч</span>
                                            </h4>
                                            <ul>
                                              <li>
                                                  <strong>Орон</strong> <span><img src="img/clubs-logos/japan.png" alt=""> Япон </span
                                              </li>
                                              <li><strong>Тоглолт:</strong> <span>90</span></li>
                                              <li><strong>Нас:</strong> <span>28</span></li>
                                          </ul>
                                        </div>
                                        <a href="#" class="btn">Тоглогч харах <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <!-- End Item Player -->

                                <!-- Item Player -->
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="item-player">
                                        <div class="head-player">
                                            <img src="img/players/1.jpg" alt="location-team">
                                            <div class="overlay"><a href="#">+</a></div>
                                        </div>
                                        <div class="info-player">
                                            <span class="number-player">
                                                13
                                            </span>
                                            <h4>
                                                Miya Tsumo
                                                <span>Довтлогч</span>
                                            </h4>
                                            <ul>
                                              <li>
                                                  <strong>Орон</strong> <span><img src="img/clubs-logos/japan.png" alt=""> Япон </span
                                              </li>
                                              <li><strong>Тоглолт:</strong> <span>90</span></li>
                                              <li><strong>Нас:</strong> <span>28</span></li>
                                          </ul>
                                        </div>
                                        <a href="#" class="btn">Тоглогч харах <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <!-- End Item Player -->

                                <!-- Item Player -->
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="item-player">
                                        <div class="head-player">
                                            <img src="img/players/2.jpg" alt="location-team">
                                            <div class="overlay"><a href="#">+</a></div>
                                        </div>
                                        <div class="info-player">
                                            <span class="number-player">
                                                10
                                            </span>
                                            <h4>
                                                Tsukishima
                                                <span>Довтлогч</span>
                                            </h4>
                                            <ul>
                                              <li>
                                                  <strong>Орон</strong> <span><img src="img/clubs-logos/japan.png" alt=""> Япон </span
                                              </li>
                                              <li><strong>Тоглолт:</strong> <span>90</span></li>
                                              <li><strong>Нас:</strong> <span>28</span></li>
                                          </ul>
                                        </div>
                                        <a href="#" class="btn">Тоглогч харах <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <!-- End Item Player -->

                                <!-- Item Player -->
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="item-player">
                                        <div class="head-player">
                                            <img src="img/players/3.jpg" alt="location-team">
                                            <div class="overlay"><a href="#">+</a></div>
                                        </div>
                                        <div class="info-player">
                                            <span class="number-player">
                                                2
                                            </span>
                                            <h4>
                                                Kuroo
                                                <span>Довтлогч</span>
                                            </h4>
                                            <ul>
                                              <li>
                                                  <strong>Орон</strong> <span><img src="img/clubs-logos/japan.png" alt=""> Япон </span
                                              </li>
                                              <li><strong>Тоглолт:</strong> <span>90</span></li>
                                              <li><strong>Нас:</strong> <span>28</span></li>
                                          </ul>
                                        </div>
                                        <a href="#" class="btn">Тоглогч харах <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <!-- End Item Player -->

                                <!-- Item Player -->
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="item-player">
                                        <div class="head-player">
                                            <img src="img/players/4.jpg" alt="location-team">
                                            <div class="overlay"><a href="#">+</a></div>
                                        </div>
                                        <div class="info-player">
                                            <span class="number-player">
                                                2
                                            </span>
                                            <h4>
                                                Kuroko
                                                <span>Довтлогч</span>
                                            </h4>
                                            <ul>
                                              <li>
                                                  <strong>Орон</strong> <span><img src="img/clubs-logos/japan.png" alt=""> Япон </span
                                              </li>
                                              <li><strong>Тоглолт:</strong> <span>90</span></li>
                                              <li><strong>Нас:</strong> <span>28</span></li>
                                          </ul>
                                        </div>
                                        <a href="#" class="btn">Тоглогч харах <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <!-- End Item Player -->

                                <!-- Item Player -->
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="item-player">
                                        <div class="head-player">
                                            <img src="img/players/5.jpg" alt="location-team">
                                            <div class="overlay"><a href="#">+</a></div>
                                        </div>
                                        <div class="info-player">
                                            <span class="number-player">
                                                2
                                            </span>
                                            <h4>
                                                Kagami
                                                <span>Довтлогч</span>
                                            </h4>
                                            <ul>
                                              <li>
                                                  <strong>Орон</strong> <span><img src="img/clubs-logos/japan.png" alt=""> Япон </span
                                              </li>
                                              <li><strong>Тоглолт:</strong> <span>90</span></li>
                                              <li><strong>Нас:</strong> <span>28</span></li>
                                          </ul>
                                        </div>
                                        <a href="#" class="btn">Тоглогч харах <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <!-- End Item Player -->

                                <!-- Item Player -->
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="item-player">
                                        <div class="head-player">
                                            <img src="img/players/6.jpg" alt="location-team">
                                            <div class="overlay"><a href="#">+</a></div>
                                        </div>
                                        <div class="info-player">
                                            <span class="number-player">
                                                2
                                            </span>
                                            <h4>
                                                Shoyo
                                                <span>Довтлогч</span>
                                            </h4>
                                            <ul>
                                              <li>
                                                  <strong>Орон</strong> <span><img src="img/clubs-logos/japan.png" alt=""> Япон </span
                                              </li>
                                              <li><strong>Тоглолт:</strong> <span>90</span></li>
                                              <li><strong>Нас:</strong> <span>28</span></li>
                                          </ul>
                                        </div>
                                        <a href="#" class="btn">Тоглогч харах <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <!-- End Item Player -->

                            </div>
                        </div>
                        <!-- End Tab Two - squad -->

                        <!-- Tab Theree - fixtures -->
                        <div class="tab-pane" id="fixtures">

                            <table class="table-striped table-responsive table-hover team-table">
                                <thead>

                                    <tr>
                                        <th>Баг A</th>
                                        <th class="text-center">-</th>
                                        <th>Баг B</th>
                                        <th>Тайлбар</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($comps as $comp)
                                    @if($comp->status != "2")
                                    <tr>
                                        <td>
                                            <img src="{{asset('app/'.$comp->mainTeamLogo())}}" alt="icon">
                                            <strong>{{$comp->main_team_name}}</strong><br>
                                            <small class="meta-text">GROUP H.</small>
                                        </td>
                                        <td class="text-center">Vs</td>
                                        <td>
                                            <img src="{{asset('app/'.$comp->secondTeamLogo())}}" alt="icon1">
                                            <strong>{{$comp->second_team_name}}</strong><br>
                                            <small class="meta-text">GROUP H.</small>
                                        </td>
                                        <td>
                                            {{$comp->create_date}}<br>
                                            <small class="meta-text">{{$comp->address}}</small>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                        <!-- End Tab Theree - fixtures -->

                        <!-- Tab Theree - results -->
                        <div class="tab-pane" id="results">
                            <div class="recent-results results-page">
                                <div class="info-results">
                                    <ul>
                                        @foreach($comps as $comp)
                                        @if($comp->status == "2")

                                        <li>
                                            <span class="head">
                                                {{$comp->main_team_name}} -  {{$comp->second_team_name}} <span class="date">  {{$comp->create_date}}</span>
                                            </span>

                                            <div class="goals-result">
                                                <a href="{{url('showTeam',$team->main_team_id)}}">
                                                    <img src="{{asset('app/'.$comp->mainTeamLogo())}}" alt="">
                                                    {{$comp->main_team_name}}
                                                </a>

                                                <span class="goals">
                                                    <b>{{$comp->score_main}}</b> - <b>{{$comp->score_second}}</b>
                                                    <a href="{{url('showCompetition',$comp->id)}}" class="btn theme">Дэлгэрэнгүй</a>
                                                </span>

                                                <a href="{{url('showTeam',$team->second_team_id)}}">
                                                    <img src="{{asset('app/'.$comp->secondTeamLogo())}}" alt="">
                                                    {{$comp->second_team_name}}
                                                </a>
                                            </div>
                                        </li>
                                        @endif
                                        @endforeach

                                    </ul>
                                </div>
                           </div>
                        </div>
                        <!-- End Tab Theree - results -->

                        <!-- Tab Theree - stats -->
                        <div class="tab-pane" id="stats">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="stats-info">
                                            @php
                                                $team_statistic = unserialize($team->statistic);

                                            @endphp
                                        <ul>
                                            @foreach ($team_statistic['Нийт'] as $key => $item)
                                            <li>
                                                {{$key}}
                                                <h3>{{$item}}</h3>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                @foreach($team_statistic as $title => $sub_array)
                                    @if($title != "Нийт")

                                        <div class="col-lg-6 col-xl-4">
                                            <!-- Attack -->
                                            <div class="panel-box">
                                                <div class="titles no-margin">
                                                    <h4><i class="fa fa-calendar"></i>{{$title}}</h4>
                                                </div>
                                                <ul class="list-panel">
                                                    @foreach($sub_array as $sub_tit => $array)
                                                        <li><p>{{$sub_tit}} <span>{{$array}}</span></p></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <!-- End Attack -->
                                        </div>

                                    @endif
                                @endforeach

                            </div>

                        </div>
                        <!-- End Tab Theree - stats -->
                    </div>
                    <!-- Content Tabs -->
                </div>

                <!-- Side info single team-->
                <div class="col-lg-3 padding-top-mini">
                   <!-- Diary -->
                   <div class="panel-box">
                    <div class="titles">
                      <h4><i class="fa fa-calendar"></i>Онцлох тоглолтууд</h4>
                    </div>

                    <!-- List Diary -->
                    <ul class="list-diary">
                      <!-- Item List Diary -->
                      <li>
                        <h6>Грүпп A <span>14 JUN 2018 - 18:00</span></h6>
                        <ul class="club-logo">
                          <li>
                            <img src="img/clubs-logos/rusia.png" alt="" />
                            <span>Орос</span>
                          </li>
                          <li>
                            <img src="img/clubs-logos/arabia.png" alt="" />
                            <span>Араб</span>
                          </li>
                        </ul>
                      </li>
                      <!-- End Item List Diary -->

                      <!-- Item List Diary -->
                      <li>
                        <h6>GROUP E <span>22 JUN 2018 - 15:00</span></h6>
                        <ul class="club-logo">
                          <li>
                            <img src="img/clubs-logos/bra.png" alt="" />
                            <span>Бразил</span>
                          </li>
                          <li>
                            <img src="img/clubs-logos/costa-rica.png" alt="" />
                            <span>Коста Рика</span>
                          </li>
                        </ul>
                      </li>
                      <!-- End Item List Diary -->

                      <!-- Item List Diary -->
                      <li>
                        <h6>Грүпп H <span>19 Най 2018 - 15:00</span></h6>
                        <ul class="club-logo">
                          <li>
                            <img src="img/clubs-logos/colombia.png" alt="" />
                            <span>Колумб</span>
                          </li>
                          <li>
                            <img src="img/clubs-logos/japan.png" alt="" />
                            <span>Япон</span>
                          </li>
                        </ul>
                      </li>
                      <!-- End Item List Diary -->

                      <!-- Item List Diary -->
                      <li>
                        <h6>Грүпп C <span>16 Гур 2018 - 15:00</span></h6>
                        <ul class="club-logo">
                          <li>
                            <img src="img/clubs-logos/fra.png" alt="" />
                            <span>Франц</span>
                          </li>
                          <li>
                            <img src="img/clubs-logos/aus.png" alt="" />
                            <span>Австрали</span>
                          </li>
                        </ul>
                      </li>
                      <!-- End Item List Diary -->
                    </ul>
                    <!-- End List Diary -->
                  </div>
                    <!-- End Diary -->
                </div>
                <!-- end Side info single team-->

            </div>
        </div>
    </div>
    <!-- Single Team Tabs -->

</section>

@endsection
