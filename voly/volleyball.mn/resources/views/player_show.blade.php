@extends('master')
@section('content')


    <!-- Section Title -->
     <div
     class="section-title single-player"
     style="background: url({{asset('app/'.$player->background_image)}}); margin-top: 40px"
   ></div>
   <!-- End Section Title -->

   <!-- Section Area - Content Central -->
   <section class="content-info">
     <!-- Single Team Tabs -->
     <div class="single-player-tabs">
       <div class="container">
         <div class="row">
           <!-- Side info single team-->
           <div class="col-lg-4 col-xl-3">
             <div class="item-player single-player">
               <div class="head-player">
                 <img src="{{asset('app/'.$player->image)}}" alt="location-team" />
               </div>
               <div class="info-player">
                 <span class="number-player"> 10 </span>
                 <h4>
                    {{$player->last_name}} {{$player->frist_name}}
                   <span>{{$player->player_type()}}</span>
                 </h4>
                 <ul>
                   <li>
                     <strong>Баг:</strong>
                     <span
                       ><img src="{{asset('app/'.$player->getTeamLogo())}}" alt="" />
                       {{$player->getTeamName()}}
                     </span>
                   </li>
                   <li><strong>Нийт тоглолт:</strong> <span>{{$player->total_match}}</span></li>
                   <li><strong>Нас:</strong> <span>{{$player->getAge()}}</span></li>
                   <li><strong>Оноо:</strong> <span>{{$player->total_score}}</span></li>
                   <li>
                     <strong>MVP:</strong>
                     <span>{{$player->total_mvp}} удаа</span>
                   </li>
                 </ul>

                 <h6> {{$player->last_name}} {{$player->frist_name}} -г дагах</h6>

                 <ul class="social-player">
                   <li>
                     <div>
                       <a href="{{$player->facebook}}" class="facebook">
                         <i class="fa fa-facebook"></i>
                       </a>
                     </div>
                   </li>
                   <li>
                     <div>
                       <a href="{{$player->instagram}}" class="twitter-icon">
                         <i class="fa fa-instagram"></i>
                       </a>
                     </div>
                   </li>
                 </ul>
               </div>
             </div>

             <!-- Attack -->
             <div class="panel-box">
               <div class="titles no-margin">
                 <h4><i class="fa fa-user"></i>Хувийн мэдээлэл</h4>
               </div>
               <ul class="list-panel">
                 <li>
                   <p>Жин <span>{{$player->weight}} Kg</span></p>
                 </li>
                 <li>
                   <p>Өндөр <span>{{$player->lenght}} Mts</span></p>
                 </li>
                 <li>
                   <p>Гарал <span>{{$player->country}}</span></p>
                 </li>
                 <li>
                   <p>Төрсөн газар <span>{{$player->country_live}}</span></p>
                 </li>
                 <li>
                   <p>Төрсөн он сар <span> {{$player->brithday}}</span></p>
                 </li>
               </ul>
             </div>
             <!-- End Attack -->
           </div>
           <!-- end Side info single team-->

           <div class="col-lg-8 col-xl-9">
             <!-- Nav Tabs -->
             <ul class="nav nav-tabs" id="myTab">
               <li class="active">
                 <a href="#overview" data-toggle="tab">Ерөнхий</a>
               </li>
               <li><a href="#career" data-toggle="tab">Карээр</a></li>
               <li><a href="#stats" data-toggle="tab">Статус</a></li>
             </ul>
             <!-- End Nav Tabs -->

             <!-- Content Tabs -->
             <div class="tab-content">
               <!-- Tab One - overview -->
               <div class="tab-pane active" id="overview">
                 <div class="panel-box padding-b">
                   <div class="titles">
                     <h4>Eрөнхий</h4>
                   </div>
                   <div class="row">
                     <div class="col-lg-12 col-xl-4">
                       <img src="{{asset('app/'.$player->cover_image)}}" alt="Yuji" />
                     </div>
                     <div class="col-lg-12 col-xl-8">
                       {!!$player->details!!}
                     </div>
                   </div>
                 </div>

                 <!--Items Club News -->
                 <div class="row home-slider mb-4">
                   <div class="col-md-12">
                     <h3 class="clear-title">Тоглогчын тухай мэдээ</h3>
                   </div>

                   <!--Item Club News -->
                   <div class="col-lg-6 col-xl-4">
                     <!-- Widget Text-->
                     <div class="card-wrapper">
                         <article class="card" role="article">
                           <a href="#">
                             <div class="card-text">
                               <div class="card-meta"><i class="fa fa-calendar"></i> January 9, 2014  </i></div>
                               <h2 class="card-title">
                                 Япон улсын тамирчин Болд-Эрдэнэ Баярсайхан-гын 7 дараалалсан эйс - Бразилын эсрэг
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
                   <div class="col-lg-6 col-xl-4">
                     <!-- Widget Text-->
                     <div class="card-wrapper">
                         <article class="card" role="article">
                           <a href="#">
                             <div class="card-text">
                               <div class="card-meta"><i class="fa fa-calendar"></i> January 16, 2014  </i></div>
                               <h2 class="card-title">
                                 Болд-Эрдэнэ Баярсайхан Колумб улсын эсрэг багаа тэргүүлж хожлоо
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
                   <div class="col-lg-6 col-xl-4">
                     <!-- Widget Text-->
                     <div class="card-wrapper">
                         <article class="card" role="article">
                           <a href="#">
                             <div class="card-text">
                               <div class="card-meta"><i class="fa fa-calendar"></i> January 19, 2014  </i></div>
                               <h2 class="card-title">
                                 Япон улсын тамирчин Болд-Эрдэнэ Баярсайхан-гын 7 дараалалсан эйс
                               </h2>
                             </div>
                             <img class="card-image" src="img/blog/2.jpg" />
                           </a>
                         </article>
                       </div>
                     <!-- End Widget Text-->
                   </div>
                   <!--End Item Club News -->
                 </div>
               </div>
               <!-- Tab One - overview -->

               <!-- Tab Theree - career -->
               <div class="tab-pane" id="career">
                 <div class="col-lg-12">
                   <table
                     class="table-striped table-responsive table-hover career team-table"
                   >
                     <thead>
                       <tr>
                         <th>Улирал</th>
                         <th>Баг</th>
                         <th>Гараа(Сэлгээ)</th>
                         <th>Оноо</th>
                       </tr>
                     </thead>
                     <tbody>
                       <tr>
                         <td>2017/2020</td>
                         <td>
                           <img
                             src="img/clubs-logos/japan.png"
                             alt="icon1"
                           />
                           Japan
                         </td>
                         <td>47(0)</td>
                         <td>60</td>
                       </tr>
                       <tr>
                         <td>2016/2017</td>
                         <td>
                           <img
                             src="img/clubs-logos/den.png"
                             alt="icon1"
                           />
                           Дэнмарк
                         </td>
                         <td>12(10)</td>
                         <td>35</td>
                       </tr>
                       <tr>
                         <td>2016/2016</td>
                         <td>
                           <img src="img/clubs-logos/colombia.png" alt="icon1" />
                           Колумб
                         </td>
                         <td>5(15)</td>
                         <td>10</td>
                       </tr>
                     </tbody>
                   </table>
                 </div>
               </div>
               <!-- Tab Theree - career -->

               <!-- Tab Theree - stats -->
               <div class="tab-pane" id="stats">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="stats-info">
                                @php
                                    $team_statistic = unserialize($player->statistik);

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
               <!-- End Tab Theree - stats -->
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
