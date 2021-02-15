@extends('master')

@section('content')

<!-- Section Title -->
<div
class="section-title"
style="background: url(img/slide/3.jpg); margin-top: 40px"
>
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <h1>Багууд</h1>
    </div>
  </div>
</div>
</div>
<!-- End Section Title -->

<!-- Section Area - Content Central -->
<section class="content-info">
<!-- Nav Filters -->
<div class="portfolioFilter">
  <div class="container">
    <h5><i class="fa fa-filter" aria-hidden="true"></i>Шүүх:</h5>
    <a href="#" data-filter="*" class="current">Бүгд</a>
    @foreach ($team_cats as $key => $cat)
    <a href="#" data-filter=".group-{{$key}}">{{$cat}}</a>
    @endforeach

  </div>
</div>
<!-- End Nav Filters -->

<div class="container padding-top">
  <div class="row portfolioContainer">
    <!-- Item Team Group A-->
    @foreach($teams as $team)
    <div class="col-md-6 col-lg-4 col-xl-3 group-a">
      <div class="item-team">
        <div class="head-team">
          <img src="{{asset('app/'.$team->image)}}" alt="location-team" />
          <div class="overlay"><a href="{{url('showTeam',$team->id)}}">+</a></div>
        </div>
        <div class="info-team">
          <span class="logo-team">
            <img src="{{asset('app/'.$team->logo)}}" alt="logo-team" />
          </span>
          <h4>{{$team->team_name}}</h4>
          <span class="location-team">
            <i class="fa fa-map-marker" aria-hidden="true"></i>
            {{$team->address}}
          </span>
          <span class="group-team">
            <i class="fa fa-trophy" aria-hidden="true"></i>
           {{$team->category}}
          </span>
        </div>
        <a href="{{url('showTeam',$team->id)}}" class="btn"
          >Багын мэдээлэл
          <i class="fa fa-angle-right" aria-hidden="true"></i
        ></a>
      </div>
    </div>
    @endforeach


</section>

@endsection
