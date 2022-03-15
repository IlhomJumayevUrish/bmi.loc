@extends('frontend.wrapper')

@section('content')



<section class="page-title bg-1">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="block text-center">
					<span class="text-white">Связаться с нами</span>
					<h1 class="text-capitalize mb-5 text-lg">Связаться</h1>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- contact form start -->

<section class="section contact-info pb-0">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-sm-6 col-md-6">
				<div class="contact-block mb-4 mb-lg-0">
					<i class="icofont-live-support"></i>
					<h5>Call Us</h5>
					+823-4565-13456
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 col-md-6">
				<div class="contact-block mb-4 mb-lg-0">
					<i class="icofont-support-faq"></i>
					<h5>Email Us</h5>
					contact@mail.com
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 col-md-6">
				<div class="contact-block mb-4 mb-lg-0">
					<i class="icofont-location-pin"></i>
					<h5>Location</h5>
					North Main Street,Brooklyn Australia
				</div>
			</div>
		</div>
	</div>
</section>

<section class="contact-form-wrap section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="section-title text-center">
					<h2 class="text-md mb-2">Связаться с нами</h2>
					<div class="divider mx-auto my-4"></div>
					<p class="mb-5">Трудности счастливого упражнения могут привести к ним</p>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<form action="{{ route('contact-user-store')}}" method="POST" enctype="multipart/form-data">
					<!-- form message -->
					@if(!empty(Session::get('status')))
					<div class="row">
						<div class="col-12">
							<div class="alert alert-success contact__msg" role="alert">
								{{ Session::get('status')}}
							</div>
						</div>
					</div>

					@endif

					@csrf
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<input name="fio" id="name" type="text" class="form-control" placeholder="Ваше полное имя" required>
							</div>
						</div>

						<div class="col-lg-6">
							<div class="form-group">
								<input name="phone1" type="text" class="form-control" placeholder="Ваш телефон первым" required>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<input name="email" id="email" type="email" class="form-control" placeholder="Ваш электронный адрес" required>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<input name="phone2" type="text" class="form-control" placeholder="Ваш телефон второй" required>
							</div>
						</div>
					</div>

					<div class="form-group-2 mb-4">
						<textarea name="description" id="message" class="form-control" rows="8" placeholder="Ваше сообщение"></textarea>
					</div>

					<div class="text-center">
						<input class="btn btn-main btn-round-full" name="submit" type="submit" value="Отправить сообщение">
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection