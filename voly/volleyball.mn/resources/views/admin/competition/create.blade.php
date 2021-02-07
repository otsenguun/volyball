@extends('admin.master')
@section('css')

    <script src="{{ url('/assets/admin/js/app.min.js') }}" type="9fb37375f90c006b1358e509-text/javascript"></script>
    <script src="{{ url('/assets/admin/plugins/jquery-migrate/dist/jquery-migrate.min.js') }}" type="9fb37375f90c006b1358e509-text/javascript"></script>

	<link href="{{ url('/assets/admin/plugins/tag-it/css/jquery.tagit.css') }}" rel="stylesheet" />
	<link href="{{ url('/assets/admin/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
	<link href="{{ url('/assets/admin/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
	<link href="{{ url('/assets/admin/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet" />
	<link href="{{ url('/assets/admin/plugins/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet" />
	<link href="{{ url('/assets/admin/plugins/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet" />
	<link href="{{ url('/assets/admin/plugins/bootstrap-slider/dist/css/bootstrap-slider.min.css') }}" rel="stylesheet" />
	<link href="{{ url('/assets/admin/plugins/blueimp-file-upload/css/jquery.fileupload.css') }}" rel="stylesheet" />
	<link href="{{ url('/assets/admin/plugins/summernote/dist/summernote.css') }}" rel="stylesheet" />
	<link href="{{ url('/assets/admin/plugins/summernote/dist/summernote-bs4.css') }}" rel="stylesheet" />


@endsection
@section('js')
<script src="{{ url('/assets/admin/plugins/jquery-migrate/dist/jquery-migrate.min.js') }}" type="9fb37375f90c006b1358e509-text/javascript"></script>
<script src="{{ url('/assets/admin/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}" type="9fb37375f90c006b1358e509-text/javascript"></script>
<script src="{{ url('/assets/admin/plugins/moment/min/moment.min.js') }}" type="9fb37375f90c006b1358e509-text/javascript"></script>
<script src="{{ url('/assets/admin/plugins/bootstrap-daterangepicker/daterangepicker.js') }}" type="9fb37375f90c006b1358e509-text/javascript"></script>
<script src="{{ url('/assets/admin/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}" type="9fb37375f90c006b1358e509-text/javascript"></script>
<script src="{{ url('/assets/admin/plugins/bootstrap-select/dist/js/bootstrap-select.min.js') }}" type="9fb37375f90c006b1358e509-text/javascript"></script>
<script src="{{ url('/assets/admin/plugins/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}" type="9fb37375f90c006b1358e509-text/javascript"></script>
<script src="{{ url('/assets/admin/plugins/bootstrap-slider/dist/bootstrap-slider.min.js') }}" type="9fb37375f90c006b1358e509-text/javascript"></script>
<script src="{{ url('/assets/admin/plugins/bootstrap-3-typeahead/bootstrap3-typeahead.js') }}" type="9fb37375f90c006b1358e509-text/javascript"></script>
<script src="{{ url('/assets/admin/plugins/jquery.maskedinput/src/jquery.maskedinput.js') }}" type="9fb37375f90c006b1358e509-text/javascript"></script>
<script src="{{ url('/assets/admin/plugins/pwstrength-bootstrap/dist/pwstrength-bootstrap.min.js') }}" type="9fb37375f90c006b1358e509-text/javascript"></script>
<script src="{{ url('/assets/admin/plugins/tag-it/js/tag-it.min.js') }}" type="9fb37375f90c006b1358e509-text/javascript"></script>
<script src="{{ url('/assets/admin/plugins/blueimp-file-upload/js/vendor/jquery.ui.widget.js') }}" type="9fb37375f90c006b1358e509-text/javascript"></script>
<script src="{{ url('/assets/admin/plugins/blueimp-tmpl/js/tmpl.min.js') }}" type="9fb37375f90c006b1358e509-text/javascript"></script>
<script src="{{ url('/assets/admin/plugins/summernote/dist/summernote.min.js') }}" type="9fb37375f90c006b1358e509-text/javascript"></script>
<script src="assets/admin/plugins/summernote/dist/summernote-bs4.min.js" type="9fb37375f90c006b1358e509-text/javascript"></script>
<script src="{{ url('/assets/admin/plugins/highlight.js/highlight.min.js') }}" type="9fb37375f90c006b1358e509-text/javascript"></script>
<script src="{{ url('/assets/admin/js/demo/highlightjs.demo.js') }}" type="9fb37375f90c006b1358e509-text/javascript"></script>
<script src="{{ url('/assets/admin/js/demo/form-plugins.demo.js') }}" type="9fb37375f90c006b1358e509-text/javascript"></script>

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

@endsection
@section('content')
<div id="content" class="app-content">
    <div class="d-flex align-items-center mb-3">
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Хяналтын хуудас</a></li>
                <li class="breadcrumb-item"><a href="{{ route('Competition.index') }}">Тэмцээний жагсаалт</a></li>
                <li class="breadcrumb-item active">Тэмцээн нэмэх</li>
            </ul>
            <h1 class="page-header mb-0">Тэмцээн нэмэх</h1>
        </div>
        <div class="ml-auto">
            <a href="{{ route('Competition.index') }}" class="btn btn-primary"><i class="fa fa-plus-circle fa-fw mr-1"></i>Буцах</a>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @if(Session('success'))
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Амжилтын мэдэгдэл:</strong> {{ Session('success') }}
                    </div>
                </div>
            @endif
            @if(Session('error'))
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Алдааны мэдэгдэл:</strong> {{ Session('error') }}
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="card" style="padding: 25px;">
        <div class="container">
            <form action="{{ route('Competition.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <h4>Үндсэн хэсэг</h4>
                        <div class="form-group">
                            <label for="">Тэмцээний гарчиг</label>
                            <input type="text" name="name" class="form-control" required="" value="@if(Session('backtitle')){{ Session('backtitle') }} @endif">
                        </div>

                        <div class="form-group">
                            <label for=""> Тэмцээний заавар</label>
                            <textarea name="match_guide" class="summernote" id="contents" title="Contents" required="">
								@if(Session('backarticle')) {!! Session('backarticle') !!} @endif
							</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                Эхний багийн нэр
                                <input name="main_team_name" type="text" class="form-control" required>
                                Эхний багийн огноо
                                <input name="score_main" type="number" class="form-control">
                            </div>
                            <div class="col-md-6">
                                Дараагийн багийн нэр
                                <input name="second_team_name" type="text" class="form-control" required>
                                Дараагийн багийн огноо
                                <input name="score_second" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for=""> Тэмцээний Дэлгэрэнгүй</label>
                            <textarea name="details" class="summernote" id="contents" title="Contents" required="">
								@if(Session('backarticle')) {!! Session('backarticle') !!} @endif
							</textarea>
                        </div>
                        <div class="form-group">
                            <label for=""> Тэмцээний хаяг</label>
                            <textarea name="address" class="form-control">
							</textarea>
                        </div>
                        <hr>

                        <h4> Статистк болон MVP</h4>
                        <div class="row">
                            <div class="col-md-6">
                                Эхний багийн MVP
                                <input name="mvp_main" type="text" class="form-control" required>
                                @foreach($statistic_info as $key => $info)
                                Эхний {{$info}}
                                <input name="mvp_main_info[{{$info}}]" type="number" class="form-control">
                                @endforeach
                            </div>
                            <div class="col-md-6">
                                Дараагийн MVP
                                <input name="mvp_second" type="text" class="form-control" required>

                                @foreach($statistic_info as $key => $info)
                                Дараагийн {{$info}}
                                <input name="mvp_second_info[{{$info}}]" type="number" class="form-control">
                                @endforeach
                            </div>
                        </div>

                        <h4> Сэт </h4>
                        {{-- <button class="btn btn-success btn-xs" type="button"> <i class="fa fa-plus"></i> </button> --}}
                        <div class="row">

                            @foreach($set_count as $count)
                            <div class="col-md-6">
                                Эхний баг Сэт {{$count}}
                                <input name="main_set[{{$count}}]" type="text" class="form-control">

                            </div>
                            <div class="col-md-6">
                                Дараагийн баг Сэт {{$count}}
                                <input name="second_set[{{$count}}]" type="text" class="form-control">
                            </div>
                            @endforeach

                        </div>
                        <h4>Тоглолтын Статистк</h4>

                        <div class="row">

                            @foreach($main_statistic as $ms)
                            <div class="col-md-6">
                                Эхний баг {{$ms}}
                                <input name="request_match_status[{{$ms}}]" type="text" class="form-control">

                            </div>
                            <div class="col-md-6">
                                Дараагийн баг {{$ms}}
                                <input name="request_match_second[{{$ms}}]" type="text" class="form-control">
                            </div>
                            @endforeach

                        </div>


                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Хэрэглэгч</label>
                            <input type="text" class="form-control" required="" disabled="true" value="{{ Auth::user()->email }}">
                        </div>
                        <div class="form-group">
                            <label for="">Тэмцээний төрөл</label>
                            <select name="category" id="" class="form-control">
                                    <option>-Сонго</option>
                                    <option value="1">Олон улсын</option>
                                    <option value="2">Энгийн</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Тэмцээний төлөв</label>
                            <select name="status" id="" class="form-control">
                                    <option value="1">Эхлээгүй</option>
                                    <option value="2">Дууссан</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Тэмцээний онгоо</label>
                            <input name="create_date" type="date" value="{{date('Y-m-d')}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Үзэгчид</label>
                            <input name="uzegch_count" type="number" value="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Тэмцээний зураг хуулах</label>
                            <input type="file" class="form-control" name="image" required="">
                        </div>

                        <div class="form-group">
                            <label for="">Тэмцээний backgound зураг хуулах</label>
                            <input type="file" class="form-control" name="background_image" required="">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Хадгалах</button>
                            {{-- <a href="{{ url('/admin/articles/add') }}" class="btn btn-warning">Reset хийх</a> --}}
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
