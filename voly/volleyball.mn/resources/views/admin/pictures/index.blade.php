@extends('admin.master')
@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">


        $('.selecteddataremover').attr('hidden', true);
        $('.checkboxform').attr('hidden', true);

        $('.selectall').click(function(){

            $('.selectbox').prop('checked', $(this).prop('checked'));
            $('.selecteddataremover').attr('hidden', false);
			$('.checkboxform').attr('hidden', false);

            var total = $('.selectbox').length;
            var number = $('.selectbox:checked').length;
            if(number == 0)
            {
                $('.selecteddataremover').attr('hidden', true);
				$('.checkboxform').attr('hidden', true);
            }

        });
        $('.selectbox').change(function(){
            var total = $('.selectbox').length;
            var number = $('.selectbox:checked').length;
            if(total == number)
            {
                $('.selectall').prop('checked', true);
                $('.selecteddataremover').attr('hidden', false);
				$('.checkboxform').attr('hidden', false);
            }
            else{
                $('.selectall').prop('checked', false);
                $('.selecteddataremover').attr('hidden', false);
				$('.checkboxform').attr('hidden', false);
            }
            if(number == 0)
            {
                $('.selecteddataremover').attr('hidden', true);
				$('.checkboxform').attr('hidden', true);
            }
        });


    </script>
@endsection
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
                <li class="breadcrumb-item active">Зургын сан</li>
            </ul>
            <h1 class="page-header mb-0">Зургын сан</h1>
        </div>
        <div class="ml-auto">
            <a href="{{ url('/admin/pictures/add') }}" class="btn btn-primary"><i class="fa fa-plus-circle fa-fw mr-1"></i>Зураг нэмэх</a>
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
                <div class="table-responsive">
                <table class="table table-hover text-nowrap">
                    <form class="checkboxform" action="{{ url('/admin/pictures/dropbox') }}" method="post">
                    @csrf
                        <thead>
                            <tr>
                                <th class="border-bottom-0 border-top-0 pt-0 pb-2">
                                    <input type="checkbox" class="selectall " name="" id="">
                                </th>
                                <th class="border-bottom-0 border-top-0 pt-0 pb-2">№</th>
                                <th class="border-bottom-0 border-top-0 pt-0 pb-2">Тайлбар</th>
                                <th class="border-bottom-0 border-top-0 pt-0 pb-2">Зураг</th>
                                <th class="border-bottom-0 border-top-0 pt-0 pb-2">Сүүлд хийгдсэн</th>
                                <th class="border-bottom-0 border-top-0 pt-0 pb-2">#Үйл ажиллагаа</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                if(isset($_GET['page']))
                                {
                                    $cNumber = $_GET['page'] * 10 - 10;
                                }
                                else{
                                    $cNumber = 0;
                                }
                            @endphp
                            @foreach($Galleries as $gallery)
                            <tr>
                                <td class="width-10 align-middle">
                                    <input type="checkbox" class="selectbox" name="gallery_id[]" value="{{ $gallery->id }}" id="">
                                </td>
                                <td class="align-middle">{{ $cNumber+=1 }}</td>
                                <td class="align-middle" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $gallery->title }}">
                                    {{ Str::limit($gallery->title, 50) }}
                                </td>
                                <td class="align-middle">
                                    <img src="{{ url('/'.$gallery->image) }}" alt="Volleyball.mn" style="width: 80px;">
                                </td>
                                <td class="align-middle">{{ $gallery->updated_at->diffForHumans() }}</td>
                                <td class="actioned-menu">
                                    <a href="{{ url('/admin/pictures/drop/'.$gallery->id) }}">
                                        <i class="fa fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            @if($countGalleries == 0)
                                <tr>
                                    <td colspan="8">
                                        Одоогоор зургын сан хоосон байна.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                        <tfooter>
                            <tr>
                                <th class="actioned-menu" colspan="8" style="text-align: right;">
                                    <button class="btn btn-danger selecteddataremover" type="submit" disable="true">
                                        <i class="fa fa-trash-alt"></i>
                                        Идэвхижүүлснийг устга
                                    </button>
                                </th>
                            </tr>
                        </tfooter>
                    </form>
                    </table>
                </div>
                <div class="d-md-flex align-items-center">
                    {{ $Galleries->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
