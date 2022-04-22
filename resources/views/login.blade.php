<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>{{config('app.name')}} - Login</title>
	<link rel="shortcut icon" href="{{asset('favicon.ico')}}">
	<!-- plugin css -->
	<link href="{{asset('css/iconfont.css')}}" rel="stylesheet" />
	<link href="{{asset('css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<!-- end plugin css -->
	<link href="{{asset('css/prism.css')}}" rel="stylesheet" />
	<!-- common css -->
	<link href="{{asset('css/app.css')}}" rel="stylesheet" />
	<!-- end common css -->
</head>
<body data-base-url="/">
<div class="main-wrapper" id="app">
	<div class="page-wrapper full-page">
		<div class="page-content d-flex align-items-center justify-content-center">
			<div class="row w-100 mx-0 auth-page">
				<div class="col-md-8 col-xl-6 mx-auto">
					<div class="card">
						<div class="row">
							<div class="col-md-4 pe-md-0">
								<div class="auth-side-wrapper" style="background-image: url({{asset('img/bg-login.jpg')}})"></div>
							</div>
							<div class="col-md-8 ps-md-0">
								<div class="auth-form-wrapper px-4 py-5">
									<a href="{{route('login')}}" class="noble-ui-logo d-block mb-2">{{config('app.name')}}</a>
									<h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
									<form action="{{route('processLogin')}}" class="forms-group" method="post">
										{{ csrf_field() }}
                                        @if(session('error') == 1)
                                            <div class="alert alert-danger">
                                                Ouuuppssss... incorrect username or password, please try again!
                                            </div>
                                        @endif
                                        <div class="mb-3">
											<label for="username" class="form-label text-muted">Username<span class="text-danger">*</span></label>
											<input type="text" class="form-control" name="username" id="username" placeholder="Enter your username">
										</div>
										<div class="mb-3">
											<label for="password" class="form-label text-muted">Password<span class="text-danger">*</span></label>
											<input type="password" class="form-control" name="password" id="password" autocomplete="current-password" placeholder="Enter your password">
										</div>
										<div>
											<button type="submit" class="btn btn-sm btn-info me-2 mb-2">
												<i class="btn-icon-prepend" data-feather="unlock"></i>
												Login
											</button>
										</div>
										<a href="{{route('register')}}" class="d-block mt-3 text-muted">Not a user? Sign up</a>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="{{asset('js/spinner.js')}}"></script>
<!-- base js -->
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/feather.min.js')}}"></script>
<script src="{{asset('js/perfect-scrollbar.min.js')}}"></script>
<!-- end base js -->

<!-- plugin js -->
<script src="{{asset('js/prism.js')}}"></script>
<script src="{{asset('js/clipboard.min.js')}}"></script>
<!-- end plugin js -->

<!-- common js -->
<script src="{{asset('js/template.js')}}"></script>
<!-- end common js -->

</body>
</html>
