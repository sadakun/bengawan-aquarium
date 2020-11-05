<x-auth-master>
    @section('titles')
    <title>Sadaku - Login</title>
    @endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row bg-login-image">
                    
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h2 text-login mb-4"><i>Welcome Bloggers</i></h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input name="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" placeholder="Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label text-green" for="customCheck">Remember Me</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-user btn-block">
                                    Login
                                </button>
                                
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ route('register') }}">Doesn't have account yet?</a>
                            </div>
                            <div class="text-center small text-green">
                            Or read another <a href="{{ route('home') }}">articles here.</a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h2 text-white bg-quote mt-4 mb-0">The first step in blogging is not writing them but reading them.</h1>
                                    <small class="text-gray-100 text-login-author"><i> - Jeff Jarvis </i><small>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</x-auth-master>