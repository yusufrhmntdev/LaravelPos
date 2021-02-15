@extends('otentikasi.master')
@section('title','login')
@section('content')

    <div id="app">
        <section class="section">
          <div class="container mt-5">
            <div class="row">
              <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                  <img src="{{asset('assets/img/r1.png')}}" alt="logo" width="100%">
                <div class="card card-primary">
                  <div class="card-header"><h4>Login</h4></div>    
                  <div class="card-body">
                    @if (session('message')) 
                      <div class="alert alert-danger alert-dismissible show fade">
                          <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                              <span>×</span>
                            </button>
                            {{session('message')}}
                          </div>
                        </div>
                      @endif
                    <form method="POST" action="{{route('login')}}" class="needs-validation" novalidate="">
                        @csrf
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        <div class="invalid-feedback">
                          Please fill in your email
                        </div>
                      </div>
    
                      <div class="form-group">
                        <div class="d-block">
                            <label for="password" class="control-label">Password</label>
                          <div class="float-right">
                            @if (Route::has('password.request'))
                            <a class="text-small" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                          @endif
                          </div>
                        </div>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        <div class="invalid-feedback">
                          please fill in your password
                        </div>
                      </div>
    
                      <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                          <label class="custom-control-label" for="remember-me">Remember Me</label>
                        </div>
                      </div>
                      
    
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                          Login
                        </button>
                      </div>
                    </form>
                    <div class="text-center mt-4 mb-3">
                      <div class="text-job text-muted">Login With Social</div>
                    </div>
                    <div class="row sm-gutters">
                      <div class="col-12">
                        <a href="{{ url('auth/google') }}" class="btn btn-block btn-social btn-google">
                          <span class="fab fa-google"></span> Sign in With Google
                        </a>
                      </div>
                    </div>
    
                  </div>
                </div>
                {{-- <div class="mt-5 text-muted text-center">
                  Don't have an account? <a href="{{ route('register') }}">Create One</a>
                </div> --}}
                <div class="simple-footer">
                  Copyright &copy; <script>document.write(new Date().getFullYear());</script><a href="https://yusufrhmntdev.github.io/yusufrhmntdev/" target="_blank">
                    <i class="fab fa-github"></i> Yusuf rahmanto</a>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      @endsection

  {{-- <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{asset('assets/js/stisla.js')}}"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>

  <!-- Page Specific JS File -->
</body>
</html> --}}
