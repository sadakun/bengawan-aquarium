<x-auth-master>

@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row bg-register-image">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-white bg-quote"><i>You can buy, beg, even bug people to get attention. Or you can earn it by creating something interesting and valuable.</i></h1>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h2 text-login mb-4">Create an Account!</h1>
              </div>
              <form class="user" method="POST" action="{{ route('register') }}">
              @csrf
                <div class="form-group">
                  
                    <input name="username" type="text" class="form-control form-control-user @error('username') is-invalid @enderror" id="username" placeholder="Your User Name">
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
                <div class="form-group row">
                  
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input name="name" type="text" class="form-control form-control-user" id="name" placeholder="First Name">
                    
                  </div>
                  <div class="col-sm-6">
                    <input name="last_name" type="text" class="form-control form-control-user" id="last_name" placeholder="Last Name">
                  </div>
                </div>
                <div class="form-group">
                  <input name="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" placeholder="Email Address">
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input name="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" placeholder="Password">
                    @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="col-sm-6">
                    <input name="password_confirmation" type="password" class="form-control form-control-user" id="password-confirm" placeholder="Repeat Password">
                  </div>
                </div>
                <button type="submit" class="btn btn-warning btn-user btn-block">
                  Register Account
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="/">Back to read articles?</a>
              </div>
              <div class="text-center">
                <a class="small" href="/login">Already have an account? Login!</a>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
@endsection
</x-auth-master>