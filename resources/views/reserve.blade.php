<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<title>Simple Flight Booking - Register User</title>

	<link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
	<link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>

	<body>
		<div id="booking" class="section">
			<div class="section-center">
				<div class="container">
					<div class="row">

						<div class="booking-form">
							<!-- Search Box -->
							<form name="reserve_flight" method="post" action="/reserve">
								@csrf
								<input type="hidden" name="flight_id" value="{{ $flight->id }}">
								<div class="col-md-4">
									<div class="form-group">
										<input class="form-control" name="firstname" value={{ old('firstname') }}>
										<span class="form-label">نام</span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input class="form-control"	name="lastname" value={{ old('lastname') }}>
										<span class="form-label">نام خانوادگی</span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<select class="form-control" name="gender">
											<option value="male">مذکر</option>
											<option value="female">مونث</option>
										</select>
										<span class="select-arrow"></span>
										<span class="form-label">جنسیت</span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input class="form-control" name="code_melli" value={{ old('code_melli') }}>
										<span class="form-label">کد ملی </span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input class="form-control" name="mobile" value={{ Request::old('mobile') }}>
										<span class="form-label">شماره همراه</span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input class="form-control" name="email" value={{ old('email') }}>
										<span class="form-label"> ایمیل </span>
									</div>
								</div>

								<div class="col-md-2">
									<div class="form-group">
										<input class="form-control" Value="⏫ {{ $flight->from }}" disabled>
										<span class="form-label"> امبدا</span>
									</div>
								</div>

								<div class="col-md-2">
									<div class="form-group">
										<input class="form-control" Value="⏬ {{ $flight->to }}" disabled>
										<span class="form-label"> مقصد</span>
									</div>
								</div>


								<div class="col-md-2">
									<div class="form-group">
										<input class="form-control" Value="📅 {{ $flight->date }}" disabled>
										<span class="form-label"> تاریخ</span>
									</div>
								</div>

								<div class="col-md-2">
									<div class="form-group">
										<input class="form-control" Value="🛫 {{ $flight->airline }}" disabled>
										<span class="form-label"> خط هوایی</span>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-btn">
										<button class="submit-btn"><i class="fa fa-disk"></i> ذخیره</button>
									</div>
								</div>
							</form>
							<!-- /Search Box -->

							@if($errors->any())
							<div class="col-md-12">
								<div class="alert alert-danger">
									{{$errors->first()}}
								</div>
							</div>
							@endif

							<!-- / Results Box -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>
