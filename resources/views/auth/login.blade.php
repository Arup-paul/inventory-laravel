@extends('layouts.app')

@section('content')


<div class="wrapper-page">
    <div class="panel panel-color panel-primary panel-pages">
        <div class="panel-heading bg-img">
            <div class="bg-overlay"></div>
            <h3 class="text-center m-t-10 text-white">Sign in  <strong>Inventory</strong> </h3>
        </div>


        <div class="panel-body">
        <form class="form-horizontal m-t-20" method="POST" action="{{ route('login') }}">
           @csrf
            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control input-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email" type="email" equired autocomplete="email" autofocus placeholder="Username">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <div class="form-group">
                <div class="col-xs-12">
                    <input id="password" class="form-control input-lg @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>

           <div class="form-group ">
                <div class="col-xs-12">
                    <div class="checkbox checkbox-primary">
                        <input class="form-check-input " type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">
                            Remember me
                        </label>
                    </div>

                </div>
            </div>

            <div class="form-group text-center m-t-40">
                <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-lg w-lg waves-effect waves-light">
                        {{ __('Login') }}
                    </button>
                </div>
            </div>


            <div class="form-group m-t-30">
                <div class="col-sm-6 text-center">
                    @if (Route::has('password.request'))
                    <a  href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
                </div>
                    <div class="col-sm-6 text-center">
                        <a href="{{ route('register') }}">Create account?</a>
                    </div>


            </div>
        </form>
        </div>

    </div>
</div>
@endsection
