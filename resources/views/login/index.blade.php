@extends('template/templatefrontend')

@section('judul')

<title>{{$judul}}</title>

@endsection


			<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">

				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last bgauth">
							<div class="text w-100">
								<h2>Welcome to login</h2>
								<p>Don't have an account?</p>
								<a href="#" class="btn btn-white btn-outline-white">Ask Administrator to Sign Up</a>
							</div>
			      </div>
						<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">
			      		<div class="w-100">

			      			@if(session()->has('loginError'))
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
									  {{ session('loginError' )}}
									  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									</div>
									@endif

			      			<h3 class="mb-4">Sign In</h3>
			      		</div>
			      	</div>
							<form action="{{url('login')}}" method="POST" class="signin-form">
								@csrf

			      		<div class="form-group mb-3">
			      			<label class="label" for="email">Email</label>
			      			<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" autofocus required value="{{ old('email') }}" autocomplete="off">
			      			
			      			@error('email')
			      			<div class="invalid-feedback">
			      				{{ $message }}
			      			</div>
			      			@enderror

			      		</div>

		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
		            </div>
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>
