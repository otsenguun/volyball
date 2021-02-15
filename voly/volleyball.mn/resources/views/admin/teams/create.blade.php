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
                <li class="breadcrumb-item"><a href="{{ route('Competition.index') }}">Багийн жагсаалт</a></li>
                <li class="breadcrumb-item active">Баг нэмэх</li>
            </ul>
            <h1 class="page-header mb-0">Баг нэмэх</h1>
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
            <form action="{{ route('Teams.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <h4>Үндсэн хэсэг</h4>
                        <div class="form-group">
                            <label for="">Багийн нэр</label>
                            <input type="text" name="team_name" class="form-control" required="" value="@if(Session('backtitle')){{ Session('backtitle') }} @endif">
                        </div>

                        <div class="form-group">
                            <label for=""> Багийн тухай</label>
                            <textarea name="details" class="summernote" id="contents" title="Contents" required="">
								@if(Session('backarticle')) {!! Session('backarticle') !!} @endif
							</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                Багийн эзэн:
                                <input name="leader_name" type="text" class="form-control" required>
                                Үүсгэн байгуулагч:
                                <input name="creative_name" type="text" class="form-control">
                            </div>
                            <div class="col-md-6">
                                Багийн дасгалжуулан тоглогч:
                                <input name="coach_name" type="text" class="form-control" required>
                                Гэрчилгээний дугаар:
                                <input name="sert_number" type="text" class="form-control">
                            </div>

                            <div class="col-md-6">
                                Мэйл
                                <input name="social" type="text" class="form-control">
                               Facebook
                                <input name="facebook" type="text" class="form-control">
                            </div>
                            <div class="col-md-6">
                                twiter
                                <input name="twiter" type="text" class="form-control">
                                instagramm
                                <input name="instagramm" type="text" class="form-control">
                            </div>
                            <div class="col-md-6">
                                you_tube
                                <input name="you_tube" type="text" class="form-control">
                            </div>

                        </div>
                        <hr>

                        <h4> Статистк </h4>
                        <div class="row">
                            @foreach($team_statistic as $title => $title_stat)'


                            <div class="col-md-5">
                                <h5>{{$title}}</h5>
                                <hr>
                                @foreach ($title_stat as $key => $item )
                                    {{$key}}

                                    <input name="statictic[{{$title}}][{{$key}}]" value="{{$item}}" type="text" class="form-control" required>

                                @endforeach

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
                            <label for="">Багийн төрөл</label>
                            <select name="category" id="" class="form-control">
                                    <option>-Сонго</option>
                                    <option value="1">Олон улсын</option>
                                    <option value="2">Лигийн</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Үүсгэн байгуудсан он:</label>
                            <input name="create_date" type="date" value="{{date('Y-m-d')}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Багийн лого хуулах</label>
                            <input type="file" class="form-control" name="logo" required="">
                        </div>

                        <div class="form-group">
                            <label for="">Багийн зураг хуулах</label>
                            <input type="file" class="form-control" name="image" required="">
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
