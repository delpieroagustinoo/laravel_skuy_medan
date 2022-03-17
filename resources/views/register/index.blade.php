@extends('template/templatefrontend')

@section('judul')

<title>{{$judul}}</title>

@endsection

			<section class="ftco-section" style="margin-top: -50px">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last bgauth">
							<div class="text w-100">
								<h2>Welcome to Sign Up</h2>
								<p>Already have an account?</p>
								<a href="{{url('admin/penyakit')}}" class="btn btn-white btn-outline-white">Log Out & Sign In</a>
							</div>
			      </div>
						<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign Up</h3>
			      		</div>
			      	</div>
							<form action="{{url('register')}}" method="POST" class="signin-form">
								@csrf

								<div class="form-group mb-3">
			      			<label class="label" for="name">Name</label>
			      			<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"  placeholder="Name" required value="{{old('name')}}" autocomplete="off" autofocus>	

			      			@error('name')
						      <div class="invalid-feedback">
						      	<small class="fw-light">{{$message}}</small>
						      </div>
						      @enderror

			      		</div>

			      		<div class="form-group mb-3">
			      			<label class="label" for="username">Username</label>
			      			<input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{old('username')}}" autocomplete="off">		

			      			@error('username')
						      <div class="invalid-feedback">
						      	<small class="fw-light">{{$message}}</small>
						      </div>
						      @enderror

			      		</div>

			      		<div class="form-group mb-3">
			      			<label class="label" for="email">Email</label>
			      			<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{old('email')}}" required autocomplete="off">		

			      			@error('email')
						      <div class="invalid-feedback">
						      	<small class="fw-light">{{$message}}</small>
						      </div>
						      @enderror

			      		</div>

		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>

		              @error('password')
						      <div class="invalid-feedback">
						      	<small class="fw-light">{{$message}}</small>
						      </div>
						      @enderror

		            </div>

		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary submit px-3">Sign Up</button>
		            </div>		           
		          </form>

		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>