@extends('master')
@section('content')
<style>
    .w-5{
        font-size: 10px !imporntant;
        width: 20px; !important;
        vertical-align: middle;
    }
    nav .flex{
        display: none !important;
    }
</style>
<!-- Section Area - Content Central -->
<section class="content-info">

    <div class="container paddings-mini">
       <div class="row">

            <!-- Sidebars -->
            <aside class="col-lg-3">

                <div>
                    <h4>Хайлтын хэсэг</h4>
                    <form class="search" action="{{ url('/news/search') }}" method="get">
                        <div class="input-group">
                            <input class="form-control" placeholder="Search..." name="searchkey"  type="text" required="required">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit" name="subscribe" >Хайх!</button>
                            </span>
                        </div>
                    </form>
                </div>

                <!-- Widget Categories-->
                <div class="panel-box">
                    <div class="titles no-margin">
                        <h4>Категори</h4>
                    </div>
                    <div class="info-panel">
                        <ul class="list">
                            <li><a href="{{ url('/news/list') }}">Бүх төрөл</a></li>
                            @foreach($ArticleCategories as $key => $category)
                                <li>@if($categoryid == $category->id)<i class="fa fa-check"></i>@endif<a href="{{ url('/news/category/'.$category->id.'/'.$category->category) }}">{{ $category->category }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- End Widget Categories-->

            </aside>
            <!-- End Sidebars -->

            @php $checkdatacount=0; @endphp
            @foreach($articles as $art)
                @php $checkdatacount += 1; @endphp
            @endforeach


            <div class="col-lg-9">
                <!-- Content Text-->

                    @if($checkdatacount == 0)
                        <div class="home-slide">
                            <div class="col-md-12">
                                <div class="card-wrapper">
                                    <article class="card" role="article">
                                        <div class="card-text" style="padding: 20px;">
                                            <p>{{ $categoryvalue.' төрөлд одоогоор нийтлэл алга байна' }}</p>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="home-slider">
                      <div class="col-lg-8 col-xl-8">
                        <div class="card-wrapper">
                            @foreach($articles as $key => $article)
                                @if($key == 0)
                                    <article class="card" role="article">
                                        <a href="{{ url('/news/'.$article->id.'/'.$article->slug) }}">
                                        <div class="card-text">
                                            <div class="card-meta"><i class="fa fa-calendar"></i> {{ $article->updated_at->diffForHumans() }}</i></div>
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
                      <div class="col-lg-4 col-xl-4">
                        <div class="card-wrapper">
                            @foreach($articles as $key => $article1)
                                @if($key == 1)
                                    <article class="card" role="article">
                                        <a href="{{ url('/news/'.$article1->id.'/'.$article1->slug) }}">
                                        <div class="card-text">
                                            <div class="card-meta"><i class="fa fa-calendar"></i> {{ $article1->updated_at->diffForHumans() }}</i></div>
                                            <h2 class="card-title">
                                                {{ Str::limit($article1->title, 60) }}
                                            </h2>
                                        </div>
                                        <img class="card-image" src="{{ url($article1->image) }}" alt="{{ $article1->title }}"/>
                                        </a>
                                    </article>
                                @endif
                            @endforeach
                        </div>
                      </div>
                    </div>
                    <div class="home-slider mb-4">
                        @foreach($articles as $key => $article2)
                            @if($key > 1)
                                <div class="col-lg-4 col-xl-4">
                                    <div class="card-wrapper">
                                    <article class="card" role="article">
                                        <a href="{{ url('/news/'.$article2->id.'/'.$article2->slug) }}">
                                        <div class="card-text">
                                            <div class="card-meta"><i class="fa fa-calendar"></i> {{ $article2->updated_at->diffForHumans() }}</i></div>
                                            <h2 class="card-title">
                                                {{ Str::limit($article2->title, 60) }}
                                            </h2>
                                        </div>
                                        <img class="card-image" src="{{ url($article2->image) }}" alt="{{ $article2->title }}"/>
                                        </a>
                                    </article>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="home-slider mb-4">
                        {{ $articles->links() }}
                    </div>
                <!-- End Content Text-->
            </div>
       </div>
    </div>
</section>
<!-- End Section Area -  Content Central -->
@endsection
