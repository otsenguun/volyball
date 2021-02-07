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
                                <button class="btn btn-primary" type="submit">Хайх!</button>
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
                            @foreach($ArticleCategories as $key => $category)
                                <li><i class="fa fa-check"></i><a href="{{ url('/news/category/'.$category->id.'/'.$category->category) }}">{{ $category->category }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- End Widget Categories-->

            </aside>
            <!-- End Sidebars -->


            <div class="col-lg-9">
                <!-- Content Text-->

                <div class="panel-box">
                    <div class="titles no-margin">
                        <h4>{{ $article[0]->title }}</h4>
                    </div>
                    <img src="{{ url($article[0]->image) }}" alt="{{ $article[0]->title }}" style="width: 100%" />
                    <div class="info-panel">
                        {!! $article[0]->article !!}
                    </div>
                </div>

                <!-- End Content Text-->

                <!-- Comments -->
              <div class="panel-box">
                <!-- Title Post -->
                <div class="titles">
                  <h4>Сэтгэгдэлүүд</h4>
                </div>
                <!-- Title Post -->
                <ul class="testimonials">
                    @foreach($comments as $comment)
                        <li>
                            <blockquote>
                            <p>
                                {{ $comment->comment }}
                            </p>
                            <img src="{{ url('/assets/img/grid/1.jpg') }}" alt="{{ $article[0]->title }}" />
                            <strong>{{ $comment->name }}</strong
                            ><a href="#">{{ '@'.$comment->email }} </a>
                            <br />
                            <i class="fa fa-calendar"></i> {{ $comment->created_at->diffForHumans() }}  </i>
                            </blockquote>
                        </li>
                    @endforeach
                </ul>
              </div>
              <!-- End Comments -->

              <!-- Comment Form -->
              <div class="panel-box padding-b">
                <!-- Title Post -->
                <div class="titles">
                  <h4>Сэтгэгдэл үлдээх</h4>
                </div>

                <div class="info-panel">
                  <!-- Form coment -->
                  <form action="{{ url('news/'.$article[0]->id.'/'.$article[0]->slug) }}" method="POST" style="width: 100%; margin: 0;">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <label>Таны нэр *</label>
                        <input type="text" required="required" maxlength="100" class="form-control" name="name"/>
                      </div>
                      <div class="col-md-6">
                        <label>Таны И-Мэйл *</label>
                        <input type="email" required="required" maxlength="100" class="form-control" name="email"/>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <label>Сэтгэгдэл *</label>
                        <textarea maxlength="5000" rows="10" class="form-control" name="comment" style="height: 138px"
                          required="required"
                        ></textarea>
                      </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                      <div class="col-md-12">
                          <input class="btn btn-primary" type="submit" value="Сэтгэгдэл үлдээх" />
                      </div>
                    </div>
                  </form>
                  <!-- End Form coment -->
                </div>
              </div>
              <!-- End Comment Form -->

            </div>
       </div>
    </div>
</section>
<!-- End Section Area -  Content Central -->
@endsection
