@extends('admin.master')
@section('content')
<div id="content" class="app-content">
    <div class="d-flex align-items-center mb-3">
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Хяналтын хуудас</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/admin/users') }}">Хэрэглэгчийн жагсаалт</a></li>
                <li class="breadcrumb-item active">Хэрэглэгч нэмэх</li>
            </ul>
            <h1 class="page-header mb-0">Хэрэглэгч нэмэх</h1>
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
            <form action="{{ url('/admin/users/add') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Анхаар:</strong> Бид хэрэглэгчийн нууц үгийг тусгай аргаар encrypt хийдэг бөгөөд
                                буцаан decpyt хийх боломжгүй болгодог. Иймд хэрэглэгчийн анхны нууц үг бүртгэгдэж байгаа
                                утасны дугаараар тохирох болохыг анхаарна уу?
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Хэрэглэгчийн овог:</label>
                            <input type="text" name="lname" class="form-control" required="" placeholder="Last name" value="@if(Session('backlname')){{ Session('backlname') }} @endif">
                        </div>
                        <div class="form-group">
                            <label for="">Хэрэглэгчийн нэр:</label>
                            <input type="text" name="fname" class="form-control" required="" placeholder="First name" value="@if(Session('backfname')){{ Session('backfname') }} @endif">
                        </div>
                        <div class="form-group">
                            <label for="">Утасны дугаар:</label>
                            <input type="number" name="phone" class="form-control" required="" placeholder="+976" value="@if(Session('backphone')){{ Session('backphone') }} @endif">
                        </div>
                        <div class="form-group">
                            <label for="">И-Мэйл хаяг:</label>
                            <input type="email" name="email" class="form-control" required="" placeholder="example@example.com" value="@if(Session('backemail')){{ Session('backemail') }} @endif">
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
                                    <option value="{{ $premission->id }}" @if(Session('backpremission')) @if(Session('backpremission') == $premission->id) selected="" @endif @endif>{{ $premission->premission }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Хадгалах</button>
                            <a href="{{ url('/admin/users/add') }}" class="btn btn-warning">Reset хийх</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
