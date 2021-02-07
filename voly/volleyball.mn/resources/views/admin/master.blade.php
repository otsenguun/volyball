<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'Монголын волейболын залуучуудын холбоо - Mongolian volleyball youth association') }}</title>

    <link href="{{ url('assets/admin/css/app.min.css') }}" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="{{ url('/assets/admin/plugins/jquery-migrate/dist/jquery-migrate.min.js') }}" type="9fb37375f90c006b1358e509-text/javascript"></script>

    @yield('css')

    @if($page == 'article')
        <script src="{{ url('/assets/admin/js/rocket-loader.min.js') }}" data-cf-settings="9fb37375f90c006b1358e509-|49" defer=""></script>
    @else
        <script src="{{ url('/assets/admin/ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js') }}" data-cf-settings="cefc70e13f60a96f4d19e827-|49" defer=""></script>
    @endif

</head>
@yield('customized_style')
<body>

<div id="app" class="app">
	<div id="header" class="app-header">
		<div class="mobile-toggler">
			<button type="button" class="menu-toggler" data-toggle="sidebar-mobile">
				<span class="bar"></span>
				<span class="bar"></span>
			</button>
		</div>
		<div class="brand">
			<div class="desktop-toggler">
				<button type="button" class="menu-toggler" data-toggle="sidebar-minify">
					<span class="bar"></span>
					<span class="bar"></span>
				</button>
			</div>
			<a href="{{ url('/admin/index') }}" class="brand-logo">
				<img src="{{ url('/assets/images/logo.png') }}" alt="volleyball.com" height="100%" style="margin-right: 13px;"/>
                volleyball.mn
            </a>
		</div>
		<div class="menu">
			<form action="{{ url('/admin/articles/search') }}" class="menu-search" method="get" name="header_search_form">
                @csrf
                <div class="menu-search-icon"><i class="fa fa-search"></i></div>
				<div class="menu-search-input">
					<input type="text" class="form-control" name="value" placeholder="Мэдээ гарчигаар хайх..." />
                    <submit type="hidden"></submit>
                </div>
			</form>
			<div class="menu-item dropdown">
				<a href="#" data-toggle="dropdown" data-display="static" class="menu-link">
					<div class="menu-icon"><i class="fa fa-bell nav-icon"></i></div>
					<div class="menu-label">{{ $countArticle }}</div>
				</a>
				<div class="dropdown-menu dropdown-menu-right dropdown-notification">
					<h6 class="dropdown-header text-gray-900 mb-1">Нийтлэлүүд <label class="menu-label">{{ $countArticle }}</label></h6>
                    @foreach($last5articles as $larticles)
                        <a href="{{ url('/admin/articles/show/'.$larticles->id) }}" class="dropdown-notification-item">
                            <div class="dropdown-notification-icon">
                                <i class="fa fa-receipt fa-lg fa-fw text-success"></i>
                            </div>
                            <div class="dropdown-notification-info">
                                <div class="title">{{ Str::limit($larticles->title, 60) }}</div>
                                <div class="time">{{ $larticles->updated_at->diffForHumans() }}</div>
                            </div>
                            <div class="dropdown-notification-arrow">
                                <i class="fa fa-chevron-right"></i>
                            </div>
                        </a>
                    @endforeach
					<div class="p-2 text-center mb-n1">
						<a href="{{ url('/admin/articles') }}" class="text-gray-800 text-decoration-none">Бүх нийтлэлийг харах</a>
					</div>
				</div>
			</div>
			<div class="menu-item dropdown">
				<a href="#" data-toggle="dropdown" data-display="static" class="menu-link">
					<div class="menu-img online">
						<img src="{{ url('/assets/admin/img/user/defaultImg.jpg') }}" alt="" class="mw-100 mh-100 rounded-circle" />
					</div>
					<div class="menu-text">
						<span class="__cf_email__">{{ Auth::user()->email }}</span>
					</div>
				</a>
				<div class="dropdown-menu dropdown-menu-right mr-lg-3">
					<a class="dropdown-item d-flex align-items-center" href="#profile">
						Профайл
						<i class="fa fa-user-circle fa-fw ml-auto text-gray-400 f-s-16"></i>
					</a>
					<a class="dropdown-item d-flex align-items-center" href="#ettings">
						Тохиргоо
						<i class="fa fa-wrench fa-fw ml-auto text-gray-400 f-s-16"></i>
					</a>
					<div class="dropdown-divider"></div>
					<form method="post" action="{{ route('logout') }}">
						@csrf
						<a class="dropdown-item d-flex align-items-center" href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
							Гарах
							<i class="fa fa-toggle-off fa-fw ml-auto text-gray-400 f-s-16"></i>
						</a>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div id="sidebar" class="app-sidebar">
		<div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
			<div class="menu">
				<div class="menu-item @if($page == 'home') active @endif">
					<a href="{{ url('/admin') }}" class="menu-link">
						<span class="menu-icon"><i class="fa fa-laptop"></i></span>
						<span class="menu-text">Хяналтын хуудас</span>
					</a>
				</div>
				<div class="menu-divider"></div>
				<div class="menu-header">Хяналтын хэсэг</div>


				<div class="menu-item @if($page == 'cooperation') active @endif">
					<a href="{{ url('/admin/cooperation') }}" class="menu-link">
						<span class="menu-icon"><i class="fab fa-pinterest-square"></i></span>
						<span class="menu-text">Хамтран ажиллагч байгууллагууд</span>
					</a>
                </div>
                <div class="menu-item @if($page == 'article') active @endif">
					<a href="{{ url('/admin/articles') }}" class="menu-link">
						<span class="menu-icon"><i class="fas fa-newspaper"></i></span>
						<span class="menu-text">Нийтлэл</span>
					</a>
                </div>
                    <div class="menu-item @if($page == 'team') active @endif">
					<a href="{{ url('/admin/team') }}" class="menu-link">
						<span class="menu-icon"><i class="fas fa-newspaper"></i></span>
						<span class="menu-text">Баг</span>
					</a>
                </div>
                    <div class="menu-item @if($page == 'players') active @endif">
					<a href="{{ url('/admin/playes') }}" class="menu-link">
						<span class="menu-icon"><i class="fas fa-newspaper"></i></span>
						<span class="menu-text">Тоглогч</span>
					</a>
                </div>
                     <div class="menu-item @if($page == 'winner') active @endif">
					<a href="{{ url('/admin/winner') }}" class="menu-link">
						<span class="menu-icon"><i class="fas fa-newspaper"></i></span>
						<span class="menu-text">Тэмцээн</span>
					</a>
                </div>
                <div class="menu-item @if($page == 'comment') active @endif">
					<a href="{{ url('/admin/comments') }}" class="menu-link">
						<span class="menu-icon"><i class="fas fa-comments"></i></span>
						<span class="menu-text">Сэтгэгдэл</span>
					</a>
                </div>
                <div class="menu-item @if($page == 'pictures') active @endif">
					<a href="{{ url('/admin/pictures') }}" class="menu-link">
						<span class="menu-icon"><i class="fas fa-images"></i></span>
						<span class="menu-text">Зургын цомог</span>
					</a>
                </div>
                @if(Auth::user()->premission == 1)
                <div class="menu-item @if($page == 'user') active @endif">
					<a href="{{ url('/admin/users') }}" class="menu-link">
						<span class="menu-icon"><i class="fa fa-users"></i></span>
						<span class="menu-text">Хэрэглэгч</span>
					</a>
                </div>
                @endif

			</div>
		</div>
		<button class="app-sidebar-mobile-backdrop" data-dismiss="sidebar-mobile"></button>
	</div>

	@yield('content')


<a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>

</div>


@yield('js')
<script src="{{ url('/assets/admin/js/app.min.js') }}" type="cefc70e13f60a96f4d19e827-text/javascript"></script>


</body>

</html>
