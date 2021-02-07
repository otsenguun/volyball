@extends('admin.master')
@section('customized_style')
<style type="text/css">
	.usertitle{
        border-left: 3px solid #a51c30;
        padding-left: 8px;
        font-size: 16px;
        font-weight: 500;
    }
    .mt-12{
        margin-top: 12px;
    }
</style>
@endsection
@section('content')
<div id="content" class="app-content">
    <div class="d-flex align-items-center mb-3">
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Хяналтын хуудас</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/admin/users') }}">Хэрэглэгчийн жагсаалт</a></li>
                <li class="breadcrumb-item active">{{ $user[0]->fname.' '.$user[0]->lname }}</li>
            </ul>
            <h1 class="page-header mb-0">Хэрэглэгч: {{ $user[0]->email }}</h1>
        </div>
        <div class="ml-auto">
            <a href="{{ url('/admin/users') }}" class="btn btn-primary"><i class="fa fa-arrow-left fa-fw mr-1"></i>Буцах</a>
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
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <h3 class="usertitle">Хэрэглэгчийн үндсэн мэдээлэл:</h3>
                    </div>
                    <div class="form-group">
                        <label for="">Хэрэглэгчийн овог:</label>
                        <input type="text" name="lname" class="form-control" value="{{ $user[0]->lname }}" disabled="true">
                    </div>
                    <div class="form-group">
                        <label for="">Хэрэглэгчийн нэр:</label>
                        <input type="text" name="fname" class="form-control" value="{{ $user[0]->fname }}" disabled="true">
                    </div>
                    <div class="form-group">
                        <label for="">Утасны дугаар:</label>
                        <input type="text" name="phone" class="form-control" value="{{ $user[0]->phone }}" disabled="true">
                    </div>
                    <div class="form-group">
                        <label for="">И-Мэйл хаяг:</label>
                        <input type="email" name="email" class="form-control" value="{{ $user[0]->email }}" disabled="true">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Анхаар:</strong> Бид хэрэглэгчийн нууц үгийг тусгай аргаар encrypt хийдэг бөгөөд
                            буцаан decpyt хийх боломжгүй болгодог. Хэрэглэгчийн нууц үг: <b>{{ Str::limit($user[0]->password, 20) }}</b>
                        </div>
                    </div>
                    <div class="form-group">
                        <a href="{{ url('/admin/users/edit/'.$user[0]->id) }}" class="btn btn-success">Мэдээлэл засварлах</a>
                        <a href="{{ url('/admin/users/edit/'.$user[0]->id) }}" class="btn btn-warning">Нууц үг солих</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
