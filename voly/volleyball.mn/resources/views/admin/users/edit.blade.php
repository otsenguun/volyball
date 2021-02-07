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
                <li class="breadcrumb-item active">Хэрэглэгчийн мэдээлэл засварлах</li>
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
            <form action="{{ url('/admin/users/edit/'.$user[0]->id) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <h3 class="usertitle">Хэрэглэгчийн үндсэн мэдээлэл:</h3>
                        </div>
                        <div class="form-group">
                            <label for="">Хэрэглэгчийн овог:</label>
                            <input type="text" name="lname" class="form-control" required="" value="@if(Session('backlname')){{ Session('backlname') }} @else {{ $user[0]->lname }} @endif">
                        </div>
                        <div class="form-group">
                            <label for="">Хэрэглэгчийн нэр:</label>
                            <input type="text" name="fname" class="form-control" required="" value="@if(Session('backfname')){{ Session('backfname') }} @else {{ $user[0]->fname }} @endif">
                        </div>
                        <div class="form-group">
                            <label for="">Утасны дугаар:</label>
                            <input type="text" name="phone" class="form-control" required="" value="@if(Session('backphone')){{ Session('backphone') }} @else {{ $user[0]->phone }} @endif">
                        </div>
                        <div class="form-group">
                            <label for="">И-Мэйл хаяг:</label>
                            <input type="email" name="email" class="form-control" required="" value="@if(Session('backemail')){{ Session('backemail') }} @else {{ $user[0]->email }} @endif">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Системд нэвтэрсэн хэрэглэгч</label>
                            <input type="text" class="form-control" required="" disabled="true" value="{{ Auth::user()->email }}">
                        </div>
                        <div class="form-group">
                            <label for="">Хэрэглэгчийн төрөл</label>
                            <select name="premission" id="" class="form-control">
                                @foreach($userPremission as $premission)
                                    <option value="{{ $premission->id }}" @if(Session('backpremission')) @if(Session('backpremission') == $premission->id) selected="" @endif @else @if($user[0]->premission == $premission->id) selected="" @endif @endif>{{ $premission->premission }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Өөрчлөлтийг хадгалах</button>
                            <a href="{{ url('/admin/users/add') }}" class="btn btn-warning">Reset хийх</a>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-md-12">
                    <hr>
                </div>
            </div>
            <form action="{{ url('/admin/users/edit/changepassword/'.$user[0]->id) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <h3 class="usertitle">Хэрэглэгчийн нууцлал:</h3>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="">Нууц үг:</label>
                                <input type="password" name="password" class="form-control" required="" placeholder="Enter password">
                            </div>
                            <div class="form-group">
                                <label for="">Нууц үг давта:</label>
                                <input type="password" name="repassword" class="form-control" required="" placeholder="Enter repassword">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-12">
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Өөрчлөлтийг хадгалах</button>
                            <a href="{{ url('/admin/users/add') }}" class="btn btn-warning">Reset хийх</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
