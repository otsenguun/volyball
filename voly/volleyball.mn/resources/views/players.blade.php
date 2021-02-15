@extends('master')
@section('content')

    <div class="section-title" style="background:url(img/slide/1.jpg); margin-top: 40px">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1>Бүх тоглогчид</h1>
                </div>
            </div>
        </div>
    </div>

     <!-- Section Area - Content Central -->
     <section class="content-info">

        <!-- Nav Filters -->
        <div class="portfolioFilter">
            <div class="container">
                <h5><i class="fa fa-filter" aria-hidden="true"></i>Шүүх:</h5>
                <a href="#" data-filter="*" class="current">Бүгд</a>
                @foreach ($player_type as $key => $item)
                    <a href="#" data-filter=".{{$key}}">{{$item}}</a>
                @endforeach

            </div>
        </div>
        <!-- End Nav Filters -->

        <div class="container padding-top">
            <div class="row portfolioContainer">

                @foreach($players as $player)
                <!-- Item Player -->
                <div class="col-xl-3 col-lg-4 col-md-6 {{$player->player_type}}">
                    <div class="item-player">
                        <div class="head-player">
                            <img src="{{asset('app/'.$player->image)}}" alt="location-team">
                            <div class="overlay"><a href="{{url('show_player',$player->id)}}">+</a></div>
                        </div>
                        <div class="info-player">
                            <span class="number-player">
                                {{$player->huviin_number}}
                            </span>
                            <h4>
                                {{$player->last_name}} {{$player->frist_name}}
                                <span>{{$player->player_type()}}</span>
                            </h4>
                            <ul>
                                <li>
                                    <strong>Баг</strong> <span><img src="{{$player->getTeamLogo()}}" alt=""> {{$player->getTeamName()}} </span>
                                </li>
                                <li><strong>Тоглолтууд:</strong> <span>{{$player->total_match}}</span></li>
                                <li><strong>Нас:</strong> <span>{{$player->getAge()}}</span></li>
                            </ul>
                        </div>
                        <a href="{{url('show_player',$player->id)}}" class="btn">Тоглогчыг харах <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                <!-- End Item Player -->
                @endforeach



            </div>
        </div>
    </section>
    <!-- End Section Area -  Content Central -->

@endsection
