<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Simple Flight Booking</title>

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
							<form name="search_flights" method="post" action="/search">
								@csrf
								<div class="col-md-4">
									<div class="form-group">
										<select class="form-control" name="from">
											<option value=""></option>
											<option value="اصفهان">اصفهان</option>
											<option value="تهران">تهران</option>
											<option value="شیراز">شیراز</option>
											<option value="مشهد">مشهد</option>
											<option value="تبریز">تبریز</option>
										</select>
										<span class="select-arrow"></span>
										<span class="form-label">مبدا</span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<select class="form-control" name="to">
											<option value=""></option>
											<option value="اصفهان">اصفهان</option>
											<option value="تهران">تهران</option>
											<option value="شیراز">شیراز</option>
											<option value="مشهد">مشهد</option>
											<option value="تبریز">تبریز</option>
										</select>
										<span class="select-arrow"></span>
										<span class="form-label">مقصد</span>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<select class="form-control" name="persons">
											<option value=""></option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
										</select>
										<span class="select-arrow"></span>
										<span class="form-label">نفرات</span>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<select class="form-control" name="class">
											<option value=""></option>
											<option value="first">First Class</option>
											<option value="bussines">Bussines</option>
											<option value="economy">Economy</option>
										</select>
										<span class="select-arrow"></span>
										<span class="form-label">نوع صندلی</span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input class="form-control" type="date" name="checkin" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
										<span class="form-label">از تاریخ</span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input class="form-control" type="date" name="checkout" value="{{ \Carbon\Carbon::now()->addMonths(2)->format('Y-m-d') }}">
										<span class="form-label">تا تاریخ</span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-btn">
										<button class="submit-btn">بررسی</button>
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
							@else

							<!-- Result Box -->
							<div class="results">
								<div class="col-md-12" >
									<div class="col-md-1">
										ردیف
									</div>
									<div class="col-md-2">
										مبدا
									</div>
									<div class="col-md-2">
										مقصد
									</div>
									<div class="col-md-2">
										ایرلاین
									</div>
									<div class="col-md-2">
										تاریخ
									</div>
									<div class="col-md-2">
										ساعت
									</div>
									<div class="col-md-1">

									</div>
								</div>
								@foreach($flights as $flight)
								<div class="col-md-12" >
									<div class="col-md-1">
										<div class="form-group">
											<input class="form-control gray text-center white" type="text" placeholder="" value="{{ $loop->iteration }}">
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<input class="form-control from text-center white" type="text" value="{{ $flight->from }}">
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<input class="form-control to text-center white" type="text" value="{{ $flight->to }}">
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<input class="form-control gray text-center white" type="text" value="{{ $flight->airline }}">
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<input class="form-control gray text-center white" type="text" value="{{ \Carbon\Carbon::parse($flight->date)->format('Y/m/d') }}">
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<input class="form-control gray text-center white" type="text" placeholder="" value="{{ \Carbon\Carbon::parse($flight->date)->format('H:s') }}">
										</div>
									</div>
									<div class="col-md-1">
										<div class="form-group">
											<a href="/reserve/{{ $flight->id }}" class="reserve-btn">رزرو</a>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							@endif
							<!-- / Results Box -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
	</html>
