@extends('admin.master')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

@section('customized_style')
<style type="text/css">
	.actioned-menu{
		padding-top: 20px !important;
	}
	.actioned-menu a{
		font-size: 14px;
		color: #000;
		border: 1px solid #000;
		padding: 6px;
		margin: 3px;
	}
	.actioned-menu a:hover{
		color: #fff;
		background-color: #000
	}
	.dscontent{
		color: #212837;
	    background-color: #fff;
	    border: 1px solid #c9d2e3 !important;
	    font-weight: 400;
	    text-align: center;
	    vertical-align: middle;
	    user-select: none;
	    background-color: transparent;
	    border: 1px solid transparent;
	    padding: .375rem .75rem;
	    font-size: .875rem;
	    line-height: 1.5;
	    border-radius: 6px;
	    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
	}
	.dscontent option{
		display: block;
	    width: 100%;
	    padding: 6px 20px;
	    clear: both;
	    font-weight: 400;
	    color: #212837;
	    text-align: inherit;
	    white-space: nowrap;
	    background-color: transparent;
	    border: 0;
	}
    .w-5{
        font-size: 10px !imporntant;
        width: 20px; !important;
    }
    nav .flex{
        display: none !important;
    }
	table tr th, td{
		text-align: center;
		vertical-align: middle;
	}
	.form-group label{
		border-left: 5px solid #a51c30;
		padding-left: 8px;
		margin-bottom: 10px;
	}
	table:hover{
		cursor: pointer;
	}
</style>
@endsection
@section('content')
<div id="content" class="app-content">
    <div class="d-flex align-items-center mb-3">
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Хяналтын хуудас</a></li>
                <li class="breadcrumb-item active">Багуудын жагсаалт</li>
            </ul>
            <h1 class="page-header mb-0">Багуудын жагсаалт</h1>
        </div>
        <div class="ml-auto">
            <a href="{{ route('Teams.create') }}" class="btn btn-primary"><i class="fa fa-plus-circle fa-fw mr-1"></i>Баг нэмэх</a>
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
        <div class="tab-content p-4">
            <div class="tab-pane fade show active" id="allTab">
                <form action="{{ route('Teams.index') }}" method="get">
                @csrf
                    <div class="input-group mb-4">
                        <div class="flex-fill position-relative">
                            <div class="input-group">
                                <div class="input-group-prepend position-absolute top-0 bottom-0" style="z-index: 1020;">
                                    <span class="input-group-text bg-none border-0 pr-0"><i class="fa fa-search opacity-5"></i></span>
                                </div>
                                <input type="text" class="form-control pl-35px" name="value" placeholder="Хайлтын утга..." required=""/>
                                <submit type="hidden"></submit>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-bottom-0 border-top-0 pt-0 pb-2">№</th>
                                <th class="border-bottom-0 border-top-0 pt-0 pb-2">Багийн холболтын дугаар</th>
                                <th class="border-bottom-0 border-top-0 pt-0 pb-2">Багийн нэр</th>
                                <th class="border-bottom-0 border-top-0 pt-0 pb-2">Лого</th>
                                <th  class="border-bottom-0 border-top-0 pt-0 pb-2">бусад</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teams as $key => $team)
                            <tr>
                                <td class="align-middle">{{ $key+=1 }}</td>
                                <td  class="align-middle"> {{$team->id}}</td>
                                <td class="align-middle">
                                    {{$team->team_name}}
                                </td>
                                <td class="align-middle" data-bs-toggle="tooltip" data-bs-placement="top">
                                   <img src="{{asset('app/'.$team->logo)}}" alt="">
                                </td>
                                <td><a href="{{route('Teams.edit',$team->id)}}" class="btn btn-waring"> <i class="fa fa-edit"></i> </a></td>

                            </tr>
                            @endforeach
                            @if(count($teams) == 0)
                                <tr>
                                    <td colspan="8">
                                        Одоогоор Баг байхгүй байна.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="d-md-flex align-items-center">
                    {{ $teams->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
